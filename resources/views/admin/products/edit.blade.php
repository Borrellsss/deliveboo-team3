@extends('layouts.app')
@section('content')
    <section>
        <h1>ciao sono la Edit</h1>
        <form action="{{route('admin.products.update', ['product' => $product->id])}}" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3">
                <label for="name" class="form-label">Nome *</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> --}}
            <div class="form-group">
                <label for="name" class="form-label">Nome Piatto <span style="color: #e3342f">*</span></label>

                <div class="col-md-6">
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="cover" name="cover">
                @error('cover')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <textarea class="form-control" id="ingredients" rows="2" name="ingredients"></textarea>
                @error('ingredients')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cooking_time" class="form-label">Tempo di Cottura(min.)</label>
                <input type="number" class="form-control" id="cooking_time" name="cooking_time" placeholder="minuti">
                @error('cooking_time')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo *</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="€" step="0.01">
                @error('price')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="custom-control custom-switch">
                <input class="custom-control-input" type="checkbox" id="available" name="available" value=1>
                <label class="custom-control-label" for="available">Disponibilità</label>
            </div>

            <div>
                i campi contrassegnati da uno (*) sono obbligatori
            </div>

            <input type="submit" class="btn btn-primary" value="Aggiungi">
        </form>
    </section>
@endsection