<div>
    <div>
        <form method="post" action="">
            @csrf
            <div class="mb-4">
                <div class="row">
                    <div class="col-sm">
                        <label class="form-label">User type</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="user_type">
                            <option value="">Select Type</option>
                                <option> </option>
                          
                        </select>
                      
                    </div>
        
    
    
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Name</label><span style="color:red">&#42;</span>
                <input type="text" class="form-control" id="exampleInputtext1" name="name" aria-describedby="textHelp" value="{{ old('name') }}">
               
            </div>
    
            <div class="mb-4">
           
    
            <div class="row">
                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>
            </div>
    
        </form>
    </div>
</div>
