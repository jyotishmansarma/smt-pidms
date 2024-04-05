<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
<!-- Include SweetAlert from CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Include Select2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    @if (Request::is('dashboard'))
    var ctx = document.getElementById('ordersChart').getContext('2d');
    var ordersChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Pending PO','Rejected PO', 'Verified PO','Resubmitted PO'],
            datasets: [{
                label: 'PO',
                data: [ {{ $pending_order_count }},{{ $rejected_order_count }}, {{ $verified_order_count }},{{$resubmitted_order_count}}],
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
    @endif
</script>
@livewireScripts


