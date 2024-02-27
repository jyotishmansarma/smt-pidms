@extends('layouts_old.master')

@section('main-body')
<livewire:user-create-form/>
@endsection
@section('main-script')
    @include('issue.js')
@endsection
