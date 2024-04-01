<?php

namespace App\Http\Livewire;

use App\Models\Contractor;
use App\Models\Dealer;
use App\Models\Division;
use App\Models\PdiAgency;
use App\Models\PdiCertificate;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\Schemes;
use App\Models\User;
use App\Models\WorkAllotment;
use Livewire\Component;

class ManufacturePoEdit extends Component
{

    public $purchaseorder_id;

    public $divisions;
    public $searchDivision;
    public $schemes;
    public $contractors;
    public $product_types;
    public $products;
    public $dealers;
    public $pdiagencies;

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

public function updated($propertyName, $value)
{
    if (strpos($propertyName, 'product_items.') === 0) {
        
        $index = explode('.', $propertyName)[1];
        $field = explode('.', $propertyName)[2];

        if($field=='quantity'){

            $sanitizedValue = preg_replace('/[^0-9]/', '', $value);
            if ($sanitizedValue === '') {
                $this->product_items[$index]['quantity'] = null;
                $this->product_items[$index]['totalprice'] = 0; 
                return;
            }
            $this->product_items[$index]['quantity'] = intval($sanitizedValue);
            $this->calculateTotalPrice($index);
        }
        if($field=='price'){

            $sanitizedValue = preg_replace('/[^0-9.]/', '', $value);
            if ($sanitizedValue === '') {
                $this->product_items[$index]['price'] = null;
                $this->product_items[$index]['totalprice'] = 0 ; 
                return;
            }
            if ($sanitizedValue === '.') {
                $this->product_items[$index]['totalprice'] = 0 ; 
                return;
            }

            $parts = explode('.', $sanitizedValue);
            if (count($parts) > 1) {
                $decimalPart = substr($parts[1], 0, 2);
                $sanitizedValue = $parts[0] . '.' . $decimalPart;
            }
            $this->product_items[$index]['price'] = $sanitizedValue;
            $this->calculateTotalPrice($index);
        }

        if($field=='selectedProductType'){
            $this->products = Product::where('product_type_id',$this->product_items[$index]['selectedProductType'])->get();
        }
    }

}

private function calculateTotalPrice($index) {

    if($this->product_items[$index]['quantity'] && $this->product_items[$index]['price'])
        $this->product_items[$index]['totalprice'] = $this->product_items[$index]['quantity'] * $this->product_items[$index]['price'];
}

public function addRow()
{
    $this->product_items[] = [ 'showSelect'=>false, 'selectedProductType' => '', 'selectedProduct' => '', 'is_dealer_exist'=>false, 'selectedDealer' => '', 'quantity' => 0 , 'batchno' => '', 'price' => 0, 'totalprice' => 0 ];
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

    public function mount($purchaseorder_id)
    {
        $this->purchaseorder_id = $purchaseorder_id;

        $purchase_order = PurchaseOrder::find($purchaseorder_id);
        $purchaseorder_items =  PurchaseOrderItem::where('purchase_order_id',$purchaseorder_id)->get();
        $pdi_certificates =  PdiCertificate::where('purchase_order_id', $purchaseorder_id)->get();

        foreach($purchaseorder_items as $purchaseorder_item) {
            $this->product_items[] = [ 'showSelect'=>$purchaseorder_item->is_dealer_exist, 'selectedProductType' => $purchaseorder_item->producttype_id, 'selectedProduct' => $purchaseorder_item->product_id, 'is_dealer_exist'=>$purchaseorder_item->is_dealer_exist, 'selectedDealer' => $purchaseorder_item->dealer_id, 'quantity' => $purchaseorder_item->quantity , 'batchno' => $purchaseorder_item->batchno, 'price' => $purchaseorder_item->price , 'totalprice' => $purchaseorder_item->totalprice ];
        }

        foreach($pdi_certificates as $pdi_certificate) {
            $this->certificates[] = [ 'selectedAgency' => $pdi_certificate->pdi_agency_id, 'certificate_no'=> $pdi_certificate->certificate_no, 'certificate_date' => $pdi_certificate->certificate_date, 'certificate_file' => $pdi_certificate->certificate_file ];
        }

        $this->selectedDivision = $purchase_order->division_id;
        $this->selectedScheme = $purchase_order->scheme_id;
        $this->selectedContractor =  $purchase_order->contractor_id;

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
        $this->divisions = Division::where('division_name', 'like', '%' . $this->searchDivision . '%')->get();
        $this->product_types =  ProductType::all();
        $this->dealers = Dealer::all();
        $this->pdiagencies = PdiAgency::all();
        $this->pdiagencies=User::with(['role_user' => function ($query) {
            $query->where('role_id',2);
        }])->get();
        return view('livewire.manufacture-po-edit');
    }
}
