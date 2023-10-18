<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class DetailProyek extends Component
{
    use WithPagination;
    public $id;
    public $data;

    function mount()
    {
        $this->id = _get('i');
        $this->data = getDataUsulan($this->id);
    }
    
    public function render()
    {
        return view('livewire.detail-proyek');
    }
}
