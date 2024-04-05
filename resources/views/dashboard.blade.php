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
                                <h6 class="fw-semibold fs-4">Total PO</h6>
                                <h3> {{$total_order_count}}</h3>
                                <div class="d-flex align-items-center justify-content-between">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative"></div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Pending PO</h6>
                                <h3>{{$pending_order_count}}</h3>
                                <div class="d-flex align-items-center justify-content-between">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative"></div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Rejected PO</h6>
                                <h3>{{$rejected_order_count}}</h3>
                                <div class="d-flex align-items-center justify-content-between">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative"></div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Accepted PO</h6>
                                <h3>{{$accepted_order_count}}</h3>
                                <div class="d-flex align-items-center justify-content-between">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative"></div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Resubmitted PO</h6>
                                <h3>{{$resubmitted_order_count}} </h3>
                                <div class="d-flex align-items-center justify-content-between">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <canvas id="ordersChart" style="max-width: 400px; max-height: 400px;"></canvas>
    </div>
@endsection
<script>
    var ctx = document.getElementById('ordersChart').getContext('2d');
    var ordersChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Pending PO','Rejected PO', 'Accepted PO','Resubmitted PO'],
            datasets: [{
                label: 'PO',
                data: [ {{ $pending_order_count }},{{ $rejected_order_count }}, {{ $accepted_order_count }},{{$resubmitted_order_count}}],
                backgroundColor: [
                    'rgba(245, 121, 39, 0.7)',
                    'rgba(255, 0, 0, 0.7)',
                    'rgba(10, 255, 20, 0.7)',
                    'rgba(75, 192, 192, 0.7)'
                ],
                borderColor: [
                    'rgba(245, 121, 39, 1)',
                    'rgba(255, 0, 0, 1)',
                    'rgba(0, 0, 255, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

