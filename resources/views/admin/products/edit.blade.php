@extends('admin.components.content')

@section('main_content')
    <section>
        <h1 class="text-center">Modifica prodotto</h1>
        <div class="ms_form-card-body">

            <form action="{{route('admin.products.update', ['product' => $product->id])}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')

                {{-- START INPUTS --}}
                {{-- form name --}}
                <div>
                    <label for="name">Nome *</label>
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name) }}" autocomplete="name" placeholder="Nome *" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form cover --}}
                <div>
                    <label for="cover" class="ms_visible-label">Foto</label>
                    <input id="cover" type="file" class="@error('cover') is-invalid @enderror" name="cover"> 
                    @error('cover')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if ($product->cover)
                        <div>
                            Foto attualmente caricata
                        </div>
                        <img class="img-thumbnail w-25" src="{{asset('storage/' . $product->cover)}}" alt="{{$product->name}}">
                    @endif
                </div>

                {{-- form description --}}
                <div>
                    <label for="description">Descrizione</label>
                    <textarea id="description" rows="3" name="description" placeholder="Descrizione">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            {{-- form ingredients --}}
                <div>
                    <label for="ingredients">Ingredienti</label>
                    <textarea class="@error('ingredients') is-invalid @enderror" id="ingredients" rows="2" name="ingredients" placeholder="Ingredienti">{{ old('ingredients', $product->ingredients) }}</textarea>
                    @error('ingredients')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form cooking_time --}}
                <div>
                    <label for="cooking_time">Tempo di Cottura</label>
                    <input id="cooking_time" type="number" class="@error('cooking_time') is-invalid @enderror" name="cooking_time" value="{{ old('cooking_time', $product->cooking_time) }}" placeholder="Tempo di cottura (minuti)" min="0" max="99">
                    @error('cooking_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form price --}}
                <div>
                    <label for="price">Prezzo *</label>
                    <input id="price" type="number" class="@error('price') is-invalid @enderror" name="price" value="{{ old('price', $product->price) }}" placeholder="Prezzo * (€)" min="0.00" max="999.99" step="0.01" required>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                {{-- form visible --}}
                <div class="custom-control custom-switch mt-3 mb-3">
                    <input class="custom-control-input" type="checkbox" id="visible" name="visible" {{ old('visible', $product->visible) ? "checked" : ""}}>
                    <label class="custom-control-label ms_visible-label" for="visible">Disponibilità</label>
                </div>
                {{-- END INPUTS --}}

                <div class="text-center mb-4">
                    i campi contrassegnati da uno (<span class="ms_asterisk">*</span>) sono obbligatori
                </div>

                <div class="text-center mb-4">
                    <input type="submit" class="ms_btn" value="Modifica">
                </div>
            </form>
        </div>
    </section>
@endsection