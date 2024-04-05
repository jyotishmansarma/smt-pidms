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
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
    
                    </div>
                    <div class="col-md-4">
    
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Search </label>
                        <input class="form-control" type="text" wire:model="searchTerm" />
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th >SL. no</th>
                        <th >Order ID</th>
                        <th >Scheme Id</th>
                        <th >Scheme Name</th>
                        <th >Contractor Name</th>
                        <th >Contractor Bid No</th>
                        <th >Order Status</th>
                        <th >#</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchaseorders as $index => $purchaseorders_item)
                        <tr>
                            <td >{{ $index+1 }}</td>
                            <td >{{ $purchaseorders_item->order_id }}</td>
                            <td >{{ $purchaseorders_item->scheme->scheme_id }}</td>
                            <td >{{ $purchaseorders_item->scheme->scheme_name }}</td>
                            <td >{{ $purchaseorders_item->contractor->name }}</td>
                            <td >{{ $purchaseorders_item->contractor->bid_no }}</td>
                            <td >{{ $purchaseorders_item->status }}</td>
                            <td> 
                                <div class="d-flex">
                                    <a href="{{ route('purchase.show', ['purchaseOrder' => $purchaseorders_item]) }}" class="btn btn-success w-20 py-8 fs-4 gap-1 rounded-2">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('purchase.edit', ['purchaseOrder' => $purchaseorders_item]) }}" class="btn btn-warning w-20 py-8 fs-4 rounded-2">
                                        <i class="fas fa-pen"></i>
                                    </a> 
                                </div>
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
