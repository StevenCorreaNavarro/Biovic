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
    {{-- <link rel="stylesheet" href="{{ asset('css/tablas.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Title</title>
</head>

<body> @extends('admin.admin.layouts.app')

    @section('content')


    <div class="container mt-5">
        <h1 class="text-center">Listado de Equipos</h1>
        <div class="justify-content-end mb-3">
            <table  class="table  table-striped table-hover">
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
                        <td>{{ $hdv->created_at ??'---' }}</td>
                        <td>
                            {{-- <td><a href="{{ route('unit.edit', $unit->id) }} " class="btn btn-primary">Editar</a></td> --}}
                         
                        {{-- <a href="{{ url('descargar-pdf' . '/' . $hdv->id) }}" class="btn btn-primary" target="_blank">
                            Descargar PDF
                        </a> --}}
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ url('hojadevida' . '/' . $hdv->id . '/show') }} "class="btn btn-outline-primary"><i
                                    class="bi bi-eye"></i>
                            </a>
                            <a  onclick="return confirm('¿Quieres descargar un pdf?')"  href="{{ url('descargar-pdf' . '/' . $hdv->id) }}" class="btn btn-outline-success"
                                target="_blank">
                                <i class="bi bi-download"></i>
                            </a>
                            <a href="#"  class="btn btn-outline-warning" ><i class="bi bi-pencil-square"></i></a>
                            {{-- <a href="{{ route('unit.edit', $unit->id) }} " class="btn btn-primary">Editar</a> --}}
                            <form action="{{ route('adminlistarR.destroy', $hdv->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('¿Seguro desea borrar registro?')" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                            {{-- <button type="button" class="btn btn-danger">Left</button>
                            <button type="button" class="btn btn-warning">Middle</button>
                            <button type="button" class="btn btn-success">Right</button> --}}
                             {{-- <form  action="{{ url('hojadevida/listar/' . $hdv->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar"> --}}
                        </form>
                        </div>
                       
                    </td>

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