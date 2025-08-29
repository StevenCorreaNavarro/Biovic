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
        <form action="{{ route('hojadevida.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf {{-- LLave de seguridad obligatoria --}}

            {{-- MDAL PARA ASEGURAR QUE GUARDA DATOS --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content"><br>
                        <div class="modal">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                         <h1 class="modal-title fs-4 text-center" id="exampleModalLabel">¿Seguro quieres guardar los datos?</h1>
                           
                        <div class="modal-body">
                            <p class="text-center">
                                Los datos se guardaran permanentemente
                            </p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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

                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;
                     border:none;" class="row g-2 mb-4 needs-validation formu p-5">
                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #0062E6, #33AEFF);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Descripción de equipo
                    </h1>
                    <div class="row g-0 needs-validation border border-dark-subtle py-3"
                        style="background-color: #a6a6a630; border-radius:10px;">
                        <div class="col-md-4 position-relative nnn px-2">
                            <label for="equipo_id" class="form-label">Selecciona un equipo:</label>
                            {{-- border border-3 --}}
                            <select id="equipo_id" name="equipo_id" class="form-control form-select "  style="
                            box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3),
    -6px -6px 8px rgba(255, 255, 255, 1); border:none;border-radius:50px;">
                                <option value="">Selecciona un equipo</option>
                                @foreach ($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 position-relative px-2">
                            <label for="marca_id" class="form-label">Selecciona una marca:</label>
                            <select id="marca" name="marca_id" class="form-control form-select "style="
                            box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3),
    -6px -6px 8px rgba(255, 255, 255, 1); border:none;border-radius:50px;"
                                disabled>
                                <option value="">Selecciona una marca</option>
                            </select>
                        </div>
                        <div class="col-md-4 position-relative px-2">
                            <label for="modelo" class="form-label">Selecciona un modelo:</label>
                            <select id="modelo" name="modelo_id" class="form-control form-select "style="
                            box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3),
    -6px -6px 6px rgba(255, 255, 255, 1); border:none;border-radius:50px;"
                                disabled>
                                <option value="">Selecciona un modelo</option>
                            </select>
                        </div>
                    </div>

                    {{-- SEGUNDA PARTE --}}
                    {{-- SERIE --}}
                    <div class="col-md-3 position-relative ">
                        <div class="form-group ">
                            <label for="serie"> Serie </label>
                            <input type="text" name="serie" class="form-control" style="
                            box-shadow: 4px 4px 8px rgba(74, 74, 74, 0.3),"  
                                value="{{ isset($hojadevida->serie) ? $hojadevida->serie : old('serie') }}"
                                id="serie">
                        </div>
                    </div>

                    {{-- ACTIVO FIJO --}}
                    <div class="col-md-3 position-relative ">
                        <div class="form-group">
                            <label for=actFijo> Activo Fijo </label>
                            <input type="text" name="actFijo" class="form-control"
                                value="{{ isset($hojadevida->actFijo) ? $hojadevida->actFijo : old('actFijo') }}"
                                id="actFijo">
                        </div>
                    </div>

                    {{-- ESTADO --}}
                    {{--  Mostrar valores de `$estadoequipo` para depuración
                        <pre>{{ print_r($estadoequipo->toArray()) }}</pre>   --}}
                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv">
                            <label for="estadoequipo_id">Estado del Equipo</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam"
                                onclick="transformarDiv()"></i>
                            <select name="estadoequipo_id" id="estadoequipo_id " class="form-control form-select ">
                                <option value="">Seleccione una opción</option>
                                @foreach ($estadoequipo as $estadoequi)
                                    <option value="{{ $estadoequi->id }}"
                                        {{ (isset($hojadevida) && $hojadevida->estadoequipo_id == $estadoequi->id) || old('estadoequipo_id') == $estadoequi->id ? 'selected' : '' }}>
                                        <p>{{ $estadoequi->estadoequipo }}</p>
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
                                <option value="" class>Seleccione una opción</option>
                                @foreach ($ubifisicas as $ubicacion)
                                    <option value="{{ $ubicacion->id }}"
                                        {{ isset($hojadevida) && $hojadevida->ubifisica_id == $ubicacion->id ? 'selected' : '' }}>
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
                                <option value="">Seleccione una opción</option>
                                @foreach ($nombreservicios as $servicio)
                                    <option value="{{ $servicio->id }}"
                                        {{ isset($hojadevida) && $hojadevida->servicio_id == $servicio->id ? 'selected' : '' }}>
                                        {{ $servicio->nombreservicio }} {{-- Aqui recibi las opciones para mostrar  --}}
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
                                <option value="">Seleccione una opcion</option>
                                @foreach ($tecPredos as $tecnopredominante)
                                    <option value="{{ $tecnopredominante->id }}"
                                        {{ isset($hojadevida) && $hojadevida->tec_predo_id == $tecnopredominante->id ? 'selected' : '' }}>
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
                                value="{{ isset($hojadevida->regInvima) ? $hojadevida->regInvima : old('regInvima') }}"
                                id="regInvima">
                        </div>
                    </div>

                    {{-- CLASIFICACION DE RIESGO --}}
                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv5">
                            <label for="cla_riesgo_id">Clasificacion de Riesgo</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="riesgo()"></i>
                            <select name="cla_riesgo_id" id="cla_riesgo_id" class="form-select form-control">
                                <option value="">Seleccione una opcion</option>
                                @foreach ($clariesgo as $clasiriesgo)
                                    <option value="{{ $clasiriesgo->id }}"
                                        {{ isset($hojadevida) && $hojadevida->cla_riesgo_id == $clasiriesgo->id ? 'selected' : '' }}>
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
                                <option value="">Seleccione una opción</option>
                                @foreach ($clabiomedica as $clasibiomedica)
                                    <option value="{{ $clasibiomedica->id }}"
                                        {{ isset($hojadevida) && $hojadevida->cla_biome_id == $clasibiomedica->id ? 'selected' : '' }}>
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
                                <option value="">Seleccione una opcion</option>
                                @foreach ($clauso as $clasiuso)
                                    <option value="{{ $clasiuso->id }}"
                                        {{ isset($hojadevida) && $hojadevida->cla_uso_id == $clasiuso->id ? 'selected' : '' }}>
                                        {{ $clasiuso->clauso }}
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
                                <option value="">Seleccione una opción</option>
                                @foreach ($codiecri as $codigoecri)
                                    <option value="{{ $codigoecri->id }}"
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
                            <option value="">Selecciona...</option>
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

                        <div class="form-group ">

                            <label for="foto">Selecciona una imagen:</label>
                            <input type="file" name="foto" id="foto"
                                class="form-control @error('foto') is-invalid @enderror" accept="image/*"
                                onchange="previewImage(event)">
                            @error('foto')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror

                            {{-- Vista previa de la imagen --}}

                        </div>
                        <img id="preview" class="img-thumbnail m-2 img-fluid mt-3" src="" width="120"
                            style="display: none;" alt="Vista previa">
                    </div>

                </div>
                <div></div>
                {{-- FIN DESCRIPCION DE EQUIPO  --}}
                {{-- ----------------------------------------------------------------------------------------------------------- --}}
                {{--  --}}
                {{--                                       INICIO REGISTRO HISTORICO                                            --}}
                {{--  --}}
                {{-- ----------------------------------------------------------------------------------------------------------- --}}

                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;
                     border:none;" class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 needs-validation mb-4  formu p-5">
                    {{--  Seleccion Fondo Blan --}}
                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #0062E6, #33AEFF);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Registro
                        historico
                    </h1>
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=fechaAdquisicion> Fecha de Adquisicion </label>
                            <input type="date" name="fechaAdquisicion" class="form-control"
                                value="{{ isset($hojadevida->fechaAdquisicion) ? $hojadevida->fechaAdquisicion : old('fechaAdquisicion') }}"
                                id="fechaAdquisicion">
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
                            <input type="date" name="fechaInstalacion" class="form-control"
                                value="{{ isset($hojadevida->fechaInstalacion) ? $hojadevida->fechaInstalacion : old('fechaInstalacion') }}"
                                id="fechaInstalacion">
                        </div>
                    </div>



                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=factura> Factura </label>
                            <input type="text" name="factura" class="form-control"
                                value="{{ isset($hojadevida->factura) ? $hojadevida->factura : old('factura') }}"
                                id="factura">
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group" id="miDiv8">
                            <label for="forma_adqui_id">Forma de Adquisicion</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="adqui()"></i>
                            <select name="forma_adqui_id" id="forma_adqui_id" class="form-control form-select">
                                <option value="">Seleccione una opcion</option>
                                @foreach ($formaadqui as $formaadquisicion)
                                    <option value="{{ $formaadquisicion->id }}"
                                        {{ isset($hojadevida) && $hojadevida->forma_adqui_id == $formaadquisicion->id ? 'selected' : '' }}>
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
                            <input type="text" name="costo" class="form-control"
                                value="{{ isset($hojadevida->costo) ? $hojadevida->costo : old('costo') }}"
                                id="costo">
                        </div>
                    </div>

                    <div class="col-md-5 ">
                        <div class="form-group" id="miDivpropiedad">
                            <label for="propiedad_id">Propiedad</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="propiedad()"></i>
                            <select name="propiedad_id" id="propiedad_id" class="form-control form-select">
                                <option value="">Seleccione una opcion</option>
                                @foreach ($propiedad as $nombreempre)
                                    <option value="{{ $nombreempre->id }}"
                                        {{ isset($hojadevida) && $hojadevida->propiedad_id == $nombreempre->id ? 'selected' : '' }}>
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
                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;
                     border:none;" class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 needs-validation mb-4  formu p-5">
                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #0062E6, #33AEFF);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Registro tecnico
                    </h1>

                    <div class="col-md-4 position-relative">
                        <div class="form-group" id="miDiv9">
                            <label for="mag_fuen_alimen_id">Fuente de Alimentación</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam" onclick="fuenteali()"></i>
                            <select name="mag_fuen_alimen_id" id="mag_fuen_alimen_id"
                                class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($nombrealimentacion as $fuente)
                                    <option value="{{ $fuente->id }}"
                                        {{ old('mag_fuen_alimen_id', $hojadevida->mag_fuen_alimen_id ?? '') == $fuente->id ? 'selected' : '' }}>
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
                                value="{{ isset($hojadevida->frecuencia) ? $hojadevida->frecuencia : old('frecuencia') }}"
                                id="frecuencia">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative">
                        <div class="form-group" id="miDiv10">
                            <label for="mag_fre_id">Unidad de Frecuencia</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam"
                                onclick="ufrecuencia()"></i>
                            <select name="mag_fre_id" id="mag_fre_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($magFrec as $frecuencia)
                                    <option value="{{ $frecuencia->id }}"
                                        {{ old('mag_fre_id', $hojadevida->mag_fre_id ?? '') == $frecuencia->id ? 'selected' : '' }}>
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
                                value="{{ isset($hojadevida->volMax) ? $hojadevida->volMax : old('volMax') }}"
                                id="volMax">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative ">
                        <div class="form-group">
                            <label for=volMin> Voltaje Min </label>
                            <input type="text" name="volMin" class="form-control"
                                value="{{ isset($hojadevida->volMin) ? $hojadevida->volMin : old('volMin') }}"
                                id="volMax">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative">
                        <div class="form-group" id="miDiv11">
                            <label for="mag_fuen_ali_id">Unidad de Alimentación</label><i class="bi fab bi-pen"
                                data-bs-toggle="modal" data-bs-target="#exampleModalparam"
                                onclick="ualimentacion()"></i>
                            <select name="mag_fuen_ali_id" id="mag_fuen_ali_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($fuentesAli as $fuente)
                                    {{-- Asi se recibe desde  hojadevidaController --}}
                                    <option value="{{ $fuente->id }}"
                                        {{ old('mag_fuen_ali_id', $hojadevida->mag_fuen_ali_id ?? '') == $fuente->id ? 'selected' : '' }}>
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
                                value="{{ isset($hojadevida->corrienteMax) ? $hojadevida->corrienteMax : old('corrienteMax') }}"
                                id="corrienteMax">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative ">
                        <div class="form-group">
                            <label for="corrienteMin">Corriente Min</label>
                            <input type="text" name="corrienteMin" class="form-control"
                                value="{{ isset($hojadevida->corrienteMin) ? $hojadevida->corrienteMin : old('corrienteMin') }}"
                                id="corrienteMin">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative">
                        <div class="form-group">
                            <label for="mag_corriente_id">Unidad de Corriente</label>
                            <select name="mag_corriente_id" id="mag_corriente_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($corrientes as $corriente)
                                    <option value="{{ $corriente->id }}"
                                        {{ old('mag_corriente_id', $hojadevida->mag_corriente_id ?? '') == $corriente->id ? 'selected' : '' }}>
                                        {{ $corriente->abreviacioncorriente }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="col-md-3 position-relative ">
                        <div class="form-group">
                            <label for="peso">Peso Equipo</label>
                            <input type="text" name="peso" class="form-control"
                                value="{{ isset($hojadevida->peso) ? $hojadevida->peso : old('peso') }}"
                                id="peso">
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_peso_id">Unidad de Peso</label>
                            <select name="mag_peso_id" id="mag_peso_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($pesos as $peso)
                                    <option value="{{ $peso->id }}"
                                        {{ old('mag_peso_id', $hojadevida->mag_peso_id ?? '') == $peso->id ? 'selected' : '' }}>
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
                                value="{{ isset($hojadevida->presion) ? $hojadevida->presion : old('presion') }}"
                                id="presion">
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_pres_id">Unidad de Presión</label>
                            <select name="mag_pres_id" id="mag_pres_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($presiones as $presion)
                                    <option value="{{ $presion->id }}"
                                        {{ old('mag_pres_id', $hojadevida->mag_pres_id ?? '') == $presion->id ? 'selected' : '' }}>
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
                                value="{{ isset($hojadevida->potencia) ? $hojadevida->potencia : old('potencia') }}"
                                id="potencia">
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_pot_id">Unidad de Potencia</label>
                            <select name="mag_pot_id" id="mag_pot_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($potencias as $potencia)
                                    <option value="{{ $potencia->id }}"
                                        {{ old('mag_pot_id', $hojadevida->mag_pot_id ?? '') == $potencia->id ? 'selected' : '' }}>
                                        {{ $potencia->abreviacionpotencia }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="temperatura">Temperatura</label>
                            <input type="text" name="temperatura" class="form-control"
                                value="{{ old('temperatura') }}" id="temperatura">
                        </div>
                    </div>

                    <!-- Selección de Unidad de Temperatura -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_temp_id">Unidad de Temperatura</label>
                            <select name="mag_temp_id" id="mag_temp_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($temperaturas as $temp)
                                    <option value="{{ $temp->id }}"
                                        {{ old('mag_temp_id') == $temp->id ? 'selected' : '' }}>
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
                            <input type="text" name="velocidad" class="form-control"
                                value="{{ old('velocidad') }}" id="velocidad">
                        </div>
                    </div>

                    <!-- Select Unidad Velocidad -->
                    <div class="col-md-4 position-relative">
                        <div class="form-group">
                            <label for="mag_vel_id">Unidad de Velocidad</label>
                            <select name="mag_vel_id" id="mag_vel_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($velocidad as $vel)
                                    <option value="{{ $vel->id }}"
                                        {{ old('mag_vel_id', $hojadevida->mag_vel_id ?? '') == $vel->id ? 'selected' : '' }}>
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
                            <input type="text" name="humedad" class="form-control" value="{{ old('humedad') }}"
                                id="humedad">
                        </div>
                    </div>

                    <!-- Tamaño Equipo -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="dimLargo">Largo</label>
                            <input type="text" name="dimLargo" class="form-control"
                                value="{{ old('dimLargo') }}" id="dimLargo">
                        </div>
                    </div>

                    <!-- Campo Ancho -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="dimAncho">Ancho</label>
                            <input type="text" name="dimAncho" class="form-control"
                                value="{{ old('dimAncho') }}" id="dimAncho">
                        </div>
                    </div>

                    <!-- Campo Alto -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="dimAlto">Alto</label>
                            <input type="text" name="dimAlto" class="form-control" value="{{ old('dimAlto') }}"
                                id="dimAlto">
                        </div>
                    </div>

                    <!-- Seleccion Unidad Dimensión -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_dimension_id">Unidad de Dimensión</label>
                            <select name="mag_dimension_id" id="mag_dimension_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($dimensiones as $dim)
                                    <option value="{{ $dim->id }}"
                                        {{ old('mag_dimension_id', $hojadevida->mag_dimension_id ?? '') == $dim->id ? 'selected' : '' }}>
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


                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;
                     border:none;" class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 needs-validation mb-4  formu p-5">
                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #0062E6, #33AEFF);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Accesorios
                    </h1>

                    <!-- SELECT ACCESORIO -->
                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <label for="accesorio_id" class="form-label fw-bold">Selecciona un accesorio:</label>
                            <select id="accesorio_id" name="accesorio_id" class="form-select shadow-sm">
                                <option value="">Seleccione un accesorio</option>
                                @foreach ($accesorios as $accesorio)
                                    <option value="{{ $accesorio->id }}"
                                        data-equipo-id="{{ $accesorio->equipo_id }}"
                                        data-nombre-accesorio="{{ $accesorio->nombreAccesorio ?? 'No disponible' }}"
                                        data-modelo="{{ $accesorio->modeloAccesorio ?? 'No disponible' }}"
                                        data-serie="{{ $accesorio->serieAccesorio ?? 'No disponible' }}"
                                        data-costo="{{ $accesorio->costoAccesorio ?? 'No disponible' }}">
                                        {{ $accesorio->nombreAccesorio ?? 'No disponible' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

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


                </div>
                {{-- FIN ACCESORIOS --}}
                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;
                     border:none;" class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 needs-validation mb-4  formu p-5">
                    {{--  INICIO  FABRICANTE - PROVEEDOR  --}}
                    <div class="container-fluid my-4">
                        <div class="row g-4 p-4 rounded" style="background-color: rgb(245, 245, 245);">
                            <h1 class="text-white text-center py-2 rounded"
                                style="background: linear-gradient(45deg, #0062E6, #33AEFF);border-radius: 10px;">
                                Datos del fabricante y proveedor
                            </h1>

                            <!-- COLUMNA IZQUIERDA - FABRICANTE -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fabricante_id" class="form-label fw-bold">Selecciona un
                                        fabricante:</label>
                                    <select id="fabricante_id" name="fabricante_id"
                                        class="form-select border border-3">
                                        <option value="">Seleccione un fabricante</option>
                                        @foreach ($fabricantes as $fabricante)
                                            <option value="{{ $fabricante->id }}"
                                                data-nombre-fabri="{{ $fabricante->nombreFabri ?? 'No disponible' }}"
                                                data-direccion-fabri="{{ $fabricante->direccionFabri ?? 'No disponible' }}"
                                                data-telefono-fabri="{{ $fabricante->telefonoFabri ?? 'No disponible' }}"
                                                data-ciudad-fabri="{{ $fabricante->ciudadFabri ?? 'No disponible' }}"
                                                data-email-fabri="{{ $fabricante->emailWebFabri ?? 'No disponible' }}">
                                                {{ $fabricante->nombreFabri ?? 'No disponible' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- INFO FABRICANTE -->
                                <div id="info_fabricante" style="display: none;">
                                    <h5 class="mt-3">Detalles del fabricante seleccionado:</h5>
                                    <p><strong>Nombre:</strong> <span id="nombre_fabricante"></span></p>
                                    <p><strong>Dirección:</strong> <span id="direccion_fabricante"></span></p>
                                    <p><strong>Teléfono:</strong> <span id="telefono_fabricante"></span></p>
                                    <p><strong>Ciudad:</strong> <span id="ciudad_fabricante"></span></p>
                                    <p><strong>Email:</strong> <span id="email_fabricante"></span></p>
                                </div>

                                <!-- SIN FABRICANTES -->
                                <div id="mensaje_no_fabricantes" class="alert alert-warning mt-3"
                                    style="display: none;">
                                    No hay fabricantes disponibles.
                                </div>
                            </div>

                            <!-- COLUMNA DERECHA - PROVEEDOR -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="proveedor_id" class="form-label fw-bold">Selecciona un
                                        proveedor:</label>
                                    <select id="proveedor_id" name="proveedor_id"
                                        class="form-select border border-3">
                                        <option value="">Seleccione un proveedor</option>
                                        @foreach ($proveedores as $proveedor)
                                            <option value="{{ $proveedor->id }}"
                                                data-nombre-proveedor="{{ $proveedor->nombreProveedor ?? 'No disponible' }}"
                                                data-direccion-proveedor="{{ $proveedor->direccionProvee ?? 'No disponible' }}"
                                                data-telefono-proveedor="{{ $proveedor->telefonoProvee ?? 'No disponible' }}"
                                                data-ciudad-proveedor="{{ $proveedor->ciudadProvee ?? 'No disponible' }}"
                                                data-email-proveedor="{{ $proveedor->emailWebProve ?? 'No disponible' }}">
                                                {{ $proveedor->nombreProveedor ?? 'No disponible' }} -
                                                {{ $proveedor->ciudadProvee ?? 'No disponible' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- INFO PROVEEDOR -->
                                <div id="info_proveedor" style="display: none;">
                                    <h5 class="mt-3">Detalles del proveedor seleccionado:</h5>
                                    <p><strong>Nombre:</strong> <span id="nombre_proveedor"></span></p>
                                    <p><strong>Dirección:</strong> <span id="direccion_proveedor"></span></p>
                                    <p><strong>Teléfono:</strong> <span id="telefono_proveedor"></span></p>
                                    <p><strong>Ciudad:</strong> <span id="ciudad_proveedor"></span></p>
                                    <p><strong>Email:</strong> <span id="email_proveedor"></span></p>
                                </div>

                                <!-- SIN PROVEEDORES -->
                                <div id="mensaje_no_proveedores" class="alert alert-warning mt-3"
                                    style="display: none;">
                                    No hay proveedores disponibles.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--  RECOMENDACIONES --}}

                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;
                     border:none;" class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 mb-4 needs-validation formu p-5">
                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #0062E6, #33AEFF);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Recomendaciones
                    </h1>
                    <div class="col-md-12 position-relative">
                        <div class="form-group">
                            <label for="recomendaciones"></label>
                            <textarea name="recomendaciones" id="recomendaciones" class="form-control" rows="4">{{ old('recomendaciones', $hojadevida->recomendaciones ?? '') }}</textarea>
                        </div>
                    </div>
                </div>



                {{--  SOPORTES --}}
                <div style="background-color: rgb(245, 245, 245);box-shadow:  6px 6px 8px  #ccc;
                     border:none;" class="row g-2 mb-4 needs-validation formu p-5" class="row g-2 needs-validation mb-4 formu p-5">
                    <h1 class="text-white"
                        style="background: linear-gradient(45deg, #0062E6, #33AEFF);border-radius: 10px; margin-top: 0rem; text-align:center">
                        Soportes Legales
                    </h1>
                    {{-- Soporte de Factura --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="soporteFactura" style="font-size: 90%">Selecciona el Soporte de Factura
                                (PDF)</label>
                            <input type="file" name="soporteFactura" id="soporteFactura"
                                class="form-control @error('soporteFactura') is-invalid @enderror"
                                accept="application/pdf">
                            @error('soporteFactura')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Soporte de Registro Invima --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="soporteRegistroInvima" style="font-size: 90%">Selecciona el Soporte de
                                Registro Invima (PDF)</label>
                            <input type="file" name="soporteRegistroInvima" id="soporteRegistroInvima"
                                class="form-control @error('soporteRegistroInvima') is-invalid @enderror"
                                accept="application/pdf">
                            @error('soporteRegistroInvima')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Soporte de Certificado de Calibración --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="soporteCertificadoCalibracion" style="font-size: 90%">Selecciona el Soporte de
                                Certificado de
                                Calibración (PDF) </label>
                            <input type="file" name="soporteCertificadoCalibracion"
                                id="soporteCertificadoCalibracion"
                                class="form-control @error('soporteCertificadoCalibracion') is-invalid @enderror"
                                accept="application/pdf">
                            @error('soporteCertificadoCalibracion')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Soporte de Manual --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="soporteManual" style="font-size: 90%">Selecciona el Soporte de Manual
                                (PDF)</label>
                            <input type="file" name="soporteManual" id="soporteManual"
                                class="form-control @error('soporteManual') is-invalid @enderror"
                                accept="application/pdf">
                            @error('soporteManual')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Soporte de Limpieza y Desinfección --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="soporteLimpiezaDesinfeccion" style="font-size: 90%">Selecciona el Soporte de
                                Limpieza y Desinfección
                                (PDF)</label>
                            <input type="file" name="soporteLimpiezaDesinfeccion" id="soporteLimpiezaDesinfeccion"
                                class="form-control @error('soporteLimpiezaDesinfeccion') is-invalid @enderror"
                                accept="application/pdf">
                            @error('soporteLimpiezaDesinfeccion')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- FIN CARGA DE SOPORTES --}}


                {{-- ACCION DE GUARDAR  --}}
                <div class="d-flex gap-3 col-3 mx-auto">
                    <button style="width: 500px" type="button" class="btn btn-primary w-10" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Guardar
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
