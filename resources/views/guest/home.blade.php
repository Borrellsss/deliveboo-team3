<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Braintree --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.33.4/js/dropin.min.js"></script>

    <link rel=“stylesheet” href="{{asset ('css/app.css')}}">

    <title>Document</title>
    
</head>
<body>
    <div id="root">
        
    </div>

    @auth
        <script>
            window.userLogged = true;
        </script>
    @endauth
    
    {{-- inserisco lo script relativo alla porzione pubblica --}}
    <script src="{{asset('js/app.js')}}" defer></script>
</body>
</html>