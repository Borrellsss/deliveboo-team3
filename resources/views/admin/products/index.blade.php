@extends('layouts.app')
@section('content')
    <section>
        <h1>ciao sono la index/my foods</h1>
        <a href="{{route('admin.products.create')}}">aggiungi nuovo piatto</a>
        <div class="container">
            <div class="row row-cols-3">
                @foreach ($products as $product)
                <div class="col">
                    {{-- card singola --}}
                    <div class="card" style="width: 18rem;">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                          <h5 class="card-title">{{$product->name}}</h5>
                          <p class="card-text">{{$product->price . '€'}}</p>
                          <a href="#" class="btn btn-primary">mostra piatto</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection