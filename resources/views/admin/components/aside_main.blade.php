<div class="d-flex">
    <aside>
        <div>
            <a href="{{route('admin.home')}}">my home</a>
        </div>
        <div>
            <a href="{{route('admin.products.index')}}">my foods</a>
        </div>
        <div>
            <a href="">my orders</a>
        </div>
    </aside>
    <main>
        @yield('main_content')
    </main>
</div>