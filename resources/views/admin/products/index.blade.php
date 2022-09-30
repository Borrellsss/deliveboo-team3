@extends('layouts.app')
@section('content')
    <section>
        <h1>Il tuo Menu</h1>
        @if (isset($product_deleted_confirm))
            @if ($product_deleted_confirm === 'y')
            <div class="alert alert-success" role="alert">
                Piatto eliminato con successo
            </div>
            @else
            <div class="alert alert-danger" role="alert">
                Si è verificato un errore durante la cancellazione del Piatto
            </div>
            @endif
        @endif
        <a href="{{route('admin.products.create')}}">aggiungi nuovo piatto</a>
        <div class="container">
            <div class="row row-cols-3">
                @if (isset($products))
                    @foreach ($products as $product)
                        <div class="col mb-4">
                            {{-- card singola --}}
                            <div class="card">
                                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">{{$product->price . '€'}}</p>
                                <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{route('admin.products.show', ['product' => $product->id])}}" class="btn btn-primary">mostra piatto</a>
                                    <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-warning">Modifica Piatto</a>
                                    
                                    {{-- eliminazione piatto con richiesta di conferma --}}
                                    <a href="#myModal" class="btn btn-danger" data-toggle="modal">Elimina Piatto</a>

                                    <div id="myModal" class="modal fade">
                                        <div class="modal-dialog modal-confirm">
                                            <div class="modal-content">
                                                <div class="modal-header flex-column">
                                                    <div class="icon-box">
                                                        <i class="material-icons">&#xE5CD;</i>
                                                    </div>						
                                                    <h4 class="modal-title w-100">Sei sicurə?</h4>	
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>L'eliminazione del Piatto è irreversibile</p>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                                    <input class="btn btn-danger" type="submit" value="Conferma">
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection