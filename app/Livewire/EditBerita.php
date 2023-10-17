<?php

namespace App\Livewire;

use App\Models\BeritaModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBerita extends Component
{
    use WithFileUploads;

    public $judul;
    public $gambar;
    public $deskripsi;
    public $gambarLama;
    public $idBerita;

    public function mount()
    {
        $berita = BeritaModel::find(_get('user'));

        $this->idBerita = $berita->id;
        $this->judul = $berita->judul;
        $this->deskripsi = $berita->deskripsi;
        $this->gambarLama = $berita->gambar;
    }

    public function render()
    {
        return view('livewire.edit-berita');
    }

    public function clearGambar()
    {
        $this->gambar = null;
    }

    public function SimpanBerita()
    {
        $cek = BeritaModel::find($this->idBerita);

        $cek->judul = $this->judul;
        $cek->deskripsi = $this->deskripsi;

        if ($this->gambar) {
            $namaGambar = 'berita-' . uniqid() . date('ymdhis') . '.' . $this->gambar->getClientOriginalExtension();
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
