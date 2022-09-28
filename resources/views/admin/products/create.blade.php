@extends('layouts.app')
@section('content')
    <section>
        <h1>ciao sono la create</h1>
        <a href="{{route('admin.products.create')}}">aggiungi nuovo piatto</a>
        <form action="{{route('admin.products.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="cover" name="cover">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <textarea class="form-control" id="ingredients" rows="2" name="ingredients"></textarea>
            </div>
            <div class="mb-3">
                <label for="cooking_time" class="form-label">Tempo di Cottura(min.)</label>
                <input type="number" class="form-control" id="cooking_time" name="cooking_time" placeholder="minuti">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="€">
            </div>
            <div class="custom-control custom-switch">
                <input class="custom-control-input" type="checkbox" id="available" name="available" value=1>
                <label class="custom-control-label" for="available">Disponibilità</label>
            </div>
            <input type="submit" class="btn btn-primary" value="Aggiungi">
        </form>
    </section>
@endsection