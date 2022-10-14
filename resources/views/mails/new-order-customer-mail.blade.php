<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>Ciao {{$new_order->customer_name}},
        <br>
    grazie da <a href="http://127.0.0.1:8000/">Toast Rider</a>, stiamo elaborando il tuo ordine.</div>
    
    <br>

    <p>Numero ordine {{$new_order->order_number}}
    <div>Riepilogo:</div>
    <ul>
        @foreach ($new_order->products as $product)
            <li>
                {{$product->name}} - pz: {{$product->pivot['quantity']}}
            </li>
        @endforeach
    </ul>
    <p>Per un totale di: {{$new_order->total_amount}} euro </p>
    <br>
    <div>La consegna è prevista tra:------ minuti</div>
     
            
    
</body>
</html>