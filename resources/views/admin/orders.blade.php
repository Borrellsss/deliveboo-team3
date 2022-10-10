@extends('admin.components.content')

@section('main_content')
    <section>
        <h1 class="text-center">Ordini</h1>
        <div class="text-center mb-5">
            <a class="ms_btn" href="{{route('admin.statistics')}}">Visualizza statistiche</a>
        </div>
        <div>
            @foreach ($user_orders as $order)
                <div class="ms_user-orders-info ms_order-row mb-3">
                    <div>
                        <span>Numero ordine:</span>
                        {{$order->order_number}}
                    </div>
                    <div>
                        <span>Totale:</span>
                        {{$order->total_amount}} €
                    </div>
                    <div>
                        <span>Data:</span>
                        {{$order->new_date}}
                    </div>
                </div>
            @endforeach
        </div>
    </section> 
@endsection