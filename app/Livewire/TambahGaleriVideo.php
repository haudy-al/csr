<?php

namespace App\Livewire;

use App\Models\GaleriVideoModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahGaleriVideo extends Component
{
    use WithFileUploads;
    
    public $judul;
    public $gambar;
    public $deskripsi;
    public $embed;



    public function render()
    {
        return view('livewire.tambah-galeri-video');
    }

    function TambahVideo() {
        $this->validate([
            'judul'=>'required',
            'embed'=>'required',
            'gambar' => 'required|image|max:2048',
            'deskripsi'=>'required',

        ]);
        $namaGambar = 'thumbnail-' . uniqid() . date('ymdhis') . '.' . $this->gambar->getClientOriginalExtension();


        GaleriVideoModel::create([
            'judul'=>$this->judul,
            'deskripsi'=>$this->deskripsi,
            'embed'=>$this->embed,
            'gambar'=>$namaGambar,
        ]);

        $this->gambar->storeAs('public/img/', $namaGambar);

        $this->dispatch('TambahBerhasil');

    }
}
