<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViltalSoft</title>
    <!-- <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"> -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- <meta charset="UTF-8"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <title>Ingreso de hoja de vida</title> -->
    {{-- <link rel="shortcut icon" href="img/logobiomed.png" type="image/x-icon"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="IMG/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




</head>

<body>
    {{-- @extends('layouts.header') --}}



    <header>
        <nav class="navbar navbar-expand-lg  fixed-top" style="    padding-left: 5%;   padding-right: 5%;">
            <div class="container-fluid ">
                <a class="navbar-brander d-flex" href="main"
                    style="text-decoration: none;margin: 0%;    padding: 0%;">
                    <img src="IMG/logobiomed.png" alt="biovic" height="40">
                    <h1 style="text-decoration: none;  ">Biomedic</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-0 my-lg-0 navbar-nav-scroll"
                        style=" --bs-scroll-height: 100px; margin-left: 2%; margin-right:2%">
                        @guest
                            @if (Route::has('login'))
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <!-- <a class="nav-link {{ request()->routeIs(['hoja_vida', 'hojadevida.*']) ? 'po' : '' }}"
                                                                href="{{ route('hoja_vida') }}">Hojas de Vida</a> -->
                                <a class="nav-link dropdown-toggle {{ request()->routeIs(['hoja_vida', 'hojadevida.*', 'hoja_ver']) ? 'po' : '' }}"
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

                        @endguest
                        <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="true" href="{{ route('login') }}">Iniciar sesión</a>
                    </li> -->
                    </ul>
                    <ul class="navbar-nav my-0 my-lg-0 navbar-nav-scroll"
                        style="--bs-scroll-height: 100px; padding-right: 0%;">
                        <li class="nav-item">
                            {{-- <a class="nav-link" aria-current="true" href="{{ route('login') }}">Iniciar sesión</a> --}}
                            @guest
                                @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('login') }}">Iniciar sesión</a>
                                {{-- <button class="button"><a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a></button> --}}
                            </li>
                            @endif
                        @else
                            {{-- despliegue --}}
                            {{-- <div class="collapse navbar-collapse" id="navbarNavDropdown"> --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle button" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

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
                                            class="bi bi-person-circle bi bi bi bi dropdown-item "> Perfil</a>
                                    @endif

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item " href="#">Mi Perfil</a>
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
                                        @csrf</form>
                                </div>
                            </li>
                            </li>
                        </ul>
                    </div>


                    </li>
                @endguest
                </li>
                </ul>
            </div>
        </nav>


        <!-- Sección Hero -->
        <div class="hero d-flex flex-column ">
            <section class="">
                <h1 class="hero__title">ViltalSoft</h1>
                <p class="hero__paragraph"> Soluciones Inteligentes para la Gestión y Mantenimiento de Equipos
                    Biomédicos</p>
                <center>
                    <a href="#" class="cta">Agendar demo</a>
                </center>

            </section>

        </div>

    </header>



    <main>

        <section class="container about  ">
            <h1 class="subtitle">¿Qué beneficios tendras con nosotros?</h1>
            <p class="about__paragraph">Al contratar los servicios de VitalSoft, los clientes obtienen confianza en la
                fiabilidad de sus equipos médicos y un servicio proactivo que garantiza la eficiencia y la seguridad del
                cuidado médico.</p>

            <div class="about__main">
                <article class="about__icons1">
                    <img src="IMG/centraliza_la_informacion2.png" class="about__icon">
                    <h3 class="about__title" style="margin-top: 4%;">Programación Preventiva </h3>
                    <p class="about__paragrah">Desarrollamos planes de mantenimiento preventivo adaptados a las
                        necesidades específicas de cada cliente</p>
                </article>

                <article class="about__icons2">
                    <img src="IMG/img13.jpg" class="about__icon">
                    <h3 class="about__title" style="margin-top: 1.7%;">Servicio Técnico Especializado</h3>
                    <p class="about__paragrah">Contamos con un equipo de técnicos altamente capacitados y certificados
                        en el mantenimiento de equipos biomédicos</p>
                </article>

                <article class="about__icons3">
                    <img src="IMG/solicitudes.webp" class="about__icon">
                    <h3 class="about__title" style="margin-top: 7.3%;">Cumplimiento Normativo</h3>
                    <p class="about__paragrah">Nos comprometemos a cumplir con los estándares de calidad más rigurosos
                        y las regulaciones de seguridad en el cuidado de la salud?</p>
                </article>
            </div>
        </section>

        <div class="exa ">
            <div class="container1 ">
                <img src="IMG/companeros-trabajo-negocios-dandose-mano-reunion-oficina-foco-hombre-negocios.jpg"
                    alt="Descripción de la imagen" class="imagen">
                <div class="texto">
                    <h1>Ofrecemos a nuestros clientes transparencia en tu gestión con Vitalsoft</h1>
                    <p>En Vitalsoft, garantizamos el óptimo funcionamiento de tus equipos biomédicos con mantenimiento
                        preventivo y correctivo rápido y eficaz. Asegura la fiabilidad y durabilidad de tus dispositivos
                        con
                        nuestro servicio especializado.

                    </p>
                    <div></div>
                </div>
            </div>
        </div>

        <!-- Carrusel -->
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <h1 class="titulo">Nuestros Servicios</h1>
            <div class="carousel-inner ">
                <div class="carousel-item active" data-bs-interval="3000"> <!-- Velocidad de 5 segundos -->
                    <a href="/HTML/hojas_vida.html">
                        <img src="IMG/hoja de vida.webp" class="d-block w-100" alt="Hojas de Vida">
                        <h3 style="font-weight: bold;">Hojas de Vida</h3>
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="3000"> <!-- Velocidad de 5 segundos -->
                    <a href="/HTML/mantenimiento.html">
                        <img src="IMG/modulo_Ges_mante.webp" class="d-block w-100" alt="Gestión de Mantenimiento">
                        <h3 style="font-weight: bold;">Gestión de Mantenimiento</h3>
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="3000"> <!-- Velocidad de 5 segundos -->
                    <a href="/HTML/soporte.html">
                        <img src="IMG/modulo_soporte_tecnico.webp" class="d-block w-100" alt="Soporte Técnico">
                        <h3 style="font-weight: bold;">Soporte Técnico</h3>
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br>

        <div class="exa ">
            <div class="container1 ">

                <div class="texto">
                    <h1>Creación, Ingreso y edicion de hojas de vida</h1>
                    <p>El ingreso de hojas de vida de equipos biomédicos implica registrar la información esencial
                        de
                        los dispositivos para un mantenimiento eficiente y seguro.

                    </p>
                    <a href="/HTML/hojas_vida.html" class="btn cta-btn">saber más</a>
                </div>
                <img src="IMG/img4.jpg" alt="Descripción de la imagen" class="imagen">
            </div>
        </div>

        {{-- <section class="dis-sto exa">
            <div class="container ">
                <div class="res-info">
                    <div>
                        <img src="IMG/solicitudes.webp" alt="">
                    </div>
                    <div class="res-des pad-rig">
                        <div class="global">
                            <h1 class="head hea-dark">Solicitudes de mantenimiento en la palma de tu mano</h1>
                        </div>
                        <p>
                            Conecta con tu entorno, permite a tus empleados, proveedores y clientes, solicitar trabajos
                            de
                            mantenimiento a sus equipos biomedicos a través del portal de solicitudes
                        </p>
                        <a href="mantenimiento_demosta" class="btn cta-btn">Saber más</a>
                    </div>
                </div>
            </div>
        </section> --}}

        <section>
            <div class="container ">
                <div class="res-info sabermas">
                    <div class="imagen-4">
                        <img src="IMG/Planificador.webp" alt="">
                    </div>
                    <div class="res-des pad-rig tx">
                        <div class="global">
                            <h1 class="head hea-dark">Solicitudes de mantenimiento en la palma de tu mano</h1>
                        </div>
                        <p>
                            Conecta con tu entorno, permite a tus empleados, proveedores y clientes, solicitar trabajos
                            de
                            mantenimiento a sus equipos biomedicos a través del portal de solicitudes
                        </p>
                        <a href="mantenimiento_demosta" class="btn cta-btn">Saber más</a>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section>
            <div class="container ">
                <div class="res-info  sabermas">

                    <div class="res-des pad-rig tx">
                        <div class="global">
                            <h1 class="head hea-dark">Realiza tus ordenes de trabajo </h1>
                        </div>
                        <p>
                            aplica el mantenimiento y
                            toma decisiones inteligentes con las capacidades y pronósticos sugeridos
                        </p>
                        <a href="orden_trabajo" class="btn cta-btn">Saber más</a>
                    </div>
                    <div class="imagen-4">
                        <img src="IMG/orden de trabajo.png" alt=" ">
                    </div>
                </div>
            </div>
        </section>
        <hr>
        {{-- <section class="disco">
            <div class="container">
                <div class="res-info">
                    <div class="res-des">
                        <div class="global">
                            <h1 class="head hea-dark">Creación, Ingreso y edicion de hojas de vida </h1>
                        </div>
                        <p>
                            El ingreso de hojas de vida de equipos biomédicos implica registrar la información esencial
                            de
                            los dispositivos para un mantenimiento eficiente y seguro.
                        </p>
                        <a href="/HTML/hojas_vida.html" class="btn cta-btn">saber más</a>
                    </div>
                    <div class="image-group pad-rig">
                        <img src="IMG/img4.jpg" alt="">
                    </div>
                </div>
            </div>
        </section> --}}


        <section>
            <div class="container ">
                <div class="res-info sabermas">
                    <div class="imagen-4">
                        <img src="IMG/Planificador.webp" alt="">
                    </div>
                    <div class="res-des pad-rig tx">
                        <div class="global">
                            <h1 class="head hea-dark">Planificadores de mantenimiento </h1>
                        </div>
                        <p>
                            Con la ayuda de VITALTECH, las operaciones de mantenimiento biomedico pasaran a ser mas
                            sencillas, potenciando los planes para mejorar la eficiencia y la precisión
                        </p>
                        <a href="/catalogo.html" class="btn cta-btn">saber más</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-services" style="background-color: #e2e2e2;">
            <div class="contenedor">

                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <img src="IMG/ilustracion1.svg" alt="Ilustración 1">
                        <a href="/HTML/hojas_vida.html" class="logo">HOJAS DE VIDA</a>
                        <p>Ofrecemos programas personalizados de mantenimiento preventivo para garantizar la longevidad
                            y el rendimiento óptimo de tus equipos biomédicos.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="IMG/ilustracion2.svg" alt="Ilustración 2">
                        <a href="/HTML/mantenimiento.html" class="logo">GESTIÓN DE MANTENIMIENTO</a>
                        <p>Nuestro equipo de expertos está capacitado para proporcionar asistencia técnica inmediata y
                            resolver cualquier pregunta o preocupación que puedas tener.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="IMG/preventivo.svg" alt="Preventivo">
                        <a href="/HTML/soporte.html" class="logo">SOPORTE TÉCNICO</a>
                        <p>Brindamos servicios rápidos y eficientes de mantenimiento correctivo para resolver cualquier
                            problema que pueda surgir con tus equipos biomédicos.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="IMG/20943761.jpg" alt="Preventivo">
                        <a href="/HTML/soporte.html" class="logo">CONFIGURACIÓN</a>
                        <p>Brindamos servicios rápidos y eficientes de mantenimiento correctivo para resolver cualquier
                            problema que pueda surgir con tus equipos biomédicos.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-primary text-white text-center py-4">
        <div class="container">
            <h4>Vitalsoft</h4>
            <p>&copy; Soluciones biomedicas a la medida</p>
            <div class="my-4 footer-social-icons">
                <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) { // Ajusta el valor según sea necesario
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>


    <!-- <script>
        const selectElement = function(element) {
            return document.querySelector(element);
        }

        let menuToggle = selectElement('.menu-toggle');
        let body = selectElement('body');

        menuToggle.addEventListener('click', function() {
            body.classList.toggle('open');
        })
    </script> -->

</body>

</html>
