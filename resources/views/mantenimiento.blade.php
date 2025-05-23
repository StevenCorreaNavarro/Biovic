<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VitalTech</title>
    <link rel="shortcut icon" href="/img/Logo_VitalTech2.png"
        type="image/x-icon">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <link rel="stylesheet"
        href="/path/to/styles.css">

    <!-- <link rel="stylesheet" href="css/menu.css"> -->
    <link rel="stylesheet" href="    css/gestion_mantop.css">

    <link rel="icon" type="image/x-icon" href="IMG/logotipo.png" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>
    @extends('layouts.header')
    <br>
    <main>
        <h1 style="margin-top: 2rem; text-align:center">Gestion de Mantenimiento</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4" style="padding-left: 3rem; padding-right:3rem;margin:2rem">

            <div class="col">
                <div class="card h-100">
                    {{-- <a href="manto_crono/propiedadbuscar" style="text-decoration: none; "> --}}
                        <a href="manto_crono/propiedad" style="text-decoration: none; ">
                        <img src="IMG/reparacion1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h3 class="card-title  text-center">Cronograma de Mantenimiento</h3>
                        <p class="card-text">Registra y monitorea las fechas de mantenimiento para asegurar el óptimo funcionamiento de tus equipos biomédicos</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    
                    {{-- <a href="check_list/propiedadbuscar" style="text-decoration: none;"> --}}
                        <a href="check_list/propiedad" style="text-decoration: none;">
                        <img src="IMG/monitor.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h3 class="card-title text-center">Lista de Verificacion</h3>
                        <p class="card-text">Registra y monitorea las fechas de mantenimiento para asegurar el óptimo funcionamiento de tus equipos biomédicos.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    {{-- <a href="crono_cali/propiedadbuscar" class="text-decoration-none"> --}}
                        <a href="crono_cali/propiedad" class="text-decoration-none">
                        <img src="IMG/reparacion3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h3 class="card-title  text-center">Cronograma de Calibracion</h3>
                        <p class="card-text">Genera alarmas, imprime y guarda reportes para una gestión eficiente del mantenimiento.</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <a href="alarma_calibracion">
                        <img src="IMG/reparacion2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title text-center">Alarmas</h3>
                            <p class="card-text">Genera alarmas y gestiona reportes para mantener un control eficiente del mantenimiento.</p>
                        </div>
                    </a>

                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <a href="inventario">
                        <img src="IMG/reparacion2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title text-center">Inventario fisico</h3>
                            <p class="card-text">Genera alarmas y gestiona reportes para mantener un control eficiente del mantenimiento.</p>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </main>

    <footer
        class="bg-primary text-white text-center py-4">
        <div class="container">
            <h4>Vitalsoft</h4>
            <p>&copy; Soluciones biomedicas a la
                medida</p>

            <div class="my-3">
                <a href="#" class="text-white me-3"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i
                        class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i
                        class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i
                        class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>

</html>




