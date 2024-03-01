

<div>

    <div class="pb-4"></div>
    <div class="pb-4"></div>
    <div class="pb-4"></div>

        <div class="container-fluid">
        <div class="form_wrap p-2">
        <form method="post" action="">
            @csrf
            
            <div class="row">
                    <div class="col-md-4">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Division</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="user_type">
                            <option value="">Select</option>
                                <option> Division 1</option>
                                <option> Division 2</option>
                        </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Scheme</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="user_type">
                            <option value="">Select</option>
                                <option> Scheme 1</option>
                                <option> Scheme 2</option>
                        </select>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="input_wrap mb-4">
                        <label class="form-label">Select Contractor</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="user_type">
                            <option value="">Select</option>
                                <option> Contractor 1</option>
                                <option> Contractor 2</option>
                        </select>
                        </div>
                    </div>
            </div>

            <div class="products_wrap p-4 mb-4">
            <div class="row">
                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                    <label class="form-label">Product Category</label><span style="color:red">&#42;</span>
                    <select class="form-select" name="user_type">
                        <option value="">Select</option>
                            <option> Category 1</option>
                            <option> Category 2</option>
                    </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="input_wrap mb-4">
                    <label class="form-label">Product Name</label><span style="color:red">&#42;</span>
                    <select class="form-select" name="user_type">
                        <option value="">Select</option>
                            <option> Name 1</option>
                            <option> Name 2</option>
                    </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="quantity" class="form-label">Quantity</label><span style="color:red">&#42;</span>
                        <input type="number" class="form-control" id="quanitty" name="quantity" aria-describedby="textHelp" value="">
                        @error('quantity')
                        <span style="color: red"></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="quanitity" class="form-label">Unit Price</label><span style="color:red">&#42;</span>
                        <input type="text" class="form-control" id="quantity" name="quantity" aria-describedby="textHelp" value="">
                        @error('quantity')
                        <span style="color: red"></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="quanitity" class="form-label">Total Price</label>
                        <input disabled type="text" class="form-control" id="quantity" name="quantity" aria-describedby="textHelp" value="">
                    </div>
                </div>
                
            </div>  
            
            <div class="row">
                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                    <label class="form-label">Product Category</label><span style="color:red">&#42;</span>
                    <select class="form-select" name="user_type">
                        <option value="">Select</option>
                            <option> Category 1</option>
                            <option> Category 2</option>
                    </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="input_wrap mb-4">
                    <label class="form-label">Product Name</label><span style="color:red">&#42;</span>
                    <select class="form-select" name="user_type">
                        <option value="">Select</option>
                            <option> Name 1</option>
                            <option> Name 2</option>
                    </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="quantity" class="form-label">Quantity</label><span style="color:red">&#42;</span>
                        <input type="number" class="form-control" id="quanitty" name="quantity" aria-describedby="textHelp" value="">
                        @error('quantity')
                        <span style="color: red"></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="quanitity" class="form-label">Unit Price</label><span style="color:red">&#42;</span>
                        <input type="text" class="form-control" id="quantity" name="quantity" aria-describedby="textHelp" value="">
                        @error('quantity')
                        <span style="color: red"></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="quanitity" class="form-label">Total Price</label>
                        <input disabled type="text" class="form-control" id="quantity" name="quantity" aria-describedby="textHelp" value="">
                    </div>
                </div>
                <div class="col-md-1">
                <button class="btn btn-danger btn-plus py-8 fs-4 mb-4 rounded-2 mt-4"> - </button>
                </div>
            </div>

            <div class="d-flex flex-row-reverse">
                <div class="add-more-wrap">
                    <button class="btn btn-warning w-20 py-8 fs-4 mb-4 rounded-2"> + Add more </button>
                </div>
            </div>


            </div>

            

            <div class="row">
                <div class="col-md-12">
                    Do you want to select dealer for this order
                </div>
                <div class="col-md-4">
                    <div class="input_wrap mb-4">
                    <label class="form-label">Select Dealer</label><span style="color:red">&#42;</span>
                    <select class="form-select" name="user_type">
                        <option value="">Select Dealer</option>
                            <option> Dealer 1</option>
                            <option> Dealer 2</option>
                    </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="input_wrap mb-4">
                        <label for="batch_no" class="form-label">Batch No.</label><span style="color:red">&#42;</span>
                        <input type="text" class="form-control" id="batch_no" name="batch_no" aria-describedby="textHelp" value="">
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
                            <input type="text" class="form-control" id="quantity" name="quantity" aria-describedby="textHelp" value="">
                            @error('quantity')
                            <span style="color: red"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input_wrap mb-4">
                            <label for="quanitity" class="form-label">Upload PO</label><span style="color:red">&#42;</span>
                            <input type="file" class="form-control" id="quantity" name="quantity" aria-describedby="textHelp" value="">
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
        </form>
        </div>
        </div>
</div>
