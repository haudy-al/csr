<?php

namespace App\Livewire\Master;

use App\Models\DokumenModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahDokumen extends Component
{

    use WithFileUploads;

    public $judul;
    public $dokumen;

    public function render()
    {
        return view('livewire.master.tambah-dokumen');
    }

    function TambahDokumen() {
        $this->validate([
            'judul' => 'required',
            'dokumen' => 'required|mimes:pdf|max:2048',
        ]);

        $namaPdf = 'dokumen-' . uniqid() . date('ymdhis') . '.' . $this->dokumen->getClientOriginalExtension();

        DokumenModel::create([
            'judul'=>$this->judul,
            'dokumen'=>$namaPdf
        ]);

        $this->dokumen->storeAs('pdf/', $namaPdf);

        $this->clearInput();

        $this->dispatch('TambahBerhasil');

    }

    function clearInput() {
        $this->judul = "";
        $this->dokumen = "";
    }
}
