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

                    <div class="row">

                        <div class="col-md-3">
                            <label class="form-label">Division :</label>
                            {{
                                $purchaseorder->division->division_name;
                            }}  
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Scheme ID : </label>
                            {{
                                $purchaseorder->scheme->scheme_id;
                            }}
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Scheme name : </label>
                            {{
                                $purchaseorder->scheme->scheme_name;
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

                        <div class="col-md-3">
                            <label class="form-label">Contractor Bid No :</label>
                            {{
                                $purchaseorder->contractor->bid_no;
                            }}
                        </div> 

                        <div class="col-md-3">
                            <label class="form-label">Work Order No :</label>
                            
                        </div> 

                        <div class="col-md-3">
                            <label class="form-label">Status :</label>
                            {{
                                $purchaseorder->status;
                            }}
                        </div> 
                    </div>

                    

                   

                    

                    
        
                    

                   

                   

                   

                <br/>

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
            </div>
    </div>
</div>   
