<?php

namespace App\Livewire;

use App\Models\UsulanKegiatanModel;
use Livewire\Component;
use Livewire\WithPagination;

class Kegiatan extends Component
{
    use WithPagination;
    public $id;
    public $type;
    public $nama;

    function mount()
    {
        $this->id = _get('i');
    }

    public function render()
    {

        $dataKegiatan = UsulanKegiatanModel::where('id_bidang', $this->id);

        if ($this->type === 'all') {
            $dataKegiatan = $dataKegiatan->get();
           
        } else {
        //    dd('ok');
        }


        return view('livewire.kegiatan', [
            'dataKegiatan' => $dataKegiatan,
        ]);
    }
}
