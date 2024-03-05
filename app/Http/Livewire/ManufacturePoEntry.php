<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ManufacturePoEntry extends Component
{
    public $showSelect = false;

    public function toggleClick()
    {
        $this->showSelect = !$this->showSelect;
    }

    public function render()
    {
        return view('livewire.manufacture-po-entry');
    }
}
