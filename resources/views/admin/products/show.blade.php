@extends('layouts.app')
@section('content')
    <section>
        <h1>ciao sono la show</h1>
        {{-- {{dd(asset('storage/' . $product->cover))}} --}}
        <img src="{{asset('storage/' . $product->cover)}}" alt="{{$product->name}}">
        {{-- {{dd($product)}} --}}
    </section>
@endsection