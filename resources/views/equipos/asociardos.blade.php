<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Registrar Profesor</title>
</head>

<body> @extends('admin.admin.layouts.app')
    @section('content')
        <div class="box-2">
            <div class="container" >
                <br>
                <center>
                    <h1>Asignar Modulo</h1>
                    <br>
                    <form action="{{ route('adminasomod.storeasomod') }}" method="POST" enctype="multipart/form-data">
                        @csrf {{-- token o seguridad  --}}
                        <br>
                        <div>
                            <h1>Marca</h1>
                            <label for="marca_id" class="form-label">Selecciona o escribe una marca:</label>
                            <input type="text" id="marca" name="marca_id" class="form-control" list="marca-list"
                                value="{{ old('nombre_marca') }}" required>
                            <datalist id="marca-list">
                                @foreach ($datoma as $marca)
                                <option value="{{ $marca->id }}" data-id="{{ $marca->marca_id }} {{ $marca->equipo }}">
                                    {{ $marca->nombre_marca }} -> {{ $marca->equipo->nombre_equipo ?? 'Sin equipo' }}
                                </option>
                            @endforeach
                            </datalist>
                        </div>
                        <br>
                        <div>
                            <h1>Modelo</h1>
                            <label for="nombre_modelo" class="form-label">Selecciona o escribe un modelo:</label>
                            <input type="text" id="modelo" name="nombre_modelo" class="form-control"
                                list="modelo-list" value="{{ old('nombre_modelo') }}" required>
                            <datalist id="modelo-list">
                                @foreach ($datomo as $equipo)
                                    <option value="{{ $equipo->nombre_modelo }}" data-id="{{ $equipo->id }} ">
                                        {{ $equipo->nombre_modelo }}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <br>
                        <br>
                        <button class="btn btn-primary" type="submit">Enviar Formulario:</button>
                        <br>
                        <br>
                        <br>
                    </form>
                </center>
    
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
            @endsection
</body>

</html>
