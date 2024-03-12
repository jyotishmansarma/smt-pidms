<?php

namespace App\Http\Livewire;

use App\Models\Contractor;
use App\Models\Division;
use App\Models\Product;
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
    public $products;

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

    public function addRow()
    {
        $this->product_items[] = ['seleactedProductType' => '', 'selectedProduct' => '', 'selectedDealer' => '', 'quantity' => '', 'batchno' => '', 'price' => '', 'totalprice' => '' ];
    }

    public function removeRow($index)
    {
        unset($this->product_items[$index]);
        $this->product_items = array_values($this->product_items);
    }

    public function updatedProductItems()
    {
        if (empty($this->product_items)) {
            $this->addRow();
        }
    }

    public function mount()

    {

        $this->addRow();

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
        $this->products = Product::all();
        return view('livewire.manufacture-po-entry');
    }
}
