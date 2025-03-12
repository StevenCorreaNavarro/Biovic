<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento_demostracion</title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ asset('css/header.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/mante_demostra.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ingreso de hoja de vida</title>
        <link rel="shortcut icon" href="/img/Logo_VitalTech2.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="/IMG/logotipo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    



</head>

<body>

    <header class="hero">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <a href="HTML/hojas_vida.html" style="margin-left: 3%; margin-right:3%; color:white"><i class="fa-solid fa-arrow-left" style="margin-left: 8%;" ></i></a> 

            <div class="container-fluid">
                <a class="navbar-brand" href="/HTML/main.html">VitalSoft
                    <img src="IMG/CutPaste_2024-08-02_10-48-31-556.png" alt="VitalSoft" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/HTML/main.html">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Link
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/HTML/hojas_vida.html">Hojas de Vida</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/HTML/mantenimiento.html">Gestión de Mantenimiento</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/HTML/soporte.html">Soporte Técnico</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/HTML/soporte.html">Configuración</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/HTML/main.html">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Ordenes de trabajo</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="button" onclick="window.location.href='https://www.google.com'">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <section class="hero__container container">
            <h1 class="hero__title">Realiza tus ordenes de trabajo.</h1>
            <p class="hero__paragraph">Te ofrecemos la facilidad de poder acceder a tus ordenes de trabajo, desde la palma de tu mano </p>
            <a href="#" class="cta">Agendar demo</a>
        </section>
    </header>

    <main>
        <section class="container about">
            <h2 class="subtitle">¿Qué beneficios tendras con nosotros?</h2>
            <p class="about__paragraph">Al contratar los servicios de VITALTECH,  los clientes obtienen confianza en la fiabilidad de sus equipos médicos y un servicio proactivo que garantiza la eficiencia y la seguridad del cuidado médico.</p>

            <div class="about__main">
                <article class="about__icons1">
                    <img src="IMG/centraliza_la_informacion2.png" class="about__icon">
                    <h3 class="about__title">Programación Preventiva </h3>
                    <p class="about__paragrah">Desarrollamos planes de mantenimiento preventivo adaptados a las necesidades específicas de cada cliente</p>
                </article>

                <article class="about__icons2">
                    <img src="IMG/img13.jpg" class="about__icon">
                    <h3 class="about__title">Servicio Técnico Especializado</h3>
                    <p class="about__paragrah">Contamos con un equipo de técnicos altamente capacitados y certificados en el mantenimiento de equipos biomédicos</p>
                </article>

                <article class="about__icons3">
                    <img src="IMG/solicitudes.webp" class="about__icon">
                    <h3 class="about__title">Cumplimiento Normativo</h3>
                    <p class="about__paragrah">Nos comprometemos a cumplir con los estándares de calidad más rigurosos y las regulaciones de seguridad en el cuidado de la salud?</p>
                </article>
            </div>
        </section>

      

        <section class="questions container">
            <h2 class="subtitle">Preguntas frecuentes</h2>

            <section class="questions__container">
                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Cuál es su enfoque en cuanto a la prevención de problemas?
                           
                        </h3>

                        <p class="questions__show">Nos enfocamos en el mantenimiento preventivo, realizando inspecciones regulares y ajustes para evitar fallas costosas y maximizar la vida útil de los equipos.</p>
                    </div>
                </article>

                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Qué experiencia tienen?  </h3>
                           
                      

                        <p class="questions__show">Tenemos una sólida experiencia en mantenimiento biomédico, respaldada por años de servicio y un equipo altamente capacitado.</p>
                    </div>
                </article>

                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Qué tipos de equipos biomédicos cubre su servicio de mantenimiento?
                            
                          
                        </h3>

                        <p class="questions__show">Cubrimos una amplia gama de equipos médicos, desde diagnóstico por imágenes hasta dispositivos de soporte vital.</p>
                    </div>
                </article>
            </section>

    </main>

    <footer class="bg-primary text-white text-center py-4" style="margin-top: 5%;">
        <div class="container">
            <h4>Vitalsoft</h4>
            <p>&copy; Soluciones biomedicas a la medida</p>
            <div class="my-3">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
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
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        // Esperar a que el DOM se cargue
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('.needs-validation');
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                // Añadir la clase 'was-validated' al formulario
                form.classList.add('was-validated');
            }, false);
        });
    </script>
</body>

</html>