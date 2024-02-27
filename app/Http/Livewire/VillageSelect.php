<?php

namespace App\Http\Livewire;

use App\Models\Panchayat;
use App\Models\Village;
use Livewire\Component;

class VillageSelect extends Component
{
    public $panchayats;
    public $villages;
    public $selectedPanchayat;
    public $selectedVillage;

    public function updatedSelectedPanchayat($value)
    {
        $this->villages = Village::where("panchayat_id", $value)->get();
    }
    public function mount()

    {
        if ($this->selectedPanchayat) {
            $this->villages = Village::where("panchayat_id", $this->selectedPanchayat)->get();
        }

    }
    public function render()
    {
        $this->panchayats = Panchayat::all();
        return view('livewire.village-select');
    }

}
