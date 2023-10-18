<?php

namespace App\Livewire;

use App\Models\UsulanKegiatanModel;
use Livewire\Component;
use Livewire\WithPagination;

class Kegiatan extends Component
{
    use WithPagination;
    public $id;
    public $type = 'all';
    public $search = '';

    function mount()
    {
        $this->id = _get('i');
    }

    public function render()
    {

        $dataKegiatan = UsulanKegiatanModel::where('id_bidang', $this->id);

        if ($this->type === 'all') {
            $dataKegiatan = $dataKegiatan;
        } elseif ($this->type === 'cp') {

            $dataKegiatan = $dataKegiatan->whereHas('member', function ($query) {
                $query->where('level', 'cp');
            });
        } elseif ($this->type === 'pd') {

            $dataKegiatan = $dataKegiatan->whereHas('member', function ($query) {
                $query->where('level', 'pd');
            });
        }

        if (!empty($this->search)) {
            $dataKegiatan->where('nama_kegiatan', 'like', '%' . $this->search . '%');
        }

        $dataKegiatan = $dataKegiatan->paginate(10);

        return view('livewire.kegiatan', [
            'dataKegiatan' => $dataKegiatan,
        ]);
    }
}
