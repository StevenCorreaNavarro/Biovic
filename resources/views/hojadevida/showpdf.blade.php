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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        body {
            width: 50vw;
            box-sizing: border-box;
            font-size: 11px;
            padding: 0%;
        }

        .f {
            background-color: rgb(242, 242, 242);
        }

        .ln {
            border: 0px solid rgb(235, 235, 235);
            padding: 0;
            margin: 0;

        }

        table {
            width: 100%;
        }

        .h {
            width: 100%;
            padding: 0px;
            margin: 0px;
        }

        td {
            height:15px;
            font-size: 9px;
            text-align: left;
            /* padding: 1px; */
            /* margin: 1px; */

        }
       
    </style>
    <title>PDF hoja de vida</title>
</head>

<body style=" top: 0px; left: 0px;background-color: rgb(255, 255, 255);">
    <div style=" top: 0px; left: 0px; width:700px; background-color: rgb(255, 255, 255);border: 1px solid gray; ">
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr style=" background-color:rgb(0, 64, 255); overflow: hidden;  padding: 0px;margin: 0px;">
                <td style=" background-color: rgb(255, 255, 255); border: 0px solid rgb(0, 0, 0); text-align: center;padding: 0px;
                        margin: 0px;">
                    <img src="{{ $hdvs->propiedad?->foto ? asset('storage/' . $hdvs->propiedad->foto) : asset('IMG/logotipohancho.png') }}"
                        style="width:auto;  height: 90px;padding: 0px; margin: 0px;">

                </td>

                <td style="text-align: center; border: 0px solid rgb(255, 255, 255); padding: 0px;margin: 0px; " width="100%;" >
                    <h2 style="padding:0%;margin:0;  color:white">HOJA DE VIDA EQUIPO MÉDICO</h2>
                    <h4 style="padding:0%;margin:0;  color:white">DATO UNO</h4>
                    <h4 style="padding:0%;margin:0;  color:white">DATO DOS</h4>
                </td>
                <td
                    style=" background-color:rgb(255, 255, 255);border: 0px solid rgb(0, 0, 0); text-align: center;padding: 0px;
                        margin: 0px;">
                    {{-- <img src="{{ asset('storage/' . Auth::user()->foto) }}" height="100px"> --}}
                    <img src="{{ asset('IMG/logotipohancho.png') }}"
                        style="width:auto;  height: 90px; padding: 0px;
                        margin: 0px;">
                    <span class="user-level"></span>
                </td>

                {{-- NO BOOORRAAAAAAAAAAAAAAAARRR NI POR EL PTAS --}}
                    {{-- @if (Auth::check() && Auth::user()->foto)
                    <td rowspan="3"
                        style=" background-color:rgb(0, 64, 255);border: 1px solid rgb(0, 0, 0); text-align: center;"
                        width="200">
                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" height="100px">
                        {{-- <img src="{{ asset('IMG/logotipohancho.png') }}" width="" height="100px">
                @else
                    <td rowspan="3"
                        style=" background-color:rgb(0, 64, 255);border: 1px solid rgb(0, 0, 0); text-align: center;"
                        width="200">

                        <img src="{{ asset('IMG/logotipohancho.png') }}" width="" height="100px">
                        {{-- <span class="user-level">No se ha subido una foto</span>
                    </td>
                @endif --}}

            </tr>
            {{-- <tr style=" background-color:rgb(0, 64, 255) ">
                <td style="text-align: center; border: 1px solid rgb(0, 0, 0);">
                    <h4 style="padding:0%;margin:0;  color:white">DATO 2</h4>
                </td>
            </tr>
            <tr style=" background-color:rgb(0, 64, 255) ">
                <td style="text-align: center; border: 1px solid rgb(0, 0, 0);">
                    <h4 style="padding:0%;margin:0; color:white">DATO 3</h4>
                </td>
            </tr> --}}
        </table>
        <br>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border: 0px solid rgb(0, 0, 0);  background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255)">DESCRIPCION DEL EQUIPO</h4>
                </th>
            </tr>
        </table>
        <table style=" text-align: center; border:0px solid rgb(255, 255, 255);">
            <!-- 7 Filas en las primeras 2 columnas -->
            <tr>
                <td style="width: 25%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">SERVICIO: </td>
                <td style="width: 15%;border: 1px solid rgb(255, 255, 255);">
                    {{ $hdvs->servicio?->nombreservicio ?? '---' }} </td>
                <td style="width: 25%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">CODIGO ECRI: </td>
                <td style="width: 15%;border: 1px solid rgb(255, 255, 255);">{{ $hdvs->codecri?->codiecri ?? '---' }}
                </td>
                <td rowspan="7" style="  border: 1px solid rgb(196, 196, 196); ">
                    @if (!empty($hdvs->foto) && Storage::exists('public/' . $hdvs->foto))
                        <center>
                            <img src="{{ asset('storage') . '/' . $hdvs->foto }}" style="width: 100%; max-height:150px ;object-fit: cover;" 
                                alt="145px">
                        </center>
                    @else
                        <center>
                            <span>No se registro imagen</span>
                        </center>
                    @endif
                </td>
            </tr>
            <tr class="f">
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">NOMBRE: </td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->equipo?->nombre_equipo ?? '---' }}</td>

                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">N° ACTIVO FIJO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->actFijo ?? '---' }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">MARCA: </td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->marca?->nombre_marca ?? '---' }}</td>

                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">UBICACION FISICA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->ubifisica?->ubicacionfisica ?? '---' }}
                </td>
            </tr>
            <tr class="f">
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">MODELO: </td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->modelo?->nombre_modelo ?? '---' }}</td>

                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">N° REGISTRO INVIMA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->regInvima ?? '---' }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">SERIE: </td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->serie ?? '---' }}</td>

                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CLASIFICACION DE RIESGO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->claRiesgo?->clariesgo ?? '---' }}</td>
            </tr>
            <tr class="f">
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">TECNOLOGIA PREDOMINANTE</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->tecPredo?->tecpredo ?? '---' }}</td>

                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CLASIFICACION BIOMEDICA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->claBiome?->clabiomedica ?? '---' }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">PERIODICIDAD DE CALIBRACION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->perioCali ?? 'NO REGISTRA' }}</td>

                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CLASIFICACION POR USO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->claUso?->clauso ?? '---' }}</td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border: 0px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255)">REGISTRO HISTORICO</h4>
                </th>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <td style="width: 20%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">FECHA DE ADQUISICION</td>
                <td style="width: 12%;border: 1px solid rgb(255, 255, 255);">{{ $hdvs->fechaAdquisicion ?? '---' }}
                </td>

                <td style="width: 20%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">FACTURA / CONTRATO</td>
                <td style="width: 12%;border: 1px solid rgb(255, 255, 255);">{{ $hdvs->factura ?? '---' }}</td>

                <td style="width: 20%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">COSTO</td>
                <td style="width: 12%;border: 1px solid rgb(255, 255, 255);">{{ $hdvs->costo ?? '---' }}</td>
            </tr>
            <tr class="f">
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">FECHA DE INSTALACICON</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->fechaInstalacion ?? '---' }}</td>

                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">FORMA DE ADQUISICION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->formaadqui?->formaadqui ?? '---' }}</td>

                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">PROPIEDAD</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->propiedad?->nombreempresa ?? '---' }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">GARANTIA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->garantia ?? '---' }}</td>

                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">VIDA UTIL</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->vidaUtil ?? '---' }}</td>

                {{-- <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);"></td>ZZZ
                <td style="border: 1px solid rgb(255, 255, 255);"></td> --}}

                      <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">estado</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->estadoequipo?->estadoequipo ??  '---' }}</td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border: 0px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255);">REGISTRO TÉCNICO</h4>
                </th>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <td style="width: 20%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">FUENTE DE ALIMENTACION
                </td>
                <td style="width: 12%;border: 1px solid rgb(255, 255, 255);">{{ $hdvs->magFuenAlimen?->nombrealimentacion ?? '---' }}</td>
                <td style="width: 20%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">FRECUENCIA</td>
                <td style="width: 12%;border: 1px solid rgb(255, 255, 255);">{{ $hdvs->frecuencia ?? '--' }} - {{ $hdvs->mag_fres?->abreviacionfrecuencia ?? '--' }}</td>
                <td style="width: 20%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">CAPACIDAD</td>
                <td style="width: 12%;border: 1px solid rgb(255, 255, 255);">{{ $hdvs->capacidad ?? '--' }} - {{ $hdvs->mag_capas?->abreviacioncapacidad ?? '--' }}</td>
            </tr>
            <tr class="f">
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">VOLTAJE MAX</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->volMax ?? '--' }} -
                    {{ $hdvs->mag_fuen_alis?->abrefuentealimen ?? '--' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CORRIENTE MAX</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->corrienteMax ?? '--' }} -
                    {{ $hdvs->mag_corrientes?->abreviacioncorriente ?? '--' }} </td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">TEMPERATURA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->temperatura ?? '--' }} -
                    {{ $hdvs->mag_temps?->abreviaciontemperatura ?? '--' }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">VOLTAJE MIN</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->volMin ?? '--' }} -
                    {{ $hdvs->mag_fuen_alis?->abrefuentealimen ?? '--' }}</td>
                </td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CORRIENTE MIN</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->corrienteMin ?? '--' }} -
                    {{ $hdvs->mag_corrientes?->abreviacioncorriente ?? '--' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">VELOCIDAD</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->velocidad ?? '--' }} -
                    {{ $hdvs->mag_vels?->abreviacionvelocidad ?? '--' }}</td>
                </td>
            </tr>
            <tr class="f">
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">PRESION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->presion ?? '--' }} -
                    {{ $hdvs->mag_pres?->abreviacionpresion ?? '--' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">POTENCIA</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->potencia ?? '--' }} -
                    {{ $hdvs->mag_pots?->abreviacionpotencia ?? '--' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">HUMEDAD</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->humedad ?? '--' }} {{ '%' }}
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">PESO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->peso ?? '--' }} -
                    {{ $hdvs->mag_peso?->abreviacionpeso ?? '--' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">DIMENSIONES</td>
                <td style="border: 1px solid rgb(255, 255, 255);">Alto: {{ $hdvs->dimAlto ?? '--' }} Largo:
                    {{ $hdvs->dimAlto ?? '--' }}</td>
                <td style="border: 1px solid rgb(255, 255, 255);"> Ancho: {{ $hdvs->dimAncho ?? '--' }}
                    {{ $hdvs->mag_dimension?->nombredimension ?? '---' }} </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th
                    style="text-align: center; border-top: 0px solid rgb(0, 0, 0); border-left: 0px solid rgb(0, 0, 0); border-right: 0px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255);">ACCESORIOS</h4>
                </th>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style=" border:1px solid rgb(255, 255, 255);background-color:rgb(0, 64, 255);width: 20%; color:white;">
                    NOMBRE</th>
                <th style="border: 1px solid rgb(254, 254, 254);background-color:rgb(0, 64, 255); width: 20%;color:white;">
                    MARCA</th>
                <th style="border: 1px solid rgb(255, 255, 255);background-color:rgb(0, 64, 255); width: 20%;color:white;">
                    MODELO</th>
                <th style="border: 1px solid rgb(255, 255, 255);background-color:rgb(0, 64, 255); width: 20%;color:white;">
                    SERIE</th>
                <th style="border: 1px solid rgb(255, 255, 255);background-color:rgb(0, 64, 255); width: 20%;color:white;">
                    COSTO</th>
            </tr>
            {{-- Repetir filas según la cantidad de accesorios asociados al equipo --}}
            @foreach ($hdvs->accesorios as $hdv) 
            <tr>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdv->nombreAccesorio ?? '---' }}
                </td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdv->marcaAccesorio ?? '---' }}
                </td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdv->modeloAccesorio ?? '---' }}
                </td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdv->serieAccesorio ?? '---' }}
                </td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdv->costoAccesorio ?? '---' }}
                </td>
            </tr>
            @endforeach
            {{-- <tr class="f">
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->marcaAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->marcaAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->marcaAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->marcaAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->marcaAccesorio ?? '---' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->modeloAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->modeloAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->modeloAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->modeloAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->modeloAccesorio ?? '---' }}</td>
            </tr>
            <tr class="f">
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->serieAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->serieAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->serieAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->serieAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->serieAccesorio ?? '---' }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->costoAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->costoAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->costoAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->costoAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->costoAccesorio ?? '---' }}</td>
            </tr>
            <tr class="f">
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->nombreAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->nombreAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->nombreAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->nombreAccesorio ?? '---' }}</td>
                <td style="border: 1px solid  rgb(196, 196, 196);">{{ $hdvs->accesorio?->nombreAccesorio ?? '---' }}</td>
            </tr> --}}
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border: 0px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255)">DATOS DEL PROVEEDOR Y/O FABRICANTE</h4>
                </th>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">



            <tr>
                <td style="width: 20%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">PROVEEDOR</td>
                <td style="width: 30%;border: 1px solid rgb(255, 255, 255);">
                    {{ $hdvs->proveedor?->nombreProveedor ?? '---' }}</td>
                <td style="width: 20%;font-weight: bold;border: 1px solid rgb(255, 255, 255);">FABRICANTE</td>
                <td style="width: 30%;border: 1px solid rgb(255, 255, 255);">
                    {{ $hdvs->fabricante?->nombreFabri ?? '---' }}"</td>
            </tr>
            <tr class="f">
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">DIRECCION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->proveedor?->direccionProvee ?? '---' }}
                </td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">DIRECCION</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->fabricante?->direccionFabri ?? '---' }}
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">TELEFONO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->proveedor?->telefonoProvee ?? '---' }}
                </td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">TELEFONO</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->fabricante?->telefonoFabri ?? '---' }}
                </td>
            </tr>
            <tr class="f">
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CIUDAD/PAIS</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->proveedor?->ciudadProvee ?? '---' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">CIUDAD/PAIS</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->fabricante?->ciudadFabri ?? '---' }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">EMAIL Y/O WEB</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->proveedor?->emailWebProve ?? '---' }}</td>
                <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);">EMAIL Y/O WEB</td>
                <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->fabricante?->emailWebFabri ?? '---' }}
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border: 0px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255); ">RECOMENDACIONES</h4>
                </th>
            </tr>
        </table>
        <table>
            <tr>
                {{-- <td style="width: 100%;font-weight: bold;border: 1px solid rgb(255, 255, 255);"></td> --}}
                <td style="width: 100%;border: 1px solid rgb(255, 255, 255);"> {{ $hdvs->recomendaciones ?? '---' }}</td>
            </tr>

        </table>
        {{-- <tr>
            <td style="font-weight: bold;border: 1px solid rgb(255, 255, 255);"></td>
            <td style="border: 1px solid rgb(255, 255, 255);">{{ $hdvs->recomendacion ?? '---' }}</td>
        </tr> --}}


        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="text-align: center; border: 0px solid rgb(0, 0, 0);   background-color:rgb(0, 64, 255) ">
                    <h4 style="padding:0%;margin:0; color: rgb(255, 255, 255)">NR: NO REGISTRA NA: NO APLICA</h4>
                </th>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th style="width: 100%;"></th>
            </tr>
            <tr>
                <td style="border: 1px solid rgb(255, 255, 255);">ECRIC. Managing Service Contracts- 2th Health
                    Tecnology, 1989. Vol. III. Pág.21 organismo Internacional que identifica los equipos médicos segun
                    su prioridad de riesgo</td>
            </tr>
            <tr>
                <td style="border: 1px solid rgb(255, 255, 255);">Todos los dispositivos mmédicos que se importen y/o
                    comercialicen a partir del primero de enero de 2009, deben tener registro sanitario y/o permiso de
                    comercialización, segun el caso, con el fin de garantizar la seguridad y la calidad de estos
                    productos. Comunicado Invima 013-09. </td>
            </tr>
            <tr>
                <td style="border: 1px solid rgb(255, 255, 255);">Decreto 4725 de 2005.permite identificar los equipos
                    de acuerdo con el nivel de riesgo implicito en la atención de los papcientes o el manejo de los
                    mismos por parte de los operadores. </td>
            </tr>
            <tr>
                <td style="border: 1px solid rgb(255, 255, 255);">Es el costo del equipo unitario. más elcosto de sus
                    componentes y accesorios.Si apalica</td>
            </tr>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
