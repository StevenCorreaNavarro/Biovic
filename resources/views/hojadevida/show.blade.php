<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <title>Title</title>
</head>

<body>
    @extends('layouts.header')
    <br><br><br>


    <div class="container">
        <h1>HOLA DESDE MOSTRAR</h1>
        <br>
        <td>
            @if ($hdvs->foto)
                <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $hdvs->foto }}" width="300"
                    alt="">
            @else
                <p>----no hay foto----</p>
            @endif
        </td>

        <div>
            <p><strong>Id:</strong> {{ $hdvs->id }}</p>
            <p><strong>Nombre:</strong>{{ $hdvs->equipo?->nombre_equipo ?? '---' }}</p>


            {{-- <p><strong>Identificación:</strong> {{ $presidente->identificacionpresidente }}</p>
        
        <p><strong>Apellido:</strong> {{ $presidente->apellidopresidente }}</p>
        <p><strong>Fecha de Nacimiento:</strong> {{ $presidente->nacimientopresidente }}</p>
        <p><strong>Año:</strong> {{ $presidente->añopresidente }}</p> --}}
        </div>
    </div>

    <a href="{{ url('hojadevida/listar') }}" class="btn btn-primary">
        <h3> Regresar </h3>
    </a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
