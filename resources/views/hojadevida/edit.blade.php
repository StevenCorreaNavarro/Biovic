<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('IMG/logo.png') }}">
    <title>Generar hoja de vida</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/path/to/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <style>
        /* Estilo personalizado cuando el campo tiene valor */

        .form-control.filled,
        .form-select.filled {
            background-color: rgb(248, 250, 231);
            /* border-color: rgb(183, 156, 118)!important; */
            border-color: rgb(183, 156, 118)!important;
            color: black;

        }

        select {
            color: black;
        }

        /* Estilo para el label */
        .form-label.filled {
            color: #d4bd25;
            font-weight: bold;
        }

        label,
        .form-control {
            opacity: 0;
            transform: translateY(0px);
            animation: entrada .9s ease-out forwards;
        }

        i {
            opacity: 0;
            transform: translateX(30px);
            animation: entrada 0.5s ease-out forwards;
        }

        @keyframes entrada {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }



        .fabe {

            font-size: 20px;
            color: rgb(255, 0, 0);
            margin-left: 5%;
        }

        .faber {

            font-size: 20px;
            color: #888888;
            margin-left: 5%;
        }

        .fabe:hover {
            font-size: 25px;
            color: #0062E6;
            transition: 0.3s;
        }

        .faber:hover {
            font-size: 25px;
            color: #e60000;
            transition: 0.3s;
        }

        /* From Uiverse.io by vinodjangid07 */
        button {
            position: relative;
            width: 180px;
            height: 50px;
            border: none;
            background-color: rgb(231, 0, 0);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-y: hidden;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 8px 8px 9px rgba(12, 12, 12, 0.415);
            transition-duration: .3s;
        }

        .layer {
            width: 60px;
            position: absolute;
            left: -30px;
            transition-duration: .3s;
            fill: #ffaf02;
        }

        button:hover {
            transform: translateY(5px);
            box-shadow: 3px 3px 2px rgba(0, 0, 0, 0.373);
            transition-duration: .3s;
        }

        button:hover .layer {
            left: 0%;
            width: 100%;
            transition-duration: .3s;
        }

        button p {
            color: white;
            font-weight: 600;
            font-size: 14px;
            position: absolute;
            z-index: 2;
            transition-duration: .1s;
            font-family: Whitney, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
        }

        button:hover p {
            color: transparent;
            transition-duration: .3s;
        }


        .text {
            color: white;
            /* font-weight: 600; */
            font-size: 1.5em;
            position: absolute;
            z-index: 2;
            transition-duration: .1s;
            /* font-family: Whitney, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif; */
        }

        .se {
            color: rgba(0, 0, 0, 0.234);
        }



        /* svg colors */


        /* svg colors */
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/hojadevida.js') }}"></script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalparam" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"><br>
                <div class="modal ">


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h1 class="modal-title fs-4 text-center" id="exampleModalLabel">Nuevo Parametro</h1>
                <div class="modal-body">
                    <p>
                        Se creara nuevo parametro para la hoja de vida y se guardara en base de datos para seleccionar
                        en el
                        siguiente formulario.
                    </p>
                    {{-- <button type="button" class="btn btn-primary">ACEPTARn> --}}
                    <div class="d-grid gap-2 col-6 mx-auto">

                        <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Aceptar</button>
                    </div>
                </div>

                <div class="modal">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <button type="button" class="btn btn-primary"data-bs-dismiss="modal">cerrar</button>
                </div>
            </div>
        </div>
    </div>


    @extends('layouts.header')
    <main class=" p-1 " style="background-color: rgb(255, 255, 255);">
        {{-- <form action="{{ url('/hojadevida') }}" method="POST"  enctype="multipart/form-data" class="row g-2 needs-validation  p-5" style=" border-radius:10px; " --}}
        <form action="{{ route('hojadevida.update', $hdv) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf {{-- LLave de seguridad obligatoria --}}
            @method('put')

            {{-- MDAL PARA ASEGURAR QUE GUARDA DATOS --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content"><br>
                        <div class="modal">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <h1 class="modal-title fs-4 text-center" id="exampleModalLabel">¿Seguro quieres guardar los
                            datos?</h1>

                        <div class="modal-body">
                            <p class="text-center">
                                Los datos se guardaran permanentemente
                            </p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">

                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <input type="submit" class="btn btn-primary" Value="Guardar" type="button"
                                    class="btn btn-primary">
                            </div>
                        </div>



                    </div>
                </div>
            </div>



            {{-- ----------------------------------------------------------------------------------------------------------- --}}
            {{--  --}}
            {{--                                       INICIO DESCRIPCION DE EQUIPO                                            --}}
            {{--  --}}
            {{-- ----------------------------------------------------------------------------------------------------------- --}}
            <div style="background-color: #e2e2e2;" class="row g-2 needs-validation formu p-5">

                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;  border:none;"
                    class="row g-2 mb-4 needs-validation formu p-5">
                    @if (Auth::check() && Auth::user()->role === 'Admin')
                        {{-- codigo para busqueda de usuarios --}}
                    @endif
                    <h1 class="text-white" {{-- background: linear-gradient(45deg, #ffa200, #ffdd00); --}}
                        style="background: linear-gradient(45deg, #edbd00, #ffd633);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Descripción de equipo
                    </h1>

                    <div class="row g-0 needs-validation border border-dark-subtle py-3"
                        style="background-color: #a6a6a630; border-radius:10px;">
                        <div class="col-md-4 position-relative nnn px-2">
                            <label for="equipo_id" class="form-label">Selecciona un equipo:</label>
                            {{-- border border-3 --}}
                            <select id="equipo_id" name="equipo_id" class="form-control form-select se"
                                style="box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3),-6px -6px 8px rgba(255, 255, 255, 1); border:none;border-radius:50px;">
                                <option value="{{ old('equipo', $hdv->equipo?->id) }}">
                                    {{ old('equipo', $hdv->equipo?->nombre_equipo ?? '---') }}
                                </option>
                                @foreach ($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">
                                        {{ old('equipo_id', $hdv->equipo_id) == $equipo->id ? 'SELECCIONADO---------->' : '' }}
                                        {{ $equipo->nombre_equipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 position-relative px-2">
                            <label for="marca_id" class="form-label">Selecciona una marca:</label>
                            <select id="marca" name="marca_id"
                                class="form-control form-select se"style="box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3), -6px -6px 8px rgba(255, 255, 255, 1); border:none;border-radius:50px;"
                                enable>
                                <option value="{{ old('marca_id', $hdv->marca_id) }}">
                                    {{ old('marca', $hdv->marca?->nombre_marca ?? '---') }}
                                </option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">
                                        {{ old('marca_id', $equipo->marca_id) == $marca->id ? 'SELECCIONADO---------->' : '' }}
                                        {{ $marca->nombre_marca }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- <input type="hidden" name="marca_id" value="{{ old('marca_id', $hdv->marca_id) }}"> --}}
                        </div>
                        <div class="col-md-4 position-relative px-2">
                            <label for="modelo" class="form-label">Selecciona un modelo:</label>
                            <select id="modelo" name="modelo_id"class="form-control form-select se"
                                style="                     box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3),    -6px -6px 6px rgba(255, 255, 255, 1); border:none;border-radius:50px;"
                                enable>
                                <option value="{{ old('modelo_id', $hdv->modelo_id) }}">
                                    {{ old('modelo', $hdv->modelo?->nombre_modelo ?? '---') }}
                                </option>
                                @foreach ($modelos as $modelo)
                                    <option value="{{ $modelo->id }}"
                                        {{ old('modelo_id', $marca->modelo_id) == $modelo->id ? 'SELECCIONADO---------->' : '' }}>
                                        {{ $modelo->nombre_modelo }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- <input type="hidden" name="modelo_id" value="{{ old('modelo_id', $hdv->modelo_id) }}"> --}}
                        </div>
                    </div>
                    <center>
                        <div class="col-md-3 position-relative ">
                            <div class="form-group ">
                                <label for="codigo"> Codigo visitas </label>
                                <input type="text" name="codigo" class="form-control  se"
                                    style="box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3),"
                                    value="{{ old('codigo', $hdv->codigo) }}" {{-- value="{{old('descripcion',$curso->descripcion)}}" --}} id="serie">
                            </div>
                        </div>

                    </center>


                    {{-- SEGUNDA PARTE --}}
                    {{-- SERIE --}}
                    <div class="col-md-3 position-relative ">
                        <div class="form-group ">
                            <label for="serie"> Serie </label>
                            <input type="text" name="serie" class="form-control"
                                style="box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3),"
                                value="{{ old('serie', $hdv->serie) }}" {{-- value="{{old('descripcion',$curso->descripcion)}}" --}} id="serie">
                        </div>
                    </div>

                    {{-- ACTIVO FIJO --}}
                    <div class="col-md-3 position-relative ">
                        <div class="form-group">
                            <label for=actFijo> Activo Fijo </label>
                            <input type="text" name="actFijo" class="form-control"
                                value="{{ old('actFijo', $hdv->actFijo) }}" id="actFijo">
                        </div>
                    </div>

                    {{-- ESTADO --}}
                    {{--  Mostrar valores de `$estadoequipo` para depuración
                        <pre>{{ print_r($estadoequipo->toArray()) }}</pre>   --}}
                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv">


                            <label for="estadoequipo_id">Estado del Equipo</label>
                            <i class="bi fab bi-pen" data-bs-toggle="modal" data-bs-target="#exampleModalparam"
                                onclick="transformarDiv()"></i>
                            <select name="estadoequipo_id" id="estadoequipo_id" class="form-control form-select se">
                                <option value="{{ old('estadoequipo', $hdv->estadoequipo?->estadoequipo) }} ">
                                    {{ old('estadoequipo', $hdv->estadoequipo?->estadoequipo ?? '---') }}
                                </option>


                                @foreach ($estadoequipo as $estadoequi)
                                    <option value="{{ $estadoequi->id }}"
                                        {{ (isset($hdv) && $hdv->estadoequipo_id == $estadoequi->id) || old('estadoequipo_id') == $estadoequi->id ? 'selected' : '' }}>
                                        {{ $estadoequi->estadoequipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Ubicacion Fisica --}}
                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv2">
                            <label for="ubifisica_id">Ubicación Física</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="ubifisica()"></i>
                            {{--  Mostrar valores de `$ubifisicas` para depuración
                        <pre>{{ print_r($ubifisicas->toArray()) }}</pre>  --}}
                            <select name="ubifisica_id" id="ubifisica_id" class="form-control form-select se">

                                <option value="{{ old('ubicacionfisica', $hdv->ubifisica) }}">
                                    {{ old('ubicacionfisica', $hdv->ubifisica?->ubicacionfisica ?? '---') }}</option>




                                @foreach ($ubifisicas as $ubicacion)
                                    <option value="{{ $ubicacion->id }}"
                                        {{ isset($hdv) && $hdv->ubifisica_id == $ubicacion->id ? 'selected' : '' }}>
                                        {{ $ubicacion->ubicacionfisica }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    {{-- SERVICIO --}}
                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv3">
                            <label for="servicio_id">Servicio</label><i class="bi fab bi-pen" data-bs-toggle="modal"
                                data-bs-target="#exampleModalparam" onclick="servicio()"></i>
                            {{--  Mostrar valores de `$servicios` para depuración <pre>{{ print_r($nombreservicios->toArray()) }}</pre>   --}}
                            <select name="servicio_id" id="servicio_id" class="form-control form-select se">

                                <option value="{{ old('servicio', $hdv->servicio?->nombreservicio) }} ">
                                    {{ old('servicio', $hdv->servicio?->nombreservicio ?? '---') }} </option>

                                @foreach ($nombreservicios as $servicio)
                                    <option value="{{ $servicio->id }}"
                                        {{ isset($hdv) && $hdv->servicio_id == $servicio->id ? 'selected' : '' }}>
                                        {{ $servicio->nombreservicio }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- TECNOLOGIA PREDOMINANTE --}}
                    <div class="col-md-3 ">
                        <div class="form-group" id="miDiv4">
                            <label for="tec_predo_id">Tecnologia Predominante</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="predo()"></i>
                            <select name="tec_predo_id" id="tec_predo_id" class="form-control form-select se">
                                <option value="{{ old('tecPredo', $hdv->tecPredo?->tecpredo) }}">
                                    {{ old('tecPredo', $hdv->tecPredo?->tecpredo ?? '---') }}
                                </option>
                                @foreach ($tecPredos as $tecnopredominante)
                                    <option value="{{ $tecnopredominante->id }}"
                                        {{ isset($hdv) && $hdv->tec_predo_id == $tecnopredominante->id ? 'selected' : '' }}>
                                        {{ $tecnopredominante->tecpredo }}
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- REGISTRO INVIMA --}}
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=regInvima> Registro Invima </label>
                            <input type="text" name="regInvima" class="form-control"
                                value="{{ old('regInvima', $hdv->regInvima) }}" id="regInvima">
                        </div>
                    </div>

                    {{-- CLASIFICACION DE RIESGO --}}
                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv5">
                            <label for="cla_riesgo_id">Clasificacion de Riesgo</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="riesgo()"></i>
                            <select name="cla_riesgo_id" id="cla_riesgo_id" class="form-select form-control se">

                                <option value="{{ old('claRiego', $hdv->claRiesgo?->clariesgo) }}">
                                    {{ old('claRiego', $hdv->claRiesgo?->clariesgo ?? '---') }}</option>

                                @foreach ($clariesgo as $clasiriesgo)
                                    <option value="{{ $clasiriesgo->id }}"
                                        {{ isset($hdv) && $hdv->cla_riesgo_id == $clasiriesgo->id ? 'selected' : '' }}>
                                        {{ $clasiriesgo->clariesgo }}
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- CLASIFICACION BIOMEDICA --}}
                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv6">
                            <label for="cla_biome_id">Clasificación Biomedica</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="biom()"></i>
                            <select name="cla_biome_id" id="cla_biome_id" class="form-control form-select se">
                                <option value="{{ old('claBiome', $hdv->claBiome?->clabiomedica) }}">
                                    {{ old('claBiome', $hdv->claBiome?->clabiomedica ?? '---') }}</option>
                                @foreach ($clabiomedica as $clasibiomedica)
                                    <option value="{{ $clasibiomedica->id }}"
                                        {{ isset($hdv) && $hdv->cla_biome_id == $clasibiomedica->id ? 'selected' : '' }}>
                                        {{ $clasibiomedica->clabiomedica }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv7">
                            <label for="cla_uso_id">Clasificacion por Uso</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="uso()"></i>
                            <select name="cla_uso_id" id="cla_uso_id" class="form-control form-select se ">
                                <option value="{{ old('claUso', $hdv->claUso?->clauso) }}">

                                </option>

                                @foreach ($clauso as $clasiuso)
                                    <option value="{{ $clasiuso->id }}"
                                        {{ isset($hdv) && $hdv->cla_uso_id == $clasiuso->id ? 'selected' : '' }}>
                                        {{ $clasiuso->clauso }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--  Código Ecri --}}
                    <div class="col-md-3 position-relative">
                        <label for="search-codiecri">Código Ecri</label>
                        <div style="display: flex; align-items: center;">
                            <!-- Input para buscar -->
                            <input type="text" id="search-codiecri" class="form-control"
                                placeholder="Buscar código" style="margin-right: 10px;" />
                            <!-- Select con opciones de la tabla -->
                            <select name="cod_ecri_id" id="codecris" class="form-control form-select se">
                                <option value="{{ old('codecri', $hdv->codecri?->codiecri) }}">
                                    {{ old('codecri', $hdv->codecri?->codiecri ?? '---') }} </option>
                                @foreach ($codiecri as $codigoecri)
                                    <option value="{{ $codigoecri->id }}"
                                        {{ (isset($hdv) && $hdv->cod_ecri_id == $codigoecri->id) || old('cod_ecri_id') == $codigoecri->id ? 'selected' : '' }}
                                        data-codiecri="{{ strtolower($codigoecri->codiecri) }}"
                                        data-nombrecodiecri="{{ strtolower($codigoecri->nombrecodiecri) }}">
                                        {{ $codigoecri->codiecri }} - {{ $codigoecri->nombrecodiecri }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Script Codigo Ecri -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const searchInput = document.getElementById('search-codiecri');
                            const select = document.getElementById('codecris');

                            searchInput.addEventListener('input', function() {
                                const searchValue = this.value.toLowerCase().trim();
                                const options = select.querySelectorAll('option');

                                let matchingOption = null;
                                let matchCount = 0;

                                options.forEach(option => {
                                    if (option.value === "") return;

                                    const codigo = option.dataset.codiecri;
                                    const nombre = option.dataset.nombrecodiecri;

                                    const matches = codigo.includes(searchValue) || nombre.includes(searchValue);

                                    option.style.display = matches ? '' : 'none';

                                    if (matches) {
                                        matchingOption = option;
                                        matchCount++;
                                    }
                                });

                                // Autoselección si solo hay una coincidencia
                                if (matchCount === 1 && matchingOption) {
                                    select.value = matchingOption.value;
                                } else {
                                    select.value = "";
                                }
                            });
                        });
                    </script>
                    {{-- Fin Codigo ecri --}}

                    {{--  Calibracion  --}}
                    <div class="col-md-3 position-relative">
                        <label for="perioCali">Periodo de Calibracion</label>
                        <select name="perioCali" id="perioCali" class="form-control form-select se" required
                            onchange="mostrarFechaCali()">
                            <option value="{{ old('periCali', $hdv->perioCali) }}">
                                {{ old('periCali', $hdv->perioCali ?? '---') }}</option>
                            <option value="">No Aplica</option>
                            <option value="anual">Anual</option>
                        </select>
                    </div>
                    {{-- INICIO CALIBRACION --}}
                    <div class="col-md-3 position-relative" id="fechaCaliContainer" style="display: none;">
                        <label for="fechaCali">Fecha Cali</label>
                        <input type="date" name="fechaCali" id="fechaCali" class="form-control">
                    </div>
                    {{-- FIN CALIBRACION --}}

                    {{-- Script para mostrar el campo de fecha de calibración --}}
                    <script>
                        function mostrarFechaCali() {
                            const periodo = document.getElementById('perioCali').value;
                            const fechaCaliDiv = document.getElementById('fechaCaliContainer');
                            const fechaCaliInput = document.getElementById('fechaCali');

                            // Establecer la fecha máxima (hoy) en el input de fecha de calibración
                            const hoy = new Date();
                            const dd = String(hoy.getDate()).padStart(2, '0');
                            const mm = String(hoy.getMonth() + 1).padStart(2, '0');
                            const yyyy = hoy.getFullYear();
                            const fechaHoy = yyyy + '-' + mm + '-' + dd;

                            // Establecer la fecha mínima (un año atrás) en el input de fecha de calibración
                            const unAnoAtras = new Date();
                            unAnoAtras.setFullYear(unAnoAtras.getFullYear() - 1);
                            const ddAtras = String(unAnoAtras.getDate()).padStart(2, '0');
                            const mmAtras = String(unAnoAtras.getMonth() + 1).padStart(2, '0');
                            const yyyyAtras = unAnoAtras.getFullYear();
                            const fechaAtras = yyyyAtras + '-' + mmAtras + '-' + ddAtras;

                            // Establecer el rango de fechas
                            fechaCaliInput.setAttribute('max', fechaHoy); // Fecha máxima: Hoy
                            fechaCaliInput.setAttribute('min', fechaAtras); // Fecha mínima: Un año atrás

                            if (periodo === 'anual' || periodo === 'cuatrimestre') {
                                fechaCaliDiv.style.display = 'block';
                            } else {
                                fechaCaliDiv.style.display = 'none';
                                fechaCaliInput.value = ''; // Limpiar valor si se oculta
                            }
                        }
                    </script>
                    {{-- Imagen --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="foto">Selecciona una imagen:</label>

                            <input type="file" name="foto" id="foto"
                                class="form-control @error('foto') is-invalid @enderror" accept="image/*"
                                onchange="previewImagen(event, 'preview1')">
                            @error('foto')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                        <img id="preview1" class="img-thumbnail m-2 img-fluid mt-3" src="" width="220"
                            style="display: none;" alt="Vista previa 1">
                        <div class="form-group">
                            @if (!empty($hdv->foto) && Storage::exists('public/' . $hdv->foto))
                                <img src="{{ asset('storage') . '/' . $hdv->foto }}"
                                    style=";width: 100%; max-height:150px ;object-fit: cover;" alt="145px">
                            @else
                                <span>No se registro imagen</span>
                            @endif


                        </div>

                    </div>
                </div>
                {{-- FIN DESCRIPCION DE EQUIPO  --}}












                {{-- ----------------------------------------------------------------------------------------------------------- --}}
                {{--  --}}
                {{--                                       INICIO REGISTRO HISTORICO                                            --}}
                {{--  --}}
                {{-- ----------------------------------------------------------------------------------------------------------- --}}

                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;
                     border:none;"
                    class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 needs-validation mb-4  formu p-5">
                    {{--  Seleccion Fondo Blan --}}
                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #edbd00, #ffd633);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Registro
                        historico
                    </h1>
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=fechaAdquisicion> Fecha de Adquisicion </label>
                            <input type="date" name="fechaAdquisicion" class="form-control se" {{-- value="{{ isset($hojadevida->fechaAdquisicion) ? $hojadevida->fechaAdquisicion : old('fechaAdquisicion') }}" --}}
                                value="{{ old('fechaAdquisicion', $hdv->fechaAdquisicion) }}" id="fechaAdquisicion">
                        </div>
                    </div>

                    {{-- <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=garantia> Garantía </label>
                            <input type="date" name="garantia" class="form-control"
                                value="{{ isset($hojadevida->garantia) ? $hojadevida->garantia : old('garantia') }}"
                                id="garantia">
                        </div>
                    </div> --}}


                    {{--  Fecha Garantia Calculada --}}
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="garantia">Garantía (1 año después)</label>
                            <input type="text" id="garantiaCalculada" class="form-control" readonly>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const fechaAdquisicionInput = document.getElementById('fechaAdquisicion');
                            const garantiaInput = document.getElementById('garantiaCalculada');

                            function calcularGarantia() {
                                const fechaAdquisicion = new Date(fechaAdquisicionInput.value);
                                if (!isNaN(fechaAdquisicion)) {
                                    const garantia = new Date(fechaAdquisicion);
                                    garantia.setFullYear(garantia.getFullYear() + 1);

                                    const dd = String(garantia.getDate()).padStart(2, '0');
                                    const mm = String(garantia.getMonth() + 1).padStart(2, '0');
                                    const yyyy = garantia.getFullYear();


                                    garantiaInput.value = `${yyyy}-${mm}-${dd}`;
                                } else {
                                    garantiaInput.value = '';
                                }
                            }

                            // Calcular al cargar si ya hay valor
                            calcularGarantia();

                            // Calcular cada vez que cambie la fecha de adquisición
                            fechaAdquisicionInput.addEventListener('change', calcularGarantia);
                        });
                    </script>



                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=fechaInstalacion> Fecha de Instalacion </label>
                            <input type="date" name="fechaInstalacion" class="form-control se" {{-- value="{{ isset($hojadevida->fechaInstalacion) ? $hojadevida->fechaInstalacion : old('fechaInstalacion') }}" --}}
                                value="{{ old('fechaInstalacion', $hdv->fechaInstalacion) }}" id="fechaInstalacion">
                        </div>
                    </div>



                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=factura> Factura / Contrato</label>
                            <input type="text" name="factura" class="form-control" {{-- value="{{ isset($hojadevida->factura) ? $hojadevida->factura : old('factura') }}" --}}
                                value="{{ old('factura', $hdv->factura) }}" id="factura">
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv8">
                            <label for="forma_adqui_id">Forma de Adquisicion</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="adqui()"></i>
                            <select name="forma_adqui_id" id="forma_adqui_id" class="form-control form-select se">
                                <option value="">Seleccione una opcion</option>
                                @foreach ($formaadqui as $formaadquisicion)
                                    <option value="{{ $formaadquisicion->id }}"
                                        {{ isset($hdv) && $hdv->forma_adqui_id == $formaadquisicion->id ? 'selected' : '' }}>
                                        {{ $formaadquisicion->formaadqui }}
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- Selector de años de vida útil -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="aniosVida">Años de Vida Útil</label>
                            <select id="aniosVida" class="form-control">
                                <option value="5" selected>5 años</option>
                                <option value="10">10 años</option>
                            </select>
                        </div>
                    </div>

                    <!-- Vida Útil calculada (solo visible) -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="vidaUtil">Vida Útil</label>
                            <input type="text" id="vidaUtilCalculada" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Campo oculto para enviar (guarda el valor calculado) -->
                    <input type="hidden" name="vidaUtil" id="vidaUtil"
                        value="{{ old('vidaUtil', $hojadevida->vidaUtil ?? '') }}">



                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=costo> Costo </label>
                            <input type="text" name="costo" class="form-control" {{-- value="{{ isset($hojadevida->costo) ? $hojadevida->costo : old('costo') }}" --}}
                                value="{{ old('costo', $hdv->costo) }}" id="costo">
                        </div>
                    </div>

                    <div class="col-md-3 ">
                        <div class="form-group" id="miDivpropiedad">
                            <label for="propiedad_id">Propiedad</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="propiedad()"></i>
                            <select name="propiedad_id" id="propiedad_id" class="form-control form-select se">
                                <option value="">Seleccione una opcion</option>
                                @foreach ($propiedad as $nombreempre)
                                    <option value="{{ $nombreempre->id }}"
                                        {{ isset($hdv) && $hdv->propiedad_id == $nombreempre->id ? 'selected' : '' }}>
                                        {{ $nombreempre->nombreempresa }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br><br><br>
                </div>
                {{-- FIN REGISTRO HISTORICO --}}

                {{-- ----------------------------------------------------------------------------------------------------------- --}}
                {{--  --}}
                {{--                                       INICIO REGISTRO TECNICO                                            --}}
                {{--  --}}
                {{-- ----------------------------------------------------------------------------------------------------------- --}}



                {{-- INICIO REGISTRO TECNICO --}}
                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;          border:none;"
                    class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 needs-validation mb-4  formu p-5">
                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #edbd00, #ffd633);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Registro tecnico
                    </h1>

                    <div class="col-md-4 position-relative">
                        <div class="form-group" id="miDiv9">
                            <label for="mag_fuen_alimen_id">Fuente de Alimentación</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="fuenteali()"></i>
                            <select name="mag_fuen_alimen_id" id="mag_fuen_alimen_id"
                                class="form-control form-select se">
                                {{-- <option value="">Seleccione una opción</option> --}}
                                <option
                                    value="{{ old('nombrealimentacion', $hdv->nombrealimentacion?->nombrealimentacion) }} ">
                                    {{ old('nombrealimentacion', $hdv->nombrealimentacion?->nombrealimentacion ?? '---') }}
                                </option>

                                @foreach ($nombrealimentacion as $fuente)
                                    <option value="{{ $fuente->id }}" {{-- {{ old('mag_fuen_alimen_id', $hdv->mag_fuen_alimen_id ?? '') == $fuente->id ? 'selected' : '' }}>
                                        {{ $fuente->nombrealimentacion }} --}}
                                        {{ isset($hdv) && $hdv->mag_fuen_alimen_id == $fuente->id ? 'selected' : '' }}>
                                        {{ $fuente->nombrealimentacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 position-relative ">
                        <div class="form-group">
                            <label for=frecuencia> Frecuencia </label>
                            <input type="number" name="frecuencia" class="form-control"
                                value="{{ isset($hdv->frecuencia) ? $hdv->frecuencia : old('frecuencia') }}"
                                id="frecuencia">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative">
                        <div class="form-group" id="miDiv10">
                            <label for="mag_fre_id">Unidad de Frecuencia</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam"
                                onclick="ufrecuencia()"></i>
                            <select name="mag_fre_id" id="mag_fre_id" class="form-control form-select se">
                                <option value="">Seleccione una opción</option>
                                @foreach ($magFrec as $frecuencia)
                                    <option value="{{ $frecuencia->id }}"
                                        {{ old('mag_fre_id', $hdv->mag_fre_id ?? '') == $frecuencia->id ? 'selected' : '' }}>
                                        {{ $frecuencia->nombrefrecuencia }} ({{ $frecuencia->abreviacionfrecuencia }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 position-relative ">
                        <div class="form-group">
                            <label for=volMax> Voltaje Max </label>
                            <input type="text" name="volMax" class="form-control"
                                value="{{ isset($hdv->volMax) ? $hdv->volMax : old('volMax') }}" id="volMax">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative ">
                        <div class="form-group">
                            <label for=volMin> Voltaje Min </label>
                            <input type="text" name="volMin" class="form-control"
                                value="{{ isset($hdv->volMin) ? $hdv->volMin : old('volMin') }}" id="volMax">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative">
                        <div class="form-group" id="miDiv11">
                            <label for="mag_fuen_ali_id">Unidad de Alimentación</label>
                            <i class="bi fab bi-pen" data-bs-toggle="modal" data-bs-target="#exampleModalparam"
                                onclick="ualimentacion()">
                            </i>
                            <select name="mag_fuen_ali_id" id="mag_fuen_ali_id" class="form-control form-select se">
                                <option value="">Seleccione una opción</option>
                                @foreach ($fuentesAli as $fuente)
                                    {{-- Asi se recibe desde  hojadevidaController --}}
                                    <option value="{{ $fuente->id }}"
                                        {{ old('mag_fuen_ali_id', $hdv->mag_fuen_ali_id ?? '') == $fuente->id ? 'selected' : '' }}>
                                        {{ $fuente->abrefuentealimen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 position-relative ">
                        <div class="form-group">
                            <label for="corrienteMax">Corriente Max</label>
                            <input type="text" name="corrienteMax" class="form-control"
                                value="{{ isset($hdv->corrienteMax) ? $hdv->corrienteMax : old('corrienteMax') }}"
                                id="corrienteMax">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative ">
                        <div class="form-group">
                            <label for="corrienteMin">Corriente Min</label>
                            <input type="text" name="corrienteMin" class="form-control"
                                value="{{ isset($hdv->corrienteMin) ? $hdv->corrienteMin : old('corrienteMin') }}"
                                id="corrienteMin">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative">
                        <div class="form-group" id="miDiv12">
                            <label for="mag_corriente_id">Unidad de Corriente</label>
                            <i class="bi fab bi-pen" data-bs-toggle="modal" data-bs-target="#exampleModalparam"
                                onclick="ucorriente()">
                            </i>
                            <select name="mag_corriente_id" id="mag_corriente_id"
                                class="form-control form-select se">
                                <option value="">Seleccione una opción</option>
                                @foreach ($corrientes as $corriente)
                                    <option value="{{ $corriente->id }}"
                                        {{ old('mag_corriente_id', $hdv->mag_corriente_id ?? '') == $corriente->id ? 'selected' : '' }}>
                                        {{ $corriente->abreviacioncorriente }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>




                    <div class="col-md-3 position-relative ">
                        <div class="form-group">
                            <label for="peso">Peso Equipo</label>
                            <input type="text" name="peso" class="form-control"
                                value="{{ isset($hdv->peso) ? $hdv->peso : old('peso') }}" id="peso">
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv13">
                            <label for="mag_peso_id">Unidad de Peso</label>
                            <i class="bi fab bi-pen" data-bs-toggle="modal" data-bs-target="#exampleModalparam"
                                onclick="upeso()">
                            </i>
                            <select name="mag_peso_id" id="mag_peso_id" class="form-control form-select se">
                                <option value="">Seleccione una opción</option>
                                @foreach ($pesos as $peso)
                                    <option value="{{ $peso->id }}"
                                        {{ old('mag_peso_id', $hdv->mag_peso_id ?? '') == $peso->id ? 'selected' : '' }}>
                                        {{ $peso->abreviacionpeso }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 position-relative ">
                        <div class="form-group">
                            <label for="presion">Presión</label>
                            <input type="text" name="presion" class="form-control"
                                value="{{ isset($hdv->presion) ? $hdv->presion : old('presion') }}" id="presion">
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_pre_id">Unidad de Presión</label>
                            <select name="mag_pre_id" id="mag_pre_id" class="form-control form-select se">
                                <option value="">Seleccione una opción</option>
                                @foreach ($presiones as $presion)
                                    <option value="{{ $presion->id }}"
                                        {{ old('mag_pre_id', $hdv->mag_pre_id ?? '') == $presion->id ? 'selected' : '' }}>
                                        {{ $presion->abreviacionpresion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="potencia">Potencia</label>
                            <input type="text" name="potencia" class="form-control"
                                value="{{ isset($hdv->potencia) ? $hdv->potencia : old('potencia') }}"
                                id="potencia">
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_pot_id">Unidad de Potencia</label>
                            <select name="mag_pot_id" id="mag_pot_id" class="form-control form-select se">
                                <option value="">Seleccione una opción</option>
                                @foreach ($potencias as $potencia)
                                    <option value="{{ $potencia->id }}"
                                        {{ old('mag_pot_id', $hdv->mag_pot_id ?? '') == $potencia->id ? 'selected' : '' }}>
                                        {{ $potencia->abreviacionpotencia }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="temperatura">Temperatura de Trabajo</label>
                            <input type="text" name="temperatura" class="form-control" {{-- value="{{ old('temperatura',$hdv->temperatura)? $hdv->temperatura : old('temperatura') }} --}}
                                value="{{ isset($hdv->temperatura) ? $hdv->temperatura : old('temperatura') }}"
                                id="temperatura">
                        </div>
                    </div>

                    <!-- Selección de Unidad de Temperatura -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_temp_id">Unidad de Temperatura</label>
                            <select name="mag_temp_id" id="mag_temp_id" class="form-control form-select se">
                                <option value="">Seleccione una opción</option>
                                @foreach ($temperaturas as $temp)
                                    <option value="{{ $temp->id }}"
                                        {{ old('mag_temp_id', $hdv->mag_temp_id ?? '') == $temp->id ? 'selected' : '' }}>
                                        {{ $temp->nombretemperatura }} <!-- Mostrar nombre de la temperatura -->
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Campo Velocidad -->
                    <div class="col-md-4 position-relative">
                        <div class="form-group">
                            <label for="velocidad">Velocidad</label>
                            <input type="text" name="velocidad" class="form-control" {{-- value="{{ old('velocidad') }}" id="velocidad"> --}}
                                value="{{ isset($hdv->velocidad) ? $hdv->velocidad : old('velocidad') }}">
                        </div>
                    </div>

                    <!-- Select Unidad Velocidad -->
                    <div class="col-md-4 position-relative">
                        <div class="form-group">
                            <label for="mag_vel_id">Unidad de Velocidad</label>
                            <select name="mag_vel_id" id="mag_vel_id" class="form-control form-select se">
                                <option value="">Seleccione una opción</option>
                                @foreach ($velocidad as $vel)
                                    <option value="{{ $vel->id }}"
                                        {{ old('mag_vel_id', $hdv->mag_vel_id ?? '') == $vel->id ? 'selected' : '' }}>
                                        {{ $vel->abreviacionvelocidad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Campo Humedad -->
                    <div class="col-md-4 position-relative">
                        <div class="form-group">
                            <label for="humedad">Humedad (%)</label>
                            <input type="text" name="humedad" class="form-control"
                                value="{{ isset($hdv->humedad) ? $hdv->humedad : old('humedad') }}"
                                {{-- value="{{ old('humedad') }}" --}} id="humedad">
                        </div>
                    </div>

                    <!-- Tamaño Equipo -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="dimLargo">Largo</label>
                            <input type="text" name="dimLargo" class="form-control"
                                value="{{ isset($hdv->dimLargo) ? $hdv->dimLargo : old('dimLargo') }}"
                                {{-- value="{{ old('dimLargo' ) }}"  --}} id="dimLargo">
                        </div>
                    </div>

                    <!-- Campo Ancho -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="dimAncho">Ancho</label>
                            <input type="text" name="dimAncho" class="form-control"
                                value="{{ isset($hdv->dimAncho) ? $hdv->dimAncho : old('dimAncho') }}"
                                {{-- value="{{ old('dimAncho') }}"  --}} id="dimAncho">
                        </div>
                    </div>

                    <!-- Campo Alto -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="dimAlto">Alto</label>
                            <input type="text" name="dimAlto" class="form-control"
                                value="{{ isset($hdv->dimAlto) ? $hdv->dimAlto : old('dimAlto') }}"
                                {{-- value="{{ old('dimAlto') }}" --}} id="dimAlto">
                        </div>
                    </div>

                    <!-- Seleccion Unidad Dimensión -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_dimension_id">Unidad de Dimensión</label>
                            <select name="mag_dimension_id" id="mag_dimension_id"
                                class="form-control form-select se">
                                <option value="">Seleccione una opción</option>
                                @foreach ($dimensiones as $dim)
                                    <option value="{{ $dim->id }}"
                                        {{ old('mag_dimension_id', $hdv->mag_dimension_id ?? '') == $dim->id ? 'selected' : '' }}>
                                        {{ $dim->abreviaciondimension }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <br>
                    <br>

                </div>
                {{-- FIN REGISTRO TECNICO --}}
                {{-- ----------------------------------------------------------------------------------------------------------- --}}
                {{--  --}}
                {{--                                       INICIO ACCESORIOS                                            --}}
                {{--  --}}
                {{-- ----------------------------------------------------------------------------------------------------------- --}}


                {{-- <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;
                    border:none;"
                    class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 needs-validation mb-4  formu p-5">
                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #0062E6, #33AEFF);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Accesorios
                    </h1> --}}




                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;
                    border:none;"
                    class="row g-2 mb-4 needs-validation formu p-5">

                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #edbd00, #ffd633);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Accesorios
                    </h1>

                    <!-- CONTENEDOR DE ACCESORIOS -->
                    <div id="contenedorAccesorios">
                        @foreach ($hdv->accesorios as $accesorio)
                            <div class="row accesorio-item mb-2">
                                <!-- id oculto para saber si este accesorio ya existe -->
                                <input type="hidden" name="accesorio_id[]" value="{{ $accesorio->id }}">

                                <div style="width: 20%" class="col-md-2">
                                    <label>Nombre</label>
                                    <input type="text" name="nombreAccesorio[]" class="form-control"
                                        value="{{ $accesorio->nombreAccesorio }}">
                                </div>
                                <div style="width: 20%" class="col-md-2">
                                    <label>Marca</label>
                                    <input type="text" name="marcaAccesorio[]" class="form-control"
                                        value="{{ $accesorio->marcaAccesorio }}">
                                </div>
                                <div style="width: 20%" class="col-md-2">
                                    <label>Modelo</label>
                                    <input type="text" name="modeloAccesorio[]" class="form-control"
                                        value="{{ $accesorio->modeloAccesorio }}">
                                </div>
                                <div style="width: 20%" class="col-md-2">
                                    <label>Serie</label>
                                    <input type="text" name="serieAccesorio[]" class="form-control"
                                        value="{{ $accesorio->serieAccesorio }}">
                                </div>
                                <div style="width: 20%" class="col-md-2">
                                    <label>Costo</label>
                                    <input type="number" name="costoAccesorio[]" class="form-control"
                                        value="{{ $accesorio->costoAccesorio }}">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <br>

                    <div class="d-grid gap-2 d-md-block">
                        <i class="btn btn-outline-primary" onclick="agregarAccesorio()">Agregar</i>
                        <i class="btn btn-outline-danger" onclick="eliminarAccesorio()">Remover</i>
                    </div>
                </div>


                <script>
                    function agregarAccesorio() {
                        let contenedor = document.getElementById("contenedorAccesorios");
                        let item = contenedor.querySelector(".accesorio-item");

                        if (!item) return; // por si no hay ninguno

                        // Clonar bloque
                        let nuevoItem = item.cloneNode(true);

                        // Limpiar valores de inputs (incluyendo el hidden id)
                        nuevoItem.querySelectorAll("input").forEach(input => input.value = "");

                        contenedor.appendChild(nuevoItem);
                    }

                    function eliminarAccesorio() {
                        let contenedor = document.getElementById("contenedorAccesorios");
                        let items = contenedor.querySelectorAll(".accesorio-item");

                        if (items.length > 1) {
                            contenedor.removeChild(items[items.length - 1]);
                        } else {
                            alert("Debe haber al menos un accesorio.");
                        }
                    }
                </script>

                <!-- MENSAJE SI NO HAY ACCESORIOS -->
                <div id="mensaje_no_accesorios" class="alert alert-warning mt-3 d-none">
                    No hay accesorios disponibles para el equipo seleccionado.
                </div>

                <!-- INFO DEL ACCESORIO EN FORMATO DE FILAS -->
                <div id="info_accesorio" class="container mt-4 d-none">
                    <div class="row border rounded p-3 bg-light shadow-sm">
                        <div class="col-12 mb-2">
                            <h5 class="text-primary">Detalles del accesorio seleccionado:</h5>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Nombre:</strong> <span id="descripcion_accesorio"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Modelo:</strong> <span id="modelo_accesorio"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Serie:</strong> <span id="serie_accesorio"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Costo:</strong> <span id="costo_accesorio"></span>
                        </div>
                    </div>
                </div>
           
            {{-- FIN ACCESORIOS --}}
             {{--  INICIO  FABRICANTE - PROVEEDOR  --}}

                  

                {{-- ----------------------------------------------------------------------------------------------------------- --}}

                {{--                                     INICIO  FABRICANTE - PROVEEDOR                                          --}}

                {{-- ------------------------------------------------------------------------------------------------------- --}}

                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;                     border:none;"
                    class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 needs-validation mb-4  formu p-5">

                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #edbd00, #ffd633);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Datos del fabricante y proveedor
                    </h1>

                    <!-- COLUMNA IZQUIERDA - FABRICANTE -->
                    <div class="col-md-6 mb-4">
                        <div class="mb-3" id="miDiv14">

                            <div id="select-fabricante-container">
                                <label for="fabricante_id" class="form-label fw-bold">Selecciona un fabricante:</label>
                                <i class="bi fab bi-pen" onclick="toggleFormulario('fabricante')"></i>
                                <select id="fabricante_id" name="fabricante_id"
                                    class="form-select border border-2 rounded-3  se">
                                    <option value="">Seleccione un fabricante</option>

                                    @foreach ($fabricantes as $fabricante)
                                        <option value="{{ $fabricante->id }}"

                                            data-nombre-fabri="{{ $fabricante->nombreFabri ?? 'No disponible' }}"
                                            {{ old('fabricante_id', $hdv->fabricante_id ?? '') == $fabricante->id ? 'selected' : '' }}
                                            
                                            data-direccion-fabri="{{ $fabricante->direccionFabri ?? 'No disponible' }}"
                                            data-telefono-fabri="{{ $fabricante->telefonoFabri ?? 'No disponible' }}"
                                            data-ciudad-fabri="{{ $fabricante->ciudadFabri ?? 'No disponible' }}"
                                            data-email-fabri="{{ $fabricante->emailWebFabri ?? 'No disponible' }}">
                                            {{ $fabricante->nombreFabri ?? 'No disponible' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="formulario-fabricante-container" style="display: none;">
                                <div>
                                    <label for="nombreFabri" class="form-label fw-bold">Registra nuevo fabricante</label><i class="fa-solid fa-xmark" onclick="toggleFormulario('fabricante')"
                                        style="cursor:pointer; margin-left:10px;"></i>
                                    <div>
                                        <label for="fabricante_id ">Nombre</label>
                                        <input name="nombreFabri" type="text" id="nombreFabri"      class="form-control dv c">
                                    </div>
                                    <div>
                                        <label for="fabricante_id">Direccion</label>
                                        <input name="direccionFabri" type="text" id="direccionFabri"
                                            class="form-control dv ">
                                    </div>
                                    <div>
                                        <label for="fabricante_id">Telefono</label>
                                        <input name="telefonoFabri" type="text" id="telefonoFabri"
                                            class="form-control dv ">
                                            
                                            
                                    </div>
                                    <div>
                                        <label for="fabricante_id">Ciudad</label>
                                        <input name="ciudadFabri" type="text" id="ciudadFabri"
                                            class="form-control dv ">
                                    </div>
                                    <div>
                                        <label for="fabricante_id">Correo electronico</label>
                                        <input name="emailWebFabri" type="text" id="emailWebFabri"
                                            class="form-control dv ">
                                    </div>
                                </div>
                            </div>

                            <div id="info_fabricante" style="display:;">
                                <h5 class="mt-3">Detalles del fabricante seleccionado:</h5>
                                <p><strong>Nombre:</strong> <span id="nombre_fabricante">{{ $hdv->fabricante?->nombreFabri ?? '---' }}</span></p>
                                <p><strong>Dirección:</strong> <span id="direccion_fabricante">{{ $hdv->fabricante?->direccionFabri ?? '---' }}</span></p>
                                <p><strong>Teléfono:</strong> <span id="telefono_fabricante">  {{ $hdv->fabricante?->telefonoFabri ?? '---' }}</span></p>
                                <p><strong>Ciudad:</strong> <span id="ciudad_fabricante">{{ $hdv->fabricante?->ciudadFabri ?? '---' }}</span></p>
                                <p><strong>Email:</strong> <span id="email_fabricante">{{ $hdv->fabricante?->emailWebFabri ?? '---' }}</span></p>
                            </div>
                            <div id="mensaje_no_fabricantes" class="alert alert-warning mt-3" style="display: none;">
                                No hay fabricantes disponibles.
                            </div>
                        </div>
                    </div>

                    <!-- COLUMNA DERECHA - PROVEEDOR -->
                    <div class="col-md-6 mb-4">
                        <div class="mb-3" id="miDiv15">

                            <div id="select-proveedor-container">
                                <label for="proveedor_id" class="form-label fw-bold">Selecciona un proveedor:</label>
                                <i class="bi fab bi-pen" data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="toggleFormulario('proveedor')"></i>
                                <select id="proveedor_id" name="proveedor_id"  class="form-select border border-2 rounded-3  se">
                                    <option value="">Seleccione un proveedor</option>
                                    
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{old('proveedor', $proveedor->id) }}" 

                                            data-nombre-proveedor="{{ $proveedor->nombreProveedor ?? 'No disponible' }}"
                                            {{ old('proveedor_id', $hdv->proveedor_id ?? '') == $proveedor->id ? 'selected' : '' }}
                                            

                                            data-direccion-proveedor="{{ $proveedor->direccionProvee ?? 'No disponible' }}"
                                            data-telefono-proveedor="{{ $proveedor->telefonoProvee ?? 'No disponible' }}"
                                            data-ciudad-proveedor="{{ $proveedor->ciudadProvee ?? 'No disponible' }}"
                                            data-email-proveedor="{{ $proveedor->emailWebProve ?? 'No disponible' }}">
                                            {{old('proveedor', $proveedor->nombreProveedor ?? 'No disponible') }} - {{old('proveedor', $proveedor->ciudadProvee ?? 'No disponible') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="formulario-proveedor-container" style="display: none;">
                                <div>
                                    <label for="" class="form-label fw-bold">Registra nuevo proveedor</label>
                                    <i class="fa-solid fa-xmark" onclick="toggleFormulario('proveedor')"
                                        style="cursor:pointer; margin-left:10px;"></i>

                                    <div>
                                        <label for="proveedor_id">Nombre</label>
                                        <input name="nombreProveedor" type="text"
                                            id="nombreProveedor" class="form-control dv c"
                                            >
                                    </div>
                                    <div>
                                        <label for="proveedor_id">Direccion</label>
                                        <input name="direccionProvee" type="text"
                                            id="direccionProvee" class="form-control dv ">
                                    </div>
                                    <div>
                                        <label for="proveedor_id">Telefono</label>
                                        <input name="telefonoProvee" type="text"
                                            id="telefonoProvee" class="form-control dv ">
                                    </div>
                                    <div>
                                        <label for="proveedor_id">Ciudad</label>
                                        <input name="ciudadProvee"type="text"
                                            id="ciudadProvee" class="form-control dv ">
                                    </div>
                                    <div>
                                        <label for="proveedor_id">Correo electronico</label>
                                        <input name="emailWebProve" type="text" id="emailWebProve"
                                            class="form-control dv ">
                                    </div>
                                </div>
                            </div>

                            <div id="info_proveedor" style="display:;">
                                <h5 class="mt-3">Detalles del proveedor seleccionado:</h5>
                                <p><strong>Nombre:</strong> <span id="nombre_proveedor">{{ $hdv->proveedor?->nombreProveedor ?? '---' }}</span></p>
                                <p><strong>Dirección:</strong> <span id="direccion_proveedor">{{ $hdv->proveedor?->direccionProvee ?? '---' }}</span></p>
                                <p><strong>Teléfono:</strong> <span id="telefono_proveedor">{{ $hdv->proveedor?->telefonoProvee ?? '---' }}</span></p>
                                <p><strong>Ciudad:</strong> <span id="ciudad_proveedor">{{ $hdv->proveedor?->ciudadProvee ?? '---' }}</span></p>
                                <p><strong>Email:</strong> <span id="email_proveedor">{{ $hdv->proveedor?->emailWebProve ?? '---' }}</span></p>
                            </div>
                            <div id="mensaje_no_proveedores" class="alert alert-warning mt-3" style="display: none;">
                                No hay proveedores disponibles.
                            </div>
                        </div>
                    </div>
                    <!-- Script para mostrar los detalles -->
                    <script>
                        // La función para mostrar/ocultar los formularios y los selects
                        function toggleFormulario(tipo) {
                            if (tipo === 'fabricante') {
                                const selectContainer = document.getElementById('select-fabricante-container');
                                const formContainer = document.getElementById('formulario-fabricante-container');
                                const infoContainer = document.getElementById('info_fabricante'); // Nuevo
                                const mensajeNoFabricantes = document.getElementById('mensaje_no_fabricantes'); // Nuevo

                                // Alterna la visibilidad
                                if (selectContainer.style.display !== 'none') {
                                    // Se va a mostrar el formulario, así que ocultamos el select y los detalles
                                    selectContainer.style.display = 'none';
                                    formContainer.style.display = 'block';
                                    infoContainer.style.display = 'none'; // Oculta los detalles
                                    mensajeNoFabricantes.style.display = 'none'; // Oculta el mensaje
                                } else {
                                    // Se va a mostrar el select, así que ocultamos el formulario y los detalles
                                    selectContainer.style.display = 'block';
                                    formContainer.style.display = 'none';
                                    infoContainer.style.display = 'none'; // Oculta los detalles (puedes mostrarlo si quieres)
                                    mensajeNoFabricantes.style.display = 'block'; // Muestra el mensaje de no hay datos
                                }
                            } else if (tipo === 'proveedor') {
                                const selectContainer = document.getElementById('select-proveedor-container');
                                const formContainer = document.getElementById('formulario-proveedor-container');
                                const infoContainer = document.getElementById('info_proveedor'); // Nuevo
                                const mensajeNoProveedores = document.getElementById('mensaje_no_proveedores'); // Nuevo

                                // Alterna la visibilidad
                                if (selectContainer.style.display !== 'none') {
                                    // Se va a mostrar el formulario, así que ocultamos el select y los detalles
                                    selectContainer.style.display = 'none';
                                    formContainer.style.display = 'block';
                                    infoContainer.style.display = 'none'; // Oculta los detalles
                                    mensajeNoProveedores.style.display = 'none'; // Oculta el mensaje
                                } else {
                                    // Se va a mostrar el select, así que ocultamos el formulario y los detalles
                                    selectContainer.style.display = 'block';
                                    formContainer.style.display = 'none';
                                    infoContainer.style.display = 'none'; // Oculta los detalles (puedes mostrarlo si quieres)
                                    mensajeNoProveedores.style.display = 'block'; // Muestra el mensaje de no hay datos
                                }
                            }
                        }
                        // El código que se ejecuta al cargar la página
                        document.addEventListener('DOMContentLoaded', function() {
                            // Código para mostrar detalles del fabricante (sin cambios, ya que los elementos no se eliminan)
                            document.getElementById('fabricante_id').addEventListener('change', function() {
                                var fabricanteId = this.value;
                                document.getElementById('fabricante_id').value = fabricanteId;

                                if (fabricanteId) {
                                    var fabricante = document.querySelector(
                                        `#fabricante_id option[value="${fabricanteId}"]`);
                                    document.getElementById('nombre_fabricante').textContent = fabricante.getAttribute(
                                        'data-nombre-fabri');
                                    // ... (el resto del código del fabricante)
                                    document.getElementById('info_fabricante').style.display = 'block';
                                    document.getElementById('mensaje_no_fabricantes').style.display = 'none';
                                } else {
                                    document.getElementById('info_fabricante').style.display = 'none';
                                    document.getElementById('mensaje_no_fabricantes').style.display = 'block';
                                }
                            });

                            // Código para mostrar detalles del proveedor (sin cambios, ya que los elementos no se eliminan)
                            document.getElementById('proveedor_id').addEventListener('change', function() {
                                var proveedorId = this.value;
                                if (proveedorId) {
                                    var proveedor = document.querySelector(`#proveedor_id option[value="${proveedorId}"]`);
                                    document.getElementById('nombre_proveedor').textContent = proveedor.getAttribute(
                                        'data-nombre-proveedor');
                                    // ... (el resto del código del proveedor)
                                    document.getElementById('info_proveedor').style.display = 'block';
                                    document.getElementById('mensaje_no_proveedores').style.display = 'none';
                                } else {
                                    document.getElementById('info_proveedor').style.display = 'none';
                                    document.getElementById('mensaje_no_proveedores').style.display = 'block';
                                }
                            });
                        });
                    </script>
                </div>

                   {{-- ----------------------------------------------------------------------------------------------------------- --}}

                {{--                                      RECOMENDACIONES                                                        --}}

                {{-- ----------------------------------------------------------------------------------------------------------- --}}

                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;                     border:none;"
                    class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 needs-validation mb-4  formu p-5">

                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #edbd00, #ffd633);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Recomendaciones
                    </h1>
                    <div class="col-md-12 position-relative ">
                        <div class="form-group">
                            <label for="recomendaciones"></label>
                            <textarea name="recomendaciones" id="recomendaciones" class="form-control" rows="4">{{ old('recomendaciones', $hdv->recomendaciones ?? '') }}</textarea>
                        </div>
                    </div>
                </div>





            {{-- FIN CARGA DE SOPORTES --}}

            {{-- ----------------------------------------------------------------------------------------------------------- --}}


            {{-- ACCION DE GUARDAR  --}}
            {{-- ----------------------------------------------------------------------------------------------------------- --}}
            <div class="d-flex gap-3 col-2 mx-auto">
                {{-- <button type="button" class="Btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg class="Layer" viewBox="0 0 1095.66 1095.63">
                            <path class="cls-1"
                                d="M1298,749.62c.4,300.41-243,548-548.1,547.9C446.23,1297.4,201.92,1051.2,202.29,749c.37-301.52,244.49-547.41,548.34-547.12C1055.43,202.18,1298.25,449.6,1298,749.62Z"
                                transform="translate(-202.29 -201.89)"></path>
                            <path class="cls-2"
                                d="M1285.89,749.79c-.25,297.07-241.24,535.86-536.12,535.66-296.34-.21-537-241.72-535.29-539,1.68-293.16,240.83-534.18,539.15-532.37C1046.8,215.84,1285.62,453.88,1285.89,749.79Z"
                                transform="translate(-202.29 -201.89)"></path>
                            <path class="cls-3"
                                d="M1195.29,749.56c.54,244.73-198.67,446.2-446.87,445.33C503.27,1194,304,994.53,304.93,748c.91-244.52,199.12-443.08,444.39-443.49C997.43,304,1195.74,505.59,1195.29,749.56Z"
                                transform="translate(-202.29 -201.89)"></path>
                            <path class="cls-4"
                                d="M1097.23,749.87c.22,190.31-154.42,347.43-348,346.92-192-.5-346.48-156.44-346.17-347.7C403.33,558,558.18,402,751.08,402.55,944.62,403.09,1097.69,560.56,1097.23,749.87Z"
                                transform="translate(-202.29 -201.89)"></path>
                            <path class="cls-5"
                                d="M1006.72,744.28c2.81,143.23-110.17,257.35-247.42,261.9C613.15,1011,498.22,895.93,493.71,758.88,488.93,613.71,603,498,740.69,493.28,886.73,488.24,1004,603.87,1006.72,744.28Z"
                                transform="translate(-202.29 -201.89)"></path>
                            <path class="cls-6"
                                d="M607.55,553.77c5.13,3.72,10.28,7.42,15.4,11.15l124.12,90.24a8.57,8.57,0,0,1,1.2.84c1.26,1.27,2.35,1.09,3.77,0,6.36-4.74,12.82-9.35,19.24-14l118.23-85.89c1.07-.78,2.17-1.54,3.28-2.32.82,1.1,0,2-.27,2.77Q866.29,637.48,840,718.38c-1.11,3.42-1.13,3.42,1.81,5.56l136,98.81c1.17.86,2.33,1.74,3.79,2.83-1.48.73-2.79.45-4,.45q-84.07,0-168.16,0h-.73c-3.7,0-3.68,0-4.8,3.43q-26.1,80.4-52.23,160.78c-.4,1.21-.45,2.66-1.77,3.6L735,948.24q-19.34-59.52-38.68-119c-1-3.16-1-3.17-4.6-3.17q-84.27,0-168.53,0a10.57,10.57,0,0,1-4.24-.34,13.17,13.17,0,0,1,3.33-2.77q67.55-49.08,135.1-98.18c5-3.63,4.38-1.8,2.43-7.83q-25.94-80.07-52-160.11c-.3-.91-.57-1.83-.85-2.75Z"
                                transform="translate(-202.29 -201.89)"></path>
                        </svg>
                        <p class="text">Guardar</p>
                    </button> --}}
                <button type="submit">
                    <svg class="layer" viewBox="0 0 734.93 1135.91">
                        <defs></defs>
                        <path class="cls-1"
                            d="M1.25,0V1128.28c0,6.54,0,6.54,6.52,6.54H734.91c-.22.31.5,1-.5,1h-4q-362.83,0-725.67.09c-3.75,0-4.59-.84-4.59-4.59Q.32,567.92.37,4.52C.37,3-.83,1.11,1.25,0Z"
                            transform="translate(-0.03)"></path>
                        <path class="cls-2"
                            d="M574.37,543.4C572.14,538,570,533,568,527.89c-1.14-3-2.79-4-6.06-3.28Q496.49,538.92,431,553.08a54.57,54.57,0,0,1-11.8,1.44c-32.76,0-65.53-.14-98.29.08-11.5.08-22.34-3.17-33.35-5.51q-56.28-12-112.46-24.4c-3.3-.72-5.2-.1-6.33,3.41-1.38,4.25-3.45,8.28-5.11,12.45-.86,2.15-1.56,3.07-3.65.89-4.83-5-9.93-9.84-14.8-14.84-2.73-2.8-3.53-6-2.52-10.07,3.57-14.17,7.83-28.17,9.67-42.76,1.11-8.78-.19-17.35-1.64-25.8-8.61-50.48-8.6-101.37-7.77-152.31.1-6.66.05-13.31.16-20a20.72,20.72,0,0,1,6.95-15.86c12.77-11.66,24.95-24,37.83-35.52,18.35-16.44,41-24.25,64.27-30.4,6.74-1.78,13.58-3.22,20.26-5.19,3.54-1,4.65.08,5.18,3.44,3.27,20.68,6.3,41.41,10.13,62,5,27.12,7.13,54.74,13.88,81.56a148.51,148.51,0,0,0,7.12,21.25c3.17,7.55,8.37,12.17,17,12.18,25,0,49.89.19,74.84.27,3.32,0,6.65-.09,10-.14,9.11-.15,14.71-4.94,18-13.21a179.88,179.88,0,0,0,10.88-40.85c5.45-38,12.37-75.77,18.43-113.68.55-3.44,1-6.9,1.56-10.35.3-2,.65-3.52,3.42-2.79,25.52,6.72,51.55,11.89,74.15,26.77,10.09,6.64,18.41,15.26,27.17,23.4,7.8,7.25,15.4,14.71,23.25,21.89a17.4,17.4,0,0,1,6.09,13.16c.47,49.06,3.21,98.17-4.15,147-2,13.3-3.43,26.7-5,40.07-1.52,12.87,2.26,25.06,5.18,37.33q2.31,9.7,4.82,19.36c.72,2.77.58,5.46-1.39,7.49C587,531.05,580.82,537,574.37,543.4Z"
                            transform="translate(-0.03)"></path>
                        <path class="cls-2"
                            d="M278.88,806.78a13.6,13.6,0,0,0-9,9.92c-1.7,6.51-5.84,11.48-9.91,16.53-1,1.17-1.66,2-3.19.84C249.22,828.43,240.7,824,235,816c-3.43-4.85-6.24-10-6.45-16-1.18-33.61-15.46-62-34.05-89-19-27.67-37.83-55.51-54.92-84.45-6-10.12-10.47-20.73-12.25-32.42-.82-5.44.66-10.6,1.64-15.79,2.69-14.21,5.56-28.38,8.4-42.56a39.65,39.65,0,0,1,1.29-4l22.82,22.27c3.69,3.61,7.73,6.93,10.94,10.93,7.85,9.79,18.38,14,30.25,16.5,16.17,3.38,32.24,5.61,48.91,4.24,12.73-1,25.53-1.34,38.19-3.27a56,56,0,0,0,10.56-2.84,11.6,11.6,0,0,0,7.93-8.12c2.06-6.7,4.29-8.17,11.27-8.18q48.9-.09,97.8,0c7.09,0,9.08,1.33,11.11,8.2,1.92,6.5,7.11,8.44,12.63,9.86,8.39,2.15,17.07,2.71,25.65,3.52,27.51,2.6,54.76,1.93,81.27-7.19a22.34,22.34,0,0,0,8.78-5.37c12.67-12.5,25.46-24.88,38.13-37.38,2.6-2.57,3.75-3.23,4.59,1.31,2.62,14.22,5.58,28.38,8.53,42.53,3.43,16.49-1.25,31.21-9.45,45.27-14.92,25.58-31.53,50.07-47.88,74.74-10.54,15.92-22.09,31.24-30,48.82a138.26,138.26,0,0,0-12.27,50.08c-.51,10.61-5.56,18.68-13.21,25.31-4.38,3.79-9.41,6.83-14,10.34-1.92,1.45-3.22,1.76-4.86-.48-3.62-5-7.73-9.55-9.26-15.79A13.83,13.83,0,0,0,458.3,807c-1.67-1.43-3.68-1.3-5.68-1.3H283.53C281.91,805.67,280.16,805.28,278.88,806.78Z"
                            transform="translate(-0.03)"></path>
                        <path class="cls-2"
                            d="M441.92,825.09c9.25,1.71,15.53,8,21.52,14.45,4.61,5,8.92,10.31,13.09,15.69,2,2.55,3.17,2.4,5.3.21,9.4-9.65,18.95-19.15,28.46-28.69,1.16-1.16,2.41-2.23,4.26-3.92,2.32,9.92,4.51,19.22,6.68,28.53,1.24,5.35,2.31,10.73,3.7,16,.85,3.22.35,5.56-2.25,8q-17.59,16.23-34.86,32.84c-2.58,2.47-4.79,2.5-7.39.41-6.87-5.51-14.19-10.55-20.53-16.62-8.62-8.25-18.83-11.37-30.29-11.9-4.48-.21-9-.93-13.42-.9-7.39,0-14.25-.91-19.23-7.16a2.31,2.31,0,0,0-.39-.31c-14.91-11.24-46.73-9.55-60.08,3.42-3.24,3.15-7,3.47-11,3.78-10.43.79-20.92.93-31.24,3a25,25,0,0,0-11.1,5.29c-8.81,7.08-17.72,14-26.51,21.14-3,2.4-5.14,2.34-8-.48q-16.67-16.14-33.83-31.75c-2.93-2.67-3.88-5.2-2.9-9.14,3.27-13.22,6.14-26.54,9.31-39.79.3-1.29,0-3.4,1.76-3.73,1.37-.25,2.1,1.42,3,2.34,9.58,9.71,19.21,19.37,28.64,29.22,2.48,2.6,3.89,2.54,6.12-.23,5.73-7.12,11.16-14.51,18-20.66,4.62-4.16,9.57-7.73,15.84-9,1.39-.84,2.92-.47,4.39-.47H437.46C439,824.66,440.51,824.38,441.92,825.09Z"
                            transform="translate(-0.03)"></path>
                        <path class="cls-3"
                            d="M278.88,806.78c.91-2.46,3-1.6,4.71-1.6q84.56-.07,169.09,0c1.92,0,4.49-1.16,5.59,1.78-3.13-.28-6.25-.81-9.38-.81q-79.8-.07-159.6,0C285.81,806.12,282.31,805.92,278.88,806.78Z"
                            transform="translate(-0.03)"></path>
                        <path class="cls-4"
                            d="M441.92,825.09H294.58c2.79-1.57,5.79-1.07,8.79-1.07q65.43-.09,130.86,0C436.77,824,439.51,823.52,441.92,825.09Z"
                            transform="translate(-0.03)"></path>
                    </svg>
                    <p>Guardar edición</p>
                </button>
                {{-- <input type="submit" class="btn btn-primary" Value="Guardar" > se pone value para eliminar el dato del envio name="Enviar" --}}
                {{-- <button href="{{ url('hojadevida/listar') }}"  style="width: 200px" class="btn btn-primary w-10"> Lista

                            </button> --}}

            </div>
             </div>


        </form>
    </main>

    <footer class="bg-primary text-white text-center py-4">
        <div class="container">
            <h4>VitalSoft</h4>
            <p>&copy; Soluciones biomédicas a la medida</p>
            <div class="my-3">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <script>
        function previewImagen(event, previewId) {
            let reader = new FileReader();
            reader.onload = function() {
                let preview = document.getElementById(previewId);
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#equipo_id').change(function() {
                var equipoID = $(this).val();
                $('#marca').empty().append('<option value="">Seleccione una marca</option>');
                $('#modelo').empty().append('<option value="">Seleccione un modelo</option>').prop(
                    'disabled', true);

                if (equipoID) {
                    $.get('{{ url('marcas') }}/' + equipoID, function(data) {
                        $.each(data, function(index, marca) {
                            $('#marca').append('<option value="' + marca.id + '">' + marca
                                .nombre_marca + '</option>');
                        });
                        $('#marca').prop('disabled', false);
                    });
                }
            });

            $('#marca').change(function() {
                var marcaID = $(this).val();
                $('#modelo').empty().append('<option value="">Seleccione un modelo</option>');

                if (marcaID) {
                    $.get('{{ url('modelos') }}/' + marcaID, function(data) {
                        $.each(data, function(index, modelo) {
                            $('#modelo').append('<option value="' + modelo.id + '">' +
                                modelo.nombre_modelo + '</option>');
                        });
                        $('#modelo').prop('disabled', false);
                    });
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const campos = document.querySelectorAll('input.form-control, select.form-select');

            campos.forEach(campo => {
                const contenedor = campo.closest('.mb-3');
                const label = contenedor ? contenedor.querySelector('label') : null;

                const actualizarEstilo = () => {
                    if (campo.value.trim() !== '') {
                        campo.classList.add('filled');
                        if (label) label.classList.add('filled');
                    } else {
                        campo.classList.remove('filled');
                        if (label) label.classList.remove('filled');
                    }
                };

                // Ejecutar al cargar la página
                actualizarEstilo();

                // Ejecutar cada vez que se cambia el contenido
                campo.addEventListener('input', actualizarEstilo);
                campo.addEventListener('change', actualizarEstilo);
            });
        });

        // vista previa de foto


        function previewImagen(event, previewId) {
            let reader = new FileReader();
            reader.onload = function() {
                let preview = document.getElementById(previewId);
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>


    {{-- este script es para las opciones equipo modelo marca
    <script>
        $(document).ready(function() {
            $('#equipo').change(function() {
                var equipoID = $(this).val();
                $('#marca').empty().append('<option value="">Seleccione una marca</option>');
                $('#modelo').empty().append('<option value="">Seleccione un modelo</option>').prop(
                    'disabled', true);

                if (equipoID) {
                    $.get('/biovic/public/marcas/' + equipoID, function(data) {
                        $.each(data, function(index, marca) {
                            $('#marca').append('<option value="' + marca.id + '">' + marca
                                .nombre_marca + '</option>');
                        });
                        $('#marca').prop('disabled', false);
                    });
                }
            });

            $('#marca').change(function() {
                var marcaID = $(this).val();
                $('#modelo').empty().append('<option value="">Seleccione un modelo</option>');

                if (marcaID) {
                    $.get('/biovic/public/modelos/' + marcaID, function(data) {
                        $.each(data, function(index, modelo) {
                            $('#modelo').append('<option value="' + modelo.id + '">' +
                                modelo.nombre_modelo + '</option>');
                        });
                        $('#modelo').prop('disabled', false);
                    });
                }
            });
        });
    </script> --}}


    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
