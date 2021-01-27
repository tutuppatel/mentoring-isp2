@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <!-- Pie Chart -->
            <div class="block">
                <div class="block-header block-header-default">
                    <div class="block-options">
                        <div class="block-options-item">
                            <span class="js-flot-live-info text-primary font-w700"></span>
                        </div>
                        <div class="block-options-item">
                            <i class="fa fa-refresh fa-spin text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <h1>Number of meetings per mentor</h1>
                    <!-- Pie Chart Container -->
                    <canvas id="user_reports" width="370" height="120" class="rounded shadow"></canvas>
                </div>
            </div>
            <!-- END Pie Chart -->
        </div>
    </div>
@endsection

@section('js_after')
    <script src="{{asset('bower_components/admin-lte/plugins/chart.js/Chart.bundle.js')}}"></script>

    <script>
        var ctx = document.getElementById('user_reports').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($chart_data->labels) !!},
                datasets: [{
                    label: 'Number of meetings per mentor',
                    data: {!! json_encode($chart_data->data) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
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
    </script>
@endsection
