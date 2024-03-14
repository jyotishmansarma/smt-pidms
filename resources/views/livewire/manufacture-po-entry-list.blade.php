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
                        <th >Scheme Id</th>
                        <th >Scheme Name</th>
                        <th >Contractor Name</th>
                        <th >Contractor Bid no</th>
                        <th >Order Status</th>
                        <th >#</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchaseorders as $purchaseorders_item)
                        <tr>
                            <td >Sl no</td>
                            <td >Order Id</td>
                            <td >{{ $purchaseorders_item->scheme->scheme_id }}</td>
                            <td >{{ $purchaseorders_item->scheme->scheme_name }}</td>
                            <td >{{ $purchaseorders_item->contractor->name }}</td>
                            <td >{{ $purchaseorders_item->contractor->bid_no }}</td>
                            <td >{{ $purchaseorders_item->status }}</td>
                            <td> 
                                <a href="{{ route('purchase.show', ['purchaseOrder' => $purchaseorders_item]) }}" class="btn btn-warning w-20 py-8 fs-4 mt-4 rounded-2">
                                    <i class="fas fa-eye"></i>
                                </a>                                    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

   
            </div>

            <div class="card-footer float-right">
                <div class="row">
                    <div class="col-6">
                        @if($purchaseorders->total())
                            Showing {{ $purchaseorders->firstItem() }} to {{ $purchaseorders->lastItem() }} out of {{ $purchaseorders->total() }} results
                        @endif
                    </div>
                    <div class="col-6 ">
                        {{ $purchaseorders->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
