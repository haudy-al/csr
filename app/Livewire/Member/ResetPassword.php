<?php

namespace App\Livewire\Member;

use App\Models\MemberModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{

    public $password;
    public $statusPassword = '';
    public $messagePassword = '';

    public $password_lama;

    public function render()
    {
        if ($this->password) {
            $this->statusPassword = validatePassword($this->password)['status'];
            $this->messagePassword = validatePassword($this->password)['message'];
        }
        return view('livewire.member.reset-password');
    }

    function resetPassword()
    {
        $this->validate([
            'password' => 'required',
            'password_lama' => 'required',
        ]);

        if ($this->statusPassword != 'kuat') {
            $this->dispatch('PasswordLemah', message: $this->messagePassword);
            return false;
        }
        
        if (!Auth::guard('member')->attempt(['username' => getDataMember()->username, 'password' => $this->password_lama])) {
            $this->dispatch('PasswordLemah',message: 'Password Lama Salah');
            return false;
        }

        $expirePass = date('Y-m-d', strtotime('+1 year'));

        MemberModel::where('id', getDataMember()->id)->update([
            'password' => Hash::make($this->password),
            'status'=>'1',
            'password_expire'=>$expirePass,
        ]);

        $this->password = "";

        $dLog = [
            'level'=>'user',
            'idAkun'=>getDataMember()->id,
            'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
            'subject'=>'Reset Password member'
        ];
        createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);

        $this->dispatch('UbahPasswordSuccess');
    }
}
