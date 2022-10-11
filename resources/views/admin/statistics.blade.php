@extends('admin.components.content')

@section('main_content')
    <section>
        <h1 class="text-center">Statistiche</h1>
        <div class="text-center">
            <select id="ms_chart-type">
                @foreach ($chart_types as $chart_type)
                    <option value="{{$chart_type}}" href="{{route('admin.statistics')}}">{{$chart_type}}</option>
                @endforeach
            </select>
        </div>

        <div class="alert alert-danger text-center" role="alert">
            è necessario fare un refresh della pagina per vedere il grafico selezionato
        </div>

        <div class="ms_chart-wrapper" style="width: 70%; margin: 0 auto">
            <canvas id="ms_orders-per-month"></canvas>
        </div>
        
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        const chartType = document.getElementById('ms_chart-type');

        let selectedChartType = chartType.value;

        chartType.addEventListener('input', function() {
            selectedChartType = chartType.value;
            console.log(selectedChartType);
        });

        const labels = <?php echo json_encode($order_by_month_year); ?>;

        const data = {
            labels: labels,
            datasets: [{
                label: 'Ordini',
                backgroundColor: ['rgba(255, 0, 0, 0.6)', 'rgba(0, 255, 0, 0.6)', 'rgba(0, 0, 255, 0.6)', 'rgba(255, 255, 0, 0.6)', 'rgba(0, 255, 255, 0.6)', 'rgba(255, 0, 255, 0.6)',],
                borderColor: '#740602',
                data: <?php echo json_encode($orders_per_month); ?>,
            }]
        };

        const config = {
            type: selectedChartType,
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('ms_orders-per-month'),
            config
        );
    </script>
    <script>
        
    </script>
@endsection