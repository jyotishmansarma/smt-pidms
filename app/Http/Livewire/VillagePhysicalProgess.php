<?php

namespace App\Http\Livewire;

use App\Models\Block;
use App\Models\Panchayat;
use App\Models\Village;
use Livewire\Component;

class VillagePhysicalProgess extends Component
{
    public $panchayats;
    public $villagess;
    public $selectedPanchayat;
    public $selectedVillage;



    public function updatedSelectedPanchayatt($value)
    {
        $this->villagess = Village::where("panchayat_id", $value)->get();
    }
    public function mount()

    {
        if ($this->selectedPanchayat) {
            $this->villagess = Village::where("panchayat_id", $this->selectedPanchayat)->get();
        }

    }
    public function render()
    {
        $divisionId = auth()->user()->division_users->division[0];
        $blockId = Block::where('district_id',$divisionId->district_id)->pluck('id');
        $this->panchayats = Panchayat::whereIn("block_id", $blockId)->get();
        return view('livewire.village-physical-progess');
    }

}
