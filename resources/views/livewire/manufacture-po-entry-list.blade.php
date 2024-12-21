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
                    <div class="col-md-6">
    
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Filter </label>
                        <select class="form-select" wire:model='filterStatus'> 
                            <option value="">Select Status </option>
                            @if($statuses)
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" wire:key={{ "filter".$status->id }}> {{ $status->name }}</option>
                                @endforeach
                            @endif
                        </select>
    
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Search </label>
                        <input class="form-control" type="text" wire:model="searchTerm" placeholder="Enter Scheme id / OrderId "/>
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
                        <th >Manufacturer Name</th>
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
                            <td >{{ $purchaseorders_item->manufacturer->name }}</td>
                            <td >
                                <span class="badge bg-{{ $purchaseorders_item->postatus->getStatusColor($purchaseorders_item->postatus->name) }}">
                                     {{ $purchaseorders_item->postatus->name }}
                                </span>
                            </td>
                            <td> 
                                <div class="d-flex">
                                    <a href="{{ route('purchase.show', ['purchaseOrder' => $purchaseorders_item]) }}" class="btn btn-success w-20 py-8 fs-4 gap-1 rounded-2">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    
                    
                                    
                                    @php $rejection_count =  $purchaseorders_item->purchase_order_statuses->filter(function ($po_status) {
                                        return $po_status->status == 4;
                                    })->count()
                                    @endphp

                                    @if( Auth::user()->hasAnyRole(['Manufacture']) && $purchaseorders_item->status == 4 && $rejection_count <2)
                                    <a href="{{ route('purchase.edit', ['purchaseOrder' => $purchaseorders_item]) }}" class="btn btn-warning w-20 py-8 fs-4 rounded-2">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    @endif
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
