<?php

namespace App\Livewire\Master;

use App\Models\BidangModel;
use Livewire\Component;

class TambahBidang extends Component
{
   
    public $nama;

    public function render()
    {
        return view('livewire.master.tambah-bidang');
    }

    function TambahBidang() {
        $this->validate([
            'nama' => 'required',
            
        ]);

        BidangModel::create([
           
            'nama' => $this->nama,

        ]);

        $this->dispatch('TambahBerhasil');
    }
}
