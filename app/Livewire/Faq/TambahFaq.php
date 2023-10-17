<?php

namespace App\Livewire\Faq;

use App\Models\FaqModel;
use Livewire\Component;

class TambahFaq extends Component
{
    public $judul;
    public $deskripsi;
    public function render()
    {
        return view('livewire.faq.tambah-faq');
    }

    function TambahFaq()
    {
        $this->validate([

            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        FaqModel::create([
            
            'judul'=>$this->judul,
            'deskripsi'=>$this->deskripsi,
        ]);

      
        $this->dispatch('TambahBerhasil');
    }
}
