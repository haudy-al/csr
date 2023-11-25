<?php

namespace App\Livewire\Admin;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfileAdmin extends Component
{
    public $email;
    public $username;
    public $password;
    public $id;

    public function mount()
    {
        $admin = AdminModel::where('token',session('token'))->get()->first();
        $this->username = $admin->username;
        $this->email = $admin->email;
        $this->id = $admin->id;
       
    }

    public function render()
    {
        return view('livewire.admin.profile-admin');
    }

    function SimpanProfile() {

        $this->validate([
            'email' => 'required|email|unique:admin,email,' . $this->id,
        ]);
        
        $cek = AdminModel::where('id',$this->id)->first();
        
        if ($this->password) {
            $cek->password = Hash::make($this->password);
        }

        $cek->email = $this->email;

        $cek->save();
     
        $this->password = "";

        $this->dispatch('TambahBerhasil');
    }
}
