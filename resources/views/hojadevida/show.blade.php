<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="{{ asset('css/descargarpdf.css') }}">
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }

        body {
            width: 100vw;
            box-sizing: border-box;
            font-size: 10px;
            padding: 0%;
        }

        .f {
            background-color: rgb(242, 242, 242);
        }

        .ln {
            border: 1px solid rgb(235, 235, 235);
            padding: 0;
            margin: 0;
        }

        table {
            width: 100%;            
        }

        .h {
            width: 100%;
            padding: 0;
            margin: 0;
        }
        td {
           
            text-align: left;
            padding: 1px;
            /* margin: 1px; */
        }
    </style>
    <title>PDF hoja de vida</title>
</head>

<body style=" top: 0px; left: 0px;background-color: rgb(255, 255, 255);">
    <div style="position: absolute; top: 0px; left: 0px; width:700px; background-color: rgb(255, 255, 255);  bold;"   >
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr style=" background-color:rgb(0, 64, 255) ">
                <td rowspan="3"
                    style=" background-color: black; border: 1px solid rgb(0, 0, 0); text-align: center;">
                    <img src="{{ asset('IMG/logotipohancho.png') }}" width="" height="100px">
                </td>
                <td style="text-align: center; border: 1px solid rgb(0, 0, 0);" width="50%">
                    <h4 style="padding:0%;margin:0;  color:white">HOJA DE VIDA EQUIPO MÉDICO</h4>
                </td>
                <td rowspan="3" style=" background-color: black;border: 1px solid rgb(0, 0, 0); text-align: center;">
                    <img src="{{ asset('IMG/logotipohancho.png') }}" width="" height="100px">
                </td>
            </tr>
            <tr style=" background-color:rgb(0, 64, 255) ">
                <td style="text-align: center; border: 1px solid rgb(0, 0, 0);">
                    <h4 style="padding:0%;margin:0;  color:white">DATO 2</h4>
                </td>
            </tr>
            <tr style=" background-color:rgb(0, 64, 255) ">
                <td style="text-align: center; border: 1px solid rgb(0, 0, 0);">
                    <h4 style="padding:0%;margin:0; color:white">DATO 3</h4>
                </td>
            </tr>
        </table>
        <br>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border: 2px solid rgb(0, 0, 0);  background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255)">DESCRIPCION DEL EQUIPO</h4>
                </th>
            </tr>
        </table>
        <table style=" text-align: center; border:0px solid rgb(255, 255, 255);">
            <!-- 7 Filas en las primeras 2 columnas -->
            <tr >
                <td style="width: 25%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">SERVICIO: </td>
                <td style="width: 15%;border: 1px solid rgb(255, 255, 255);"> {{ $hdvs->servicio?->nombreservicio ?? '---' }} </td>
                <td style="width: 25%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">CODIGO: </td>
                <td style="width: 15%;border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td rowspan="7" style="width: 20%; border: 1px solid rgb(196, 196, 196); ">
                    <img src="{{ asset('storage') . '/' . $hdvs->foto }}" width="" height="120px"alt="">
                </td>
            </tr>
            <tr class="f">
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">NOMBRE: </td>
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
            <tr class="f">
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
            <tr class="f">
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
                <th style="text-align: center; border: 2px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255)">REGISTRO HISTORICO</h4>
                </th>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <td style="width: 16%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">FECHA DE ADQUISICION</td>
                <td style="width: 16%;border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="width: 16%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">FACTURA / CONTRATO</td>
                <td style="width: 16%;border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="width: 16%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">COSTO</td>
                <td style="width: 16%;border: 1px solid rgb(255, 255, 255);">Dato 2</td>
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
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border: 2px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255);">REGISTRO TÉCNICO</h4>
                </th>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <td style="width: 16%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">FUENTE DE ALIMENTACION</td>
                <td style="width: 16%;border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="width: 16%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">FRECUENCIA</td>
                <td style="width: 16%;border: 1px solid rgb(255, 255, 255);">Dato 2 HZ</td>
                <td style="width: 16%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">CAPACIDAD</td>
                <td style="width: 16%;border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">VOLTAGE MAX</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 VAC</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CORRIENTE MAX</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">TEMPERATURA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 °C</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">VOLTAGE MIN</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 VAC</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CORRIENTE MIN</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 </td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">VELOCIDAD</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 </td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">PRESION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">POTENCIA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 W</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">HUMEDAD</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 %</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">PESO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 KG</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">DIMENSIONES</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">MANUAL</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border-top: 2px solid rgb(0, 0, 0); border-left: 2px solid rgb(0, 0, 0); border-right: 2px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255);">ACCESORIOS</h4>
                </th>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style=" border:1px solid rgb(0, 0, 0);background-color:rgb(0, 64, 255);width: 20%; color:white;">NOMBRE</th>
                <th style="border: 1px solid rgb(0, 0, 0);background-color:rgb(0, 64, 255); width: 20%;color:white;">MARCA</th>
                <th style="border: 1px solid rgb(0, 0, 0);background-color:rgb(0, 64, 255); width: 20%;color:white;">MODELO</th>
                <th style="border: 1px solid rgb(0, 0, 0);background-color:rgb(0, 64, 255); width: 20%;color:white;">SERIE</th>
                <th style="border: 1px solid rgb(0, 0, 0);background-color:rgb(0, 64, 255); width: 20%;color:white;">COSTO</th>         
            </tr>
            <tr>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->modelo?->nombre_modelox ?? '---' }}</td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border: 2px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255)">DATOS DEL PROVEEDOR Y/O FABRICANTE</h4>
                </th>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="width: 25%;"></th>
                <th style=" width: 15%;"></th>
                <th style=" width: 25%;"></th>
                <th style=" width: 15%;"></th>
            </tr>
       
            <tr>
                <td style="width: 25%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">PROVEEDOR</td>
                <td style="width: 15%;border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="width: 25%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">FABRICANTE</td>
                <td style="width: 15%;border: 1px solid rgb(255, 255, 255);">Dato 2 </td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">DIRECCION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 </td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">DIRECCION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">TELEFONO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 </td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">TELEFONO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 </td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CIUDAD/PAIS</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CIUDAD/PAIS</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 </td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">EMAILY/O WEB</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2 </td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">EMAILY/O WEB</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Dato 2</td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border: 2px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255)">RECOMENDACIONES</h4>
                </th>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="width: 100%;"></th>
            </tr>
            <tr>
                <td style="border: 1px solid rgb(255, 255, 255);">ECRIC. Managing Service Contracts- 2th Health Tecnology, 1989. Vol. III. Pág.21 organismo Internacional que identifica los equipos médicos segun su prioridad de riesgo</td>
            </tr>
            <tr>
                <td style="border: 1px solid rgb(255, 255, 255);">Todos los dispositivos mmédicos que se importen y/o comercialicen a partir del primero de enero de 2009, deben tener registro sanitario y/o permiso de comercialización, segun el caso, con el fin de garantizar la seguridad y la calidad de estos productos. Comunicado Invima 013-09. </td>
            </tr>
            <tr>
                <td style="border: 1px solid rgb(255, 255, 255);">Decreto 4725 de 2005.permite identificar los equipos de acuerdo con el nivel de riesgo implicito en la atención de los papcientes o el manejo de los mismos por parte de los operadores. </td>
            </tr>
            <tr>
                <td style="border: 1px solid rgb(255, 255, 255);">Es el costo del equipo unitario. más elcosto  de sus componentes y accesorios.Si apalica</td>
            </tr>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
