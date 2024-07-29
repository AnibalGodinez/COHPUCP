<nav class="navbar navbar-expand-lg py-3" style="background-color: #0b45a1;">
    <div class="container-fluid">

        <div class="navbar-wrapper">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('white/img/favicon.png') }}" alt="Logo" style="width: 50px; height: auto;">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item" style="font-size: 1.0rem">
                    <a href="{{ url('/') }}" class="nav-link font-weight-bold {{ Request::is('/') ? 'text-dark' : '' }}">
                        <i class="fas fa-home"></i> Página principal
                    </a>
                </li>

                <li class="nav-item" style="font-size: 1.0rem">
                    <a href="{{ route('register') }}" class="nav-link font-weight-bold {{request()->routeIs('register') ? 'text-dark' : ''}}">
                        <i class="tim-icons icon-laptop"></i> Registrarse
                    </a>
                </li>

                <li class="nav-item"  style="font-size: 1.0rem">
                    <a href="{{ route('login') }}" class="nav-link font-weight-bold {{request()->routeIs('login') ? 'text-dark' : ''}}">
                        <i class="tim-icons icon-single-02"></i> Iniciar sesión
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
