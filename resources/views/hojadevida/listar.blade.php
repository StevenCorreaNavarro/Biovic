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
    {{-- 10-   VISTA hojadevida/INDEX --}}
    <div class="hero d-flex flex-column justify-content-center align-items-center text-center p-4">
        <h1>Lista hoja de vida</h1>
        <br>
        <br>
        <form method="GET" action="{{ route('hojadevida.listar') }}">
            <input type="text" name="search" placeholder="Buscar por nombre de equipo..."
                value="{{ request('search') }}"  class="form-label w-10" >
            <button class="btn btn-primary " type="submit">Buscar</button> <a href="{{ route('hojadevida.listar') }}"
                class="bi bi-arrow-repeat btn btn-primary"></a>
                
            <a href="{{ url('hojadevida/create') }}" class="btn btn-primary ">
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



    <table class="table table-light">
        <thead class="thead-light">{{-- Cabezera de la consulta --}}
            <tr>
                <th>ID</th>
                <th>FOTO</th>
                <th>NOMBRE EQUIPO</th>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>SERIE</th>
                <th>ACTIVO FIJO</th>
                <th>SERVICIO</th>
                <th>UBICACION FISICA</th>

            </tr>
        </thead>


        <tbody>
            @foreach ($hdvs as $hdv)
                <tr>
                    <td>{{ $hdv->id }}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '' . $hdv->foto }}"
                            width="100" alt="">
                            <img src="{{ asset('storage/' . $hdv->foto) }}" width="100">
                    </td>
                    <td>{{ $hdv->equipo?->nombre_equipo ?? '---' }}</td>
                    <td>{{ $hdv->marca?->nombre_marca ?? '---' }}</td>
                    <td>{{ $hdv->modelo?->nombre_modelo ?? '---' }}</td>
                    <td>{{ $hdv->serie ?? '---' }}</td>
                    <td>{{ $hdv->actFijo ?? '---' }}</td>
                    <td>{{ $hdv->ubica ?? '---' }}</td>
                    <td>{{ $hdv->ubica ?? '---' }}</td>
{{-- //mk si tenes sueño me decis jsjajjajaja --}}
                    {{-- <td>{{ $hoja->descripcion }}</td> --}}
                    {{-- @endforeach --}}
                    {{--  ? $hojadevida->nombreequipo->nombreequipo : 'Sin Nombre' }}</td>  --}}
                    {{-- <td>{{$hojadevida-> marca }}</td>
            <td>{{$hojadevida-> modelo}}</td>
            <td>{{$hojadevida-> serie}}</td>
            <td>{{$hojadevida-> actFijo}}</td>
            <td>{{$hojadevida-> servicio}}</td>
            <td>{{$hojadevida-> nombreubicacio}}</td> --}}


                    {{-- // acciones  --}}
                    <td>
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
                        <a href="{{ url('hojadevida' . '/' . $hdv->id . '/show') }}" class="btn btn-primary">Ver
                            {{-- Mostrar --}}
                        </a>
                    </td>
                    <td>
                        <a href="{{ url('descargar-pdf'. '/' . $hdv->id) }}" class="btn btn-primary" target="_blank">
                            Descargar PDF
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
