<!DOCTYPE html>
<html lang="en">

<head>
    @section('cont')
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel="icon" href="{{ asset('atlantis/assets/img/icon.ico') }}" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Fonts and icons -->
        <script src="{{ asset('atlantis/assets/js/plugin/webfont/webfont.min.js') }}"></script>
        <script>
            WebFont.load({
                google: {
                    "families": ["Lato:300,400,700,900"]
                },
                custom: {
                    "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                        "simple-line-icons"
                    ],
                    urls: ['{{ asset('atlantis/assets/css/fonts.min.css') }}']
                },
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('atlantis/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('atlantis/assets/css/atlantis.min.css') }}">

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="{{ asset('atlantis/assets/css/demo.css') }}">
    </head>

    <body>
        <div class="wrapper">
            <div style="position: fixed";>
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="blue">
                    {{-- <img src=" http://localhost/biovic/public/IMG/CutPaste_2024-08-02_10-48-31-556.png " alt="VitalSoft" height="40"> --}}

                    <a href="{{ route('menu') }}" class="logo d-flex align-items-center justify-content-center">
                        <img src=" {{ asset('IMG/CutPaste_2024-08-02_10-48-31-556.png') }}" alt="VitalSoft" height="40"
                            alt="navbar brand" class="navbar-brand">
                        <h1 class="logo align-items-center justify-content-center"
                            style="font-weight: bold; color:white; padding:4%;">Biovic</h1>
                    </a>

                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon-menu"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="icon-menu"></i>
                        </button>
                    </div>
                </div>
                <!-- End Logo Header -->
                <!-- Navbar Header -->
                <!-- End Navbar -->
            </div>



            <!-- Sidebar -->
            <div class="sidebar sidebar-style-2">
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <div class="user">
                            <div class="avatar-sm float-left mr-2">
                                <img src="{{ asset('atlantis/assets/img/perfil.png') }}"alt="..."
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        {{ Auth::user()->name }}
                                        <span class="user-level">{{ Auth::user()->email }}</span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <div class="clearfix"></div>

                                <div class="collapse in" id="collapseExample">
                                    <ul class="nav">
                                        <li>
                                            <a href="">
                                                <span class="link-collapse">Perfil</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#edit">
                                                <span class="link-collapse">Edit Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#settings">
                                                <span class="link-collapse">Settings</span>
                                            </a>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><span
                                                    class="link-collapse">Cerrar Sesion</span>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">@csrf</form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <ul class="nav nav-primary">
                            <li class="nav-item {{ request()->routeIs('adminad.dashboard') ? 'active' : '' }}">
                                <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="dashboard">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="{{ asset('atlantis/demo1/index.html') }}">
                                                <span class="sub-item">Dashboard 1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('atlantis/demo2/index.html') }}">
                                                <span class="sub-item">Dashboard 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Componentes</h4>
                            </li>








                            

                            <li class="nav-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
                                <a data-toggle="collapse" href="#usuarios">
                                    <i class="fas fa-layer-group"></i>
                                    <p>Usuarios</p>
                                    <span class="caret"></span>
                                </a>

                                <div class="collapse {{ request()->routeIs('admin.*') ? 'show' : '' }}"
                                    id="usuarios">
                                    <ul class="nav nav-collapse">
                                        <li class="{{ request()->routeIs(['usuarios.create', 'usuarios.store']) ? 'active' : ''}}">
                                            <a href="{{ route('usuarios.create') }}">
                                                <span class="sub-item">Registrar usuario</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                                <a data-toggle="collapse" href="#post">
                                    <i class="fas fa-pen-square"></i>
                                    <p>Registrar equipo</p>
                                    <span class="caret"></span>
                                </a>

                                <div class="collapse {{ request()->routeIs('admin.*') ? 'show' : '' }}" id="post">
                                    <ul class="nav nav-collapse">
                                        <li
                                            class="{{ request()->routeIs(['admin.create', 'admin.store']) ? 'active' : '' }}">
                                            <a href="{{ route('admin.create') }}">
                                                <span class="sub-item">Crear equipo</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs(['admin.create_dos']) ? 'active' : '' }}">
                                            <a href="{{ route('admin.create_dos') }}">
                                                <span class="sub-item">Crear marca</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->routeIs(['admin.create_tres']) ? 'active' : '' }}">
                                            <a href="{{ route('admin.create_tres') }}">
                                                <span class="sub-item">Crear modelo</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item {{ request()->routeIs('adminlista.*') ? 'active' : '' }}">
                                <a data-toggle="collapse" href="#slider">
                                    <i class="fas fa-table"></i>
                                    <p>Listas equipos</p>
                                    <span class="caret"></span>
                                </a>

                                <div class="collapse {{ request()->routeIs('adminlista.*') ? 'show' : '' }}"
                                    id="slider">
                                    <ul class="nav nav-collapse">

                                        <li class="{{ request()->routeIs(['adminlista.listar']) ? 'active' : '' }}">
                                            <a href="{{ route('adminlista.listar') }}">
                                                <span class="sub-item">Lista equipos</span>
                                            </a>
                                            {{-- <a href="">
                                                <span class="sub-item">lista</span>
                                            </a> --}}
                                        </li>
                                        <li class="{{ request()->routeIs(['adminlista.listar_dos']) ? 'active' : '' }}">
                                            <a href="{{ route('adminlista.listar_dos') }}">
                                                <span class="sub-item">Lista marcas</span>
                                            </a>
                                            {{-- <a href="">
                                                <span class="sub-item">lista</span>
                                            </a> --}}
                                        </li>
                                        <li class="{{ request()->routeIs(['adminlista.listar_tres']) ? 'active' : '' }}">
                                            <a href="{{ route('adminlista.listar_tres') }}">
                                                <span class="sub-item">Lista modelos</span>
                                            </a>
                                            {{-- <a href="">
                                                <span class="sub-item">lista</span>
                                            </a> --}}
                                        </li>


                                    </ul>
                                </div>
                            </li>
                            
                            <li class="nav-item {{ request()->routeIs('adminaso.*') ? 'active' : '' }}">
                                <a data-toggle="collapse" href="#aso">
                                    <i class="fas fa-table"></i>
                                    <p>Asociar equipo</p>
                                    <span class="caret"></span>
                                </a>

                                <div class="collapse {{ request()->routeIs('adminaso.*') ? 'show' : '' }}"
                                    id="aso">
                                    <ul class="nav nav-collapse">

                                        <li class="{{ request()->routeIs(['adminaso.asociar']) ? 'active' : '' }}">
                                            <a href="{{ route('adminaso.asociar') }}">
                                                <span class="sub-item">Asociar marca</span>
                                            </a>
                                            {{-- <a href="">
                                                <span class="sub-item">lista</span>
                                            </a> --}}
                                        </li>


                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item {{ request()->routeIs('adminlistaR.*') ? 'active' : '' }}">
                                <a data-toggle="collapse" href="#unit">
                                    <i class="fas fa-layer-group"></i>
                                    <p>Lista registrada</p>
                                    <span class="caret"></span>
                                </a>

                                <div class="collapse {{ request()->routeIs('adminlistaR.*') ? 'show' : '' }}"
                                    id="unit">
                                    <ul class="nav nav-collapse">
                                        <li
                                            class="{{ request()->routeIs(['adminlistaR.lista_registrada']) ? 'active' : '' }}">
                                            <a href="{{ route('adminlistaR.lista_registrada') }}">
                                                <span class="sub-item">Lista General </span>
                                            </a>
                                        </li>

                                
                                    </ul>
                                </div>
                            </li>
                         
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div style="margin-top: 0%;background: rgb(246, 247, 249); ">



                {{-- @include('sweetalert::alert') --}}
                @yield('content')
                {{-- @extends('post.listardos')  --}}

                {{-- <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Dashboard</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Pages</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Starter Page</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">Inner page content goes here</div>
                </div> --}}
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="https://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Licenses
                                </a>
                            </li>
                        </ul> --}}
                    </nav>
                    <div class="copyright ml-auto">
                        {{ now()->day }}, {{ now()->year }}, made with <i class="fa fa-heart heart text-danger"></i>
                        by <a href="#">Jack Steven</a>
                    </div>
                </div>
            </footer>
        </div>

        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('atlantis/assets/js/core/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('atlantis/assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('atlantis/assets/js/core/bootstrap.min.js') }}"></script>

        <!-- jQuery UI -->
        <script src="{{ asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

        <!-- jQuery Scrollbar -->
        <script src="{{ asset('atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


        <!-- Chart JS -->
        <script src="{{ asset('atlantis/assets/js/plugin/chart.js/chart.min.js') }}"></script>

        <!-- jQuery Sparkline -->
        <script src="{{ asset('atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Chart Circle -->
        <script src="{{ asset('atlantis/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

        <!-- Datatables -->
        <script src="{{ asset('atlantis/assets/js/plugin/datatables/datatables.min.js') }}"></script>

        <!-- Bootstrap Notify -->
        <script src="{{ asset('atlantis/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

        <!-- jQuery Vector Maps -->
        <script src="{{ asset('atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

        <!-- Sweet Alert -->
        <script src="{{ asset('atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

        <!-- Atlantis JS -->
        <script src="{{ asset('atlantis/assets/js/atlantis.min.js') }}"></script>
    </body>

    </html>
