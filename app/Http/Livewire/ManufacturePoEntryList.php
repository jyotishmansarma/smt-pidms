<?php

namespace App\Http\Livewire;

use App\Models\Division;
use App\Models\Panchayat;
use App\Models\Schemes;
use Livewire\Component;

class ManufacturePoEntryList extends Component
{
   

    public function render()
    {
        return view('livewire.manufacture-po-entry-list');
    }
}
