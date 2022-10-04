@extends('layouts.app')

@section('body_content')
    {{-- START CARD --}}
    <div class="ms_form-card-wrapper d-flex">
        <div class="ms_form-card">

            {{-- header card di registrazione --}}
            <div class="ms_form-card-header">Registrati</div>

            {{-- body card di registrazione --}}
            <div class="ms_form-card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" onsubmit="return CheckBoxesValidation()">
                    @method('POST')
                    @csrf

                    {{-- START INPUTS --}}
                    {{-- form email --}}
                    <div class="ms_input-hover-wrapper">
                        <label for="email" class="ms_js-get-label">Email *</label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror ms_js-get-input" name="email" value="{{ old('email') }}" autocomplete="email" required>
                        @error('email')
                            <span class="ms_txt-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    {{-- form password --}}
                    <div class="ms_input-hover-wrapper">
                        <label for="password" class="ms_js-get-label">Password (min. 8 caratteri)*</label>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror ms_js-get-input" name="password" minlength="8" autocomplete="new-password" required>
                        @error('password')
                            <span class="ms_txt-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    {{-- form confirm password --}}
                    <div class="ms_input-hover-wrapper ms_js-pwd-check-msg-wrapper">
                        <label for="password-confirm" class="ms_js-get-label">Conferma Password * <span class="ms_js-pwd-check-msg"></span></label>
                        <input id="password-confirm" class="ms_js-get-input" type="password" name="password_confirmation" minlength="8" autocomplete="new-password" required>
                    </div>

                    {{-- form business_name --}}
                    <div class="ms_input-hover-wrapper">
                        <label for="business_name" class="ms_js-get-label">Nome Attività *</label>
                        <input id="business_name" type="text" class="@error('business_name') is-invalid @enderror ms_js-get-input" name="business_name" value="{{ old('business_name') }}" required>
                        @error('business_name')
                            <span class="ms_txt-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    {{-- form address --}}
                    <div class="ms_input-hover-wrapper">
                        <label for="address" class="ms_js-get-label">Indirizzo Attività *</label>
                        <input id="address" type="text" class="@error('address') is-invalid @enderror ms_js-get-input" name="address" value="{{ old('address') }}" required>
                        @error('address')
                            <span class="ms_txt-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    {{-- form vat --}}
                    <div class="ms_input-hover-wrapper">
                        <label for="vat" class="ms_js-get-label">Partita IVA *</label>
                        <input id="vat" type="text" class="@error('vat') is-invalid @enderror ms_js-get-input" name="vat" value="{{ old('vat') }}" maxlength="11" required>
                        @error('vat')
                            <span class="ms_txt-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    
                    {{-- form cover --}}
                    <div>
                        <label for="cover">Foto Attività</label>
                        <input id="cover" type="file" class="@error('cover') is-invalid @enderror" name="cover"> 
                        @error('cover')
                            <span class="ms_txt-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    {{-- form category --}}
                    <div class="ms_checkbox-group">
                        <div class="ms_checkbox-group-title">Categorie * / <i>Seleziona una o più campi :</i></div>
                        <div class="d-flex flex-wrap ms_checkbox-wrapper">
                            @foreach ($categories as $category)
                                <div>
                                    <input type="checkbox" value="{{$category->id}}" id="category-{{$category->id}}" name="categories[]" {{in_array($category->id, old('categories', [])) ? "checked" : ""}}>
                                    <label class="form-check-label" for="category-{{$category->id}}">
                                        {{$category->name}}
                                    </label>
                                </div>
                            @endforeach

                            {{-- category error client message --}}
                            <div class="ms_js-checkboxes-check-msg ms_txt-danger"></div>

                            @error('categories')
                                <div class="ms_txt-danger" role="alert">
                                    {{ $message }}
                                </div>                                                                                              
                            @enderror
                        </div>
                    </div>
                    
                    {{-- END INPUTS --}}

                    <div class="text-center mb-4">
                        i campi contrassegnati da uno (<span class="ms_asterisk">*</span>) sono obbligatori
                    </div>

                    <div class="text-center mb-4">
                        <button id="ms_js-register-btn" type="submit" class="ms_btn">Registrati</button>
                    </div>

                    <div class="text-center">
                        <div class="mb-2">
                            Sei già registrato?
                        </div>
                        <a href="{{route('login')}}" class="ms_btn">Accedi</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END CARD --}}

    <script>
        
        // START REGISTRATION FORM CATEGORIES VALIDATION
        function CheckBoxesValidation() {

            // salvo in una variabile "form" tutto il tag form del DOM
            const form = document.querySelector("form");

            // creo una nuova classe new FormData, che mi servirà per validare i dati, e la salvo in "formDataCheck"
            const formDataCheck = new FormData(form);

            // mi salvo in "categoryErrorMessage" l'elemento del DOM nel quale stampare il messaggio di errore
            const categoryErrorMessage = document.querySelector('.ms_js-checkboxes-check-msg');

            // dichiaro una variabile flag "checkResult"
            let checkResult;

            // se il name "categories[]" non è presente nell'oggetto "formDataCheck", ovvero l'utente
            // non ha 'checkato' nemmeno un campo con name=categories[]:
            if(!formDataCheck.has("categories[]")) {

                // stampo in "categoryErrorMessage" il messaggio "Nessuna categoria selezionata! Spunta almeno un campo per registrarti."
                categoryErrorMessage.innerHTML = 'Nessuna categoria selezionata! Spunta almeno un campo per registrarti.';

                // e salvo "false" in "checkResult"
                checkResult = false;

            // altrimenti:
            } else {

                // non stampo nulla e salvo "true" in "checkResult"
                checkResult = true;
            }

            // infine torno "checkResult"
            return checkResult
        }
        // END REGISTRATION FORM CATEGORIES VALIDATION

    </script>
@endsection