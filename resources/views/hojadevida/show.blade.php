<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/descargarpdf.css') }}"> -->
    <style>
        * {
            /* margin: 0%; */
            /* width: 100vw; */
            /* padding: 0%; */
            /* box-sizing: border-box; */

        }

        body {
            width: 100vw;
            /* font-family: Arial, sans-serif; */
            box-sizing: border-box;
            font-size: 10px;
            padding: 0%;





        }

        /*
        .containers {
          
            padding: 0;
            margin: 0;
        } */

        .container {
            /* padding: 0; */
            /* margin: 0; */
            /* position: relative; */
            /* width: 100%; */
            /* margin: auto; */
            /* text-align: center;  */
            /* border: 2px solid rgb(255, 255, 255); */
        }

        .ln {
            border: 1px solid rgb(255, 255, 255);
            /* width: 100%; */
            padding: 0;
            margin: 0;

        }

        table {
            width: 100%;
            /* border-collapse: collapse; */
            /* margin-top: 20px; */
        }

        .h {
            /* height: 33.6%; */
            width: 100%;
            padding: 0;
            margin: 0;

        }

        /* .centers {
            justify-content: center;
            align-items: center;
        } */

        th,
        td {
            /* font-size: 80%; */

            /* padding: 8px; */
            text-align: left;
        }

        body {
            /* font-family:'Gill Sans', 'Gill Sans MT' */
                font-family: Haettenschweiler, 'Arial Narrow Bold', sans-serif
        }

        /* .container {
            width: 100%;
            padding: 20px;
            border: 1px solid black;
        } */


        /* div, */
        .tabla th,
        .tabla td {
            /* align-items: center; */
            /* border: 1px solid rgb(59, 37, 37); */
            /* margin: 0%;
            padding: 0px; */

        }
    </style>

    <title>Title</title>
</head>

<body style=" top: 0px; left: 0px;background-color: rgb(255, 255, 255);">
    {{-- <div> --}}

    <div style="position: absolute; top: 0px; left: 0px; width:700px; background-color: rgb(236, 236, 236);">
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <td rowspan="3"
                    style=" background-color: black; border: 1px solid rgb(255, 255, 255); text-align: center;">
                    <img src="{{ asset('IMG/logotipohancho.png') }}" width="" height="100px">
                </td>
                <td style="text-align: center; border: 1px solid rgb(255, 255, 255);" width="50%">Dato 1</td>
                <td rowspan="3"
                    style=" background-color: black;border: 1px solid rgb(255, 255, 255); text-align: center;">
                    <img src="{{ asset('IMG/logotipohancho.png') }}" width="" height="100px">
                </td>
            </tr>
            <tr>
                <td style="text-align: center; border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
            <tr>
                <td style="text-align: center; border: 1px solid rgb(255, 255, 255);">Dato 3</td>
            </tr>
        </table>


        <table style=" text-align: center; ">
            <tr>
                <th style="text-align: center;   background-color:rgb(0, 64, 255); height:10px;">
                    <h4 style="color: rgb(255, 255, 255)">DESCRIPCION DEL EQUIPO</h4>
                </th>
            </tr>
        </table>




        <table class="tabla" style=" text-align: center; border:2px solid rgb(255, 255, 255);">
            <tr>
                <th style="width: 25%;"></th>
                <th style=" width: 15%;"></th>
                <th style=" width: 25%;"></th>
                <th style=" width: 15%;"></th>
                <th style=" width: 20%;"></th>
            </tr>

            <!-- 7 Filas en las primeras 2 columnas -->
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">SERVICIO: </td>
                <td style="border: 1px solid rgb(255, 255, 255);"> {{ $hdvs->servicio?->nombreservicio ?? '---' }} </td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">NOMBRE: </td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td rowspan="7" style="border: 1px solid rgb(255, 255, 255); text-align: center;"> <img
                        src="{{ asset('storage') . '/' . $hdvs->foto }}" width="" height="120px"alt="">
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CODIGO ECRI: </td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->equipo?->nombre_equipo ?? '---' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">N° ACTIVO FIJO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">MARCA: </td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->marca?->nombre_marca ?? '---' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">UBICACION FISICA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">MODELO: </td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->modelo?->nombre_modelo ?? '---' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">N° REGISTRO INVIMA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">SERIE: </td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->serie ?? '---' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CLASIFICACION DE RIESGO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">TECNOLOGIA PREDOMINANTE</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->tecPredo?->tecpredo ?? '---' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CLASIFICACION BIOMEDICA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">PERIODICIDAD DE CALIBRACION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->perioCali ?? '---' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CLASIFICACION POR USO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center;   background-color:rgb(0, 64, 255)">
                    <h4 style="color: rgb(255, 255, 255)">REGISTRO HISTORICO</h4>
                </th>
            </tr>

        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style=" border: 1px solid rgb(255, 255, 255);width: 16%;"></th>
                <th style="border: 1px solid rgb(255, 255, 255); width: 16%;"></th>
                <th style="border: 1px solid rgb(255, 255, 255); width: 16%;"></th>
                <th style="border: 1px solid rgb(255, 255, 255); width: 16%;"></th>
                <th style="border: 1px solid rgb(255, 255, 255); width: 16%;"></th>
                <th style="border: 1px solid rgb(255, 255, 255); width: 16%;"></th>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">FECHA DE ADQUISICION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">FACTURA / CONTRATO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">COSTO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>

            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">FECHA DE INSTALACICON</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">FORMA DE ADQUISICION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">PROPIEDAD</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>

            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">GARANTIA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">VIDA UTIL</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);"></td>
                <td style="border: 1px solid rgb(255, 255, 255);"></td>

            </tr>

        </table>



    </div>




    {{-- </div> --}}

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script> -->
</body>

</html>
