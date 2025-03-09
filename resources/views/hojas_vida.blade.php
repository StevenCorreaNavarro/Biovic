<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Descripción breve de la página para mejorar el SEO.">
    <title>VitalTech</title>
    <link rel="shortcut icon" href="img/Logo_VitalTech2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/styles.css">
    <link rel="stylesheet" href="css/hoja_vida.css">
    <link rel="icon" type="image/x-icon" href="IMG/logotipo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
</head>

<body>

    @extends('layouts.header')
    <main>
        <section class="portafolio mt-5">
            <h1 style="margin-top: 0rem; text-align:center">Hojas de vida</h1>
            <div class="contenedor">
                <div class="row">
                    <!-- <div class="col-md-4 mb-4">
                        <div class="imagen-port">
                            <img src="IMG/img1.jpg" alt="Descripción de la imagen">
                            <div class="hover-galeria">
                                <img src="IMG/icono1.png" alt="Icono">
                                <a class="tit-img1" href="equipos">
                                    <h1 style="font-size:larger; color:white">Equipos</h1>
                                </a>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-4 mb-4">
                        <div class="imagen-port">
                            <img src="IMG/img1.jpg" alt="Descripción de la imagen">
                            <div class="hover-galeria">
                                <img src="IMG/icono1.png" alt="Icono">
                                <a class="tit-img1" href="hojadevida/create">
                                    <h1 style="font-size:larger; color:white">Agregar hoja de vida</h1>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="imagen-port">
                            <img src="IMG/img3.jpg" alt="Descripción de la imagen">
                            <div class="hover-galeria">
                                <img src="IMG/icono1.png" alt="Icono">
                                <a href="subir_soporte">
                                    <h1 style="font-size:larger; color:white">Subir Soportes</h1>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="imagen-port">
                            <img src="IMG/img8.jpg" alt="Descripción de la imagen">
                            <div class="hover-galeria">
                                <img src="IMG/icono1.png" alt="Icono">
                                <a href="hoja_ver">
                                    <h1 style="font-size:larger; color:white">Ver hoja de vida</h1>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="imagen-port">
                            <img src="IMG/img4.jpg" alt="Descripción de la imagen">
                            <div class="hover-galeria">
                                <img src="IMG/icono1.png" alt="Icono">
                                <a href="descargar_hv">
                                    <h1 style="font-size:larger; color:white">Descargar</h1>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="imagen-port">
                            <img src="IMG/portatil_con_kpis.webp" alt="Descripción de la imagen">
                            <div class="hover-galeria">
                                <img src="IMG/icono1.png" alt="Icono">
                                <a href="editar_HV">
                                    <h1 style="font-size:larger; color:white">Editar</h1>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="imagen-port">
                            <img src="IMG/img5.jpg" alt="Descripción de la imagen">
                            <div class="hover-galeria">
                                <img src="IMG/icono1.png" alt="Icono">
                                <h1 style="font-size:larger; color:white">Eliminar registros</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-primary text-white text-center py-4">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>