<?php

namespace App\Livewire\Master;

use App\Models\KecamatanModel;
use Livewire\Component;

class EditKecamatan extends Component
{
    public $nama;
    public $id_kecamatan;
    public $id;

    public function mount()
    {
        $kecamatan = KecamatanModel::find(_get('i'));
        $this->id = $kecamatan->id;
        $this->nama = $kecamatan->nama;
        $this->id_kecamatan = $kecamatan->id_kecamatan;
       
    }

    public function render()
    {
        return view('livewire.master.edit-kecamatan');
    }

    function SimpanKecamatan() {
        $cek = KecamatanModel::find($this->id);

        $cek->nama = $this->nama;
        $cek->id_kecamatan = $this->id_kecamatan;

        $cek->save();

        $this->dispatch('TambahBerhasil');
    }
}
