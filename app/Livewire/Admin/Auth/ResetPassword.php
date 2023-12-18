<?php

namespace App\Livewire\Admin\Auth;

use App\Mail\LupaPassword;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ResetPassword extends Component
{

    public $email;
    public $status = false;

    public function render()
    {
        return view('livewire.admin.auth.reset-password');
    }

    function KirimPassword() {
        $this->validate([
            'email'=>'required'
        ]);

        $cek = AdminModel::where('email', $this->email)->get()->first();

        if (!$cek) {
            $this->dispatch('MemberTidakDitemukan');
            return false;
        }

        $password = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $cek->password = Hash::make($password);
        // $cek->status = '0';
        $cek->save();

        $dataMail = [
            'username' => $cek->username,
            'nama_perusahaan'=>$cek->username,
            'password' => $password

        ];

        Mail::to($cek->email)->send(new LupaPassword($dataMail));
        $this->status = true;

        $dLog = [
            'level'=>'user',
            'idAkun'=>$cek->id,
            'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
            'subject'=>'Reset Password member (lupa password)'
        ];
        createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);

        $this->dispatch('Berhasil');

    }
}
