<?php

namespace App\Livewire;

use App\Models\GaleriFotoModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahGaleriFoto extends Component
{
    use WithFileUploads;
    
    public $judul;
    public $gambar;
    public $deskripsi;


    public function render()
    {
        return view('livewire.tambah-galeri-foto');
    }

    function TambahBerita() {
        $this->validate([
            'judul'=>'required',
            'gambar' => 'required|image|max:2048',
            'deskripsi'=>'required',

        ]);
        $namaGambar = 'foto-' . uniqid() . date('ymdhis') . '.' . $this->gambar->getClientOriginalExtension();


        GaleriFotoModel::create([
            'judul'=>$this->judul,
            'deskripsi'=>$this->deskripsi,
            'gambar'=>$namaGambar,
        ]);

        $this->gambar->storeAs('public/img/', $namaGambar);

        $this->dispatch('TambahBerhasil');

    }
}
