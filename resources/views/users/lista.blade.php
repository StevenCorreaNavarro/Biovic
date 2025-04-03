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
                        <button type="button" class="btn btn-danger">Left</button>
                        <button type="button" class="btn btn-warning">Middle</button>
                        <button type="button" class="btn btn-success">Right</button>
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