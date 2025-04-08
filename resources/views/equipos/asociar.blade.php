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
    <title>Marca->equipo</title>

</head>

<body> @extends('admin.admin.layouts.app')
    @section('content')
        <div class="form-container">
            <h1>Asignar marca a equipo</h1>
            <form class="cajon" action="{{ route('adminaso.storeaso') }}" method="POST" enctype="multipart/form-data">
                <br>

                <br>
                @csrf {{-- token o seguridad  --}}
                <div>
                    <h2>Equipo</h2>
                    <label for="equipo_id" class="form-label">Selecciona un equipo:</label>
                    <input type="text" id="equipo" name="equipo_id" class="form-control" list="equipos-list"
                        value="{{ old('nombre_equipo') }}" required>
                    <datalist id="equipos-list">
                        @foreach ($datoe as $equipo)
                            <option value="{{ $equipo->id }}" data-id="{{ $equipo->equipo_id }} ">
                                {{ $equipo->nombre_equipo }}
                            </option>
                        @endforeach
                    </datalist>
                </div>
                <br>
                <div>
                    <h2>Marca</h2>
                    <label for="nombre_marca" class="form-label">Selecciona o escribe una marca:</label>
                    <input type="text" id="marca" name="nombre_marca" class="form-control" list="marca-list"
                        value="{{ old('nombre_marca') }}" required>
                    <datalist id="marca-list">
                        @foreach ($datom as $marca)
                            <option value="{{ $marca->nombre_marca }}" data-id="{{ $marca->id }} ">
                                {{ $equipo->nombre_marca }}
                            </option>
                        @endforeach
                    </datalist>
                </div>
                <br>

                <button class="btn btn-primary" type="submit">Enviar Formulario:</button>
                <br><br>
            </form>


        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    @endsection
</body>

</html>
