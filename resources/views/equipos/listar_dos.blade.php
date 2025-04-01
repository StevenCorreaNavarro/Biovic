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


    <div class="container mt-5 bg-white">
        <h1 class="text-center">Listado de Equipos</h1>
        <div class="d-flex justify-content-end mb-3">
            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la marca</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hdvs as $hdv)
                    <tr>
                        <td>{{ $hdv->id }}</td>
                        <td>{{ $hdv->nombre_marca ?? '---' }}</td>
             
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