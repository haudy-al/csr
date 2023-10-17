<?php

namespace App\Livewire\Master;

use App\Models\BidangModel;
use Livewire\Component;

class EditBidang extends Component
{

    public $id;
    public $nama;

    public function mount()
    {
        $bidang = BidangModel::find(_get('i'));
        $this->id = $bidang->id;
        $this->nama = $bidang->nama;
    }

    public function render()
    {
        return view('livewire.master.edit-bidang');
    }

    function SimpanBidang()
    {
        $this->validate([
            'nama' => 'required'
        ]);
        $cek = BidangModel::find($this->id);

        $cek->nama = $this->nama;

        $cek->save();

        $this->dispatch('TambahBerhasil');
    }
}
