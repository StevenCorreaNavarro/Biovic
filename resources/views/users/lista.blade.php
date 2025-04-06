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
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Title</title>
    <style>
        th,
        td {
            padding: 1%;

        }

        th {
            text-align: center;
        }

        table {
            font-size: 11px;
        }



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

<body>
    @extends('admin.admin.layouts.app')
 
    @section('content')
        <div class="form-container">
            <h1> Lista usuarios</h1>

            <div class=" d-flex flex-column justify-content-center align-items-center text-center ">
                <form class="d-flex m-2" style="background-color: rgb(239, 239, 239); width: 100%" method="GET"
                    action="{{ route('user.listausers') }}">

                    <input class="form-control m-2" class="form-control" style="width: 400px" type="text" name="search"
                        placeholder="Buscar..." value="{{ request('search') }}">

                    <button class="btn btn-primary m-2" type="submit"><i class="bi bi-search"></i></button> <a
                        href="{{ route('user.listausers') }}"class="bi bi-arrow-repeat btn btn-primary m-2"></a>

                    {{-- <a href="{{ url('hojadevida/create') }}" class="btn btn-primary m-2">
                Registrar Nueva hoja de vida
            </a> --}}
                </form>
            </div>
            <table class="w-100 cajon table-striped bg-white">
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
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->role ?? '---' }}</td>
                            <td>{{ $user->name ?? '---' }}</td>
                            <td>{{ $user->identity ?? '---' }}</td>
                            <td>{{ $user->foto ?? '---' }}</td>
                            <td>{{ $user->contact ?? '---' }}</td>
                            <td>{{ $user->adress ?? '---' }}</td>
                            <td>{{ $user->profession ?? '---' }}</td>
                            <td>{{ $user->post ?? '---' }}</td>
                            <td>{{ $user->email ?? '---' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    <button type="button" class="btn btn-warning"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-success"><i class="bi bi-eye"></i></button>
                                </div>
                            </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
 
    @endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
