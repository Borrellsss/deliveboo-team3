<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ciao {{$user->business_name}} hai ricevuto un nuovo ordine.</h1>
    <p>Questi sono i prodotti ordinati: </p>
    <ul>
        @foreach ($new_order->products as $product)
            <li>
                {{$product->name}} - pz: {{$product->pivot['quantity']}}
            </li>
        @endforeach
    </ul>
    
</body>
</html>