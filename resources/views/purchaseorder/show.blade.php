@extends('layouts.master')

@section('main-body')

{{ $purchaseOrder->id }}

@livewire('manufacture-po-single', [
    'purchaseorder_id' => $purchaseOrder->id,
])
    
@endsection
@section('main-script')
  

@endsection
