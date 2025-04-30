<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VitalTech</title>
    <link rel="shortcut icon" href="/img/Logo_VitalTech2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="/path/to/styles.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    {{-- <link rel="stylesheet" href="CSS/menu.css"> --}}
    <link rel="icon" type="image/x-icon" href="/IMG/logotipo.png" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> --}}
</head>

<body>

    @extends('layouts.header')
   


    @include('sweetalert::alert')

    <main>
        <div class="container1">
            <img src="IMG/companeros-trabajo-negocios-dandose-mano-reunion-oficina-foco-hombre-negocios.jpg" alt="Descripción de la imagen" class="imagen">
            <div class="texto">
                <h1>Ofrecemos a nuestros clientes transparencia en tu gestión con Vitalsoft</h1>
                <p>En Vitalsoft, garantizamos el óptimo funcionamiento de tus equipos biomédicos con mantenimiento preventivo y correctivo rápido y eficaz. Asegura la fiabilidad y durabilidad de tus dispositivos con nuestro servicio especializado.

                </p>
            </div>
        </div>

        <!-- Carrusel -->
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <h2 class="titulo">Nuestros Servicios</h2>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000"> <!-- Velocidad de 5 segundos -->
                    <a href="/HTML/hojas_vida.html">
                        <img src="IMG/hoja de vida.webp" class="d-block w-100" alt="Hojas de Vida">
                        <h4 style="font-weight: bold;">Hojas de Vida</h4>
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="3000"> <!-- Velocidad de 5 segundos -->
                    <a href="/HTML/mantenimiento.html">
                        <img src="IMG/modulo_Ges_mante.webp" class="d-block w-100" alt="Gestión de Mantenimiento">
                        <h4 style="font-weight: bold;">Gestión de Mantenimiento</h4>
                    </a>
                </div>
                <div class="carousel-item" data-bs-interval="3000"> <!-- Velocidad de 5 segundos -->
                    <a href="/HTML/soporte.html">
                        <img src="IMG/modulo_soporte_tecnico.webp" class="d-block w-100" alt="Soporte Técnico">
                        <h4 style="font-weight: bold;">Soporte Técnico</h4>
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



        <section class="about-services">
            <div class="contenedor">

                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <img src="IMG/ilustracion1.svg" alt="Ilustración 1">
                        <a href="/HTML/hojas_vida.html" class="logo">HOJAS DE VIDA</a>
                        <p>Ofrecemos programas personalizados de mantenimiento preventivo para garantizar la longevidad y el rendimiento óptimo de tus equipos biomédicos.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="IMG/ilustracion2.svg" alt="Ilustración 2">
                        <a href="/HTML/mantenimiento.html" class="logo">GESTIÓN DE MANTENIMIENTO</a>
                        <p>Nuestro equipo de expertos está capacitado para proporcionar asistencia técnica inmediata y resolver cualquier pregunta o preocupación que puedas tener.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="IMG/preventivo.svg" alt="Preventivo">
                        <a href="/HTML/soporte.html" class="logo">SOPORTE TÉCNICO</a>
                        <p>Brindamos servicios rápidos y eficientes de mantenimiento correctivo para resolver cualquier problema que pueda surgir con tus equipos biomédicos.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="IMG/20943761.jpg" alt="Preventivo">
                        <a href="/HTML/soporte.html" class="logo">CONFIGURACIÓN</a>
                        <p>Brindamos servicios rápidos y eficientes de mantenimiento correctivo para resolver cualquier problema que pueda surgir con tus equipos biomédicos.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <footer class="bg-primary text-white text-center py-4">
        <div class="container">
            <h4>VitalSoft</h4>
            <p>&copy; Soluciones biomédicas a la medida</p>
            <div class="my-3">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
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
</body>

</html>