<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<title>Title</title>
</head>
<body>
    @extends('layouts.header')
  <!-- equipos/index.blade.php -->
@foreach($equipos as $equipo)
    <h2>{{ $equipo->nombre }}</h2>
    <ul>
        @foreach($equipo->marcas as $marca)
            <li>
                <strong>{{ $marca->nombre }}</strong>
                <ul>
                    @foreach($marca->modelos as $modelo)
                        <li>{{ $modelo->nombre }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endforeach

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>