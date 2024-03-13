

<div>

    <div class="pb-4"></div>
    <div class="pb-4"></div>
    <div class="pb-4"></div>

        <div class="container-fluid">
        <div class="form_wrap p-2">
        {{-- <form method="post" action="">
            @csrf
             --}}
            <div class="row">
                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Division</label><span style="color:red">&#42;</span>
                        <select id="select2-selection" class="form-select" name="division" wire:model='selectedDivision'>
                            @if($divisions)
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}"> {{ $division->division_name }}</option>
                                @endforeach
                            @else 
                                <option value="">Select Division </option>
                            @endif
                        </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Scheme</label><span style="color:red">&#42;</span>
                        <select class="form-select " name="scheme" wire:model='selectedScheme'>
                            @if($schemes)
                            @foreach ($schemes as $scheme)
                                <option value="{{ $scheme->scheme_id }} ">{{ $scheme->scheme_name }} Scheme ID : {{ $scheme->scheme_id }}</option>
                            @endforeach
                            @else
                                <option value=""> Select scheme</option>
                            @endif
                        </select>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Contractor</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="user_type">
                            @if($contractors)
                            @foreach ($contractors as $contractor)
                                <option value="{{ $contractor->id }} ">{{ $contractor->name }} || Bid No : {{ $contractor->bid_no }}</option>
                            @endforeach
                            @else
                                <option value=""> Select Contractor</option>
                            @endif
                        </select>
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
                        <label> YES </label> <input wire:click="toggleClick( {{ $index }})" type="checkbox" value="" /> 
                    </div>

                    <div class="col-md-1">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Product Type</label><span style="color:red">&#42;</span>
                        <select class="form-select " name="product_type"  wire:model="product_items.{{ $index }}.seleactedProductType">
                            @if($product_types)
                                @foreach ($product_types as $product_type)
                                    <option value={{ $product_type->id }} > {{ $product_type->name }}</option>
                                @endforeach
                            @else
                            <option value="0"> Select Type </option>
                            @endif
                        </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Product Dimensions</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="user_type" wire:model="product_items.{{ $index }}.selectedProduct">
                            @if($products)
                            @foreach ($products as $product)
                                <option value="{{ $product->prod_id }}"> {{ $product->prod_name }}</option>
                            @endforeach
                            @else
                            <option value="0"> Select Product Dimensions </option>
                            @endif
                        </select>
                        </div>
                    </div>

                    @if($row['showSelect']) 
                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Dealer</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="selectedDealer" wire:model="product_items.{{ $index }}.selectedDealer">
                            
                            @if($dealers)
                                @foreach ($dealers as $dealer)
                                    <option value="{{ $dealer->id }}"> {{ $dealer->d_name }}</option>
                                @endforeach
                                @else
                                <option value="0"> Select dealer </option>
                            @endif

                        </select>
                        </div>
                    </div>
                    @endif

                    <div class="col-md-1">
                        <div class="input_wrap mb-4">
                            <label for="batch" class="form-label">Batch No.</label><span style="color:red">&#42;</span>
                            <input wire:model="product_items.{{ $index }}.batchno" type="text" class="form-control" name="batchno"  value="">
                            @error('batchno')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-1">
                        <div class="input_wrap mb-4">
                            <label for="quantity" class="form-label">Quantity</label><span style="color:red">&#42;</span>
                            <input wire:model="product_items.{{ $index }}.quantity" min="0" step="1" class="form-control" name="quantity"  value="">
                            @error('quantity')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-1">
                        <div class="input_wrap mb-4">
                            <label for="price" class="form-label">Price per unit</label><span style="color:red">&#42;</span>
                            <input wire:model="product_items.{{ $index }}.price" type="number" step="0.01" min="0" class="form-control" name="price">
                            @error('price')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                            <label for="totalprice" class="form-label">Total Price</label>
                            <input wire:model="product_items.{{ $index }}.totalprice"  disabled type="number"  step="0.01" min="0" class="form-control" name="totalprice"  value="">
                        </div>
                    </div>

                    <div class="col-md-1">
                    <button class="btn btn-danger w-20 py-8 fs-4 mt-4 rounded-2" wire:click="removeRow({{ $index }})"> <i class="fas fa-trash"></i></button>
                    </div>
                </div> 
                </div> 
            @endforeach


            <div class="d-flex ">
                <div class="add-more-wrap">
                    <button class="btn btn-success w-20 py-2 fs-4 rounded-2" wire:click="addRow"> + Add more </button>
                </div>
            </div>


            </div>


            <div class="PO_wrap p-4 mb-4">
                @foreach($certificates as $index => $row)
                <div class="row">
                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                            <label for="agency" class="form-label">PDI Agency Name</label><span style="color:red">&#42;</span>
                            
                            <select class="form-select" wire:model="certificates.{{ $index }}.selectedAgency">
                            
                                <option value="0"> Select dealer </option>
                                <option value="">AGENCY 1</option>
                            </select>

                            @error('quantity')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                            <label for="quanitity" class="form-label">Certificate No.</label><span style="color:red">&#42;</span>
                            <input type="text" class="form-control" name="certicate_no"  wire:model="certificates.{{ $index }}.certicate_no" value="">
                            @error('quantity')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                            <label for="quanitity" class="form-label">Date</label><span style="color:red">&#42;</span>
                            <input type="date" class="form-control"  name="certifcate_date"  wire:model="certificates.{{ $index }}.certifcate_date" value="">
                            @error('quantity')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                            <label for="quanitity" class="form-label">Upload Certificate</label><span style="color:red">&#42;</span>
                            <input type="file" class="form-control" name="Certificate_file"  wire:model="certificates.{{ $index }}.Certificate_file" value="">
                            @error('quantity')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-1">
                        <button class="btn btn-danger w-20 py-2 fs-4 mt-4 rounded-2" wire:click="removeCertificate({{ $index }})"> <i class="fas fa-trash"></i></button>
                    </div>
                </div>
                @endforeach

                <div class="float-right">
                    <button class="btn btn-success w-20 py-2 fs-4 rounded-2" wire:click='addCertificate'> + Add more </button>
                </div>

            </div>
    
            <div class="row">
                <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100 py-2 fs-4 mb-4 rounded-2">Submit</button>
                </div>
            </div>
        {{-- </form> --}}
        </div>
        </div>
</div>
