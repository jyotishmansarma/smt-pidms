<?php

namespace App\Http\Controllers;

use App\Models\PdiCertificate;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\PurchaseOrderStatus;
use DB;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('purchaseorder.index');
    }

    public function rejectedlist()
    {
        return view('purchaseorder.rejectedlist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchaseorder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'division_id' => 'required|integer',
            'scheme_id' => 'required|integer',
            'contractor_id' => 'required|integer',
        ]);

        // if(!$validated) {
        //     return redirect()->back()->withInput();
        // }

        DB::beginTransaction();

        try {

//        $timestamp = time();
//        $currentDate = date('Y-m-d ', $timestamp);
//        $lastRecord = PurchaseOrder::latest()->first();
//        $lastRecord ? $lastRecord->id+1 : 1;
            
        //$order_id = 'ORD'.$request->scheme_id.$currentDate.$lastRecord;
        
        $order_created =  PurchaseOrder::create( [
            'division_id' => $request->division_id,
            'scheme_id' => $request->scheme_id,
            'contractor_id' => $request->contractor_id,
            'workorder_no' => 'workorder_no',
            'order_grand_total' => 0.00,
            'status' => 2,
            'remarks' => '']
        );

        $grandtotal = 0.00;


        $validatedData = $request->validate([
            'product.*' => 'required|integer', 
            'product_type.*' => 'required|integer', 
            'dealer.*' => 'integer',
            'batchno.*' => 'required|string', 
            'quantity.*' => 'required|integer|min:1', 
            'price.*' => 'required|numeric|min:0',
        ]);

        // if(!$validatedData){
        //     return redirect()->back()->withInput();
        // }

        foreach($request->product as $index => $product_item){

            $total_price = $request->price[$index] * $request->quantity[$index];
            $grandtotal = $grandtotal + $total_price;

            PurchaseOrderItem::create([
                'purchase_order_id' => $order_created->id,
                'producttype_id' => $request->product_type[$index],
                'product_id' => $product_item,
                'dealer_id' => $request->dealer[$index],
                'batchno' => $request->batchno[$index],
                'quantity' => $request->quantity[$index],
                'price' => $request->price[$index],
                'totalprice' => $total_price
            ]);


        }

        $order_created->refresh();
        $order_created->order_grand_total  = $grandtotal;
        $order_created->save();

        if ($request->hasFile('certificate_file')) {
            foreach ($request->file('certificate_file') as $index => $certificate) {
                $file_path = $certificate->store('/uploads/certificates', 'public');
                PdiCertificate::create([
                    'purchase_order_id' => $order_created->id,
                    'pdi_agency_id' =>  $request->selectedAgency[$index],
                    'certificate_no' => $request->certificate_no[$index],
                    'certificate_date' => $request->certificate_date[$index],
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
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        return view('purchaseorder.show', compact('purchaseOrder') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        return view('purchaseorder.edit', compact('purchaseOrder') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
