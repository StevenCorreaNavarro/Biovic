<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name','Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('IMG/logobiomed.png') }}" type="image/x-icon">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- styles tw --}}
    <link rel="stylesheet" href="{{ asset('CSS/header.css') }}">
    {{-- <link rel="stylesheet" href="css/header.css"> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .active {
            color: #ffffff;
        }
        .animated-dropdown {
  opacity: 0;
  transform: translateY(10px);
  transition: opacity 0.3s ease, transform 0.3s ease;
}

.dropdown.show .animated-dropdown {
  opacity: 1;
  transform: translateY(0);
}
    </style>

</head>

<body class="font-sans antialiased">
    {{-- <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
    </div>
    </header>
    @endif

    <!-- Page Content -->
    {{-- <main>
                {{ $slot }}
    </main>
    </div> --}}

    <header>
        <nav class="navbar navbar-expand-lg  fixed-top ">
            {{-- <a href="/HTML/menu.html" style="margin-left: 1%; margin-right:1%">
                <i class="fa-solid fa-arrow-left" style="margin-left: 5%; color:white"></i>
            </a> --}}
            <div class="container-fluid azul">
                <a class="navbar-brander d-flex" href="{{ asset('main') }}"
                    style="text-decoration: none;margin: 0%; ">
                    <img src="{{ asset('IMG/logobiomed.png') }}" alt="biovic" height="40" >
                    <h1 class="biom" style="text-decoration: none;  ">Biomedic</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-0 my-lg-0 navbar-nav-scroll" style=" --bs-scroll-height: 100%;">
                        <!-- <li><a class="nav-link" href="{{ route('menu') }}"><i class="bi bi-house"></i></a></li> -->
                        <!-- <li><a class="nav-link {{ request()->routeIs(['menu']) ? 'po' : '' }}"
                                href="{{ asset('/') }}">Menu</a></li> -->
                        <li class="nav-item dropdown">
                            {{-- <a class="nav-link {{ request()->routeIs(['hoja_vida', 'hojadevida.*']) ? 'po' : '' }}"
                                href="{{ route('hoja_vida') }}">Hojas de Vida</a>  --}}
                            <a class="nav-link dropdown dropdown-toggle {{ request()->routeIs(['hoja_vida', 'hojadevida.*', 'hoja_ver']) ? 'po' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hojas de Vida
                            </a>
                            <ul class="dropdown-menu">
                                @if ((Auth::check() && Auth::user()->role === 'Admin') || Auth::user()->role === 'Empleado')
                                    <li><a class="dropdown-item " href="{{ asset('hojadevida/create') }}">Generar hoja
                                            de vida</a></li>
                                    {{-- <div class="dropdown-divider"></div> --}}

                                    {{-- <li><a class="dropdown-item" href="{{ asset('subir_soporte') }}">Subir soporte</a>
                                    </li> --}}

                                    <li><a class="dropdown-item" href="{{ asset('hojadevida/listar') }}">Lista hojas de
                                            vida</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ asset('verhojadevida') }}">Consultar hoja de
                                        vida</a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li> --}}
                        {{-- <a class="nav-link {{ request()->routeIs(['mantenimiento']) ? 'po' : '' }}"
                                href="{{ route('mantenimiento') }}">Gestión de Mantenimiento</a> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs(['mantocrono.*', 'alarma', 'check_list.*', 'cronocali.*', 'inventario']) ? 'po' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestión de Mantenimiento
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ asset('manto_crono/propiedad') }}">Cronograma de
                                        Mantenimiento</a></li>
                                {{-- <li><hr class="dropdown-divider"></li> --}}
                                <li><a class="dropdown-item" href="{{ asset('crono_cali/propiedad') }}">Cronograma de
                                        Calibracion</a></li>
                                <li><a class="dropdown-item" href="{{ asset('check_list/propiedad') }}">Lista de
                                        verificacion</a></li>
                                <li><a class="dropdown-item" href="{{ asset('alarma_calibracion') }}">Alarmas</a></li>



                                <li><a class="dropdown-item" href="{{ asset('inventario') }}">Inventario fisico</a>
                                </li>
                            </ul>
                        </li>
                        {{-- </li> --}}
                        <li>
                            <a class="nav-link {{ request()->routeIs(['soporte']) ? 'po' : '' }} "
                                href="{{ route('soporte') }}">Soporte Técnico
                            </a>
                        </li>
                        @if (Auth::check() && Auth::user()->role === 'Admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('adminlistaR.lista_registrada') }}">Panel de Administración</a>
                            </li>
                        @endif
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Link
                            </a>
                            <ul class="dropdown-menu">

                                <li>
                                    <hr class="dropdown-divider">

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link disabled nav-link active" aria-disabled="true">Menú Principal</a>
                        </li> --}}
                    </ul>
                    <ul style="margin: 0%; padding: 0%; list-style: none;">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                            @endif
                            {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <button class="button">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                        </button>
                        </li>
                        @endif --}}
                        @else
                            {{-- despliegue --}}
                            {{-- <div class="collapse navbar-collapse" id="navbarNavDropdown"> --}}

                        </ul>
                    </div>
                    <div class="collapse navbar-collapse" style="  justify-content: end; padding-right:2%;"
                        id="navbarScroll">
                        <ul class="nav-link  navbar-nav-scrol">
                            <a id="navbarDropdown  " class="nav-link  button" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>


                                @if (Auth::check() && Auth::user()->foto)
                                    <div style="margin-left:9% position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%; box-shadow: 0px 0px 4px 1px   #003170bb;"">

                                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de perfil"
                                            style="  width: 100%; height: 100%; object-fit: cover; ">
                                    </div>
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end my-2" aria-labelledby="navbarDropdown">
                                @if (Auth::check() && Auth::user()->foto)
                                    <a class="dropdown-item " href="{{ asset('perfil') }}">
                                        {{-- <div style="  position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%;">
                                                <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                                    alt="Foto de perfil"
                                                    style="width: 100%; height: auto; position: relative; ">
                                                
                                            </div> --}}
                                        {{-- <div> 
                                                {{ Auth::user()->name }}
                                            </div> --}}
                                        {{ Auth::user()->name }}
                                    </a>
                                @else
                                    <a href="{{ asset('perfil') }}"
                                        class="bi bi-person-circle bi bi bi bi dropdown-item ">
                                        Perfil</a>
                                @endif


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="{{ asset('perfil') }}">Mi Perfil</a>
                                <a class="dropdown-item" href="#">Notificaciones</a>
                                <a class="dropdown-item" href="#">Favoritos</a>
                                <a class="dropdown-item" href="/HTML/soporte.html">Configuración</a>
                                {{-- <a class="dropdown-item" href="{{froute('fav.show')}}">favoritoa</a> --}}

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item my-11" href="#">Configuraciones de Cuenta </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf

                                </form>
                            </div>
                        </ul>
                    </div>
                @endguest
            </div>
            </ul>



        </nav>
    </header>









</body>

</html>
