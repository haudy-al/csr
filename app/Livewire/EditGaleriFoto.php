<?php

namespace App\Livewire;

use App\Models\GaleriFotoModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditGaleriFoto extends Component
{
    use WithFileUploads;

    public $judul;
    public $gambar;
    public $deskripsi;
    public $gambarLama;
    public $idGaleri;

    public function mount()
    {
        $galeri = GaleriFotoModel::find(_get('i'));

        $this->idGaleri = $galeri->id;
        $this->judul = $galeri->judul;
        $this->deskripsi = $galeri->deskripsi;
        $this->gambarLama = $galeri->gambar;
    }

    public function render()
    {
        return view('livewire.edit-galeri-foto');
    }

    public function clearGambar()
    {
        $this->gambar = null;
    }

    public function SimpanGaleri()
    {
        $cek = GaleriFotoModel::find($this->idGaleri);

        $cek->judul = $this->judul;
        $cek->deskripsi = $this->deskripsi;

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
