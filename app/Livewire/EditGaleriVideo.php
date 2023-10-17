<?php

namespace App\Livewire;

use App\Models\GaleriVideoModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditGaleriVideo extends Component
{
    use WithFileUploads;

    public $judul;
    public $gambar;
    public $deskripsi;
    public $embed;
    public $gambarLama;
    public $idGaleri;

    public function mount()
    {
        $galeri = GaleriVideoModel::find(_get('i'));

        $this->idGaleri = $galeri->id;
        $this->judul = $galeri->judul;
        $this->deskripsi = $galeri->deskripsi;
        $this->embed = $galeri->embed;
        $this->gambarLama = $galeri->gambar;
    }

    public function render()
    {
        return view('livewire.edit-galeri-video');
    }

    public function clearGambar()
    {
        $this->gambar = null;
    }

    public function SimpanGaleri()
    {
        $cek = GaleriVideoModel::find($this->idGaleri);

        $cek->judul = $this->judul;
        $cek->deskripsi = $this->deskripsi;
        $cek->embed = $this->embed;

        if ($this->gambar) {
            $namaGambar = 'foto-' . uniqid() . date('ymdhis') . '.' . $this->gambar->getClientOriginalExtension();
            if ($cek->gambar == null) {
                $cek->gambar = 'kosong.png';
            }
            if (file_exists(storage_path('app/public/img/' . $cek->gambar))) {
                unlink(storage_path('app/public/img/' . $cek->gambar));
            }
            $cek->gambar = $namaGambar;

            
            $this->gambar->storeAs('public/img/', $namaGambar);
        }

        $cek->save();

        $this->dispatch('TambahBerhasil');
    }
}
