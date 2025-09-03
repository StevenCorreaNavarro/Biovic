<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <style>
        .b {
            width: 20%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            /* margin-top: 20px; */
            position: absolute;
            top: 250px;
        }

        .b h1 {
            font-size: 30px;
            font-weight: bold;
            color: #333333c6;
            text-align: center;
            margin-top: 20px;
            /* top: 300px; */
        }

        a {
            margin-top: 20px;

            background-color: blue;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 20px;
            font-weight: bold;
            position: absolute;
            top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.189);

        }

        a:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
            box-shadow: 0 4px 18px rgba(255, 255, 255, 0.246);
        }
    </style>
</head>

<body>

    <div>
        <div>
            @include('hojadevida.showpdf')
        </div>

        <!-- <div class="a" style="padding-left: 890px">
                <h1> Registrar </h1>
                <a href="{{ url('hojadevida/create') }}" class="btn btn-primary m-2">
                    Ingresar Nueva hoja de vida
                </a>
            </div> -->

        <div class="b" style="padding-left: 650px">

            <a href="{{ url('descargar-pdf' . '/' . $hdvs->id) }}" target="_blank">Descargar PDF
                <i class="bi bi-download"></i>
            </a>
        </div>
        @if ((Auth::check() && Auth::user()->role === 'Admin') || Auth::user()->role === 'Empleado')
            <div class="b" style="padding-left: 780px; ">
                <!-- <h1>Hoja de Vida PDF</h1> -->
                <a href="#" target="_blank">Editar
                    <i class="bi bi-download"></i>
                </a>
            </div>
        @endif
        @if (Auth::check() && Auth::user()->role === 'Admin')
            <div class="b" style="padding-left: 880px;">
                <!-- <h1>Hoja de Vida PDF</h1> -->
                <a href=" #" target="_blank">Eliminiar
                    <i class="bi bi-download"></i>
                </a>
            </div>
        @endif

    </div>


</body>

</html>
