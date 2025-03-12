<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento_demostracion</title>
    <!-- <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"> -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- <meta charset="UTF-8"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <title>Ingreso de hoja de vida</title> -->
    <link rel="shortcut icon" href="img/Logo_VitalTech2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="IMG/logotipo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




</head>

<body>


    <header>
        <nav class="navbar navbar-expand-lg  fixed-top" style="    margin: 0%;   padding: 0%;">
            <div class="container-fluid" style="margin: 0%;    padding: 0%;">
                <a class="navbar-brander d-flex" href="main" style="text-decoration: none;margin: 0%;    padding: 0%;">
                    <h1 style="text-decoration: none; font-size:400%">Biovic</h1>
                    <img src="IMG/CutPaste_2024-08-02_10-48-31-556.png" alt="biovic" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <!-- <li class="nav-item">
                            <a class="nav-link" aria-current="true" href="{{ route('login') }}">Iniciar sesión</a>
                        </li> -->
                    </ul>
                </div>
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="true" href="{{ route('login') }}">Iniciar sesión</a>
                    </li>
                </ul>-
            </div>
        </nav>


        <!-- Sección Hero -->
        <div class="hero d-flex flex-column justify-content-center align-items-center text-center p-4">
            <section class=" container">
                <h1 class="hero__title">Biovic</h1>
                <p class="hero__paragraph"> Soluciones Inteligentes para la Gestión y Mantenimiento de Equipos Biomédicos</p>
                <a href="#" class="cta">Agendar demo</a>
            </section>
        </div>
    </header>



    <main>

        <section class="container about">
            <h1 class="subtitle">¿Qué beneficios tendras con nosotros?</h1>
            <p class="about__paragraph">Al contratar los servicios de VitalSoft, los clientes obtienen confianza en la fiabilidad de sus equipos médicos y un servicio proactivo que garantiza la eficiencia y la seguridad del cuidado médico.</p>

            <div class="about__main">
                <article class="about__icons1">
                    <img src="IMG/centraliza_la_informacion2.png" class="about__icon">
                    <h3 class="about__title" style="margin-top: 4%;">Programación Preventiva </h3>
                    <p class="about__paragrah">Desarrollamos planes de mantenimiento preventivo adaptados a las necesidades específicas de cada cliente</p>
                </article>

                <article class="about__icons2">
                    <img src="IMG/img13.jpg" class="about__icon">
                    <h3 class="about__title" style="margin-top: 1.7%;">Servicio Técnico Especializado</h3>
                    <p class="about__paragrah">Contamos con un equipo de técnicos altamente capacitados y certificados en el mantenimiento de equipos biomédicos</p>
                </article>

                <article class="about__icons3">
                    <img src="IMG/solicitudes.webp" class="about__icon">
                    <h3 class="about__title" style="margin-top: 7.3%;">Cumplimiento Normativo</h3>
                    <p class="about__paragrah">Nos comprometemos a cumplir con los estándares de calidad más rigurosos y las regulaciones de seguridad en el cuidado de la salud?</p>
                </article>
            </div>
        </section>

        <section class="dis-sto">
            <div class="container">
                <div class="res-info">
                    <div>
                        <img src="IMG/solicitudes.webp" alt="">
                    </div>
                    <div class="res-des pad-rig">
                        <div class="global">

                            <h1 class="head hea-dark">Solicitudes de mantenimiento en la palma de tu mano</h1>

                        </div>

                        <p>
                            Conecta con tu entorno, permite a tus empleados, proveedores y clientes, solicitar trabajos de
                            mantenimiento a sus equipos biomedicos a través del portal de solicitudes
                        </p>
                        <a href="mantenimiento_demosta" class="btn cta-btn">Saber más</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="taste bt">
            <div class="container">
                <div class="flex-container">
                    <div class="text-content">
                        <h2 class="h2-sub">
                            <span class="fil text-black " style="color:white;">Realiza tus ordenes de trabajo</span>
                        </h2>
                        <p style="color: white; " class=" text-black  ">Obtén un mayor control sobre tus operaciones, aplica el mantenimiento y
                            toma decisiones inteligentes con las capacidades y pronósticos sugeridos
                        </p>
                        <a href="orden_trabajo" class="btn cta-btn">Saber más</a>
                    </div>
                    <div class="image-content">
                        <img src="IMG/orden de trabajo.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="disco">
            <div class="container">
                <div class="res-info">
                    <div class="res-des">
                        <div class="global">

                            <h1 class="head hea-dark">Creación, Ingreso y edicion de hojas de vida </h1>

                        </div>
                        <p>

                            El ingreso de hojas de vida de equipos biomédicos implica registrar la información esencial de
                            los dispositivos para un mantenimiento eficiente y seguro.
                        </p>
                        <a href="/HTML/hojas_vida.html" class="btn cta-btn">saber más</a>
                    </div>
                    <div class="image-group pad-rig">
                        <img src="IMG/img4.jpg" alt="">


                    </div>
                </div>
            </div>
        </section>


        </div>
        </section>

        <section>
            <div class="container">
                <div class="res-info">
                    <div class="imagen-4">
                        <img src="IMG/Planificador.webp" alt="">

                    </div>
                    <div class="res-des pad-rig">
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
    </main>
    <footer class="bg-primary text-white text-center py-4">
        <div class="container">
            <h4>Vitalsoft</h4>
            <p>&copy; Soluciones biomedicas a la medida</p>

            <div class="my-3 footer-social-icons">
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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


    <!-- <script>
        const selectElement = function (element) {
            return document.querySelector(element);
        }

        let menuToggle = selectElement('.menu-toggle');
        let body = selectElement('body');

        menuToggle.addEventListener('click', function () {
            body.classList.toggle('open');
        })
    </script> -->

</body>

</html>