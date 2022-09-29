@extends('layouts.app')
@section('content')
    <section>
        @if (isset($product_created_confirm) && $product_created_confirm === 'y')
            <div class="alert alert-success" role="alert">
                Piatto creato con successo!
            </div>
        @endif
        @if (isset($product_updated_confirm) && $product_updated_confirm === 'y')
            <div class="alert alert-success" role="alert">
                Piatto modificato con successo!
            </div>
        @endif
        <h1>{{$product->name}}</h1>
        <img src="{{asset('storage/' . $product->cover)}}" alt="{{$product->name}}" style="width: 250px">
        <p>{{$product->ingredients}}</p>
        <p>{{$product->description}}</p>
        <div>{{$product->cooking_time}} min.</div>
        <div>{{$product->price}} €</div>
        <div style="color: {{$product->visible == 0 ? 'red' : 'green'}}">{{$product->visible == 0 ? 'Non disponibile' : 'Disponibile'}}</div>
        <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="POST">
            @csrf
            @method('DELETE')

            <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-warning">Modifica Piatto</a>
            <input class="btn btn-danger" type="submit" value="Elimina Piatto">
        </form>
    </section>
@endsection