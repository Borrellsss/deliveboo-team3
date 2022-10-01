@extends('layouts.app')

@section('body_content')

    {{-- START CARD --}}
    <div class="ms_form-card">

        {{-- header card di registrazione --}}
        <div class="ms_form-card-header">Registrati</div>

        {{-- body card di registrazione --}}
        <div class="ms_form-card-body">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @method('POST')
                @csrf

                {{-- START INPUTS --}}
                {{-- form email --}}
                <div class="form-group">
                    <label for="email">Email *</span></label>
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email *">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form password --}}
                <div class="form-group">
                    <label for="password">Password *</span></label>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password *">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form confirm password --}}
                <div class="form-group">
                    <label for="password-confirm">Conferma Password *</span></label>
                    <input id="password-confirm" type="password" class=" name="password_confirmation" autocomplete="new-password" placeholder="Conferma Password *">
                </div>

                {{-- form business_name --}}
                <div class="form-group">
                    <label for="business_name">Nome Attività *</span></label>
                    <input id="business_name" type="text" class="@error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}" placeholder="Nome Attività *">
                    @error('business_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form address --}}
                <div class="form-group">
                    <label for="address">Indirizzo Attività *</span></label>
                    <input id="address" type="text" class="@error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Indirizzo Attività *">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form vat --}}
                <div class="form-group">
                    <label for="vat">Partita IVA *</span></label>
                    <input id="vat" type="text" class="@error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" maxlength="11" placeholder="Partita IVA *">
                    @error('vat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                {{-- form cover --}}
                <div class="form-group">
                    <label for="cover" class="ms_visible-label">Foto Attività</label>
                    <input id="cover" type="file" class="@error('cover') is-invalid @enderror" name="cover"> 
                    @error('cover')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- form category --}}
                <div>Seleziona una o più categorie <span class="ms_asterisk">*</span></div>
                <div class="form-group row mb-4">
                    @foreach ($categories as $category)
                    <div class="col-md-6">
                        <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="category-{{$category->id}}" name="categories[]">
                        <label class="form-check-label ms_visible-label" for="category-{{$category->id}}">
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
                Sei già registrato?
                <div class="form-group row mb-0">
                    
                    <button type="submit" class="btn btn-primary" style="margin: 0 auto">
                        {{ __('Accedi') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- END CARD --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="ms_form-card">
                    <div class="ms_form-card-header">Login</div>
    
                    <div class="ms_form-card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="ms_visible-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Accedi') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection