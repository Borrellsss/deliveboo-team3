@extends('layouts.app')
@section('content')
    <section>
        <h1>{{$product->name}}</h1>
        <img src="{{asset('storage/' . $product->cover)}}" alt="{{$product->name}}" style="width: 250px">
        <p>{{$product->ingredients}}</p>
        <p>{{$product->description}}</p>
        <div>{{$product->cooking_time}} min.</div>
        <div>{{$product->price}} €</div>
        <div style="color: {{$product->visible == 0 ? 'red' : 'green'}}">{{$product->visible == 0 ? 'Non disponibile' : 'Disponibile'}}</div>
    </section>
@endsection