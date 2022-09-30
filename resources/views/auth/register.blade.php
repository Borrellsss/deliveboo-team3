@extends('layouts.app')

@section('content')
<section>

    {{-- START CARD --}}
    <div class="ms_register-card">

        {{-- header card di registrazione --}}
        <div class="ms_register-card-header">Registrati</div>

        {{-- body card di registrazione --}}
        <div class="ms_register-card-body">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @method('POST')
                @csrf

                {{-- START INPUTS --}}
                {{-- form email --}}
                <div class="form-group">
                    <label for="email" class="form-label">Email <span class="ms_asterisk">*</span></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form password --}}
                <div class="form-group">
                    <label for="password" class="form-label">Password <span class="ms_asterisk">*</span></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form confirm password --}}
                <div class="form-group">
                    <label for="password-confirm" class="form-label">Conferma Password <span class="ms_asterisk">*</span></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div>

                {{-- form business_name --}}
                <div class="form-group">
                    <label for="business_name" class="form-label">Nome Attività <span class="ms_asterisk">*</span></label>
                    <input id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}">
                    @error('business_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form address --}}
                <div class="form-group">
                    <label for="address" class="form-label">Indirizzo Attività <span class="ms_asterisk">*</span></label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form vat --}}
                <div class="form-group">
                    <label for="vat" class="form-label">Partita IVA <span class="ms_asterisk">*</span></label>
                    <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" maxlength="11">
                    @error('vat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                {{-- form cover --}}
                <div class="form-group">
                    <label for="cover" class="form-label">Foto Attività</label>
                    <input id="cover" type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">
                    @error('cover')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form category --}}
                <div>Seleziona una o più categorie <span class="ms_asterisk">*</span></div>
                <div class="form-group row mb-4" style="width: 35%; margin: 0 auto">
                    @foreach ($categories as $category)
                    <div class="col-md-6">
                        <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="category-{{$category->id}}" name="categories[]">
                        <label class="form-check-label" for="category-{{$category->id}}">
                            {{$category->name}}
                        </label>
                    </div>
                    @endforeach
                    @error('categories')
                        <span style="font-size: 0.875em; color: #e3342f" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- END INPUTS --}}

                <div class="mb-4" style="text-align: center">
                    i campi contrassegnati da uno (<span class="ms_asterisk">*</span>) sono obbligatori
                </div>

                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-primary" style="margin: 0 auto">
                        {{ __('Registrati') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- END CARD --}}
</section>
@endsection