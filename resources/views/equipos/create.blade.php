<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <title>Registro equipos</title>
</head>

<body>
    @extends('admin.admin.layouts.app')

    @section('content')
        <div class="py-5 px-4">
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- token o seguridad  --}}
                <div class="col-md-4 position-relative">
                    <label for="nombre_equipo" class="form-label">Selecciona o escribe un equipo:</label>
                    <input type="text" id="equipo" name="nombre_equipo" class="form-control" list="equipos-list"
                        value="{{ old('nombre') }}" required>
                    <datalist id="equipos-list">
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->nombre_equipo }}" data-id="{{ $equipo->id }}"></option>
                        @endforeach
                    </datalist>
                </div>
                @if ($errors->has('nombre_equipo'))
                    <div class="alert alert-danger">
                        {{ $errors->first('nombre_equipo') }}
                    </div>
                @endif
                {{-- <label class="form-label">
                    <h4>Nombre equipo</h4>
                    <input class="form-control" type="text" style="width: 300px" name="nombre_equipo" class="form-control">
                </label> --}}



                <div class="d-flex gap-0 col-4 mx-auto">
                    <input type="submit" class="btn btn-primary" Value="Guardar" type="button" class="btn btn-primary">
                </div>
            </form>

        </div>













        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    @endsection
</body>

</html>
