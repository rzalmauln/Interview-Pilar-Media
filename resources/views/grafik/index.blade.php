@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Dashboard Penjualan</h2>
        <div class="card">
            <div class="card-body">
                <canvas id="salesChart" width="800" height="400"></canvas>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('dashboard.sales-chart-data') }}",
                method: "GET",
                success: function(data) {
                    var years = [];
                    var months = [];
                    var salesData = [];

                    data.forEach(function(item) {
                        years.push(item.year);
                        months.push(item.month);
                        salesData.push(item.total_sales);
                    });

                    var ctx = document.getElementById('salesChart').getContext('2d');
                    var salesChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: months.map(m => m + '/' + years[
                            0]), // Menggunakan data bulan dan tahun
                            datasets: [{
                                label: 'Total Penjualan',
                                data: salesData,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching sales data:', status, error);
                }
            });
        });
    </script>
@endsection
