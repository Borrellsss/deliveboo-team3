@extends('admin.components.content')

@section('main_content')
    <section>
        <h1 class="text-center">Statistiche</h1>
        <div class="text-center">
            <select id="mb-4" onchange="changeChartStyle(this)">
                <optgroup label="stile grafico"></optgroup>
                @foreach ($chart_types as $chart_type)
                    <option value="{{$chart_type}}" href="{{route('admin.statistics')}}">{{$chart_type}}</option>
                @endforeach
            </select>
        </div>

        <div class="ms_chart-wrapper" style="width: 70%; margin: 0 auto">
            <canvas id="ms_js-chart"></canvas>
        </div>
        
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        // cart labels
        const labels = <?php echo json_encode(array_reverse($timestamps)); ?>;
        
        // charts data
        const data = {
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
        };

        // charts configurations
        const config1 = {
            type: 'bar',
            data: data,
            options: {

            }
        };

        const config2 = {
            type: 'line',
            data: data,
            options: {
                
            }
        };

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
            } else {
                myChart = new Chart(
                    document.getElementById('ms_js-chart'),
                    config2
                );
            }
        }
    </script>
@endsection