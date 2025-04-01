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
    <title>Title</title>
</head>

<body> @extends('admin.admin.layouts.app')

    @section('content')


    <div class="container mt-5">
        <h1 class="text-center">Listado de Equipos</h1>
        <div class="d-flex justify-content-end mb-3">
            <table class="table table-bordered table-striped mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>foto</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Nombre del Equipo</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hdvs as $hdv)
                    <tr>
                        <td>{{ $hdv->id }}</td>
                        <td class="dropend" style="padding: 0%" width="50">
                            @if ($hdv->foto)
                            <img style="padding: 0%" src="{{ asset('storage/' . $hdv->foto) }}" width="50" height="50"
                                type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <ul class="dropdown-menu" style="padding: 0%">
                                <img src="{{ asset('storage/' . $hdv->foto) }}" style="height:90vh">

                            </ul>
                            @else
                            No hay imagen
                            @endif
                        </td>

                        <td>{{ $hdv->equipo?->nombre_equipo ?? '---' }}</td>
                        <td>{{ $hdv->marca?->nombre_marca ?? '---' }}</td>
                        <td>{{ $hdv->modelo?->nombre_modelo ?? '---' }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        @endsection
</body>

</html>