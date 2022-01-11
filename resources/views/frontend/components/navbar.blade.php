<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(request()->routeIs('menu')) active @endif">
                <a class="nav-link" href="/menu">Menu</a>
            </li>
            <li class="nav-item @if(request()->routeIs('keranjang')) active @endif">
                <a class="nav-link" href="/keranjang">Cart</a>
            </li>
            <li class="nav-item @if(request()->routeIs('transaksi')) active @endif">
                <a class="nav-link" href="/transaksi/histori">Transaksi</a>
            </li>
        </ul>
        @auth
            @if(Auth::user()->hasRole('admin'))
               <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
            @else
                <a href="/user/profile" class="mr-2 btn btn-sm btn-secondary">Profile</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-secondary">Logout</button>
                </form>
            @endif
        @endauth
    </div>
</nav>
