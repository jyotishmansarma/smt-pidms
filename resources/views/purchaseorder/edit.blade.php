@extends('layouts.master')

@section('main-body')
    @livewire('manufacture-po-edit', [ 'purchaseorder_id' => $purchaseOrder->id ])
@endsection