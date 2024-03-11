<?php

namespace App\Http\Livewire;

use App\Models\Contractor;
use App\Models\Division;
use App\Models\ProductType;
use App\Models\Schemes;
use App\Models\WorkAllotment;
use Livewire\Component;

class ManufacturePoEntry extends Component
{
    public $showSelect = false;

    public $divisions;
    public $schemes;
    public $contractors;
    public $product_types;

    public $selectedDivision;
    public $selectedScheme;
    public $selectedContractor;

    public $product_items =[];

    public function updatedSelectedDivision($value) {
            $this->schemes = Schemes::where("division", $value)->get();
    }

    public function updatedSelectedScheme($value) {
       
        $work_allotment =  WorkAllotment::select('contractor_id')->where("scheme_id", $value)->first();
        $this->contractors  = Contractor::where('id',$work_allotment->contractor_id)->get();

    }

    

    public function addrow() {
       
    }

    public function mount()

    {
        if ($this->selectedDivision) {
            $this->schemes = Schemes::where("division", $this->selectedDivision)->get();
        }

        if ($this->selectedScheme) {
            
            $work_allotment =  WorkAllotment::select('contractor_id')->where("scheme_id", $this->selectedScheme)->first();

            if($work_allotment)
            $this->contractors  = Contractor::where('id',$work_allotment->contractor_id)->get();
           
        }

      
    }

    public function toggleClick()
    {
        $this->showSelect = !$this->showSelect;
    }

    public function render()
    {
        $this->divisions = Division::all();
        $this->product_types =  ProductType::all();
        return view('livewire.manufacture-po-entry');
    }
}
