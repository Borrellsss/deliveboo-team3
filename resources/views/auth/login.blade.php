@extends('layouts.app')

@section('body_content')
    {{-- START CARD --}}
    <div class="ms_form-card-wrapper ms_form-card-wrapper-login d-flex">
                    
        <div class="ms_form-card ms_login-card">
            <div class="ms_form-card-header">Login</div>

            <div class="ms_form-card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-center mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="ms_visible-label" for="remember">Ricordami</label>
                    </div>

                    <div class="text-center mb-4">
                        <button type="submit" class="ms_btn mb-2">Accedi</button>

                        @if (Route::has('password.request'))
                            <div class="ms_link">
                                <a href="{{ route('password.request') }}">Password dimenticata?</a>
                            </div>
                        @endif
                    </div>

                    <div class="text-center">
                        <div class="mb-2">
                            Non hai un account?
                        </div>
                        <a href="{{route('register')}}" class="ms_btn" style="margin: 0 auto">Registrati</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END CARD --}}
@endsection
