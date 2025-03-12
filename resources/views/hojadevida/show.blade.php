


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de HDVS</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles de HDVS</h1>
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    {{-- <td>
                        <img src="{{ asset('storage/' . $hdvs->foto) }}" width="300">


                    </td> --}}
                    <td>
                        @if ($hdvs->foto)
                        {{-- <img  src="{{ public_path('storage/' . $hdvs->foto) }}" width="300"> --}}
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $hdvs->foto }}" width="300"
                            alt="">
                        @else
                        <p>----no hay foto----</p>
                        @endif
                    </td>
                    <td>{{ $hdvs->id}}</td>
                    <td>{{ $hdvs->equipo?->nombre_equipo ?? '---' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- <a href="{{ url('hojadevida/listar') }}" class="btn btn-primary">
        <h3> Regresar </h3>
    </a> --}}
</body>
</html>
