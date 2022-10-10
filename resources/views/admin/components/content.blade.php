@extends('layouts.app')

@section('body_content')
    @include('admin.components.header')

    <div class="d-flex">
        <aside>
            <nav class="d-flex flex-column">
                <ul>
                    <li class="d-flex">
                        <i class="align-self-center mr-2 fa-solid fa-house"></i>
                        <a href="{{route('admin.home')}}">Home</a>
                    </li>

                    <li class="d-flex">
                        <i class="align-self-center mr-2 fa-solid fa-user"></i>
                        <a href="{{route('admin.users.edit', ['user' => $user->id])}}">Modifica profilo</a>
                    </li>

                    <li class="d-flex">
                        <i class="align-self-center mr-2 fa-solid fa-utensils"></i>
                        <a href="{{route('admin.products.index')}}">Il mio Menu</a>
                    </li>

                    <li class="d-flex">
                        <i class=" mr-2 align-self-center fa-solid fa-plus"></i>
                        <a href="{{route('admin.products.create')}}">Aggiungi prodotto</a>
                    </li>

                    <li class="d-flex">
                        <i class="align-self-center mr-2 fa-solid fa-bag-shopping"></i>
                        <a href="{{route('admin.orders')}}">I miei ordini</a>
                    </li>

                    <li class="d-flex">
                        <i class="align-self-center mr-2 fa-solid fa-chart-line"></i>
                        <a href="{{route('admin.statistics')}}">Statistiche ordini</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <main class="flex-grow-1">
            @yield('main_content')
        </main>
    </div>
@endsection
