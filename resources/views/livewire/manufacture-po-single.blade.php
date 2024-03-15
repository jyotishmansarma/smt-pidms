<div>
   
    <div class="pb-4"></div>
    <div class="pb-4"></div>
    <div class="pb-4"></div>

    <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="purchase-info info-box mb-4">

                    <h4>Order Information</h4>

                    <div class="row">

                        <div class="col-md-3">
                            <label class="form-label">Division :</label>
                            {{
                                $purchaseorder->division->division_name;
                            }}  
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Scheme ID : </label>
                            {{
                                $purchaseorder->scheme->scheme_id;
                            }}
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Scheme name : </label>
                            {{
                                $purchaseorder->scheme->scheme_name;
                            }}
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Submitted on </label>
                            {{
                                $purchaseorder->created_at;
                            }}
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            <label class="form-label">Contractor Name : </label>
                            {{
                                $purchaseorder->contractor->name;
                            }}
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Contractor Bid No :</label>
                            {{
                                $purchaseorder->contractor->bid_no;
                            }}
                        </div> 

                        <div class="col-md-3">
                            <label class="form-label">Work Order No :</label>
                            
                        </div> 

                        <div class="col-md-3">
                            <label class="form-label">Verification status: </label>
                            {{
                                $purchaseorder->is_verified ? 'Verified' : 'Not verified'
                            }}
                        </div> 
                    </div>
                    </div>

                    <div class="product_wrapper info-box mb-4">

                        <h4>Products </h4>

                    <table class="table table-bordered table-responsive">
                        <thead>
                        <th>
                            SL
                        </th>
                        <th>
                            Product Type
                        </th>
                        <th>
                            Product Dimensions
                        </th>
                        <th>
                            Dealer name
                        </th>
                        <th>
                            Batch No.
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Price per unit
                        </th>

                        <th>
                            Total price
                        </th>
                        <thead>
                    <tbody>
                    @foreach ($purchaseorder->purchase_item as $index=> $item)

                    <tr>
                    <td>{{ $index+1 }} </td>
                    <td>{{ $item->product_type->name }} </td>
                    <td>{{ $item->product->prod_name }} </td> 
                    <td>{{ $item->dealer->d_name ?? '' }} </td>
                    <td>{{ $item->batchno }} </td>
                    <td>{{ $item->quantity }} </td>
                    <td>{{ $item->price }} </td>
                    <td>{{ $item->totalprice }} </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                    </div>

                    <div class="certificate_wrapper info-box">

                        <h4>Certificate </h4>

                        <table class="table table-bordered table-responsive">
                            <thead>
                            <th>
                                SL
                            </th>
                            <th>
                                PDI Agency
                            </th>
                            <th>
                                Certificate No.
                            </th>
                            <th>
                                Certificate Date
                            </th>
                            <th>
                                View Certificate
                            </th>
                            <thead>
                        <tbody>
                        @foreach ($purchaseorder->pdi_certificate as $index=> $item)
    
                        <tr>
                        <td>{{ $index+1 }} </td>
                        <td>{{ $item->pdiagency->name }} </td>
                        <td>{{ $item->certificate_no }} </td> 
                        <td>{{ $item->certificate_date ?? '' }} </td>
                        <td>
                            <a target="_blank" class="btn btn-warning w-20 py-2 fs-4 rounded-2"  href="{{ asset('storage/'.$item->certificate_file) }}" > View </a>  
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>


                    </div>
                </div>
            </div>
    </div>
</div>   
