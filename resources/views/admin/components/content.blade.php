@extends('layouts.app')

@section('body_content')
    @include('admin.components.header')

    <div class="d-flex">
        <aside>
            <nav class="d-flex flex-column">
                <ul>
                    <li>
                        <i class="fa-solid fa-house"></i>
                        <a href="{{route('admin.home')}}">Home</a>
                    </li>

                    <li>
                        <i class="fa-solid fa-utensils"></i>
                        <a href="{{route('admin.products.index')}}">Il mio Menu</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <main class="flex-grow-1">
            @yield('main_content')
        </main>
    </div>
@endsection
