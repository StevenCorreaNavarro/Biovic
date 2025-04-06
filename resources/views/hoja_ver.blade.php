<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de hoja de vida</title>
    <link rel="shortcut icon" href="/img/Logo_VitalTech2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/hoja_ver.css">
    <link rel="icon" type="image/x-icon" href="/IMG/logotipo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
</head>
@extends('layouts.header')
<!-- 
<div class=" d-flex flex-column justify-content-center align-items-center text-center ">
                <form class="d-flex m-2" style="background-color: rgb(239, 239, 239); width: 100%" method="GET"
                    action="{{ route('user.listausers') }}">

                    <input class="form-control m-2" class="form-control" style="width: 400px" type="text" name="search"
                        placeholder="Buscar..." value="{{ request('search') }}">

                    <button class="btn btn-primary m-2" type="submit"><i class="bi bi-search"></i></button> <a
                        href="{{ route('user.listausers') }}"class="bi bi-arrow-repeat btn btn-primary m-2"></a>

    
            </a> --}}
                </form>
            </div> -->
<main>
    <div class="form-container">
        <h1>Ver hoja de vida</h1>
        <form class="cajon" id="formulario"  action="{{ route('hojadevida.listar') }}">
            <label>Nombre equipo</label>
            <input type="text" class="news-input" name="search"    value="{{ request('search') }}">


            <!-- <input class="form-control m-2" class="form-control" style="width: 400px" type="text" name="search"
                placeholder="Buscar..." value="{{ request('search') }}"> -->
            <!-- 
            <label for="registroInvima">Registro Invima</label>
            <input type="text" class="news-input" name="registroInvima" id="registroInvima">
            <label for="activoFijo">Activo fijo</label>
            <input type="text" class="news-input" name="activoFijo" id="activoFijo">
            <label for="fechaIngreso">Fecha de ingreso</label>
            <input type="date" class="news-input" name="fechaIngreso" id="fechaIngreso"> -->
            <input type="submit" value="Buscar hoja de vida" class="boton" id="botonBuscar">
        </form>
    </div>
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