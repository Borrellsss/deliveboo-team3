@extends('admin.components.content')

@section('main_content')
    <div>
        <h1>Area privata di {{$user->business_name}}</h1>
        <div>Email: {{$user->email}}</div>
        <div>Indirizzo: {{$user->address}}</div>
        <div>Partita IVA: {{$user->vat}}</div>
    </div> 
@endsection


