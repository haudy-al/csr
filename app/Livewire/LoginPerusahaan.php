<?php

namespace App\Livewire;

use App\Models\MemberModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginPerusahaan extends Component
{

    public $username;
    public $password;

    public function render()
    {
        return view('livewire.login-perusahaan');
    }

    function ProsesLogin()
    {

        $this->validate([
            'username' => 'required',
            'password' => 'required',
            
        ]);

        $r = uniqid() . date('ymdhis');

        $token = sha1($r);

        if (Auth::guard('member')->attempt(['username' => $this->username, 'password' => $this->password])) {

            $user = MemberModel::where('username', $this->username)->get()->first();

            $user->update(['token' => $token]);

            $user->save();

            session(['user_token' => $token]);
            session()->regenerate();

            $this->dispatch('LoginBerhasil');
        } else {
            $this->dispatch('LoginGagal');
        }
        
    }
}
