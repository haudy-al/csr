<?php

namespace App\Livewire;

use App\Mail\LupaPassword;
use App\Models\MemberModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ResetPassword extends Component
{
    public $email;
    public $status = false;

    public function render()
    {
        return view('livewire.reset-password');
    }

    function KirimPassword() {
        $this->validate([
            'email'=>'required'
        ]);

        $cek = MemberModel::where('email_perusahaan', $this->email)->get()->first();

        if (!$cek) {
            $this->dispatch('MemberTidakDitemukan');
            return false;
        }

        $password = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $cek->password = Hash::make($password);
        $cek->save();

        $dataMail = [
            'username' => $cek->username,
            'nama_perusahaan'=>$cek->nama_perusahaan,
            'password' => $password

        ];

        Mail::to($cek->email_perusahaan)->send(new LupaPassword($dataMail));
        $this->status = true;
        $this->dispatch('Berhasil');

    }
}
