<?php

namespace App\Livewire;

use App\Models\BeritaModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahBerita extends Component
{

    use WithFileUploads;
    
    public $judul;
    public $gambar;
    public $deskripsi;


    public function render()
    {
        return view('livewire.tambah-berita');
    }

    function TambahBerita() {
        $this->validate([
            'judul'=>'required',
            'gambar' => 'required|image|max:2048',
            'deskripsi'=>'required',

        ]);
        $namaGambar = 'berita-' . uniqid() . date('ymdhis') . '.' . $this->gambar->getClientOriginalExtension();


        BeritaModel::create([
            'judul'=>$this->judul,
            'deskripsi'=>$this->deskripsi,
            'gambar'=>$namaGambar,
        ]);

        $this->gambar->storeAs('public/img/', $namaGambar);

        $this->dispatch('TambahBerhasil');

    }
}
