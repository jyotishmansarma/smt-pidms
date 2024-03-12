

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
                        <select class="form-select" name="division" wire:model='selectedDivision'>
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
                        <select class="form-select" name="scheme" wire:model='selectedScheme'>
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
                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Product Type</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="product_type"  wire:model="product_items.{{ $index }}.seleactedProductType">
                            @if($product_types)
                                @foreach ($product_types as $product_type)
                                    <option> {{ $product_type->name }}</option>
                                @endforeach
                            @else
                            <option> Select Type </option>
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
                                <option> {{ $product->prod_name }}</option>
                            @endforeach
                            @else
                            <option> Select Product Dimensions </option>
                            @endif
                        </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Dealer</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="user_type" wire:model="product_items.{{ $index }}.selectedDealer">
                            <option value="">Select</option>
                                <option> Name 1</option>
                                <option> Name 2</option>
                        </select>
                        </div>
                    </div>


                    <div class="col-md-1">
                        <div class="input_wrap mb-4">
                            <label for="quantity" class="form-label">Quantity</label><span style="color:red">&#42;</span>
                            <input wire:model="product_items.{{ $index }}.quantity" type="number" class="form-control" id="quanitty" name="quantity"  value="">
                            @error('quantity')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                            <label for="batch" class="form-label">Batch No</label><span style="color:red">&#42;</span>
                            <input wire:model="product_items.{{ $index }}.batchno" type="number" class="form-control" id="batch" name="batchno"  value="">
                            @error('quantity')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                            <label for="price" class="form-label">Price per unit</label><span style="color:red">&#42;</span>
                            <input wire:model="product_items.{{ $index }}.price" type="text" class="form-control" id="price" name="price"  >
                            @error('price')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="input_wrap mb-4">
                            <label for="totalprice" class="form-label">Total Price</label>
                            <input wire:model="product_items.{{ $index }}.totalprice"  disabled type="text" class="form-control" id="totalprice" name="quantity"  value="">
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
                    <button class="btn btn-warning w-20 py-8 fs-4 mb-4 rounded-2" wire:click="addRow"> + Add more </button>
                </div>
            </div>


            </div>

            <div class="row">
                <div class="col-md-12">
                    Do you want to select dealer for this order ?
                    <label> YES </label> <input wire:model="showSelect" type="checkbox" value=""/> 
                </div>
                <div class="col-md-4">
                    @if($showSelect)
                    <div class="input_wrap mb-4">
                    <label class="form-label">Select Dealer</label><span style="color:red">&#42;</span>
                    <select class="form-select" name="user_type">
                        <option value="">Select Dealer</option>
                            <option> Dealer 1 </option>
                            <option> Dealer 2 </option>
                    </select>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="batch_no" class="form-label">Batch No.</label><span style="color:red">&#42;</span>
                        <input type="text" class="form-control" id="batch_no" name="batch_no"  value="">
                        @error('batch_no')
                        <span style="color: red"></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="add_btn_wrap mt-4">
                        <button class="btn btn-warning btn-plus py-8 fs-4 rounded-2"> + </button>
                    </div>
                </div>
            </div>

            <div class="PO_wrap p-4 mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input_wrap mb-4">
                            <label for="quanitity" class="form-label">PO Number</label><span style="color:red">&#42;</span>
                            <input type="text" class="form-control" id="quantity" name="quantity"  value="">
                            @error('quantity')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input_wrap mb-4">
                            <label for="quanitity" class="form-label">Upload PO</label><span style="color:red">&#42;</span>
                            <input type="file" class="form-control" id="quantity" name="quantity"  value="">
                            @error('quantity')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="float-right">
                        <button class="btn btn-warning w-20 py-8 fs-4 mb-4 rounded-2"> + Add more </button>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Save Draft</button>
                    </div>
                <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Upload Order</button>
                </div>
            </div>
        {{-- </form> --}}
        </div>
        </div>
</div>
