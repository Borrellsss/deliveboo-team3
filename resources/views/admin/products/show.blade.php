@extends('admin.components.content')

@section('main_content')
    <section>
        @if (isset($product_created_confirm) && $product_created_confirm === 'y')
            <div class="alert alert-success" role="alert">
                prodotto creato con successo!
            </div>
        @endif
        @if (isset($product_updated_confirm) && $product_updated_confirm === 'y')
            <div class="alert alert-success" role="alert">
                prodotto modificato con successo!
            </div>
        @endif

        {{-- nome --}}
        <h1>{{$product->name}}</h1>

        {{-- immagine --}}
        <img src="{{asset('storage/' . $product->cover)}}" alt="{{$product->name}}" style="width: 250px">

        {{-- ingredienti --}}
        @if ($product->ingredients)
            <p><span style="color: #0073ffff">Ingredienti:</span> {{$product->ingredients}}</p>
        @endif

        {{-- descrizione --}}
        @if ($product->description)
            <p><span style="color: #0073ffff">Descrizione:</span> {{$product->description}}</p>
        @endif

        {{-- tempo di cottura --}}
        @if ($product->cooking_time)
            <div><span style="color: #0073ffff">Tempo di cottura:</span> {{$product->cooking_time}} min.</div>
        @endif

        {{-- prezzo --}}
        <div><span style="color: #0073ffff">Prezzo:</span> {{$product->price}} €</div>

        {{-- disponibilità --}}
        <div style="color: {{$product->visible == 0 ? 'red' : 'green'}}">{{$product->visible == 0 ? 'Non disponibile' : 'Disponibile'}}</div>
        
        {{-- bottoni modifica ed elimina --}}
        <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="POST">
            @csrf
            @method('DELETE')

            <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-warning">Modifica prodotto</a>
            
            {{-- eliminazione prodotto con richiesta di conferma --}}
            <a href="#myModal" class="btn btn-danger" data-toggle="modal">Elimina prodotto</a>

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
                            <p>L'eliminazione del prodotto è irreversibile</p>
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