<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VitalTech</title>
    <link rel="shortcut icon" href="/img/Logo_VitalTech2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/path/to/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="icon" type="image/x-icon" href="/IMG/logotipo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    @extends('layouts.header')
    <main class="container  "><br><br><br>
        <form action="{{ url('/hojadevida') }}" class="row g-3 needs-validation formu   p-5"
            style="background-color: rgba(226, 226, 226, 0.942); border-radius:10px; " novalidate>
            @csrf {{-- LLave de seguridad obligatoria --}}
            <h1 style="margin-top: 0rem; text-align:center">Descripcion de quipo</h1>
            <div class="row g-0 needs-validation formu  py-3 " style="background-color: #c3c3c3; border-radius:10px;">
                <div class="col-md-4 position-relative px-2">
                    <label for="equipo" class="form-label">Selecciona un equipo:</label>
                    <select id="equipo" name="equipo" class="form-control form-select">

                        <option value="">Selecciona un equipo</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 position-relative px-2">
                    <label for="modelo" class="form-label">Selecciona un modelo:</label>
                    <select id="modelo" name="modelo" class="form-control form-select" disabled>
                        <option value="">Selecciona un modelo</option>
                    </select>
                </div>


                <div class="col-md-4 position-relative px-2">
                    <label for="marca" class="form-label">Selecciona una marca:</label>
                    <select id="marca" name="marca" class="form-control form-select" disabled>
                        <option value="">Selecciona una marca</option>
                    </select>
                </div>
            </div>



            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-4 position-relative">
                <label for="servicio_id">Servicio</label>
                <select name="servicio_id" id="servicio_id" class="form-control form-select">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($nombreservicios as $servicio)
                        <option value="{{ $servicio->id }}"
                            {{ isset($hojadevida) && $hojadevida->servicio_id == $servicio->id ? 'selected' : '' }}>
                            {{ $servicio->nombreservicio }}
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 position-relative">
                <div class="form-group ">
                    <label for="serie"> Serie </label>
                    <input type="text" name="marca" class="form-control"
                        value="{{ isset($hojadevida->serie) ? $hojadevida->serie : old('serie') }}" id="serie">

                </div>



            </div>
            <div class="col-md-4 position-relative">

                <div class="form-group">
                    <label for="tec_predo_id">Tecnologia Predominante</label>
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

            <div class="col-md-4 position-relative">
                <div class="form-group">
                    <label for="tec_predo_id">Tecnologia Predominante</label>
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

            <div class="col-md-4 position-relative">
                <label for="perioCali">PerioCali</label>
                <input type="text" name="perioCali" value="{{ old('perioCali') }}" id="perioCali"
                    class="form-control" oninput="toggleFechaCali(this.value)">

            </div>

            <div class="col-md-4 position-relative">
                {{-- <div class="form-group" id="fechaCaliContainer" style="display: none;"> --}}
                <label for="fechaCali">Fecha de Calibración</label>
                <input type="date" name="fechaCali" id="fechaCali" class="form-control"
                    value="{{ old('fechaCali') }}">
                {{-- </div> --}}
            </div>

            <div class="col-md-4 position-relative">
                {{-- <div class="form-group"> --}}
                <label for="cod_ecris">Código Ecri</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" id="search-codiecri" class="form-control" placeholder="Buscar"
                        style="margin-right: 10px;" />
                    <select name="cod_ecris" id="cod_ecris" class="form-control">
                        <option value="">Seleccione una opción</option>
                        @foreach ($codiecri as $codigoecri)
                            <option value="{{ $codigoecri->id }}"
                                data-codiecri="{{ strtolower($codigoecri->codiecri) }}"
                                {{ isset($hojadevida) && $hojadevida->cod_ecris == $codigoecri->id ? 'selected' : '' }}>
                                {{ $codigoecri->codiecri }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- </div> --}}
            </div>
            {{-- Script para realizar busqueda en codigo ecri --}}
            <script>
                document.getElementById('search-codiecri').addEventListener('input', function() {
                    const searchValue = this.value.toLowerCase();
                    const select = document.getElementById('cod_ecris');
                    const options = select.querySelectorAll('option');

                    let matchingOption = null;
                    let matchCount = 0;

                    options.forEach(option => {
                        if (option.value === "") return; // Skip the default "Seleccione una opción"
                        const text = option.dataset.codiecri;

                        if (text.includes(searchValue)) {
                            option.style.display = '';
                            matchingOption = option;
                            matchCount++;
                        } else {
                            option.style.display = 'none';
                        }
                    });

                    // If exactly one option matches, select it
                    if (matchCount === 1 && matchingOption) {
                        select.value = matchingOption.value;
                    } else {
                        select.value = ""; // Reset to "Seleccione una opción" if there are multiple matches or none
                    }
                });
            </script>

            <div class="col-md-4 position-relative">
                <div class="form-group">
                    <label for=actFijo> Activo Fijo </label>
                    <input type="text" name="actFijo" class="form-control"
                        value="{{ isset($hojadevida->actFijo) ? $hojadevida->actFijo : old('actFijo') }}"
                        id="actFijo">
                </div>

            </div>
            <div class="col-md-4 position-relative">
                <div class="form-group">
                    <label for=regInvima> Registro Invima </label>
                    <input type="text" name="regInvima" class="form-control"
                        value="{{ isset($hojadevida->regInvima) ? $hojadevida->regInvima : old('regInvima') }}"
                        id="regInvima">
                </div>

            </div>

            <div class="col-md-4 position-relative">
                <div class="form-group">
                    <label for=Estado> Estado Funcionamiento </label>
                    <input type="text" name="Estado" class="form-control"
                        value="{{ isset($hojadevida->Estado) ? $hojadevida->Estado : old('Estado') }}"
                        id="Estado">
                </div>

            </div>
            <div class="col-md-4 position-relative">
                <div class="form-group">
                    <label for="cla_riesgos">Clasificacion de Riesgo</label>
                    <select name="cla_riesgos" id="cla_riesgos" class="form-select form-control">
                        <option value="">Seleccione una opcion</option>
                        @foreach ($clariesgo as $clasiriesgo)
                            <option value="{{ $clasiriesgo->id }}"
                                {{ isset($hojadevida) && $hojadevida->cla_riesgos == $clasiriesgo->id ? 'selected' : '' }}>
                                {{ $clasiriesgo->clariesgo }}
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-md-4 position-relative">
                <div class="form-group">
                    <label for="cla_biomes">Clasificacion de Biomedica</label>
                    <select name="cla_biomes" id="cla_biomes" class="form-control form-select">
                        <option value="">Seleccione una opcion</option>
                        @foreach ($clabiomedica as $clasibiomedica)
                            <option value="{{ $clasibiomedica->id }}"
                                {{ isset($hojadevida) && $hojadevida->cla_biomes == $clasibiomedica->id ? 'selected' : '' }}>
                                {{ $clasibiomedica->clabiomedica }}
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-md-4 position-relative">

                <div class="form-group">
                    <label for="cla_usos">Clasificacion por Uso</label>
                    <select name="cla_usos" id="cla_usos" class="form-control form-select">
                        <option value="">Seleccione una opcion</option>
                        @foreach ($clauso as $clasiuso)
                            <option value="{{ $clasiuso->id }}"
                                {{ isset($hojadevida) && $hojadevida->cla_usos == $clasiuso->id ? 'selected' : '' }}>
                                {{ $clasiuso->clauso }}
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-md-4 position-relative">
                <div class="form-group">
                    <label for="foto"> </label>
                    {{-- {{$equipo->foto}}     Muestra ruta de la imagen  --}}

                    @if (isset($hojadevida->foto))
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $hojadevida->foto }}"
                            width="100" alt="">
                    @endif

                    <input type="file"name="foto" value="" id="foto" class="form-control">
                </div>

            </div>
            {{-- SCRIPT CAMPO PERIODO CALIBRACION --}}
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var perioCaliField = document.getElementById('perioCali');
                    toggleFechaCali(perioCaliField.value); // Ensure correct state on page load

                    perioCaliField.addEventListener('input', function() {
                        toggleFechaCali(this.value);
                    });
                });

                function toggleFechaCali(value) {
                    var fechaCaliContainer = document.getElementById('fechaCaliContainer');
                    if (value.toLowerCase() === 'anual') {
                        fechaCaliContainer.style.display = 'block';
                    } else {
                        fechaCaliContainer.style.display = 'none';
                        document.getElementById('fechaCali').value = ''; // Clear the date field if not 'anual'
                    }
                }
            </script>

            <div class="col-md-4 position-relative">

            </div>

            <div class="col-md-4 position-relative">

            </div>

            <div class="col-md-4 position-relative">

            </div>

            <div class="col-md-4 position-relative">

            </div>







        </form>





        <div class="container mt-5 ">
            <h1 style="margin-top: 0rem; text-align:center">Crear hojas de vida</h1>



            <form action="{{ url('/hojadevida') }}" class="row g-3 needs-validation formu " method="post"
                enctype="multipart/form-data">
                {{-- <h1 style="margin-block-end: 2%;">Descripción del equipo</h1> --}}

                @csrf {{-- LLave de seguridad obligatoria --}}
                {{--  Incluye lo que esta en formulario  --}}
                {{-- @include('hojadevida.form'); --}}
                <br>
                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2>DESCRIPCION DEL EQUIPO</h2>

                <br>
                <div class="form-group">
                    <label for="servicio_id">Servicio</label>
                    <select name="servicio_id" id="servicio_id" class="form-control">
                        <option value="">Seleccione una opcion</option>
                        @foreach ($nombreservicios as $servicio)
                            <option value="{{ $servicio->id }}"
                                {{ isset($hojadevida) && $hojadevida->servicio_id == $servicio->id ? 'selected' : '' }}>
                                {{ $servicio->nombreservicio }}
                        @endforeach
                    </select>
                </div>
                <br>

                <br>
                <div class="form-group">
                    <label for="nombre_equipos">Nombre</label>
                    <select name="nombre_equipos" id="nombre_equipos" class="form-control">
                        <option value="">Seleccione una opcion</option>
                        @foreach ($nombreEquipos as $equipo)
                            <option value="{{ $equipo->id }}"
                                {{ isset($hojadevida) && $hojadevida->nombre_equipos == $equipo->id ? 'selected' : '' }}>
                                {{ $equipo->nombreequipo }}
                        @endforeach
                    </select>
                </div>
                <br>

                <div class="form-group">
                    <label for="equipos">marca equipos</label>
                    <select name="equipos" id="equipos" class="form-control">
                        <option value="">Seleccione una opcion</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}"
                                {{ isset($hojadevida) && $hojadevida->equipos == $equipo->id ? 'selected' : '' }}>
                                {{ $equipo->marcaequipo }}
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="equipos">modelo equipos</label>
                    <select name="equipos" id="equipos" class="form-control">
                        <option value="">Seleccione una opcion</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}"
                                {{ isset($hojadevida) && $hojadevida->equipos == $equipo->id ? 'selected' : '' }}>
                                {{ $equipo->marcaequipo }}
                        @endforeach
                    </select>
                </div>

                <br>

                {{-- <div class="form-group">
    <label for=Marca> Marca </label>
    <input type="text" name="marca" value="{{isset($hojadevida->marca)?$hojadevida->marca:old('marca')}}" id="marca">
</div>
<br>
<br>

<div class="form-group">
    <label for=modelo> Modelo </label>
    <input type="text" name="modelo" value="{{isset($hojadevida->modelo)?$hojadevida->modelo:old('modelo')}}" id="modelo">
</div> --}}
                <br>
                <br>

                <div class="form-group">
                    <label for=serie> Serie </label>
                    <input type="text" name="marca"
                        value="{{ isset($hojadevida->serie) ? $hojadevida->serie : old('serie') }}" id="serie">
                </div>
                <br>
                <br>

                <div class="form-group">
                    <label for="tec_predo_id">Tecnologia Predominante</label>
                    <select name="tec_predo_id" id="tec_predo_id" class="form-control">
                        <option value="">Seleccione una opcion</option>
                        @foreach ($tecPredos as $tecnopredominante)
                            <option value="{{ $tecnopredominante->id }}"
                                {{ isset($hojadevida) && $hojadevida->tec_predo_id == $tecnopredominante->id ? 'selected' : '' }}>
                                {{ $tecnopredominante->tecpredo }}
                        @endforeach
                    </select>
                </div>
                <br>
                <br>

                <div class="container">
                    <!-- Campo PerioCali -->
                    <div class="form-group">
                        <label for="perioCali">PerioCali</label>
                        <input type="text" name="perioCali" value="{{ old('perioCali') }}" id="perioCali"
                            class="form-control" oninput="toggleFechaCali(this.value)">
                    </div>
                    <br>
                    <!-- Campo FechaCali -->
                    <div class="form-group" id="fechaCaliContainer" style="display: none;">
                        <label for="fechaCali">Fecha de Calibración</label>
                        <input type="date" name="fechaCali" id="fechaCali" class="form-control"
                            value="{{ old('fechaCali') }}">
                    </div>

            </form>
        </div>

        <div class="form-group">
            <label for="cod_ecris">Código Ecri</label>
            <div style="display: flex; align-items: center;">
                <input type="text" id="search-codiecri" class="form-control" placeholder="Buscar"
                    style="margin-right: 10px;" />
                <select name="cod_ecris" id="cod_ecris" class="form-control">
                    <option value="">Seleccione una opción</option>
                    @foreach ($codiecri as $codigoecri)
                        <option value="{{ $codigoecri->id }}"
                            data-codiecri="{{ strtolower($codigoecri->codiecri) }}"
                            {{ isset($hojadevida) && $hojadevida->cod_ecris == $codigoecri->id ? 'selected' : '' }}>
                            {{ $codigoecri->codiecri }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Script para realizar busqueda en codigo ecri --}}
        <script>
            document.getElementById('search-codiecri').addEventListener('input', function() {
                const searchValue = this.value.toLowerCase();
                const select = document.getElementById('cod_ecris');
                const options = select.querySelectorAll('option');

                let matchingOption = null;
                let matchCount = 0;

                options.forEach(option => {
                    if (option.value === "") return; // Skip the default "Seleccione una opción"
                    const text = option.dataset.codiecri;

                    if (text.includes(searchValue)) {
                        option.style.display = '';
                        matchingOption = option;
                        matchCount++;
                    } else {
                        option.style.display = 'none';
                    }
                });

                // If exactly one option matches, select it
                if (matchCount === 1 && matchingOption) {
                    select.value = matchingOption.value;
                } else {
                    select.value = ""; // Reset to "Seleccione una opción" if there are multiple matches or none
                }
            });
        </script>
        <br>
        <br>

        <div class="form-group">
            <label for=actFijo> Activo Fijo </label>
            <input type="text" name="actFijo"
                value="{{ isset($hojadevida->actFijo) ? $hojadevida->actFijo : old('actFijo') }}" id="actFijo">
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for=regInvima> Registro Invima </label>
            <input type="text" name="regInvima"
                value="{{ isset($hojadevida->regInvima) ? $hojadevida->regInvima : old('regInvima') }}"
                id="regInvima">
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for=Estado> Estado Funcionamiento </label>
            <input type="text" name="Estado"
                value="{{ isset($hojadevida->Estado) ? $hojadevida->Estado : old('Estado') }}" id="Estado">
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for="cla_riesgos">Clasificacion de Riesgo</label>
            <select name="cla_riesgos" id="cla_riesgos" class="form-control">
                <option value="">Seleccione una opcion</option>
                @foreach ($clariesgo as $clasiriesgo)
                    <option value="{{ $clasiriesgo->id }}"
                        {{ isset($hojadevida) && $hojadevida->cla_riesgos == $clasiriesgo->id ? 'selected' : '' }}>
                        {{ $clasiriesgo->clariesgo }}
                @endforeach
            </select>
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for="cla_biomes">Clasificacion de Biomedica</label>
            <select name="cla_biomes" id="cla_biomes" class="form-control">
                <option value="">Seleccione una opcion</option>
                @foreach ($clabiomedica as $clasibiomedica)
                    <option value="{{ $clasibiomedica->id }}"
                        {{ isset($hojadevida) && $hojadevida->cla_biomes == $clasibiomedica->id ? 'selected' : '' }}>
                        {{ $clasibiomedica->clabiomedica }}
                @endforeach
            </select>
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for="cla_usos">Clasificacion por Uso</label>
            <select name="cla_usos" id="cla_usos" class="form-control">
                <option value="">Seleccione una opcion</option>
                @foreach ($clauso as $clasiuso)
                    <option value="{{ $clasiuso->id }}"
                        {{ isset($hojadevida) && $hojadevida->cla_usos == $clasiuso->id ? 'selected' : '' }}>
                        {{ $clasiuso->clauso }}
                @endforeach
            </select>
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for="foto"> </label>
            {{-- {{$equipo->foto}}     Muestra ruta de la imagen  --}}

            @if (isset($hojadevida->foto))
                <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $hojadevida->foto }}"
                    width="100" alt="">
            @endif

            <input type="file"name="foto" value="" id="foto" class="form-control">
        </div>
        <br>
        <br>

        {{-- SCRIPT CAMPO PERIODO CALIBRACION --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var perioCaliField = document.getElementById('perioCali');
                toggleFechaCali(perioCaliField.value); // Ensure correct state on page load

                perioCaliField.addEventListener('input', function() {
                    toggleFechaCali(this.value);
                });
            });

            function toggleFechaCali(value) {
                var fechaCaliContainer = document.getElementById('fechaCaliContainer');
                if (value.toLowerCase() === 'anual') {
                    fechaCaliContainer.style.display = 'block';
                } else {
                    fechaCaliContainer.style.display = 'none';
                    document.getElementById('fechaCali').value = ''; // Clear the date field if not 'anual'
                }
            }
        </script>

        <h2>REGISTRO HISTORICO</h2>
        <div class="form-group">
            <label for=fechaAdquisicion> Fecha de Adquisicion </label>
            <input type="date" name="fechaAdquisicion"
                value="{{ isset($hojadevida->fechaAdquisicion) ? $hojadevida->fechaAdquisicion : old('fechaAdquisicion') }}"
                id="fechaAdquisicion">
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for=fechaInstalacion> Fecha de Instalacion </label>
            <input type="date" name="fechaInstalacion"
                value="{{ isset($hojadevida->fechaInstalacion) ? $hojadevida->fechaInstalacion : old('fechaInstalacion') }}"
                id="fechaInstalacion">
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for=garantia> Garantía </label>
            <input type="date" name="garantia"
                value="{{ isset($hojadevida->garantia) ? $hojadevida->garantia : old('garantia') }}" id="garantia">
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for=factura> Factura </label>
            <input type="text" name="factura"
                value="{{ isset($hojadevida->factura) ? $hojadevida->factura : old('factura') }}" id="factura">
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for="forma_adqui_id">Forma de Adquisicion</label>
            <select name="forma_adqui_id" id="forma_adqui_id" class="form-control">
                <option value="">Seleccione una opcion</option>
                @foreach ($formaadqui as $formaadquisicion)
                    <option value="{{ $formaadquisicion->id }}"
                        {{ isset($hojadevida) && $hojadevida->forma_adqui_id == $formaadquisicion->id ? 'selected' : '' }}>
                        {{ $formaadquisicion->formaadqui }}
                @endforeach
            </select>
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for=vidaUtil> Vida Util </label>
            <input type="text" name="vidaUtil"
                value="{{ isset($hojadevida->vidaUtil) ? $hojadevida->vidaUtil : old('vidaUtil') }}" id="vidaUtil">
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for=costo> Costo </label>
            <input type="text" name="costo"
                value="{{ isset($hojadevida->costo) ? $hojadevida->costo : old('costo') }}" id="costo">
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for="propiedad_id">Propiedad</label>
            <select name="propiedad_id" id="propiedad_id" class="form-control">
                <option value="">Seleccione una opcion</option>
                @foreach ($nombreempresa as $nombreempre)
                    <option value="{{ $nombreempre->id }}"
                        {{ isset($hojadevida) && $hojadevida->propiedad_id == $nombreempre->id ? 'selected' : '' }}>
                        {{ $nombreempre->nombreempresa }}
                @endforeach
            </select>
        </div>
        <br>
        <br>

        <h2>REGISTRO TECNICO</h2>
        <div class="form-group">
            <label for="mag_fuen_alimen_id"> Fuente de Alimentacion</label>
            <select name="mag_fuen_alimen_id" id="mag_fuen_alimen_id" class="form-control">
                <option value="">Seleccione una opcion</option>
                @foreach ($nombrealimentacion as $nombrefuentealimentacion)
                    <option value="{{ $nombrefuentealimentacion->id }}"
                        {{ isset($hojadevida) && $hojadevida->mag_fuen_alimen_id == $nombrefuentealimentacion->id ? 'selected' : '' }}>
                        {{ $nombrefuentealimentacion->nombrealimentacion }}
                @endforeach
            </select>
        </div>
        <br>
        <br>

        <div class="form-group">
            <label for=volMax> Voltaje Max </label>
            <input type="text" name="volMax"
                value="{{ isset($hojadevida->volMax) ? $hojadevida->volMax : old('volMax') }}" id="volMax">
            <br>
            <label for=volMin> Voltaje Min </label>
            <input type="text" name="volMin"
                value="{{ isset($hojadevida->covolMinsto) ? $hojadevida->volMin : old('volMin') }}" id="volMin">

            <div class="form-group">
                <label for="mag_vol_id"> Fuente de Alimentacion</label>
                <select name="mag_vol_id" id="mag_vol_id" class="form-control">
                    <option value="">Seleccione una opcion</option>
                    @foreach ($abreviacionvolumen as $abrevivolumen)
                        <option value="{{ $abrevivolumen->id }}"
                            {{ isset($hojadevida) && $hojadevida->mag_fuen_alimen_id == $abrevivolumen->id ? 'selected' : '' }}>
                            {{ $abrevivolumen->abreviacionvolumen }}
                    @endforeach
                </select>
            </div>
            <br>
            <br>
        </div>
        <br>
        <br>


        {{-- ACCION DE GUARDAR  --}}
        <br>
        <br>
        <input type="submit" Value="Guardar"> {{-- se pone value para eliminar el dato del envio name="Enviar" --}}
        <br>
        <a href="{{ url('hojadevida') }}" class="btn btn-primary">
            <h3> Regresar </h3>
        </a>


        </form>


        </div>
        {{-- @extends('layouts.header') --}}
        {{-- 17- Creacion de formulario de envio --}}
        {{-- <h1>HOLA DESDE CREATE 2</h1> --}}
        {{-- desde aqui se envia a storage, con el uso del methoso post --}}

    </main>
    <br><br><br>
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


    {{-- este script es para las opciones equipo modelo marca --}}
    <script>
        $(document).ready(function() {
            // Evento cuando cambia el select de equipo
            $('#equipo').change(function() {
                var equipoId = $(this).val(); // Obtener el ID del equipo seleccionado

                if (equipoId) {
                    $.ajax({
                        url: '/biovic/public/get-modelos/' +
                            equipoId, // Ruta en Laravel para obtener los modelos
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#modelo').empty().append(
                                '<option value="">Selecciona un modelo</option>');

                            $.each(data, function(index, modelo) {
                                $('#modelo').append('<option value="' + modelo.id +
                                    '">' + modelo.nombre_modelo + '</option>');
                            });

                            $('#modelo').prop('disabled', false);
                            $('#marca').empty().append(
                                '<option value="">Selecciona una marca</option>').prop(
                                'disabled', true);
                        },
                        error: function() {
                            alert('Error al obtener modelos.');
                        }
                    });
                } else {
                    $('#modelo').empty().append('<option value="">Selecciona un modelo</option>').prop(
                        'disabled', true);
                    $('#marca').empty().append('<option value="">Selecciona una marca</option>').prop(
                        'disabled', true);
                }
            });

            // Evento cuando cambia el select de modelo
            $('#modelo').change(function() {
                var modeloId = $(this).val(); // Obtener el ID del modelo seleccionado

                if (modeloId) {
                    $.ajax({
                        url: '/biovic/public/get-marcas/' +
                            modeloId, // Ruta en Laravel para obtener las marcas
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#marca').empty().append(
                                '<option value="">Selecciona una marca</option>');

                            $.each(data, function(index, marca) {
                                $('#marca').append('<option value="' + marca.id + '">' +
                                    marca.nombre_marca + '</option>');
                            });

                            $('#marca').prop('disabled', false);
                        },
                        error: function() {
                            alert('Error al obtener marcas.');
                        }
                    });
                } else {
                    $('#marca').empty().append('<option value="">Selecciona una marca</option>').prop(
                        'disabled', true);
                }
            });
        });
    </script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) { // Ajusta el valor según sea necesario
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>
</body>

</html>
