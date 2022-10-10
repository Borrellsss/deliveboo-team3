@extends('admin.components.content')

@section('main_content')
    <section>
        <h1 class="text-center">Ordini</h1>
        <div class="text-center mb-5">
            <a class="ms_btn" href="{{route('admin.statistics')}}">Visualizza statistiche</a>
        </div>
        <div>
            @foreach ($user_orders as $order)
                <div class="ms_order-row mb-3">
                    data ordine: {{$order->created_at}}, totale :{{$order->total_amount}}, numero ordine: {{$order->order_number}}, nome cliente: {{$order->customer_name}}, prodotti ordinati: {{$order->order_number}},
                </div>
            @endforeach
        </div>
    </section> 
@endsection