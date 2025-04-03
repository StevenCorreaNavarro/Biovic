<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/tablas.css') }}"> --}}
    <title>Title</title>
    <style>
        th,td{
          padding: 1%;
            
        }
        th{
            text-align: center;
        }
    </style>
</head>

<body >
    @extends('admin.admin.layouts.app')
    @section('content')
    <h1> lista usuarios</h1>
 
    <div class=" d-flex flex-column justify-content-center align-items-center text-center ">
               <form class="d-flex m-2" style="background-color: rgb(239, 239, 239); width: 100%" method="GET"
            action="{{ route('user.listausers') }}">

            <input class="form-control m-2" class="form-control"  style="width: 400px" type="text" name="search" placeholder="Buscar por nombre de equipo..." value="{{ request('search') }}">

            <button class="btn btn-primary m-2" type="submit"><i class="bi bi-search"></i></button> <a
                href="{{ route('user.listausers') }}"class="bi bi-arrow-repeat btn btn-primary m-2"></a>

            {{-- <a href="{{ url('hojadevida/create') }}" class="btn btn-primary m-2">
                Registrar Nueva hoja de vida
            </a> --}}
        </form>
    </div>
    <table class="w-100  fs-7 table-striped bg-white">
        <thead class="table-dark ">
            <tr>
                <th>Item</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Doc</th>
                <th>Foto</th>
                <th>Contacto</th>
                <th>Direccion</th>
                <th>Profesion</th>
                <th>Cargo</th>
                <th>Correo</th>
                <th></th>
              

            </tr>
            
        </thead>
        <tbody>
       
            <tr>
                 @foreach ($users as $user)
                <td>{{$user->id}}</td>
                <td>{{ $user->role?? '---' }}</td>
                <td>{{ $user->name?? '---' }}</td>
                <td>{{ $user->identity?? '---' }}</td>
                <td>{{ $user->foto?? '---' }}</td>
                <td>{{ $user->contact?? '---' }}</td>
                <td>{{ $user->adress?? '---' }}</td>
                <td>{{ $user->profession?? '---' }}</td>
                <td>{{ $user->post?? '---' }}</td>
                <td>{{ $user->email?? '---' }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                        <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                        <button type="button" class="btn btn-success"><i class="bi bi-eye"></i></button>
                      </div>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>