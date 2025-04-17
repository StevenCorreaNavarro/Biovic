<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <title>Registro equipos</title>
</head>

<body>
    @extends('admin.admin.layouts.app')
    @section('content')
        <div class="form-container " style=" height: 100%">
            <h1>Registrar nombre de equipo</h1>
            <form class="cajon " action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- token o seguridad  --}}
                <div>
                    <label for="nombre_equipo" class="form-label">Escribe un equipo:</label>
                    <input type="text" id="equipo" name="nombre_equipo" class="news-input" list="equipos-list"   value="{{ old('nombre') }}" required>
                    <datalist id="equipos-list">
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->nombre_equipo }}" data-id="{{ $equipo->id }} "></option>
                        @endforeach
                    </datalist>
                </div>
                <br>
                @if ($errors->has('nombre_equipo'))
                    <div class="alert alert-danger">
                        {{ $errors->first('nombre_equipo') }}
                    </div>
                @endif
                <div>
                    <input type="submit" class="btn btn-primary" Value="Guardar" type="button" class="btn btn-primary">
                </div>
            </form>
        </div>






        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    @endsection
</body>

</html>
