<?php

namespace App\Livewire\Master;

use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use Livewire\Component;

class EditKelurahan extends Component
{

    public $nama;
    public $id_kecamatan;
    public $id_kelurahan;
    public $id;

    public function mount()
    {
        $kelurahan = KelurahanModel::find(_get('i'));
        $this->id = $kelurahan->id;
        $this->nama = $kelurahan->nama;
        $this->id_kelurahan = $kelurahan->id_kelurahan;
        $this->id_kecamatan = $kelurahan->id_kecamatan;
       
    }


    public function render()
    {
        $kecamatan = KecamatanModel::all();
        return view('livewire.master.edit-kelurahan', [
            'kecamatan' => $kecamatan
        ]);
    }

    function EditKelurahan()
    {
        $cek = KelurahanModel::find($this->id);

        $cek->nama = $this->nama;
        $cek->id_kecamatan = $this->id_kecamatan;
        $cek->id_kelurahan = $this->id_kelurahan;

        $cek->save();

        $this->dispatch('TambahBerhasil');

    }
}
