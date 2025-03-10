<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{ asset('css/header.css') }}
    <title>Title</title>
</head>

<body>
    @extends('layouts.header')
    <br><br><br>
    {{-- 10-   VISTA hojadevida/INDEX --}}

    <a href="{{ url('hojadevida/create') }}" class="btn btn-primary">
        <h3> Registrar Nueva hoja de vida </h3>
    </a>
    <br>
    <br>

    <h1> LISTADO DE HOJA DE VIDAS </h1>

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
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $hdv->foto }}"
                            width="100" alt="">
                    </td>
                    {{-- @foreach ($hdvs as $hdv) --}}
            
                    {{-- <td>{{ $hoja->id }}</td> --}}
                    <td>{{ $hdv->equipo?->nombre_equipo ?? 'xxx' }}</td>
                    <td>{{ $hdv->marca?->nombre_marca ?? 'xxx' }}</td>
                    <td>{{ $hdv->modelo?->nombre_modelo ?? 'xxx' }}</td>
                    <td>{{ $hdv->serie ?? 'xxx' }}</td>
                    
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
            {{-- <td> --}}
            {{-- 22- Crear boton Editar: <hojadevida/id/edit</edit> --}}
            {{-- <a href="{{url('/hojadevida/'.$hojadevida->id.'/edit')}}">
                Editar 
                </a> --}}

            {{-- 19- ACCION ELIMINAR --}}
            {{-- <form action="{{url('/hojadevida/'.$hojadevida->id)}}"  method="post" > } --}}
            {{-- Envio los datos para ser borrados  --}}
            {{-- @csrf
                    {{method_field('DELETE')}} 
                    <input type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
                </form> --}}

            {{-- Mostrar hojadevida --}}
            {{-- <a href="{{url('/hojadevida/'.$hojadevida->id.'/show')}}"> --}}
            {{-- Mostrar --}}
            {{-- </a> --}}
            {{-- </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
