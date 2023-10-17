<?php

namespace App\Livewire\Master;

use App\Models\KecamatanModel;
use Livewire\Component;

class TambahKecamatan extends Component
{

    public $nama;
    public $id_kecamatan;

    public function render()
    {
        return view('livewire.master.tambah-kecamatan');
    }

    function TambahKecamatan()  {
        $this->validate([
            'nama'=>'required',
            'id_kecamatan'=>'required|numeric',
        ]);

        KecamatanModel::create([
            'id_kecamatan'=>$this->id_kecamatan,
            'nama'=>$this->nama,
            
        ]);

        $this->dispatch('TambahBerhasil');
    }
}
