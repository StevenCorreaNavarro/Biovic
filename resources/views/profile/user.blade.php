{{-- <x-app-layout>     NO BORRAR ESTO NI POR EL PTS
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
</x-app-layout> --}}




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de hoja de vida</title>
    <link rel="shortcut icon" href="/img/Logo_VitalTech2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/central.css">
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

        <center>
            <div class="cajon" id="formulario" action="{{ route('hojadevida.listar') }}">
                @if (Auth::check() && Auth::user()->foto)
                <div
                    style=" position: relative;  width: 200px;  height: 200px;  overflow: hidden;  border-radius: 50%; overflow: hidden; border-radius: 50%; box-shadow: 0px 0px 10px 0px #333333e0; ">
                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de perfil"
                        style="  width:auto ; height: 260px;"><br>

                </div><br>
                <h2 class=""> {{ Auth::user()->name }}</h2>
                @else
                <h2 class="bi bi-person-circle bi bi bi bi "> {{ Auth::user()->name }}</h2>
                @endif
            </div>
        </center>


        <br>

        <!-- <span class="caret">Nombre: {{ Auth::user()->name }}</span><br> -->
        <span class="user-level">
            <h6>Correo electronico:</h6> {{ Auth::user()->email }}
        </span><br>
        <span class="user-level">Rol: {{ Auth::user()->role }}</span><br>
        <span class="user-level">Identificacion: {{ Auth::user()->identity }}</span><br>

        <span class="user-level">Contacto: {{ Auth::user()->contact }}</span><br>
        <span class="user-level">Direccion: {{ Auth::user()->adress }}</span><br>
        <span class="user-level">Profesion: {{ Auth::user()->profession }}</span><br>
        <span class="user-level">Cargo: {{ Auth::user()->post }}</span><br>
    </div>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
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