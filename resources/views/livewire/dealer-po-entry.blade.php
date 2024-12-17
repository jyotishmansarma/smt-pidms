

<div>
    <div class="container-fluid">


        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
               
            </div>
        </div>
    <div class="card">
    <div class="card-body padding-2px">

    <div class="form_wrap p-2">
    
    <form method="post" wire:submit.prevent="submitForm" action="{{ route('purchase.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="scheme-info-wrap mx-2">
        <div class="row">
                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                    <label class="form-label">Select Division</label><span style="color:red">&#42;</span>
                    <select id="select2-selection" class="form-select" name="division_id" wire:model='selectedDivision' @error('division_id') is-invalid @enderror> 
                        <option value="">Select Division </option>
                        @if($divisions)
                            @foreach ($divisions as $division)
                            <option value="{{ $division->id }}" wire:key={{ "division".$division->id }}> {{ $division->division_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    
                    @error('selectedDivision')
                        <span class="invalid-feedback" role="alert">
                            <strong> Division required </strong>
                        </span>
                    @enderror

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input_wrap mb-4">
                    <label class="form-label">Scheme Details</label><span style="color:red">&#42;</span>
                    <select class="form-select " name="scheme_id" wire:model='selectedScheme' @error('scheme_id') is-invalid @enderror>
                        <option value=""> Select scheme</option>
                        @if($schemes)
                        @foreach ($schemes as $scheme)
                            <option value="{{ $scheme->scheme_id }}" wire:key={{ "scheme".$scheme->scheme_id }} >{{ $scheme->scheme_name }} Scheme ID : {{ $scheme->scheme_id }}</option>
                        @endforeach
                        @endif
                    </select>

                    @error('selectedScheme')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror

                    </div>
                </div>


                <div class="col-md-3">
                    <div class="input_wrap mb-4">
                    <label class="form-label">Contractor Details</label><span style="color:red">&#42;</span>
                    <select class="form-select" name="contractor_id" wire:model='selectedContractor' @error('contractor_id') is-invalid @enderror>
                        <option value=""> Select Contractor</option>
                        @if($contractors)
                        @foreach ($contractors as $contractor)
                            <option value="{{ $contractor->id }}" wire:key="{{ "contractor".$contractor->id }}">{{ $contractor->name }} || Bid No : {{ $contractor->bid_no }}</option>
                        @endforeach
                        @endif
                    </select>

                    @error('selectedContractor')
                    <span class="invalid-feedback" role="alert">
                        <strong> Contractor details required </strong>
                    </span>
                    @enderror

                    </div>
                </div>

               
        </div>
        </div>

        <div class="products_wrap p-4 mb-4">

        @foreach($product_items as $index => $row)
            <div class="product-row" wire:key="row-{{ $index }}">
                
            <div class="row">
                
                <div class="col-md-1">
                    <div class="input_wrap mb-4">
                    <label class="form-label">Product Type</label><span style="color:red">&#42;</span>
                    <select class="form-select" wire:model="product_items.{{ $index }}.selectedProductType">
                        <option value=""> Select Product Type </option>
                        @if($product_types)
                            @foreach ($product_types as $product_type)
                                <option value="{{ $product_type->id }}"  wire:key="{{ "product_type".$index.$product_type->id }}"> {{ $product_type->name }}</option>
                            @endforeach
                        @endif
                    </select>

                    @error('product_items.'.$index.'.selectedProductType')
                    <span class="invalid-feedback" role="alert">
                        <strong> Product type required  </strong>
                    </span>
                    @enderror

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="input_wrap mb-4">
                    <label class="form-label">Product Dimensions</label><span style="color:red">&#42;</span>
                    <select class="form-select"  wire:model="product_items.{{ $index }}.selectedProduct">
                        
                        <option value=""> Select Product Dimensions </option>
                        @if(isset($products[$index]) && !is_null($products[$index]) && is_array($products[$index]))
                        @foreach ($products[$index] as $product_item)
                            <option value="{{ $product_item['id'] }}" wire:key="{{ "product".$index.$product_item['id'] }}"> {{ $product_item['name'] }}</option>
                        @endforeach
                        @endif
                    </select>

                    @error('product_items.'.$index.'.selectedProduct')
                    <span class="invalid-feedback" role="alert">
                        <strong> Product dimensions required </strong>
                    </span>
                    @enderror

                    </div>
                </div>
        

                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="quantity" class="form-label">Quantity (In R.M.)</label><span style="color:red">&#42;</span>
                        <input type="text" name='quantity[]' @error('quantity') is-invalid @enderror  wire:model="product_items.{{ $index }}.quantity" min="0" step="1" class="form-control"  value="">
                        
                        @error('product_items.'.$index.'.quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong> Quantity required </strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="price" class="form-label">Unit price per R.M. (In INR)</label><span style="color:red">&#42;</span>
                        <input type="text" name='price[]' @error('price') is-invalid @enderror wire:model="product_items.{{ $index }}.price" step="0.01" min="0" class="form-control" oninput="validateInput(this)">
                        
                        @error('product_items.'.$index.'.price')
                            <span class="invalid-feedback" role="alert">
                                <strong> Price required </strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="totalprice" class="form-label">Total Price (In INR)</label>
                        <input disabled ="totalprice[]" wire:model="product_items.{{ $index }}.totalprice" type="text" class="form-control" value="">
                    </div>
                </div>

                @if($index!=0)
                <div class="col-md-1">
                    <a class="btn btn-danger w-20 py-8 fs-4 mt-4 rounded-2" wire:click="removeRow({{ $index }})"> <i class="fas fa-trash"></i></a>
                </div>
                @endif
            </div> 
            </div> 
        @endforeach


        <div class="d-flex justify-content-between">
            <div class="add-more-wrap">
                <a class="btn btn-success w-20 py-2 fs-4 rounded-2" wire:click="addRow"> + Add more </a>
            </div>
            <div class="total">
               <h4> Grand Total : {{ $grand_total_value }} </h4> 
            </div> 
        </div>


        </div>


        <div class="declaration-wrap mx-2">

        <div class="row">
            <div class="col-md-12">
                <div class="declaration my-2 px-2">
                <input type="checkbox" wire:model="acceptDeclaration" value="" /> 
                <label class="form-label">&nbsp;&nbsp;I confirm the accuracy of the information provided to the best of my knowledge. Any discrepancies found will be my responsibility.</label>
                
                @error('acceptDeclaration')
                        <span class="invalid-feedback" role="alert">
                            <strong> Please confirm to proceed </strong>
                        </span>
                @enderror
            
            </div>
            </div>
            <div class="col-md-3">
            <button type="submit" class="btn btn-primary w-100 py-2 fs-4 mb-4 rounded-2">Submit</button>
            </div>
        </div>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>

    <!-- 
        Dealer Entry Modal
    -->

    <div class="modal fade" id="dealerModal" tabindex="-1" role="dialog" aria-labelledby="dealerModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="dealerModalLabel">Add Dealer Information</h5>
              <a class="btn btn-danger" wire:click="closeModal" >
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="saveDealer">
                <div class="form-group mb2">
                  <label class="form-label" for="name">Name <span style="color:red">&#42;</span></label>
                  <input type="text" class="form-control" wire:model="name" id="name" placeholder="Enter Dealer name">
                  @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                  @enderror
                </div>
                <div class="form-group mb-2">
                  <label class="form-label" for="phone">Phone Number <span style="color:red">&#42;</span></label>
                  <input type="text" class="form-control" wire:model="phone_number" id="phone_number" placeholder="Enter phone number">
                  @error('phone_number')
                  <span class="invalid-feedback" role="alert">
                      <strong> {{ $message }} </strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group mb-2">
                  <label class="form-label" for="address">Dealer Address <span style="color:red">&#42;</span></label>
                  <input type="text" class="form-control" wire:model="address" id="address" placeholder="Enter address">
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong> {{ $message }} </strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group mb-2">
                  <label class="form-label" for="gst_no">GST Number <span style="color:red">&#42;</span></label>
                  <input type="text" class="form-control" wire:model="gst_no" id="gst_no" placeholder="Enter GST number">
                  @error('gst_no')
                  <span class="invalid-feedback" role="alert">
                      <strong> {{ $message }} </strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-4 py-2 fs-4 mb-4 rounded-2">Save Dealer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

</div>

