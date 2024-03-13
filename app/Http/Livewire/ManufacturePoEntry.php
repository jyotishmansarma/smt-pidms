<?php

namespace App\Http\Livewire;

use App\Models\Contractor;
use App\Models\Dealer;
use App\Models\Division;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Schemes;
use App\Models\WorkAllotment;
use Livewire\Component;

class ManufacturePoEntry extends Component
{

    public $divisions;
    public $searchDivision;
    public $schemes;
    public $contractors;
    public $product_types;
    public $products;
    public $dealers;

    public $selectedDivision;
    public $selectedScheme;
    public $selectedContractor;

    public $product_items =[];
    public $certificates = [];

    public function updatedSelectedDivision($value) {
            $this->schemes = Schemes::where("division", $value)->get();
    }

    public function updatedSelectedScheme($value) {
       
        $work_allotment =  WorkAllotment::select('contractor_id')->where("scheme_id", $value)->first();
        $this->contractors  = Contractor::where('id',$work_allotment->contractor_id)->get();

    }

    public function updated($propertyName)
    {
        if (strpos($propertyName, 'product_items.') === 0) {
            $index = explode('.', $propertyName)[1];
            $this->calculateTotalPrice($index);
        }
    }

    private function calculateTotalPrice($index) {

        if($this->product_items[$index]['quantity'] && $this->product_items[$index]['price'])
            $this->product_items[$index]['totalprice'] = $this->product_items[$index]['quantity'] * $this->product_items[$index]['price'];
    }

    public function addRow()
    {
        $this->product_items[] = [ 'showSelect'=>false, 'seleactedProductType' => '', 'selectedProduct' => '', 'selectedDealer' => '', 'quantity' => 0 , 'batchno' => '', 'price' => 0, 'totalprice' => 0 ];
    }

    public function removeRow($index)
    {
        unset($this->product_items[$index]);
        $this->product_items = array_values($this->product_items);
    }

    public function addCertificate(){
        $this->certificates[] = [ 'selectedAgency' =>'', 'certificate_no'=>'', 'certificate_date' =>'', 'certificate_file' =>'' ];
    }

    public function removeCertificate($index)
    {
        unset($this->certificates[$index]);
        $this->certificates = array_values($this->certificates);
    }

    public function toggleClick($index)
    {
        $this->product_items[$index]['showSelect'] = ! $this->product_items[$index]['showSelect'] ;
    }

    public function mount()

    {
        $this->addRow();
        $this->addCertificate();

        if ($this->selectedDivision) {
            $this->schemes = Schemes::where("division", $this->selectedDivision)->get();
        }

        if ($this->selectedScheme) {
            
            $work_allotment =  WorkAllotment::select('contractor_id')->where("scheme_id", $this->selectedScheme)->first();

            if($work_allotment)
                $this->contractors  = Contractor::where('id',$work_allotment->contractor_id)->get();
            }
    }

   

    public function render()
    {
        $this->divisions = Division::where('division_name', 'like', '%' . $this->searchDivision . '%')->get();;
        $this->product_types =  ProductType::all();
        $this->products = Product::all();
        $this->dealers = Dealer::all();
        return view('livewire.manufacture-po-entry');
    }
}
