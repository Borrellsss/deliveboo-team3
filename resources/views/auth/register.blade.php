@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf

                        {{-- START INPUTS --}}
                        {{-- form email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- {{$errors}} --}}
                        {{-- form password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- form confirm password --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"autocomplete="new-password">
                            </div>
                        </div>

                        {{-- form business_name --}}
                        <div class="form-group row">
                            <label for="business_name" class="col-md-4 col-form-label text-md-right">Nome Attività *</label>

                            <div class="col-md-6">
                                <input id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}">

                                @error('business_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- form address --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo Attività *</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- form vat --}}
                        <div class="form-group row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">Partita IVA *</label>

                            <div class="col-md-6">
                                <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" maxlength="11">

                                @error('vat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- form cover --}}
                        <div class="form-group row">
                            <label for="cover" class="col-md-4 col-form-label text-md-right">Foto Attività</label>

                            <div class="col-md-6">
                                <input id="cover" type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">

                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>Seleziona una o più categorie *</div>
                        <div class="form-group row mb-4" style="width: 35%; margin: 0 auto">
                            @foreach ($categories as $category)
                            <div class="col-md-6">
                                <input class="form-check-input @error('categories') is-invalid @enderror" type="checkbox" value="{{$category->id}}" id="category-{{$category->id}}" name="categories[]">
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="form-check-label" for="category-{{$category->id}}">
                                    {{$category->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        {{$errors}}

                        {{-- form category --}}
                        {{-- <div class="col-md-6">
                            @foreach ($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input @error('categories') is-invalid @enderror" type="checkbox" value="{{$category->id}}" id="category-{{$category->id}}" name="categories[]">
                                <label class="form-check-label" for="category-{{$category->id}}">
                                    {{$category->name}}
                                </label>
                                @error('categories')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            @endforeach
                            
                            @error('categories')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div> --}}
                        {{-- END INPUTS --}}

                        <div class="mb-4" style="text-align: center; color: red">
                            i campi contrassegnati da uno (*) sono obbligatori
                        </div>
                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary" style="margin: 0 auto">
                                {{ __('Registrati') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection