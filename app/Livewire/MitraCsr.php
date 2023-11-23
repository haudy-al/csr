<?php

namespace App\Livewire;

use App\Models\MemberModel;
use Livewire\Component;
use Livewire\WithPagination;

class MitraCsr extends Component
{
    use WithPagination;
    public $id;
    public $type = 'all';
    public $search = '';

    public function render()
    {
        $dataMember = MemberModel::query();

        $dataMember = $dataMember->where('level', 'cp');

        if (!empty($this->search)) {
            $dataMember->where('nama_perusahaan', 'like', '%' . $this->search . '%');
        }

        $dataMember = $dataMember->paginate(5);

        return view('livewire.mitra-csr',[
            'dataMember'=>$dataMember
        ]);
    }
}
