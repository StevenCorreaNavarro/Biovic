<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/descargarpdf.css') }}">
    <style>
        body {
            /* font-family: Arial, sans-serif;
            font-size: 12px; */



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
            border: 2px solid rgb(255, 255, 255);
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
            /* font-family: Arial, sans-serif; */
        }

        /* .container {
            width: 100%;
            padding: 20px;
            border: 1px solid black;
        } */

        .tabla {
            /* width: 100%; */
            /* border-collapse: collapse; */
        }

        /* div, */
        .tabla th,
        .tabla td {
            align-items: center;
            border: 1px solid rgb(255, 255, 255);
            margin: 0%;
            padding: 0px;
        }
    </style>

    <title>Title</title>
</head>

<body>
    <div>

        <div style="position: absolute;  background-color: rgb(255, 255, 255);">


            <table class="tabla">
                <tr>
                    <th style=" background-color:rgb(0, 0, 0)"> <img class=""
                            src="{{ asset('IMG/logotipohancho.png') }}" alt="biovic" height="150">
                    </th>
                    <th style=" width:250px;  background-color:rgb(0, 64, 255)" height="150">
                        <div style="text-align: center">
                            <h4>Hoja de vida equipo medico</h4>
                        </div>
                        <div style="text-align: center">
                            <h4>Codigo: 1234</h4>
                        </div>
                        <div style="text-align: center">
                            <h4>Version 1234</h4>
                        </div>
                    </th>
                    <th style=" background-color:rgb(0, 0, 0)"> <img class=""
                            src="{{ asset('IMG/logotipohancho.png') }}" alt="biovic" height="150">
                    </th>
                </tr>


            </table>
            <table class="tabla ">
                <tr>
                    <th style="text-align: center;   background-color:rgb(0, 64, 255)">
                        <h4 style="color: rgb(255, 255, 255)">DESCRIPCION DEL EQUIPO</h4>
                    </th>
                </tr>
            </table>



            <table class="tabla" style=" text-align: center; border:2px solid rgb(170, 170, 170);">
                <tr>
                    <th style=" border: 1px solid rgb(255, 255, 255);width: 30%;"></th>
                    <th style="border: 1px solid rgb(255, 255, 255); width: 30%;"></th>
                    <th style="border: 1px solid rgb(255, 255, 255); width: 30%;"></th>
                    <th style="border: 1px solid rgb(255, 255, 255); width: 30%;"></th>
                    <th style="border: 1px solid rgb(255, 255, 255); width: 30%;"></th>
                </tr>

                <!-- 7 Filas en las primeras 2 columnas -->
                <tr>
                    <td style="border: 1px solid rgb(255, 255, 255);">SERVICIO: </td>
                    <td style="border: 1px solid rgb(255, 255, 255);"> {{ $hdvs->servicio?->nombreservicio ?? '---' }}
                    </td>
                    <td style="border: 1px solid rgb(255, 255, 255);">NOMBRE: </td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                    <td rowspan="7" style="border: 1px solid rgb(255, 255, 255); text-align: center;"> <img
                            src="{{ asset('storage') . '/' . $hdvs->foto }}" width="200px" height="">
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid rgb(255, 255, 255);">NOMBRE: </td>
                    <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->equipo?->nombre_equipo ?? '---' }}</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                </tr>
                <tr>
                    <td style="border: 1px solid rgb(255, 255, 255);">MARCA: </td>
                    <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->marca?->nombre_marca ?? '---' }}</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                </tr>
                <tr>
                    <td style="border: 1px solid rgb(255, 255, 255);">MODELO: </td>
                    <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->modelo?->nombre_modelo ?? '---' }}</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                </tr>
                <tr>
                    <td style="border: 1px solid rgb(255, 255, 255);">SERIE: </td>
                    <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->serie ?? '---' }}</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                </tr>
                <tr>
                    <td style="border: 1px solid rgb(255, 255, 255);">TECNOLOGIA PREDOMINANTE</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->tecPredo?->tecpredo ?? '---' }}</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                </tr>
                <tr>
                    <td style="border: 1px solid rgb(255, 255, 255);">PERIODICIDAD DE CALIBRACION</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->perioCali ?? '---' }}</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                </tr>
            </table>
            <table class="tabla ">
                <tr>
                    <th style="text-align: center;   background-color:rgb(0, 64, 255)">
                        <h4 style="color: rgb(255, 255, 255)">REGISTRO HISTORICO</h4>
                    </th>
                </tr>
                
            </table>
            <table>
                <tr>
                    <th style=" border: 1px solid rgb(255, 255, 255);width: 16%;"></th>
                    <th style="border: 1px solid rgb(255, 255, 255); width: 16%;"></th>
                    <th style="border: 1px solid rgb(255, 255, 255); width: 16%;"></th>
                    <th style="border: 1px solid rgb(255, 255, 255); width: 16%;"></th>
                    <th style="border: 1px solid rgb(255, 255, 255); width: 16%;"></th>
                    <th style="border: 1px solid rgb(255, 255, 255); width: 16%;"></th>
                </tr>
                <tr>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>

                </tr>
                <tr>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>

                </tr>
                <tr>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 1</td>
                    <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>

                </tr>
                
            </table>



        </div>




    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
