<?php

namespace App\Livewire\Master;

use App\Models\KategoriMemberModel;
use Livewire\Component;

class EditKategoriMember extends Component
{

    public $id;
    public $nama;


    public function mount()
    {
        $kategori = KategoriMemberModel::find(_get('i'));
        $this->id = $kategori->id;
        $this->nama = $kategori->nama;
        
       
    }
    public function render()
    {
        return view('livewire.master.edit-kategori-member');
    }

    function SimpanKategoriMember() {
        $this->validate([
            'nama'=>'required'
        ]);
        $cek = KategoriMemberModel::find($this->id);

        $cek->nama = $this->nama;
       
        $cek->save();

        $this->dispatch('TambahBerhasil');
    }
}
