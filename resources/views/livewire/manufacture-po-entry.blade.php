

<div>

    <div class="pb-4"></div>
    <div class="pb-4"></div>
    <div class="pb-4"></div>

        <div class="container-fluid">
        <div class="form_wrap p-2">
        
        <form method="post" wire:submit.prevent="submitForm" action="{{ route('purchase.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Division</label><span style="color:red">&#42;</span>
                        <select id="select2-selection" class="form-select" name="division_id" wire:model='selectedDivision' @error('division_id') is-invalid @enderror> 
                            <option value="">Select Division </option>
                            @if($divisions)
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}"> {{ $division->division_name }}</option>
                                @endforeach
                            @endif
                        </select>
                        
                        @error('selectedDivision')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Scheme</label><span style="color:red">&#42;</span>
                        <select class="form-select " name="scheme_id" wire:model='selectedScheme' @error('scheme_id') is-invalid @enderror>
                            <option value=""> Select scheme</option>
                            @if($schemes)
                            @foreach ($schemes as $scheme)
                                <option value="{{ $scheme->scheme_id }} ">{{ $scheme->scheme_name }} Scheme ID : {{ $scheme->scheme_id }}</option>
                            @endforeach
                            @endif
                        </select>

                        @error('selectedScheme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Contractor</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="contractor_id" wire:model='selectedContractor' @error('contractor_id') is-invalid @enderror>
                            <option value=""> Select Contractor</option>
                            @if($contractors)
                            @foreach ($contractors as $contractor)
                                <option value="{{ $contractor->id }} ">{{ $contractor->name }} || Bid No : {{ $contractor->bid_no }}</option>
                            @endforeach
                            @endif
                        </select>

                        @error('selectedContractor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Work Order No.</label><span style="color:red">&#42;</span>
                            
                        </div>
                    </div>
            </div>

            <div class="products_wrap p-4 mb-4">

            @foreach($product_items as $index => $row)
                <div class="product-row" wire:key="row-{{ $index }}">
                    
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label">Are the suppliers routed through dealer?</label>
                        <label> YES </label> <input type="checkbox"  name="is_through_dealer[]" wire:click="toggleClick( {{ $index }})" wire:model="product_items.{{ $index }}.is_dealer_exist" value="" /> 
                    </div>

                    <div class="col-md-1">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Product Type</label><span style="color:red">&#42;</span>
                        <select class="form-select " name="product_type[]"  @error('product_type') is-invalid @enderror wire:model="product_items.{{ $index }}.selectedProductType">
                            <option value=""> Select Product Type </option>
                            @if($product_types)
                                @foreach ($product_types as $product_type)
                                    <option value={{ $product_type->id }} > {{ $product_type->name }}</option>
                                @endforeach
                            @endif
                        </select>

                        @error('product_items.'.$index.'.selectedProductType')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Product Dimensions</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="product[]" @error('product') is-invalid @enderror  wire:model="product_items.{{ $index }}.selectedProduct">
                            
                            <option value=""> Select Product Dimensions </option>
                            @if($products)
                            @foreach ($products as $product)
                                <option value="{{ $product->prod_id }}"> {{ $product->prod_name }}</option>
                            @endforeach
                            @endif
                        </select>

                        @error('product_items.'.$index.'.selectedProduct')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        </div>
                    </div>

                    @if($row['showSelect']) 
                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Dealer</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="dealer[]" wire:model="product_items.{{ $index }}.selectedDealer">
                            
                                <option value=""> Select dealer </option>
                                @if($dealers)
                                @foreach ($dealers as $dealer)
                                    <option value="{{ $dealer->id }}"> {{ $dealer->d_name }}</option>
                                @endforeach
                            @endif

                        </select>

                        @error('product_items.'.$index.'.selectedDealer')
                            
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                            @enderror

                        </div>
                    </div>
                    @endif

                    <div class="col-md-1">
                        <div class="input_wrap mb-4">
                            <label for="batch" class="form-label">Batch No.</label><span style="color:red">&#42;</span>
                            <input name="batchno[]" wire:model="product_items.{{ $index }}.batchno" type="text" class="form-control" value="">
                            
                            @error('product_items.'.$index.'.batchno')
                            
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                            @enderror
                        </div>
                    </div>


                    <div class="col-md-1">
                        <div class="input_wrap mb-4">
                            <label for="quantity" class="form-label">Quantity</label><span style="color:red">&#42;</span>
                            <input type="number" name='quantity[]' @error('quantity') is-invalid @enderror  wire:model="product_items.{{ $index }}.quantity" min="0" step="1" class="form-control"  value="">
                            
                            @error('product_items.'.$index.'.quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-1">
                        <div class="input_wrap mb-4">
                            <label for="price" class="form-label">Price per unit</label><span style="color:red">&#42;</span>
                            <input name='price[]' @error('price') is-invalid @enderror wire:model="product_items.{{ $index }}.price" type="number" step="0.01" min="0" class="form-control" >
                            
                            @error('product_items.'.$index.'.price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                            <label for="totalprice" class="form-label">Total Price</label>
                            <input disabled ="totalprice[]" wire:model="product_items.{{ $index }}.totalprice" type="number"  step="0.01" min="0" class="form-control" value="">
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


            <div class="d-flex ">
                <div class="add-more-wrap">
                    <a class="btn btn-success w-20 py-2 fs-4 rounded-2" wire:click="addRow"> + Add more </a>
                </div>
            </div>


            </div>


            <div class="PO_wrap p-4 mb-4">
                @foreach($certificates as $index => $row)
                <div class="row">
                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                            <label for="agency" class="form-label">PDI Agency Name</label><span style="color:red">&#42;</span>
                            
                            <select name="selectedAgency[]" @error('selectedAgency') is-invalid @enderror  class="form-select" wire:model="certificates.{{ $index }}.selectedAgency">
                                
                                <option value=""> Select PDI Agency </option>
                                    @if($pdiagencies)
                                    @foreach ($pdiagencies as $pdiagency)
                                        <option value="{{ $pdiagency->id }}"> {{ $pdiagency->name }}</option>
                                    @endforeach                    
                                @endif
                           
                            </select>

                            @error('certificates.'.$index.'.selectedAgency')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                            <label for="certificate_no" class="form-label">Certificate No.</label><span style="color:red">&#42;</span>
                            <input type="text" class="form-control" @error('certificate_no') is-invalid @enderror  name="certificate_no[]"  wire:model="certificates.{{ $index }}.certificate_no" value="">
    

                            @error('certificates.'.$index.'.certificate_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                            <label for="certifcate_date" class="form-label">Date</label><span style="color:red">&#42;</span>
                            <input type="date" class="form-control"  @error('certificate_date') is-invalid @enderror name="certificate_date[]"  wire:model="certificates.{{ $index }}.certificate_date" value="">
                            
                            @error('certificates.'.$index.'.certificate_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                            <label for="certificate_file" class="form-label">Upload Certificate</label><span style="color:red">&#42;</span>
                            <input type="file" class="form-control" name="certificate_file[]"  @error('certificate_file') is-invalid @enderror  wire:model="certificates.{{ $index }}.certificate_file" value="">
                           

                            @error('certificates.'.$index.'.certificate_file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @if($index!=0)
                    <div class="col-md-1">
                        <a class="btn btn-danger w-20 py-2 fs-4 mt-4 rounded-2" wire:click="removeCertificate({{ $index }})"> <i class="fas fa-trash"></i></a>
                    </div>
                    @endif
                </div>
                @endforeach

                <div class="float-right">
                    <a class="btn btn-success w-20 py-2 fs-4 rounded-2" wire:click='addCertificate'> + Add more </a>
                </div>

            </div>
    
            <div class="row">
                <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100 py-2 fs-4 mb-4 rounded-2">Submit</button>
                </div>
            </div>
        </form>
        </div>
        </div>
</div>
