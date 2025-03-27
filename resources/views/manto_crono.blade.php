<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VitalTech</title>
    <link rel="shortcut icon" href="/img/Logo_VitalTech2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/path/to/styles.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/menu.css"> -->
    <link rel="icon" type="image/x-icon" href="/IMG/logotipo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: small;
        }
        tr,th {
            /* border: 1px solid black; */
            font-size: smaller;
        }
    </style>
</head>

<body>
    @extends('layouts.header')
    <main>
        <!-- <div class="image-hoja">
            <img src="IMG/M2-5 - Cronograma de Mantenimiento.jpg" alt="">
        </div> -->

        <br><br>
        <div>
            <h1 class="text-center">Cronograma de Mantenimiento</h1>
            <p class="text-center">El cronograma de mantenimiento es una herramienta que permite planificar y organizar las actividades de mantenimiento de una empresa o institución. En este documento se detallan las tareas de mantenimiento preventivo y correctivo que se deben realizar en un determinado periodo de tiempo.</p>
            <p class="text-center">El objetivo del cronograma de mantenimiento es garantizar que los equipos, maquinarias e instalaciones de una empresa funcionen de manera óptima y segura. Para ello, se establecen las fechas en las que se deben realizar las tareas de mantenimiento, así como los recursos necesarios para llevarlas a cabo.</p>
            <p class="text-center">El cronograma de mantenimiento es una herramienta fundamental para la gestión del mantenimiento de una empresa, ya que permite planificar las actividades de mantenimiento de forma eficiente y ordenada. Además, facilita la asignación de recursos y la programación de las tareas de mantenimiento, lo que contribuye a mejorar la eficiencia y la productividad de la empresa.</p>
            <p class="text-center">En resumen, el cronograma de mantenimiento es una herramienta que permite planificar y organizar las actividades de mantenimiento de una empresa de manera eficiente y ordenada, lo que contribuye a mejorar la eficiencia y la productividad de la empresa.</p>
        </div>


        <div>
            <div class="row p-0 m-0">
                <div class="w-25  bg-black border border-light "><img src="{{ asset('IMG/logotipohancho.png') }}" height="100px" alt=""></div>
                <div class="w-25 p-3 bg-primary border border-light text-center text-white">CRONOGRAMA DE MANTENIMIENTO</div>
                <div class="w-25 p-3 bg-primary border border-light text-center">
                    <h5> version:</h5>
                    <h5> codigo:</h5>
                    <h5> proceso:</h5>
                </div>
                <div class="w-25 p-3 bg-primary border border-light text-center  text-white">1</div>
            </div>
            <table class="table  table-striped table-hover">

                <thead>
                    <tr>
                        <th>ITEM</th>
                        <th>UBICACACION</th>
                        <th>EQUIPO</th>
                        <th>MARCA</th>
                        <th>MODELO</th>
                        <th>SERIE</th>
                        <th>ENERO</th>
                        <th>FEBRERO</th>
                        <th>MARZO</th>
                        <th>ABRIL</th>
                        <th>MAYO</th>
                        <th>JUNIO</th>
                        <th>JULIO</th>
                        <th>AGOSTO</th>
                        <th>SEPTIEMBRE</th>
                        <th>OCTUBRE</th>
                        <th>NOVIEMBRE</th>
                        <th>DICIEMBRE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="font-size: 8px">
                            <h6>1</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6 style="white-space: nowrap ">AMBULANCIA-ORO 238</h6>
                        </th>
                        <th style="font-size:8px">
                            <h6>equipo</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>item</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>Ubicacion</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>equipo</h6>
                        </th>
                        <th style="font-size: 8px ;  background-color:yellow ;">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px ;  background-color:yellow ;">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px ">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px ;  background-color:yellow ;">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>x</h6>
                        </th>
                        <th style="font-size: 8px">
                            <h6>x</h6>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
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