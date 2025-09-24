<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Administrador-Biovic</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    {{-- <link rel="icon" href="{{ asset('atlantis/assets/img/icon.ico') }}" type="image/x-icon" /> --}}

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
                urls: ["{{ asset('atlantis/assets/css/fonts.min.css') }}"]
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
    <script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     // Esperar 1 segundo (1000 ms)
    //     setTimeout(function () {
    //         // Buscar el botón y simular un clic
    //         const toggleBtn = document.querySelector(".toggle-sidebar");
    //         if (toggleBtn) {
    //             toggleBtn.click();
    //         }
    //     }, 1000);
    // });
</script>

    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header class="main-header"-->
            <div class="logo-header scrollbar" data-background-color="blue">

                <a href="{{ route('menu') }}" class="logo d-flex align-items-center justify-content-center">
                    {{-- <img src=" {{ asset('IMG/logocircular.png') }}" alt="VitalSoft" height="40" alt="navbar brand"
                    class="navbar-brand"> --}}
                    <h1 class="logo  " style="font-weight: bold; color:white; padding:1%; font-size:40px">Vitalsoft</h1>
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
            <nav class="navbar navbar-header navbar-expand-lg -10" data-background-color="blue2">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">

                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">


                        </li>
                        <li class="nav-item dropdown hidden-caret">


                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link {{ request()->routeIs(['menu']) ? 'po' : '' }}"
                                href="{{ route('menu') }}">Menu</a>

                        </li>
                        <li class="nav-item dropdown hidden-caret">

                            <a class="nav-link {{ request()->routeIs(['hoja_vida', 'hojadevida.*']) ? 'po' : '' }}"
                                href="{{ route('hoja_vida') }}">Hojas de Vida</a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">

                            <a class="nav-link {{ request()->routeIs(['mantenimiento']) ? 'po' : '' }}"
                                href="{{ route('mantenimiento') }}">Gestión de Mantenimiento</a>
                        </li>

                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link {{ request()->routeIs(['soporte']) ? 'po' : '' }} "
                                href="{{ route('soporte') }}">Soporte Técnico</a>

                        </li>
                        <li class="nav-item dropdown hidden-caret">

                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">


                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i
                                            class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hidden-caret">

                            <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">

                            </div>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    @if (Auth::check() && Auth::user()->foto)
                                        <div
                                            style="  position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%; box-shadow: 0px 0px 4px 1px   #003170bb; ">
                                            {{-- <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                                alt="Foto de perfil"
                                                style="width: 100%; height: auto; position: relative; "> --}}
                                            {{-- <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de perfil"
                                                style="width: 100%; height: auto; position: relative; "> --}}
                                            <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                                alt="Foto de perfil"
                                                style=" width: 100%; height: 100%; object-fit: cover; ">
                                        </div>
                                    @else
                                        <img src="{{ asset('atlantis/assets/img/perfil.png') }}" alt="..."
                                            class="avatar-img rounded-circle">
                                    @endif
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">

                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p><a
                                                    href="{{ asset('perfil') }}"
                                                    class="btn btn-xs btn-secondary btn-sm text-white">ver
                                                    perfil</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                        <a class="dropdown-item" href="#">My Balance</a>
                                        <a class="dropdown-item" href="#">Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">@csrf</form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- End Navbar -->
        </div>













        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2 ">
                            @if (Auth::check() && Auth::user()->foto)
                                <div
                                    style="  position: relative; width: 45px; height: 45px; overflow: hidden; border-radius: 50%;box-shadow: 0px 0px 4px 1px   #0001017e; ">
                                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de perfil"
                                        style="  width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @else
                                <img src="{{ asset('atlantis/assets/img/perfil.png') }}" alt="..."
                                    class="avatar-img rounded-circle">
                            @endif
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
                                        <a href="#profile">
                                            <span class="link-collapse">My Profile</span>
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
                                    </li>
                                    <li>

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
                                        <a href="{{ asset('admin') }}">
                                            <span class="sub-item">Dashboard 1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('admin') }}">
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
                            <h4 class="text-section">Components</h4>
                        </li>



                        <li class="nav-item {{ request()->routeIs('adminlistaR.*') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#unit">
                                <i class="fas fa-layer-group"></i>
                                <p>Lista Hojas de vida</p>
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









                        <li class="nav-item {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#post">
                                <i class="fas fa-pen-square"></i>
                                <p>Registrar equipo</p>
                                <span class="caret"></span>
                            </a>

                            <div class="collapse {{ request()->routeIs('admin.*') ? 'show' : '' }}" id="post">
                                <ul class="nav nav-collapse">
                                    {{-- <li class="{{ request()->routeIs(['admin.create_tres']) ? 'active' : '' }}">
                                    <a href="{{ route('admin.create_tres') }}">
                                        <span class="sub-item">Crear modelo</span>
                                    </a>
                        </li>
                        <li class="{{ request()->routeIs(['admin.create_dos']) ? 'active' : '' }}">
                            <a href="{{ route('admin.create_dos') }}">
                                <span class="sub-item">Crear marca</span>
                            </a>
                        </li> --}}
                                    <li
                                        class="{{ request()->routeIs(['admin.create', 'admin.store']) ? 'active' : '' }}">
                                        <a href="{{ route('admin.create') }}">
                                            <span class="sub-item">Crear equipo</span>
                                        </a>
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
                                    </li>
                                    <li class="{{ request()->routeIs(['adminaso.asociarmod']) ? 'active' : '' }}">
                                        <a href="{{ route('adminaso.asociarmod') }}">
                                            <span class="sub-item">Asociar Modelo</span>
                                        </a>
                                    </li>



                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ request()->routeIs('adminlista.*') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#slider">
                                <i class="fas fa-th-list"></i>
                                <p>Listas</p>
                                <span class="caret"></span>
                            </a>

                            <div class="collapse {{ request()->routeIs('adminlista.*') ? 'show' : '' }}"
                                id="slider">
                                <ul class="nav nav-collapse">

                                    <li class="{{ request()->routeIs(['adminlista.listar_tres']) ? 'active' : '' }}">
                                        <a href="{{ route('adminlista.listar_tres') }}">
                                            <span class="sub-item">Lista modelos</span>
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

                                    <li class="{{ request()->routeIs(['adminlista.listar']) ? 'active' : '' }}">
                                        <a href="{{ route('adminlista.listar') }}">
                                            <span class="sub-item">Lista equipos</span>
                                        </a>
                                        {{-- <a href="">
                                            <span class="sub-item">lista</span>
                                        </a> --}}
                                    </li>
                                    <li>
                                        <a href="components/buttons.html">
                                            <span class="sub-item">Lista usuarios</span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#usuarios">
                                <i class="fas fa-layer-group"></i>
                                <p>Usuarios</p>
                                <span class="caret"></span>
                            </a>

                            <div class="collapse {{ request()->routeIs('user.*') ? 'show' : '' }}" id="usuarios">
                                <ul class="nav nav-collapse">
                                    <li
                                        class="{{ request()->routeIs(['user.listausers', 'user.listausers']) ? 'active' : '' }}">
                                        <a href="{{ route('user.listausers') }}">
                                            <span class="sub-item">Lista usuarios general</span>
                                        </a>
                                    </li>
                                    <li
                                        class="{{ request()->routeIs(['user.listaempleados', 'user.listaempleados']) ? 'active' : '' }}">
                                        <a href="{{ route('user.listaempleados') }}">
                                            <span class="sub-item">Lista empleados</span>
                                        </a>
                                    </li>

                                    <li
                                        class="{{ request()->routeIs(['user.listauseronly', 'user.listauseronly']) ? 'active' : '' }}">
                                        <a href="{{ route('user.listauseronly') }}">
                                            <span class="sub-item">Lista usuarios</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ request()->routeIs('propiedad.*') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#propiedad">
                                <i class="fas fa-layer-group"></i>
                                <p>Propiedad</p>
                                <span class="caret"></span>
                            </a>

                            <div class="collapse {{ request()->routeIs('propiedad.*') ? 'show' : '' }}"
                                id="propiedad">
                                <ul class="nav nav-collapse">
                                    <li
                                        class="{{ request()->routeIs(['propiedad.updateprop', 'propiedad.editpropiedad']) ? 'active' : '' }}">
                                        <a>
                                            <span class="sub-item">Actualizar</span>
                                        </a>
                                    </li>
                                    {{-- <li
                                        class="{{ request()->routeIs(['user.listaempleados', 'user.listaempleados']) ? 'active' : '' }}">
                                        <a href="{{ route('user.listaempleados') }}">
                                            <span class="sub-item">Lista empleados</span>
                                        </a>
                                    </li>

                                    <li
                                        class="{{ request()->routeIs(['user.listauseronly', 'user.listauseronly']) ? 'active' : '' }}">
                                        <a href="{{ route('user.listauseronly') }}">
                                            <span class="sub-item">Lista usuarios</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>



                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="
fas fa-clipboard-list"></i>
                                <p>Parametros</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    {{-- <li>
                                        <a href="components/avatars.html">
                                            <span class="sub-item">Usuarios</span>
                                        </a>
                                    </li> --}}
                                    <li
                                        class="{{ request()->routeIs(['user.listausers', 'user.*']) ? 'active' : '' }}">
                                        <a href="{{ route('user.listausers') }}">
                                            <span class="sub-item">Lista usuarios</span>
                                        </a>
                                    </li>

                                    {{-- <div class="collapse {{ request()->routeIs('user.*') ? 'show' : '' }}"
                            id="usuarios">
                            <ul class="nav nav-collapse">

                            </ul>
                    </div> --}}
                                    {{-- <li>
                                        <a href="components/buttons.html">
                                            <span class="sub-item"></span>
                                        </a>
                                    </li> --}}
                                    {{-- <li>
                                        <a href="components/gridsystem.html">
                                            <span class="sub-item">Grid System</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/panels.html">
                                            <span class="sub-item">Panels</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/notifications.html">
                                            <span class="sub-item">Notifications</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/sweetalert.html">
                                            <span class="sub-item">Sweet Alert</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/font-awesome-icons.html">
                                            <span class="sub-item">Font Awesome Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/simple-line-icons.html">
                                            <span class="sub-item">Simple Line Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/flaticons.html">
                                            <span class="sub-item">Flaticons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/typography.html">
                                            <span class="sub-item">Typography</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>































                        {{--
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Componentes</h4>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Base</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="components/avatars.html">
                                            <span class="sub-item">Avatars</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/buttons.html">
                                            <span class="sub-item">Buttons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/gridsystem.html">
                                            <span class="sub-item">Grid System</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/panels.html">
                                            <span class="sub-item">Panels</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/notifications.html">
                                            <span class="sub-item">Notifications</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/sweetalert.html">
                                            <span class="sub-item">Sweet Alert</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/font-awesome-icons.html">
                                            <span class="sub-item">Font Awesome Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/simple-line-icons.html">
                                            <span class="sub-item">Simple Line Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/flaticons.html">
                                            <span class="sub-item">Flaticons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/typography.html">
                                            <span class="sub-item">Typography</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#sidebarLayouts">
                                <i class="fas fa-th-list"></i>
                                <p>Sidebar Layouts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="sidebarLayouts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="sidebar-style-1.html">
                                            <span class="sub-item">Sidebar Style 1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="overlay-sidebar.html">
                                            <span class="sub-item">Overlay Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="compact-sidebar.html">
                                            <span class="sub-item">Compact Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="static-sidebar.html">
                                            <span class="sub-item">Static Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="icon-menu.html">
                                            <span class="sub-item">Icon Menu</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#forms">
                                <i class="fas fa-pen-square"></i>
                                <p>Forms</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="forms">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="forms/forms.html">
                                            <span class="sub-item">Basic Form</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#tables">
                                <i class="fas fa-table"></i>
                                <p>Tables</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="tables">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="tables/tables.html">
                                            <span class="sub-item">Basic Table</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables/datatables.html">
                                            <span class="sub-item">Datatables</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#maps">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>Maps</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="maps">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="maps/jqvmap.html">
                                            <span class="sub-item">JQVMap</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#charts">
                                <i class="far fa-chart-bar"></i>
                                <p>Charts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="charts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="charts/charts.html">
                                            <span class="sub-item">Chart Js</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="charts/sparkline.html">
                                            <span class="sub-item">Sparkline</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Widgets</p>
                                <span class="badge badge-success">4</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#submenu">
                                <i class="fas fa-bars"></i>
                                <p>Menu Levels</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="submenu">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a data-toggle="collapse" href="#subnav1">
                                            <span class="sub-item">Level 1</span>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="subnav1">
                                            <ul class="nav nav-collapse subnav">
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">Level 2</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">Level 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a data-toggle="collapse" href="#subnav2">
                                            <span class="sub-item">Level 1</span>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="subnav2">
                                            <ul class="nav nav-collapse subnav">
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">Level 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">Level 1</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> 
                    </ul> --}}
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel " style="background-color: rgb(245, 245, 245); ">
            <div class="">
                <div class="page-inner">
                    <div style="margin-top: 70px">
                        @yield('content')

                    </div>
                </div>
                <!-- <footer class="footer" >
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
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
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2018, made with <i class="fa fa-heart heart text-danger"></i> by <a
                            href="https://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer> -->
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
