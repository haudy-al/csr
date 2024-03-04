<?php

namespace App\Livewire;

use App\Models\LoginLogModel;
use App\Models\MemberModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginPerusahaan extends Component
{

    public $username;
    public $password;

    // public $recaptcha;
    public $captcha;


    public $ipAddress;
    public $userAgent;
    public $waktu_login = null;

    protected $listeners = ['clearJmlLogin' => 'UpdateLoginLog'];

    public function __construct()
    {
        $this->ipAddress = $_SERVER['REMOTE_ADDR'];
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
    }

    public function render()
    {
        $cekLogLogin = LoginLogModel::where('user_ip', $this->ipAddress)->where('user_agent', $this->userAgent)->get()->first();

        if ($cekLogLogin && $cekLogLogin->jml_upaya_login > 3) {
            $this->waktu_login = $cekLogLogin->waktu;
        }

        return view('livewire.login-perusahaan');
    }

    function ProsesLogin()
    {

        $this->validate([
            'username' => 'required',
            'password' => 'required',
            // 'recaptcha' => 'required|captcha',
            'captcha' => 'required|captcha',


        ], [
            'username.required' => 'Username Wajib di Isi',
            'password.required' => 'Password Wajib di Isi',
            'captcha.required' => 'Captcha Wajib di Isi',
            'captcha.captcha' => 'Captcha Salah',
        ]);

        $r = uniqid() . date('ymdhis');

        $token = sha1($r);


        $cek = LoginLogModel::where('user_ip', $this->ipAddress)->where('user_agent', $this->userAgent)->get()->first();


        if ($cek && $cek->jml_upaya_login > 3) {

            $this->dispatch('LoginTunggu');
        } else {
            if (Auth::guard('member')->attempt(['username' => $this->username, 'password' => $this->password])) {
                
                $inactiveThreshold = now()->subMinutes(10);
                $user = MemberModel::where('username', $this->username)->get()->first();

                if (($user->token == null || $user->user_token  == '0') || $user->last_seen < $inactiveThreshold) {
                    $user->update(['token' => $token]);

                    $user->save();

                    session(['user_token' => $token]);
                    session()->regenerate();

                    $dLog = [
                        'level' => 'user',
                        'idAkun' => $user->id,
                        'url' => $_SERVER['HTTP_HOST'] . '/' . getUrlSaatIni(),
                        'subject' => 'Login member'
                    ];
                    createdLog($dLog['level'], $dLog['idAkun'], $dLog['subject'], $dLog['url']);

                    $this->dispatch('LoginBerhasil');
                }else{
                    $this->dispatch('LoginDeviceLain');
                }
            } else {
                if ($cek) {
                    $waktu = date('Y-m-d H:i:s');
                    $waktu10menit = date('Y-m-d H:i:s', strtotime('+2 minutes', strtotime($waktu)));
                    $cek->jml_upaya_login = $cek->jml_upaya_login + 1;
                    $cek->waktu = $waktu10menit;

                    $cek->save();

                    if ($cek->jml_upaya_login == 3) {
                        return redirect('/login');
                    }
                    $this->dispatch('LoginGagal');
                } else {
                    LoginLogModel::create([
                        'user_ip' => $this->ipAddress,
                        'user_agent' => $this->userAgent,
                        'jml_upaya_login' => 0,
                    ]);
                    $this->dispatch('LoginGagal');
                }
            }
        }
    }
}
