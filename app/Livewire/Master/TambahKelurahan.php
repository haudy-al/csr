<?php

namespace App\Livewire\Master;

use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use Livewire\Component;

class TambahKelurahan extends Component
{
    public $nama;
    public $id_kecamatan;
    public $id_kelurahan;

    public function render()
    {
        $kecamatan = KecamatanModel::all();

        return view('livewire.master.tambah-kelurahan',[
            'kecamatan'=>$kecamatan
        ]);
    }

    function TambahKelurahan() {

        $this->validate([
            'nama'=>'required',
            'id_kecamatan'=>'required|numeric',
            'id_kelurahan'=>'required|numeric',
        ]);

        KelurahanModel::create([
            'id_kecamatan'=>$this->id_kecamatan,
            'id_kelurahan'=>$this->id_kelurahan,
            'nama'=>$this->nama,
            
        ]);

        $this->dispatch('TambahBerhasil');
    }
}
