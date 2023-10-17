<?php

namespace App\Livewire\Master;

use App\Models\KategoriMemberModel;
use Livewire\Component;

class TambahKategoriMember extends Component
{
    public $nama;
    public function render()
    {
        return view('livewire.master.tambah-kategori-member');
    }

    function TambahKategoriMember()
    {

        $this->validate([
            'nama' => 'required',
            
        ]);

        KategoriMemberModel::create([
           
            'nama' => $this->nama,

        ]);

        $this->dispatch('TambahBerhasil');
    }
}
