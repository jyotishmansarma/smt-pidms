@extends('layouts.master')

@section('main-body')

@livewire('manufacture-po-single', [
    'purchaseorder_id' => $purchaseOrder->id,
])
    
@endsection
@section('main-script')
  

@endsection
