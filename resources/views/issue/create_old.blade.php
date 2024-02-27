@extends('layouts_old.master')

@section('main-body')
<livewire:issue-tracking-from />
@endsection
@section('main-script')
    @include('issue.js')
@endsection
