@extends('admin.components.content')

@section('main_content')
    <section>
        <h1 class="text-center">Statistiche</h1>

        <div class="mb-4 text-center">
            <div class="mb-2">Cambia stile grafico</div>
            <select autocomplete="off" onchange="changeChartStyle(this)">
                {{-- <option selected>seleziona</option> --}}
                @foreach ($chart_types as $chart_type)
                    <option value="{{$chart_type}}">{{$chart_type}}</option>
                @endforeach
            </select>
        </div>

        <div class="ms_chart-wrapper">
            <canvas id="ms_js-chart"></canvas>
        </div>
        
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        // cart labels
        const labels = <?php echo json_encode(array_reverse($timestamps)); ?>;

        // charts data1
        const data1 = {
            labels: labels,
            datasets: [
                {
                    label: 'Ordini',
                    backgroundColor: 'rgba(254, 170, 2, 0.55)',
                    borderColor: 'rgb(254, 170, 2)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgb(254, 170, 2)',
                    data: <?php echo json_encode($monthly_orders); ?>,
                },
                {
                    label: 'Entrate (€)',
                    backgroundColor: 'rgba(38, 79, 54, 0.55)',
                    borderColor: 'rgb(38, 79, 54)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgb(38, 79, 54)',
                    data: <?php echo json_encode($monthly_revenue); ?>,
                }
            ]
        }

        // charts data2
        const data2 = {
            labels: labels,
            datasets: [
                {
                    label: 'Ordini',
                    backgroundColor: 'rgba(254, 170, 2, 0.55)',
                    borderColor: 'rgb(254, 170, 2)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgb(254, 170, 2)',
                    data: <?php echo json_encode($monthly_orders); ?>,
                }
            ]
        }

        // charts data3
        const data3 = {
            labels: labels,
            datasets: [
                {
                    label: 'Ordini',
                    backgroundColor: 'rgba(254, 170, 2, 0.55)',
                    borderColor: 'rgb(254, 170, 2)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgb(254, 170, 2)',
                    data: <?php echo json_encode($monthly_orders); ?>,
                }
            ]
        }

        // charts configurations
        // bar chart
        const config1 = {
            type: 'bar',
            data: data1,
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            color: 'rgb(254, 170, 2)',
                            display: true,
                            text: 'Ultimi 12 mesi'
                        },
                        ticks: {
                            color: 'rgb(116, 6, 2)',
                        }
                    }
                }
            }
        }

        // line chart
        const config2 = {
            type: 'line',
            data: data1,
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            color: 'rgb(254, 170, 2)',
                            display: true,
                            text: 'Ultimi 12 mesi'
                        },
                        ticks: {
                            color: 'rgb(116, 6, 2)',
                        },
                    }
                }
            }
        }

        // radar chart
        const config3 = {
            type: 'radar',
            data: data2,
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            color: 'rgb(254, 170, 2)',
                            display: true,
                            text: 'Ultimi 12 mesi'
                        },
                        ticks: {
                            color: 'rgb(116, 6, 2)',
                        },
                    }
                }
            }
        }

        // polarArea chart
        const config4 = {
            type: 'polarArea',
            data: data3,
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            color: 'rgb(254, 170, 2)',
                            display: true,
                            text: 'Ultimi 12 mesi'
                        },
                        ticks: {
                            color: 'rgb(116, 6, 2)',
                        },
                    }
                }
            }
        }

        // doughnut chart
        const config5 = {
            type: 'doughnut',
            data: data3,
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            color: 'rgb(254, 170, 2)',
                            display: true,
                            text: 'Ultimi 12 mesi'
                        },
                        ticks: {
                            color: 'rgb(116, 6, 2)',
                        },
                    }
                }
            }
        }

        // default chart render
        let myChart = new Chart(
            document.getElementById('ms_js-chart'),
            config1
        );

        // when the user select a different option the changeChartStyle function destroy myChart and
        // after that re-render it with different config fased on the option selected by the user himself
        function changeChartStyle(chartStyle) {
            myChart.destroy();

            if(chartStyle.value === 'bar') {
                myChart = new Chart(
                    document.getElementById('ms_js-chart'),
                    config1
                );
            } else if(chartStyle.value === 'line') {
                myChart = new Chart(
                    document.getElementById('ms_js-chart'),
                    config2
                );
            } else if(chartStyle.value === 'radar') {
                myChart = new Chart(
                    document.getElementById('ms_js-chart'),
                    config3
                );
            } else if(chartStyle.value === 'polarArea') {
                myChart = new Chart(
                    document.getElementById('ms_js-chart'),
                    config4
                );
            } else if(chartStyle.value === 'doughnut') {
                myChart = new Chart(
                    document.getElementById('ms_js-chart'),
                    config5
                );
            }
        }
    </script>
@endsection