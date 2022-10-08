@extends('admin.components.content')

@section('main_content')
    <section>
        <div class="ms_user-home-info">
            <h1>
                Area privata di
                <span>
                    {{$user->business_name}}
                </span>
            </h1>
            <div>
                <span>Email:</span>
                {{$user->email}}
            </div>
            <div>
                <span>Indirizzo:</span>
                {{$user->address}}
            </div>
            <div>
                <span>Partita IVA:</span>
                {{$user->vat}}
            </div>
        </div>
        
    </section> 
@endsection