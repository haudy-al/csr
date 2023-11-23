<?php

namespace App\Livewire\Admin\Auth;

use App\Models\AdminModel;
use App\Models\LoginLogModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginAdmin extends Component
{
    use WithFileUploads;


    public $password;
    public $username;
    public $recaptcha;

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
        return view('livewire.admin.auth.login-admin',[
            
        ]);
    }

    function ProsesLogin()
    {

        $this->validate([
            'username' => 'required',
            'password' => 'required',
            'recaptcha' => 'required|captcha'
        ]);

        $r = uniqid() . date('ymdhis');

        $token = sha1($r);

        $cek = LoginLogModel::where('user_ip', $this->ipAddress)->where('user_agent', $this->userAgent)->get()->first();


        if ($cek && $cek->jml_upaya_login > 3) {

            $this->dispatch('LoginTunggu');
            
        }else{
            if (Auth::guard('admin')->attempt(['username' => $this->username, 'password' => $this->password])) {

                $user = AdminModel::where('username', $this->username)->get()->first();
    
                $user->update(['token' => $token]);
    
                $user->save();
    
                session(['token' => $token]);
                session()->regenerate();

                $dLog = [
                    'level'=>'admin',
                    'idAkun'=>$user->id,
                    'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
                    'subject'=>'Login Admin'
                ];
                createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);
    
                $this->dispatch('LoginBerhasil');
            } else {
                if ($cek) {
                    $waktu = date('Y-m-d H:i:s');
                    $waktu10menit = date('Y-m-d H:i:s', strtotime('+1 minutes', strtotime($waktu)));
                    $cek->jml_upaya_login = $cek->jml_upaya_login + 1;
                    $cek->waktu = $waktu10menit;
    
                    $cek->save();
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

    function UpdateLoginLog() {
        // $cek = LoginLogModel::where('user_ip', $this->ipAddress)->where('user_agent', $this->userAgent)->get()->first();

        // if ($cek && $cek->jml_upaya_login > 3) {
        //     $cek->jml_upaya_login = 0;
        // }

        dd('hallo');
    }
}
