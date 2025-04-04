<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- <link rel="stylesheet" href="{{ asset('css/tablas.css') }}"> --}}
    <title>Title</title>
    <style>

    </style>
</head>

<body>
    @extends('layouts.header')
    <br><br>
    {{-- 10-   VISTA hojadevida/INDEX --}}
    <div class=" d-flex flex-column justify-content-center align-items-center text-center ">
        <h1>Lista hoja de vida</h1>
        <br>

        <form class="d-flex m-2" style="background-color: rgb(239, 239, 239); width: 100%" method="GET"
            action="{{ route('hojadevida.listar') }}">

            <input class="form-control m-2" class="form-control" style="width: 400px" type="text" name="search"
                placeholder="Buscar por nombre de equipo..." value="{{ request('search') }}">

            <button class="btn btn-primary m-2" type="submit"><i class="bi bi-search"></i></button> <a
                href="{{ route('hojadevida.listar') }}" class="bi bi-arrow-repeat btn btn-primary m-2"></a>

            <a href="{{ url('hojadevida/create') }}" class="btn btn-primary m-2">
                Registrar Nueva hoja de vida
            </a>
        </form>
    </div>




    {{-- <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Equipo</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hdvs as $hoja)
            <tr>
                <td>{{ $hoja->id }}</td>
                <td>{{ $hoja->equipo?->nombre_equipo ?? '---' }}</td>
                <td>{{ $hoja->descripcion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}



    <table class="w-100 table fs-7 table-striped  text table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>FOTO</th>
                <th>NOMBRE EQUIPO</th>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>SERIE</th>
                <th>SERVICIO</th>
                <th>ACTIVO FIJO</th>

                <th>UBICACION FISICA</th>

                <th>FECHA</th>
                <th>PDF</th>

            </tr>
        </thead>


        <tbody>
            @foreach ($hdvs as $hdv)
                <tr>
                    <td>{{ $hdv->id }}</td>

                    <td class="dropend" style="padding: 0%" width="50">
                        @if (!empty($hdv->foto) && Storage::exists('public/' . $hdv->foto))
                            <img style="padding: 0%" src="{{ asset('storage/' . $hdv->foto) }}" width="50"
                                height="50" type="button" class="btn btn-secondary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                    
                            <ul class="dropdown-menu" style="padding: 0%">
                                <img src="{{ asset('storage/' . $hdv->foto) }}" style="height:90vh">
                            </ul>
                        @else
                            <span>No hay imagen</span>
                            {{-- Opcional: Mostrar una imagen por defecto --}}
                            {{-- <img src="{{ asset('images/default.png') }}" width="50" height="50" alt="Sin imagen"> --}}
                        @endif
                    </td>
                    <td>{{ $hdv->equipo?->nombre_equipo ?? '---' }}</td>
                    <td>{{ $hdv->marca?->nombre_marca ?? '---' }}</td>
                    <td>{{ $hdv->modelo?->nombre_modelo ?? '---' }}</td>
                    <td>{{ $hdv->serie?->nombre ?? '---' }}</td>
                    <td>{{ $hdv->servicio?->nombreservicio ?? '---' }}</td>
                    <td>{{ $hdv->actFijo ?? '---' }}</td>
                    <td>{{ $hdv->ubica ?? '---' }}</td>
                    {{-- <td>{{ $hdv->ubica ?? '---' }}</td> --}}

                    {{-- <td>{{ $hoja->descripcion }}</td> --}}
                    {{-- @endforeach --}}

                    <td>{{ $hdv->created_at ?? '---' }}</td>


                    {{-- // acciones  --}}
                    {{-- <td> --}}
                    {{-- 22- Crear boton Editar: <hojadevida/id/edit</edit> --}}
                    {{-- <a href="{{url('/hojadevida/'.$hojadevida->id.'/edit')}}">
                Editar 
                </a> --}}

                    {{-- 19- ACCION ELIMINAR --}}
                    {{-- <form action="{{ url('hojadevida/listar/' . $hdv->id) }}" method="post"> Envio los datos para ser
                            borrados
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
                        </form> --}}

                    {{-- Mostrar hojadevida --}}
                    {{-- <a href="{{ url('hojadevida' . '/' . $hdv->id . '/show') }}" class="btn btn-primary">Ver
                           
                        </a> --}}
                    {{-- </td> --}}
                    <td>
                        {{-- <a href="{{ url('descargar-pdf' . '/' . $hdv->id) }}" class="btn btn-primary" target="_blank">
                            Descargar PDF
                        </a> --}}
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ url('hojadevida' . '/' . $hdv->id . '/show') }}" class="btn btn-primary"><i
                                    class="bi bi-eye"></i>
                            </a>
                            <a href="{{ url('descargar-pdf' . '/' . $hdv->id) }}" class="btn btn-warning"
                                target="_blank">
                                <i class="bi bi-download"></i>
                            </a>
                            {{-- <button type="button" class="btn btn-danger">Left</button>
                            

                            <button type="button" class="btn btn-warning">Middle</button>
                            <button type="button" class="btn btn-success">Right</button> --}}
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
