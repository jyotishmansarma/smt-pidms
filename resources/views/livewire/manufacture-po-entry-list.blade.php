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
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th >Sl no</th>
                        <th >Order Id</th>
                        <th >Scheme Name</th>
                        <th >Contractor Name</th>
                        <th >Order Status</th>
                        <th >#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
     

                    </tbody>
                </table>

   
            </div>
        </div>
    </div>
</div>
