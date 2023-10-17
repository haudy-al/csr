<?php

namespace App\Livewire\Admin;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfileAdmin extends Component
{
    public $username;
    public $password;
    public $id;

    public function mount()
    {
        $admin = AdminModel::where('token',session('token'))->get()->first();
        $this->username = $admin->username;
        $this->id = $admin->id;
       
    }

    public function render()
    {
        return view('livewire.admin.profile-admin');
    }

    function SimpanProfile() {
        if (!$this->password) {
            return false;
        }
        AdminModel::where('id',$this->id)->update([
            'password'=>Hash::make($this->password)
        ]);

        $this->password = "";

        $this->dispatch('TambahBerhasil');
    }
}
