@extends('layouts.app')
@section('content')
    <div>
        <h1>Area privata di {{$user->business_name}}</h1>
        <div>Email: {{$user->email}}</div>
        <div>Indirizzo: {{$user->address}}</div>
        <div>Partita IVA: {{$user->vat}}</div>

        <img src="{{asset('storage/' . $user->cover)}}" alt="" style="width:200px">
    </div>
@endsection