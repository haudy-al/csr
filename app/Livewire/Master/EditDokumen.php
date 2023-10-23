<?php

namespace App\Livewire\Master;

use App\Models\DokumenModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditDokumen extends Component
{

    use WithFileUploads;

    public $id;
    public $judul;
    public $dokumen;
    public $dokumenLama;
    
    public function mount()
    {
        $data = DokumenModel::find(_get('i'));

        if (!$data) {
            return redirect('/admin/master/dokumen');
        }

        $this->id = $data->id;
        $this->judul = $data->judul;
        $this->dokumenLama = $data->judul;

    }
    
    public function render()
    {
        return view('livewire.master.edit-dokumen');
    }

    function SimpanDokumen() {
        $cek = DokumenModel::find($this->id);

        $this->validate([
            'judul' => 'required',
            // 'dokumen' => 'mimes:pdf|max:2048',
        ], [
            'judul.required' => 'Judul Wajib di Isi',
        ]);


        $cek->judul = $this->judul;
       
        if ($this->dokumen) {
            $namadokumen = 'dokumen-' . uniqid() . date('ymdhis') . '.' . $this->dokumen->getClientOriginalExtension();
            if ($cek->dokumen == null) {
                $cek->dokumen = 'kosong.png';
            }
            if (file_exists(storage_path('app/pdf/' . $cek->dokumen))) {
                unlink(storage_path('app/pdf/' . $cek->dokumen));
            }

            $cek->dokumen = $namadokumen;


            $this->dokumen->storeAs('pdf/', $namadokumen);

        }

        $cek->save();

        $this->dispatch('TambahBerhasil');
    }
}
