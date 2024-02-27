@extends('layouts.master')

@section('main-body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative"></div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Total Issue</h6>
                                <h3> {{$total_issue}}</h3>
                                <div class="d-flex align-items-center justify-content-between">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative"></div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Pending issue</h6>
                                <h3>  {{$pending_issue}}</h3>
                                <div class="d-flex align-items-center justify-content-between">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative"></div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Accept issue</h6>
                                <h3>  {{$accept_issue}}</h3>
                                <div class="d-flex align-items-center justify-content-between">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative"></div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Complete Issue</h6>
                                <h3>  {{$resolved_issue}}</h3>

                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
