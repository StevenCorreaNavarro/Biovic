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
            background-color: rgb(236, 241, 251);
            border-color: #4079ff !important;

        }

        /* Estilo para el label */
        .form-label.filled {
            color: #198754;
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
            color: #888888;
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
                    <h1 class="text-white" {{-- background: linear-gradient(45deg, #ffa200, #ffdd00); --}}
                        style="background: linear-gradient(45deg, #edbd00, #ffd633);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Descripción de equipo
                    </h1>
                    <div class="row g-0 needs-validation border border-dark-subtle py-3"
                        style="background-color: #a6a6a630; border-radius:10px;">
                        <div class="col-md-4 position-relative nnn px-2">
                            <label for="equipo_id" class="form-label">Selecciona un equipo:</label>
                            {{-- border border-3 --}}
                            <select id="equipo_id" name="equipo_id" class="form-control form-select "
                                style="box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3),-6px -6px 8px rgba(255, 255, 255, 1); border:none;border-radius:50px;">

                                <option value="{{ old('equipo', $hdv->equipo?->id) }}">
                                    {{ old('equipo', $hdv->equipo?->nombre_equipo ?? '---') }}
                                </option>
                                @foreach ($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">
                                        {{ old('equipo_id', $hdv->equipo_id) == $equipo->id ? 'selected------->' : '' }}
                                        {{ $equipo->nombre_equipo }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-md-4 position-relative px-2">
                            <label for="marca_id" class="form-label">Selecciona una marca:</label>
                            <select id="marca" name="marca_id"
                                class="form-control form-select "style="box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3), -6px -6px 8px rgba(255, 255, 255, 1); border:none;border-radius:50px;"
                                enable>

                                <option value="{{ old('marca_id', $hdv->marca_id) }}">
                                               {{ old('marca', $hdv->marca?->nombre_marca ?? '---') }}
                                </option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">
                                        {{ old('marca_id', $equipo->marca_id) == $marca->id ? 'selected----->' : '' }}
                                        {{ $marca->nombre_marca }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- <input type="hidden" name="marca_id" value="{{ old('marca_id', $hdv->marca_id) }}"> --}}
                        </div>

                        <div class="col-md-4 position-relative px-2">
                            <label for="modelo" class="form-label">Selecciona un modelo:</label>
                            <select id="modelo" name="modelo_id"class="form-control form-select "style="                     box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3),    -6px -6px 6px rgba(255, 255, 255, 1); border:none;border-radius:50px;"
                                enable>
                                <option value="{{ old('modelo_id', $hdv->modelo_id) }}">
                                               {{ old('modelo', $hdv->modelo?->nombre_modelo ?? '---') }}
                                </option>
                                  @foreach ($modelos as $modelo)
                                <option value="{{ $modelo->id }}"
                                    {{ old('modelo_id', $marca->modelo_id) == $modelo->id ? 'selected------->' : '' }}>
                                    {{ $modelo->nombre_modelo }}
                                </option>
                                @endforeach
                            </select>
                            {{-- <input type="hidden" name="modelo_id" value="{{ old('modelo_id', $hdv->modelo_id) }}"> --}}
    
                        </div>
                    </div>


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
                            <select name="estadoequipo_id" id="estadoequipo_id" class="form-control form-select">
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
                            <select name="ubifisica_id" id="ubifisica_id" class="form-control form-select">

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
                            <select name="servicio_id" id="servicio_id" class="form-control form-select">

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
                            <select name="tec_predo_id" id="tec_predo_id" class="form-control form-select">
                                <option value="{{ old('tecPredo', $hdv->tecPredo?->tecpredo) }}">
                                    {{ old('tecPredo', $hdv->tecPredo?->tecpredo ?? '---') }}</option>
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
                            <select name="cla_riesgo_id" id="cla_riesgo_id" class="form-select form-control">

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
                            <select name="cla_biome_id" id="cla_biome_id" class="form-control form-select">
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
                            <select name="cla_uso_id" id="cla_uso_id" class="form-control form-select">
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
                            <select name="cod_ecri_id" id="codecris" class="form-control">
                                {{-- <option value="{{ old('codecri', $hdv->codecri?->codiecri) }}">
        {{ old('codecri', $hdv->codecri?->codiecri ?? '---') }}
    </option> --}}

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
                        <select name="perioCali" id="perioCali" class="form-control form-select" required
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

                {{-- FIN REGISTRO TECNICO --}}


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
