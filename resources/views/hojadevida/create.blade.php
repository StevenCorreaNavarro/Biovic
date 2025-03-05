<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
@extends('layouts.header')

{{-- 17- Creacion de formulario de envio --}}
<h1>HOLA DESDE CREATE 2</h1>
{{-- desde aqui se envia a storage, con el uso del methoso post--}}
<form action="{{url('/hojadevida')}}" method="post" enctype="multipart/form-data">
    @csrf {{-- LLave de seguridad obligatoria --}}
    {{--  Incluye lo que esta en formulario  --}}


    @include('hojadevida.form');
</form>
    
</body>
</html>