@extends('layouts.app')

@section('body_content')
    {{-- START CARD --}}
    <div class="ms_form-card-wrapper d-flex">
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
                    <div>
                        <label for="email">Email *</label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email *">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- form password --}}
                    <div>
                        <label for="password">Password *</label>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password *">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- form confirm password --}}
                    <div>
                        <label for="password-confirm">Conferma Password *</label>
                        <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password" placeholder="Conferma Password *">
                    </div>

                    {{-- form business_name --}}
                    <div>
                        <label for="business_name">Nome Attività *</label>
                        <input id="business_name" type="text" class="@error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}" placeholder="Nome Attività *">
                        @error('business_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- form address --}}
                    <div>
                        <label for="address">Indirizzo Attività *</label>
                        <input id="address" type="text" class="@error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Indirizzo Attività *">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- form vat --}}
                    <div>
                        <label for="vat">Partita IVA *</label>
                        <input id="vat" type="text" class="@error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" maxlength="11" placeholder="Partita IVA *">
                        @error('vat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    {{-- form cover --}}
                    <div>
                        <label for="cover" class="ms_visible-label">Foto Attività</label>
                        <input id="cover" type="file" class="@error('cover') is-invalid @enderror" name="cover"> 
                        @error('cover')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- form category --}}
                    <div class="ms_checkbox-group">
                        <div class="ms_checkbox-group-title">Categorie * - <i>Seleziona una o più campi :</i></div>
                        <div class="d-flex flex-wrap ms_checkbox-wrapper">
                            @foreach ($categories as $category)
                                <div>
                                    <input type="checkbox" value="{{$category->id}}" id="category-{{$category->id}}" name="categories[]">
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
                    </div>
                    
                    {{-- END INPUTS --}}

                    <div class="text-center mb-4">
                        i campi contrassegnati da uno (<span class="ms_asterisk">*</span>) sono obbligatori
                    </div>

                    <div class="text-center mb-4">
                        <button type="submit" class="ms_btn" style="margin: 0 auto">Registrati</button>
                    </div>

                    <div class="text-center">
                        <div class="mb-2">
                            Sei già registrato?
                        </div>
                        <a href="{{route('login')}}" class="ms_btn" style="margin: 0 auto">Accedi</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- END CARD --}}
@endsection