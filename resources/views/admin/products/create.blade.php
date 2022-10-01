@extends('layouts.app')

@include('admin.components.header')

@section('main_content')
    <section>
        <h1>Aggiungi prodotto</h1>

        <form action="{{route('admin.products.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('POST')
            
            {{-- START INPUTS --}}
            {{-- form name --}}
            <div class="form-group">
                <label for="name" class="form-label">Nome <span style="color: #e3342f">*</span></label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form cover --}}
            <div class="form-group">
                <label for="cover" class="form-label">Foto</label>
                <input id="cover" type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">
                @error('cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form description --}}
            <div class="form-group">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form ingredients --}}
            <div class="form-group">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <textarea class="form-control" id="ingredients" rows="2" name="ingredients"></textarea>
                @error('ingredients')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form cooking_time --}}
            <div class="form-group">
                <label for="cooking_time" class="form-label">Tempo di Cottura</label>
                <input id="cooking_time" type="number" class="form-control @error('cooking_time') is-invalid @enderror" name="cooking_time" value="{{ old('cooking_time') }}" placeholder="minuti" min="0" max="99">
                @error('cooking_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form price --}}
            <div class="form-group">
                <label for="price" class="form-label">Prezzo <span style="color: #e3342f">*</span></label>
                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="€" min="0.00" max="999.99" step="0.01">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- form visible --}}
            <div class="custom-control custom-switch">
                <input class="custom-control-input" type="checkbox" id="visible" name="visible" {{ old('visible') ? "checked" : ""}}>
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