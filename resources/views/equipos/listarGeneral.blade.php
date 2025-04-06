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
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Title</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        main {
            /* margin-top: 1%; */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .cajon {
            width: 100%;
            /* max-width: 600px; */
            margin: 0 auto;
            /* padding: 20px; */
            /* background-color: #f9f9f9; */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            /* width: 440px; */
            padding: 30px;
            /* background-color: #fff; */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            align-items: center;
            text-align: center;
        }

        .cajon label {
            display: block;
            margin-bottom: 10px;
        }

        .cajon input[type="text"],
        .cajon input[type="date"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .cajon .boton {
            width: 60%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cajon .boton:hover {
            background-color: #0056b3;
        }

        table {
            width: auto;
            border-collapse: collapse;
            margin-top: 20px;
        }
    </style>
</head>

<body> @extends('admin.admin.layouts.app')

    @section('content')
        <main>
            <div class="form-container">
                <h1>Ver hoja de vida</h1>

                <table class=" cajon   table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>foto</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Nombre del Equipo</th>
                            <th>Fecha</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hdvs as $hdv)
                            <tr>
                                <td>{{ $hdv->id }}</td>
                                <td class="dropend" style="padding: 0%" width="50">
                                    @if ($hdv->foto)
                                        <img style="padding: 0%" src="{{ asset('storage/' . $hdv->foto) }}" width="50"
                                            height="50" type="button" class="btn btn-secondary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
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
                                <td>{{ $hdv->created_at ?? '---' }}</td>
                                
                                <td>

                                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                        <a href="{{ url('hojadevida' . '/' . $hdv->id . '/show') }} " class="p-1 btn-primary"><i class="bi bi-eye"></i>
                                        </a>
                                        <a onclick="return confirm('¿Quieres descargar un pdf?')"
                                            href="{{ url('descargar-pdf' . '/' . $hdv->id) }}" class="p-1 btn-success"
                                            target="_blank">
                                            <i class="bi bi-download"></i>
                                        </a>
                                        <a href="#" class="p-1 btn-warning"><i class="bi bi-pencil-square"></i></a>

                                        <form action="{{ route('adminlistarR.destroy', $hdv->id) }}" method="POST"  >
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('¿Seguro desea borrar registro?')"
                                                class="p-1 btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>

                                    </div>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>

        <div class="container mt-5">
            <h1 class="text-center">Listado de Equipos</h1>
            <div class="justify-content-end mb-3">

            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        @endsection
</body>

</html>
