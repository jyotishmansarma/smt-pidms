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
use App\Models\PurchaseOrderStatus;
use App\Models\Schemes;
use App\Models\User;
use App\Models\WorkAllotment;
use Auth;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;


class ManufacturePoEntry extends Component
{
    use WithFileUploads;

    public $divisions;
    public $searchDivision;
    public $schemes;
    public $contractors;
    public $product_types;
    public $products = [];
    public $dealers;
    public $pdiagencies;
    public $acceptDeclaration;

    public $selectedDivision;
    public $selectedScheme;
    public $selectedContractor;

    public $product_items =[];
    public $certificates = [];

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
                $this->products[$index] = Product::where('product_type_id', $value)->get()->toArray();
                $this->products = array_values($this->products);
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
        unset($this->products[$index]);
        $this->products = array_values($this->products);
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


    public function submitForm() {

        //Log::debug('log',[$this->product_items]);

        $validated = $this->validate([
            'selectedDivision' => 'required|integer',
            'selectedScheme' => 'required|integer|unique:purchase_orders,scheme_id',
            'selectedContractor' => 'required|integer',
            'acceptDeclaration' => 'required|boolean|accepted',
            'product_items.*.selectedProductType' => 'required|integer',
            'product_items.*.selectedProduct' => 'required|integer',
            'product_items.*.is_dealer_exist' => 'nullable|boolean',
            'product_items.*.selectedDealer' => 'integer|required_if:product_items.*.is_dealer_exist,true',
            'product_items.*.batchno' => 'required|string',
            'product_items.*.quantity' => 'required|integer|min:1',
            'product_items.*.price' => 'required|numeric|min:0|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'certificates.*.selectedAgency' => 'required|integer',
            'certificates.*.certificate_no' => 'required|string',
            'certificates.*.certificate_date' => 'required|date',
            'certificates.*.certificate_file' => 'required|file|mimes:pdf'
        ]);

        DB::beginTransaction();

        try {

        $timestamp = time();
        $currentDate = date('Ymd ', $timestamp);
        $lastRecord = PurchaseOrder::latest()->first();
        $serial =$lastRecord ? $lastRecord->id+1 : 1;
            
        $order_id = 'ORD/'.$currentDate.'/'.$this->selectedScheme.'/'.$serial;
        
        $order_created =  PurchaseOrder::create( [
            'order_id' => $order_id,
            'division_id' => $this->selectedDivision,
            'scheme_id' => $this->selectedScheme,
            'contractor_id' => $this->selectedContractor,
            'workorder_no' => 'workorder_no',
            'order_grand_total' => 0.00,
            'status' => 2,
            'remarks' => '',
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

        foreach ($this->certificates as $index => $certificate) {
            if (isset($certificate['certificate_file'])) {
                $file_path = $certificate['certificate_file']->store('/uploads/certificates', 'public');
                PdiCertificate::create([
                        'purchase_order_id' => $order_created->id,
                        'pdi_agency_id' =>  $certificate['selectedAgency'],
                        'certificate_no' => $certificate['certificate_no'],
                        'certificate_date' => $certificate['certificate_date'],
                        'certificate_file' => $file_path
                ]);
            }
        }
            PurchaseOrderStatus::insert([
                [
                    'purchase_id'=>$order_created->id,
                    'created_by'=> Auth::user()->id,
                    'status'=>1
                ],

                ['purchase_id'=>$order_created->id,
                    'created_by'=> Auth::user()->id,
                    'status'=>2]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();
        redirect()->route('purchase.index');
    }


    public function render()
    {
        $this->divisions = Division::where('division_name', 'like', '%' . $this->searchDivision . '%')->get();;
        $this->product_types =  ProductType::all();
        $this->dealers = Dealer::all();
        $this->pdiagencies = PdiAgency::all();
        $this->pdiagencies=User::with(['role_user' => function ($query) {
            $query->where('role_id',2);
        }])->get();


        return view('livewire.manufacture-po-entry');
    }
}
