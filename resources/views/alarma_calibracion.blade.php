<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VitalTech</title>
    <link rel="shortcut icon" href="/img/Logo_VitalTech2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/path/to/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="icon" type="image/x-icon" href="/IMG/logotipo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
</head>

<body>
    @extends('layouts.header')
    <main><br><br><br>
        <!-- <div class="image-hoja">
            <img src="IMG/M2-5 - Cronograma de Calibracion.jpg" alt="">
        </div> -->
        <h1 class="text-center">Cronograma de Calibracion</h1>

        
        <div class="row p-0 m-0">
                <div class="w-25  bg-black border border-light "><img src="{{ asset('IMG/logotipohancho.png') }}" height="100px" alt=""></div>
                <div class="w-25 p-3 bg-primary border border-light text-center text-white">CRONOGRAMA DE CALIBRACION</div>
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
                    <th style="font-size: 11px">ITEM</th>
                    <th style="font-size: 11px">UBICACACION</th>
                    <th style="font-size: 11px">EQUIPO</th>
                    <th style="font-size: 11px">MARCA</th>
                    <th style="font-size: 11px">MODELO</th>
                    <th style="font-size: 11px">SERIE</th>
                    <th style="font-size: 11px">ACTIVO FIJO</th>
                    <th style="font-size: 11px;">ENERO</th>
                    <th style="font-size: 11px">FEBRERO</th>
                    <th style="font-size: 11px">MARZO</th>
                    <th style="font-size: 11px">ABRIL</th>
                    <th style="font-size: 11px">MAYO</th>
                    <th style="font-size: 11px">JUNIO</th>
                    <th style="font-size: 11px">JULIO</th>
                    <th style="font-size: 11px">AGOSTO</th>
                    <th style="font-size: 11px">SEPTIEMBRE</th>
                    <th style="font-size: 11px">OCTUBRE</th>
                    <th style="font-size: 11px">NOVIEMBRE</th>
                    <th style="font-size: 11px">DICIEMBRE</th>
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