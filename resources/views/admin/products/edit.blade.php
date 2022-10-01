@extends('layouts.app')
@section('main_content')
    <section>
        <h1>Modifica Piatto</h1>

        <form action="{{route('admin.products.update', ['product' => $product->id])}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            {{-- START INPUTS --}}
            {{-- form name --}}
            <div class="form-group">
                <label for="name" class="form-label">Nome <span style="color: #e3342f">*</span></label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name) }}" autocomplete="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form cover --}}
            <div class="form-group">
                <label for="cover" class="form-label">Foto</label>
                <input id="cover" type="file" class="form-control @error('cover') is-invalid @enderror mb-3" name="cover">
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
            <div class="form-group">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form ingredients --}}
            <div class="form-group">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <textarea class="form-control" id="ingredients" rows="2" name="ingredients">{{ old('ingredients', $product->ingredients) }}</textarea>
                @error('ingredients')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form cooking_time --}}
            <div class="form-group">
                <label for="cooking_time" class="form-label">Tempo di Cottura</label>
                <input id="cooking_time" type="number" class="form-control @error('cooking_time') is-invalid @enderror" name="cooking_time" value="{{ old('cooking_time', $product->cooking_time) }}" placeholder="minuti" min="0" max="99">
                @error('cooking_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form price --}}
            <div class="form-group">
                <label for="price" class="form-label">Prezzo <span style="color: #e3342f">*</span></label>
                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $product->price) }}" placeholder="€" min="0.00" max="999.99" step="0.01">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form visible --}}
            <div class="custom-control custom-switch">
                <input class="custom-control-input" type="checkbox" id="visible" name="visible" {{ old('visible', $product->visible) ? "checked" : ""}}>
                <label class="custom-control-label" for="visible">Disponibilità</label>
            </div>
            {{-- END INPUTS --}}

            <div class="mb-4" style="text-align: center">
                i campi contrassegnati da uno (<span style="color: #e3342f">*</span>) sono obbligatori
            </div>

            <input type="submit" class="btn btn-primary" value="Aggiungi">
        </form>
    </section>
@endsection