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
                            <p>Vuoi davvero eliminare il Piatto? Il procedimento è irreversibile</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                            <input class="btn btn-danger" type="submit" value="Conferma">
                        </div>
                    </div>
                </div>
            </div> 
        </form>
    </section>
@endsection