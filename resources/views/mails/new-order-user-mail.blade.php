<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NewOrderUserMail</title>
</head>
<body>

    <div class="title">Il business <strong>{{$user->business_name}}</strong> ha ricevuto un nuovo ordine.</div>
    <br>
    <div>Riepilogo ordine N.{{ $new_order->order_number}}: </div>
    <ul>
        @foreach ($new_order->products as $product)
            <li>
                {{$product->name}} - pz: {{$product->pivot['quantity']}}
            </li>
        @endforeach
    </ul>
     
    <div>Per un totale di: {{$new_order->total_amount}}€</div>

    <br>

    {{-- <div> <strong>Dettagli per la consegna</strong> 
        <div>Nome e Cognome: {{$new_order->customer_name}}</div>
        <div>Indirizzo: {{$new_order->customer_address}}</div>
        <div>Email: {{$new_order->customer_mail}}</div>
        <div>Telefono: {{$new_order->customer_phone_number}}</div>
    </div>

    <br> --}}

    <div>I dettagli per la consegna sono disponibili nella 
        <a href="{{route ('admin.orders')}}">sezione privata ordini.</a>
    </div>
    


</body>
</html>

    