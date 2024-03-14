<?php

namespace App\Http\Controllers;

use App\Models\PdiCertificate;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
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

        DB::beginTransaction();

        try {

        $order_created =  PurchaseOrder::create( [
            'division_id' => $request->division_id,
            'scheme_id' => $request->scheme_id,
            'contractor_id' => $request->contractor_id,
            'wordorder_no' => '',
            'status' => '1',
            'remarks' => '']
        );

        foreach($request->product as $index => $product_item){

            PurchaseOrderItem::create([
                'purchase_order_id' => $order_created->id,
                'producttype_id' => $request->product_type[$index],
                'product_id' => $product_item,
                'dealer_id' => $request->dealer[$index],
                'batchno' => $request->batchno[$index],
                'quantity' => $request->quantity[$index],
                'price' => $request->price[$index],
                'totalprice' => $request->totalprice[$index]
            ]);
        }

        foreach($request->selectedAgency as $index => $agency) {
            PdiCertificate::create([
                'purchase_order_id' => $order_created->id,
                'pdi_agency_id' =>  $agency,
                'certificate_no' => $request->certicate_no[$index],
                'certificate_date' => $request->certifcate_date[$index],
                'certificate_file' => 'file'
            ]
            );
        }

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
        //
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
