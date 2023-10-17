<?php

namespace App\Livewire\Faq;

use App\Models\FaqModel;
use Livewire\Component;

class EditFaq extends Component
{
    public $judul;
    public $deskripsi;
    public $id;

    public function mount()
    {
        $faq = FaqModel::find(_get('i'));

        $this->id = $faq->id;
        $this->judul = $faq->judul;
        $this->deskripsi = $faq->deskripsi;
    }

    public function render()
    {
        return view('livewire.faq.edit-faq');
    }

    function SimpanFaq()
    {
        $cek = FaqModel::find($this->id);

        $this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',

        ], [
            'judul.required' => 'Judul Wajib di Isi',
            'deskripsi.required' => 'deskripsi Wajib di Isi',
        ]);

    
        $cek->judul = $this->judul;
        $cek->deskripsi = $this->deskripsi;
       

        $cek->save();

        $this->dispatch('TambahBerhasil');
    }
}
