<?php

namespace App\Http\Livewire;

use App\Models\Contractor;
use App\Models\Dealer;
use App\Models\DealerManufacturer;
use App\Models\Division;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\PurchaseOrderStatus;
use App\Models\Schemes;
use App\Models\User;
use App\Models\WorkAllotment;
use Auth;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Log;

class DealerPoEntry extends Component
{

    use WithFileUploads;

    public $manufacturers;
    public $divisions;
    public $searchDivision;
    public $schemes;
    public $contractors;
    public $product_types;
    public $products = [];
    public $dealers;
    public $acceptDeclaration;

    public $selectedManufacturer;
    public $selectedDivision;
    public $selectedScheme;
    public $selectedContractor;

    public $product_items =[];
    public $grand_total_value = 0.00;


    // public $grand_total_value;


    // dealer
    public $name;
    public $phone_number;
    public $address;
    public $gst_no;

    public function updatedSelectedDivision($value) {
            if($value=='') {
                $this->schemes = null;
            }else {
                $this->schemes = Schemes::where("division", $value)->get();
            }
            $this->contractors = null;
    }

    public function updatedSelectedScheme($value) {
        if($value=='') {
            $this->contractors = null;
        } else {
            $work_allotment =  WorkAllotment::select('contractor_id')->where("scheme_id", $value)->first();
            $this->contractors  = Contractor::where('id',$work_allotment->contractor_id)->get();
           
        }
    }

    public function updated($propertyName, $value)
    {
        if (strpos($propertyName, 'product_items.') === 0) {
            
            $index = explode('.', $propertyName)[1];
            $field = explode('.', $propertyName)[2];

            if($field=='quantity'){

                $sanitizedValue = preg_replace('/[^0-9.]/', '', $value);
                if ($sanitizedValue === '') {
                    $this->product_items[$index]['quantity'] = null;
                    $this->product_items[$index]['totalprice'] = 0; 
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
                $this->product_items[$index]['quantity'] = $sanitizedValue;

                $this->calculateTotalPrice($index);

                $this->calculateGrandTotal();

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
                $this->calculateGrandTotal();
            }

            if($field=='selectedProductType'){
                $this->products[$index] = Product::where('product_type_id', $value)->get()->toArray();
                $this->products = array_values($this->products);
            }
        }

    }

    private function calculateTotalPrice($index) {

        if($this->product_items[$index]['quantity'] && $this->product_items[$index]['price'])
            $this->product_items[$index]['totalprice'] = $this->product_items[$index]['quantity'] * $this->product_items[$index]['price'];
    }
    
    private function calculateGrandTotal() {
        $this->grand_total_value = 0;
        foreach($this->product_items as $product_item) {
            $this->grand_total_value += $product_item['quantity'] * $product_item['price'];
        }
    }

    public function addRow()
    {
        $this->product_items[] = [ 'showSelect'=>false, 'selectedProductType' => '', 'selectedProduct' => '', 'is_dealer_exist'=>false, 'selectedDealer' => '', 'quantity' => 0 , 'batchno' => '', 'price' => 0, 'totalprice' => 0 ];
    }

    public function removeRow($index)
    {
        unset($this->product_items[$index]);
        unset($this->products[$index]);
        $this->products = array_values($this->products);
        $this->product_items = array_values($this->product_items);
    }

    public function toggleClick($index)
    {
        $this->product_items[$index]['showSelect'] = ! $this->product_items[$index]['showSelect'] ;
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


    public function submitForm() {

        Log::debug('log',[$this->product_items]);

        $validated = $this->validate([
            'selectedManufacturer' => 'required|integer',
            'selectedDivision' => 'required|integer',
            'selectedScheme' => 'required|integer|unique:purchase_orders,scheme_id',
            'selectedContractor' => 'required|integer',
            'acceptDeclaration' => 'required|boolean|accepted',
            'product_items.*.selectedProductType' => 'required|integer',
            'product_items.*.selectedProduct' => 'required|integer',
            'product_items.*.is_dealer_exist' => 'nullable|boolean',
            'product_items.*.selectedDealer' => 'integer|required_if:product_items.*.is_dealer_exist,true',
            'product_items.*.quantity' => 'required|integer|min:1',
            'product_items.*.price' => 'required|numeric|min:0|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
        ]);

        DB::beginTransaction();

        try {

        $timestamp = time();
        $currentDate = date('Ymd ', $timestamp);
        $lastRecord = PurchaseOrder::latest()->first();
        $serial =$lastRecord ? $lastRecord->id+1 : 1;
            
        $order_id = 'ORD/'.$currentDate.'/'.$this->selectedScheme.'/'.$serial;

        $dealers = User::find(Auth::user()->id)->dealer()->get();
        $dealer_id = $dealers[0]->id;
        
        $order_created =  PurchaseOrder::create( [
            'order_id' => $order_id,
            'division_id' => $this->selectedDivision,
            'scheme_id' => $this->selectedScheme,
            'contractor_id' => $this->selectedContractor,
            'workorder_no' => 'workorder_no',
            'order_grand_total' => 0.00,
            'status' => 2,
            'remarks' => '',
            'dealer_id' => $dealer_id,
            'manufacturer_id' => $this->selectedManufacturer,
            'pidms_user_id' => Auth::user()->id]
        );

        $grandtotal = 0.00;


        foreach($this->product_items as $index => $product_item){

            $total_price = $product_item['price'] * $product_item['quantity'];
            $grandtotal = $grandtotal + $total_price;

            if(!$product_item['is_dealer_exist']){
                $selected_dealer_id = NULL;
            }else {
                $selected_dealer_id = $product_item['selectedDealer'] ;
            }

            PurchaseOrderItem::create([
                'purchase_order_id' => $order_created->id,
                'producttype_id' => $product_item['selectedProductType'],
                'product_id' => $product_item['selectedProduct'],
                'is_dealer_exist' => $product_item['is_dealer_exist'] ? $product_item['is_dealer_exist'] : false,
                'dealer_id' => $selected_dealer_id,
                'batchno' =>  $product_item['batchno'],
                'quantity' =>  $product_item['quantity'],
                'price' =>  $product_item['price'],
                'totalprice' => $total_price
            ]);

        }

        $order_created->refresh();
        $order_created->order_grand_total  = $grandtotal;
        $order_created->save();

       
        PurchaseOrderStatus::insert([
                [
                    'purchase_id'=>$order_created->id,
                    'created_by'=> Auth::user()->id,
                    'status'=>1
                ],

                [
                    'purchase_id'=>$order_created->id,
                    'created_by'=> Auth::user()->id,
                    'status'=>2
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();
        redirect()->route('purchase.index');
    }

    public function showModal()
    {
        $this->emit('showModal');
    }

    public function closeModal()
    {
        $this->emit('closeModal');
    }

    public function render()
    {

        $user = User::find(Auth::user()->id);
        $manufacturer_ids =  DealerManufacturer::where('dealer_id', $user->dealer->id)->get()->pluck('manufacturer_id'); 
        $this->manufacturers = Manufacturer::whereIn('id', $manufacturer_ids)->get();

        $this->divisions = Division::where('division_name', 'like', '%' . $this->searchDivision . '%')->get();;
        $this->product_types =  ProductType::all();
    
        return view('livewire.dealer-po-entry');
    }
   
}
