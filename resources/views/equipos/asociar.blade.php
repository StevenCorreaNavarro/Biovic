<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Registrar Profesor</title>
</head>

<body>
    <div class="box-2">
        <div class="container">
            <br>
            <center>
                <h1>Asignar Modulo</h1>
                <br>
                <form action="{{ route('adminaso.storeaso') }}" method="POST" enctype="multipart/form-data">
                    @csrf {{-- token o seguridad  --}}
                    <br>
                    <div >
                        <h1>Equipo:</h1>
                        <select name="equipo_id"> {{-- OJO CUIDAR ESTE NAME COMO IDENTIFICADOR --}}
                            @foreach ($datoe as $user)
                                <option class="px-20 mx-100" value="{{ $user->id}}"> {{ $user->nombre_equipo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <br><br>
                    <div >
                        <h1>Marca</h1>
                        <select  name="nombre_marca"> {{-- OJO CUIDAR ESTE NAME COMO IDENTIFICADOR --}}
                            @foreach ($datom as $rol)
                                <option value="{{ $rol->nombre_marca }}"> {{ $rol->nombre_marca }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <br>
                    <button class="btn btn-primary" type="submit">Enviar Formulario:</button>
                    <br>
                    <br>
                    <br>
                </form>
            </center>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
