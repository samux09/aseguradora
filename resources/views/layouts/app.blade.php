<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm barra">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Dar Tranquilidad
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('paquetes.mostrar') }}">Paquetes</a>
                        </li>
                        @if(Auth::user())
                        <li class="nav-item">
                            @if(Auth::user()->tipo_usuario == 0)
                            @endif
                            @if (Auth::user()->tipo_usuario == 1)
                            <a class="nav-link" href="{{ route('polizas.mostrar') }}">Consultar Pólizas.</a>   
                            @else
                            <a class="nav-link" href="{{ route('paquetes.create') }}">Nuevo Páquete.</a>    
                            @endif
                        </li>
                        @endif
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="py-4 col-12">
                    @yield('botones')
                </div>

                <main class="py-4 col-12">
                    @yield('content')
                </main>
            </div>
        </div>

        <footer class="site-footer">
            <div class="contenedor clearfix">
                <div class="footer-informacion">
                    <h3>Sobre <span>Nosotros</span></h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt adipisci, laboriosam et cupiditate quidem ab dolor! Doloremque fugit inventore minima alias hic enim odio amet voluptates numquam? Ex, expedita voluptates!
                    </p>
                </div>
                <div class="ultimos-tweets">
                    <h3>Últimos <span>tweets</span></h3>
                    <ul>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam consectetur eius quae eligendi corporis adipisci blanditiis magni ab, in praesentium qui expedita dolorem totam odit velit explicabo fugit incidunt culpa.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam consectetur eius quae eligendi corporis adipisci blanditiis magni ab, in praesentium qui expedita dolorem totam odit velit explicabo fugit incidunt culpa.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam consectetur eius quae eligendi corporis adipisci blanditiis magni ab, in praesentium qui expedita dolorem totam odit velit explicabo fugit incidunt culpa.</li>
                    </ul>
                </div>
                <div class="menu">
                    <h3>Redes <span>sociales</span></h3>
                    <nav class="redes-sociales">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </nav>
                </div>
            </div>
    
            <p class="copyright">
                &copy Todos los derechos Reservados Equipo 3, Enero-Junio 2021.
            </p>
    
        </footer>


    </div>
</body>
</html>
