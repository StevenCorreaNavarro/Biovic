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
    <main class=" p-1 " style="background-color: rgb(255, 255, 255);">
        {{-- <form action="{{ url('/hojadevida') }}" method="POST"  enctype="multipart/form-data" class="row g-2 needs-validation  p-5" style=" border-radius:10px; " --}}
        <form action="{{ route('hojadevida.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf {{-- LLave de seguridad obligatoria --}}

            {{-- MDAL PARA ASEGURAR QUE GUARDA DATOS --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Seguro quieres guardar los datos?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            los datos se guardaran permanentemente
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" Value="Guardar" type="button"
                                class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Inicio descripcion --}}
            <div style="background-color: rgb(255, 255, 255)" class="row g-2 needs-validation formu p-5">
                <div style="background-color: rgb(245, 245, 245);" class="row g-2 mb-4 needs-validation formu p-5">
                    <h1 class="text-white" style="background-color: rgb(0, 0, 0); margin-top: 0rem; text-align:center">
                        Descripción de equipo
                    </h1>
                    <div class="row g-0 needs-validation border border-dark-subtle py-3"
                        style="background-color: #a6a6a630; border-radius:10px;">
                        <div class="col-md-4 position-relative nnn px-2">
                            <label for="equipo_id" class="form-label">Selecciona un equipo:</label>
                            <select id="equipo" name="equipo_id" class="form-control form-select border border-3">
                                <option value="">Selecciona un equipo</option>
                                @foreach ($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 position-relative px-2">
                            <label for="marca_id" class="form-label">Selecciona una marca:</label>
                            <select id="marca" name="marca_id" class="form-control form-select border border-3"
                                disabled>
                                <option value="">Selecciona una marca</option>
                            </select>
                        </div>
                        <div class="col-md-4 position-relative px-2">
                            <label for="modelo" class="form-label">Selecciona un modelo:</label>
                            <select id="modelo" name="modelo_id" class="form-control form-select border border-3"
                                disabled>
                                <option value="">Selecciona un modelo</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 position-relative ">
                        <div class="form-group ">
                            <label for="serie"> Serie </label>
                            <input type="text" name="serie" class="form-control"
                                value="{{ isset($hojadevida->serie) ? $hojadevida->serie : old('serie') }}"
                                id="serie">
                        </div>
                    </div>
                    <div class="col-md-3 position-relative ">
                        <div class="form-group">
                            <label for=actFijo> Activo Fijo </label>
                            <input type="text" name="actFijo" class="form-control"
                                value="{{ isset($hojadevida->actFijo) ? $hojadevida->actFijo : old('actFijo') }}"
                                id="actFijo">
                        </div>
                    </div>

                    {{-- ESTADO --}}
                    <div class="col-md-3 position-relative ">
                        <label for="estadoequipo_id">Estado del Equipo</label>
                        {{--  Mostrar valores de `$estadoequipo` para depuración     
                        <pre>{{ print_r($estadoequipo->toArray()) }}</pre>   --}}

                        <select name="estadoequipo_id" id="estadoequipo_id" class="form-control form-select">
                            <option value="">Seleccione una opción</option>
                            @foreach ($estadoequipo as $estadoequi)
                                <option value="{{ $estadoequi->id }}"
                                    {{ isset($hojadevida) && $hojadevida->estadoequipo_id == $estadoequi->id ? 'selected' : '' }}>
                                    {{ $estadoequi->estadoequipo }} {{-- Aqui recibi las opciones para mostrar  --}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Ubicacion Fisica --}}
                    <div class="col-md-3 position-relative">
                        <label for="ubifisica_id">Ubicación Física</label>
                        {{--  Mostrar valores de `$ubifisicas` para depuración  
                        <pre>{{ print_r($ubifisicas->toArray()) }}</pre>  --}}
                        <select name="ubifisica_id" id="ubifisica_id" class="form-control form-select">
                            <option value="">Seleccione una opción</option>
                            @foreach ($ubifisicas as $ubicacion)
                                <option value="{{ $ubicacion->id }}"
                                    {{ isset($hojadevida) && $hojadevida->ubifisica_id == $ubicacion->id ? 'selected' : '' }}>
                                    {{ $ubicacion->ubicacionfisica }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- SERVICIO --}}
                    <div class="col-md-3 position-relative">
                        <label for="servicio_id">Servicio</label>
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

                    <div class="col-md-3 ">
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

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=regInvima> Registro Invima </label>
                            <input type="text" name="regInvima" class="form-control"
                                value="{{ isset($hojadevida->regInvima) ? $hojadevida->regInvima : old('regInvima') }}"
                                id="regInvima">
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="cla_riesgo_id">Clasificacion de Riesgo</label>
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

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="cla_biome_id">Clasificación Biomedica</label>
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
                        <div class="form-group">
                            <label for="cla_uso_id">Clasificacion por Uso</label>
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

                    {{-- <div class="col-md-3 position-relative"> NO USAR 
                        <div class="form-group">
                            <label for="perioMto"> Periodo Mantenimiento </label>
                            <input type="text" name="perioMto" class="form-control"
                                value="{{ isset($hojadevida->perioMto) ? $hojadevida->perioMto : old('perioMto') }}"
                                id="perioMto">
                        </div>
                    </div> --}}

                    {{-- <div class="col-md-3 position-relative">
                        <label for="perioCali">Periodo de Mantenimiento</label>
                        <select name="perioCali" id="perioCali" class="form-control form-select" required>
                            <option value="">Seleccione una opcion</option>
                            <option value="semestre">Trimestral</option>
                            <option value="cuatrimestre">Cuatrimestral</option>
                            {{-- <option value="anual">Anual</option>
                        </select>
                    </div> --}}

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
                        <select name="perioCali" id="perioCali" class="form-control" required
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

                    <!-- SCRIPT FUNCIONAL -->
                    {{-- <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const select = document.getElementById("perioCali");
                            const fechaDiv = document.getElementById("fechaCaliDiv");
                            const fechaInput = document.getElementById("fechaCali");
                    
                            if (!select || !fechaDiv || !fechaInput) {
                                console.warn("Uno de los elementos no fue encontrado.");
                                return;
                            }
                    
                            function mostrarFecha() {
                                const valor = select.value.trim().toUpperCase();
                                if (valor === "ANUAL") {
                                    fechaDiv.style.display = "block";
                                } else {
                                    fechaDiv.style.display = "none";
                                    fechaInput.value = "";
                                }
                            }
                    
                            select.addEventListener("change", mostrarFecha);
                    
                            // Ejecutar al cargar por si ya tiene valor
                            mostrarFecha();
                        });
                    </script>
                   --}}
                    {{-- Fin Calibracion --}}

                    {{-- Script para mostrar/ocultar el campo de fecha 
                    <script>
                        function mostrarFechaCali() {
                            const periodo = document.getElementById('perioCali').value;
                            const fechaCaliDiv = document.getElementById('fechaCaliContainer');

                            if (periodo === 'anual') {
                                fechaCaliDiv.style.display = 'block';
                            } else if (periodo === 'cuatrimestre') {
                                fechaCaliDiv.style.display = 'block';
                            } else {
                                fechaCaliDiv.style.display = 'none';
                                document.getElementById('fechaCali').value = ''; // Limpiar valor si se oculta
                            }
                        }
                    </script>--}}


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
                            fechaCaliInput.setAttribute('max', fechaHoy);  // Fecha máxima: Hoy
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

                    <script>
                        function previewImage(event) {
                            let reader = new FileReader();
                            reader.onload = function() {
                                let preview = document.getElementById('preview');
                                preview.src = reader.result;  
                                preview.style.display = 'block';
                            }
                            reader.readAsDataURL(event.target.files[0]);
                        }
                    </script>
                </div>
                {{-- //######################################################################################################################################################### --}}

                {{-- FIN DESCRIPCION DE EQUIPO  --}}


                {{-- INICIO REGISTRO HISTORICO --}}
                <div style="background-color: rgb(245, 245, 245);" class="row g-2 needs-validation mb-4  formu p-5">
                    {{--  Seleccion Fondo Blan --}}
                    <h1 class="text-white"
                        style="background-color: rgb(0, 0, 0); margin-top: 0rem; text-align:center">
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
                        document.addEventListener('DOMContentLoaded', function () {
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
                        <div class="form-group">
                            <label for="forma_adqui_id">Forma de Adquisicion</label>
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

                    {{-- <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=vidaUtil> Vida Util </label>
                            <input type="date" name="vidaUtil" class="form-control"
                                value="{{ isset($hojadevida->vidaUtil) ? $hojadevida->vidaUtil : old('vidaUtil') }}"
                                id="vidaUtil">
                        </div>
                    </div> --}}



                                        <!-- Selector de años de vida útil -->
                    <div class="col-md-2 position-relative">
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
                    <input type="hidden" name="vidaUtil" id="vidaUtil" value="{{ old('vidaUtil', $hojadevida->vidaUtil ?? '') }}">

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const fechaAdquisicionInput = document.getElementById('fechaAdquisicion');
                            const aniosVidaSelect = document.getElementById('aniosVida');
                            const vidaUtilVisible = document.getElementById('vidaUtilCalculada');
                            const vidaUtilHidden = document.getElementById('vidaUtil');

                            // Función para calcular la vida útil
                            function calcularVidaUtil() {
                                const fechaAdq = new Date(fechaAdquisicionInput.value);
                                const anios = parseInt(aniosVidaSelect.value);

                                if (!isNaN(fechaAdq.getTime()) && !isNaN(anios)) {
                                    const vidaUtil = new Date(fechaAdq);
                                    vidaUtil.setFullYear(vidaUtil.getFullYear() + anios);

                                    const yyyy = vidaUtil.getFullYear();
                                    const mm = String(vidaUtil.getMonth() + 1).padStart(2, '0');
                                    const dd = String(vidaUtil.getDate()).padStart(2, '0');
                                    const vidaFinal = `${yyyy}-${mm}-${dd}`;

                                    // Mostrar y guardar la vida útil calculada
                                    vidaUtilVisible.value = vidaFinal;
                                    vidaUtilHidden.value = vidaFinal;
                                } else {
                                    // Si no hay fecha, limpiar los campos
                                    vidaUtilVisible.value = '';
                                    vidaUtilHidden.value = '';
                                }
                            }

                            // Llamar a la función al cargar la página para calcular la vida útil si ya se tiene una fecha
                            calcularVidaUtil();

                            // Escuchar cambios en la fecha de adquisición y los años seleccionados
                            fechaAdquisicionInput.addEventListener('change', calcularVidaUtil);
                            aniosVidaSelect.addEventListener('change', calcularVidaUtil);
                        });
                    </script>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for=costo> Costo </label>
                            <input type="text" name="costo" class="form-control"
                                value="{{ isset($hojadevida->costo) ? $hojadevida->costo : old('costo') }}"
                                id="costo">
                        </div>
                    </div>

                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="propiedad_id">Propiedad</label>
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

                {{-- INICIO REGISTRO TECNICO --}}
                <div style="background-color: rgb(245, 245, 245)" class="row g-2 needs-validation formu p-5">
                    <h1 class="text-white"
                        style="background-color: rgb(0, 0, 0); margin-top: 0rem; text-align:center">
                        Registro tecnico
                    </h1>

                    <div class="col-md-4 position-relative">
                        <div class="form-group">
                            <label for="mag_fuen_alimen_id">Fuente de Alimentación</label>
                            <select name="mag_fuen_alimen_id" id="mag_fuen_alimen_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($nombrealimentacion as $fuente)
                                    <option 
                                        value="{{ $fuente->id }}" 
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
                            <input type="text" name="frecuencia" class="form-control"
                                value="{{ isset($hojadevida->frecuencia) ? $hojadevida->frecuencia : old('frecuencia') }}"
                                id="frecuencia">
                        </div>
                    </div>

                    <div class="col-md-4 position-relative">
                        <div class="form-group">
                            <label for="mag_fre_id">Unidad de Frecuencia</label>
                            <select name="mag_fre_id" id="mag_fre_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($magFrec as $frecuencia)
                                    <option 
                                        value="{{ $frecuencia->id }}" 
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
                        <div class="form-group">
                            <label for="mag_fuen_ali_id">Unidad de Alimentación</label>
                            <select name="mag_fuen_ali_id" id="mag_fuen_ali_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($fuentesAli as $fuente)  {{-- Asi se recibe desde  hojadevidaController--}}
                                    <option 
                                        value="{{ $fuente->id }}" 
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
                                    <option 
                                        value="{{ $corriente->id }}" 
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
                                    <option 
                                        value="{{ $peso->id }}" 
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
                                    <option 
                                        value="{{ $presion->id }}" 
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
                                    <option 
                                        value="{{ $potencia->id }}" 
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
                            <input type="text" name="temperatura" class="form-control" value="{{ old('temperatura') }}" id="temperatura">
                        </div>
                    </div>
                
                    <!-- Selección de Unidad de Temperatura -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_temp_id">Unidad de Temperatura</label>
                            <select name="mag_temp_id" id="mag_temp_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($temperaturas as $temp)
                                    <option 
                                        value="{{ $temp->id }}" 
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
                            <input type="text" name="velocidad" class="form-control" value="{{ old('velocidad') }}" id="velocidad">
                        </div>
                    </div>

                    <!-- Select Unidad Velocidad -->
                    <div class="col-md-4 position-relative">
                        <div class="form-group">
                            <label for="mag_vel_id">Unidad de Velocidad</label>
                            <select name="mag_vel_id" id="mag_vel_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($velocidad as $vel)
                                    <option 
                                        value="{{ $vel->id }}" 
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
                            <input type="text" name="humedad" class="form-control" value="{{ old('humedad') }}" id="humedad">
                        </div>
                    </div>

                    <!-- Tamaño Equipo -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="dimLargo">Largo</label>
                            <input type="text" name="dimLargo" class="form-control" value="{{ old('dimLargo') }}" id="dimLargo">
                        </div>
                    </div>

                    <!-- Campo Ancho -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="dimAncho">Ancho</label>
                            <input type="text" name="dimAncho" class="form-control" value="{{ old('dimAncho') }}" id="dimAncho">
                        </div>
                    </div>

                    <!-- Campo Alto -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="dimAlto">Alto</label>
                            <input type="text" name="dimAlto" class="form-control" value="{{ old('dimAlto') }}" id="dimAlto">
                        </div>
                    </div>

                    <!-- Seleccion Unidad Dimensión -->
                    <div class="col-md-3 position-relative">
                        <div class="form-group">
                            <label for="mag_dimension_id">Unidad de Dimensión</label>
                            <select name="mag_dimension_id" id="mag_dimension_id" class="form-control form-select">
                                <option value="">Seleccione una opción</option>
                                @foreach ($dimensiones as $dim)
                                    <option 
                                        value="{{ $dim->id }}" 
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

                <div style="background-color: rgb(245, 245, 245)" class="row g-2 needs-validation formu p-5">
                    <h1 class="text-white"
                        style="background-color: rgb(0, 0, 0); margin-top: 0rem; text-align:center">
                        Accesorios
                    </h1>

                <!-- SELECT ACCESORIO -->

                <div class="row g-3 mt-4">
                    <div class="col-md-6">
                        <label for="accesorio_id" class="form-label fw-bold">Selecciona un accesorio:</label>
                        <select id="accesorio_id" name="accesorio_id" class="form-select border border-2 shadow-sm">
                            <option value="">Seleccione un accesorio</option>
                            @foreach ($accesorios as $accesorio)
                                <option 
                                    value="{{ $accesorio->id }}"
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

                {{--  SCRIPT ACCESORIO --}}

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const equipoSelect = document.getElementById('equipo_id');
                        const accesorioSelect = document.getElementById('accesorio_id');
                        const mensajeNoAccesorios = document.getElementById('mensaje_no_accesorios');
                        const infoAccesorio = document.getElementById('info_accesorio');
                
                        if (!equipoSelect || !accesorioSelect) return;
                
                        equipoSelect.addEventListener('change', function () {
                            const equipoId = this.value;
                            const opciones = accesorioSelect.querySelectorAll('option');
                            let hayAccesorios = false;
                
                            mensajeNoAccesorios.classList.add('d-none');
                
                            opciones.forEach(option => {
                                const idEquipo = option.getAttribute('data-equipo-id');
                                if (!idEquipo || equipoId === '') {
                                    option.style.display = '';
                                } else if (equipoId === idEquipo) {
                                    option.style.display = '';
                                    hayAccesorios = true;
                                } else {
                                    option.style.display = 'none';
                                }
                            });
                
                            if (!hayAccesorios) mensajeNoAccesorios.classList.remove('d-none');
                
                            accesorioSelect.value = '';
                            infoAccesorio.classList.add('d-none');
                        });
                
                        accesorioSelect.addEventListener('change', function () {
                            const option = accesorioSelect.options[accesorioSelect.selectedIndex];
                
                            if (!option || option.value === '') {
                                infoAccesorio.classList.add('d-none');
                                return;
                            }
                
                            document.getElementById('descripcion_accesorio').textContent = option.getAttribute('data-nombre-accesorio') || 'No disponible';
                            document.getElementById('modelo_accesorio').textContent = option.getAttribute('data-modelo') || 'No disponible';
                            document.getElementById('serie_accesorio').textContent = option.getAttribute('data-serie') || 'No disponible';
                            document.getElementById('costo_accesorio').textContent = option.getAttribute('data-costo') || 'No disponible';
                
                            infoAccesorio.classList.remove('d-none');
                        });
                    });
                </script>

                {{-- FIN ACCESORIOS --}}


                {{--  FABRICANTE - PROVEEDOR  --}}

                    {{-- FABRICANTE - PROVEEDOR --}}
                    <div class="container-fluid my-4">
                        <div class="row g-4 p-4 rounded" style="background-color: rgb(245, 245, 245);">
                            <h1 class="text-white text-center py-2 rounded" style="background-color: black;">
                                Datos del fabricante y proveedor
                            </h1>

                            <!-- COLUMNA IZQUIERDA - FABRICANTE -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fabricante_id" class="form-label fw-bold">Selecciona un fabricante:</label>
                                    <select id="fabricante_id" name="fabricante_id" class="form-select border border-3">
                                        <option value="">Seleccione un fabricante</option>
                                        @foreach ($fabricantes as $fabricante)
                                            <option 
                                                value="{{ $fabricante->id }}"
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
                                <div id="mensaje_no_fabricantes" class="alert alert-warning mt-3" style="display: none;">
                                    No hay fabricantes disponibles.
                                </div>
                            </div>

                            <!-- COLUMNA DERECHA - PROVEEDOR -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="proveedor_id" class="form-label fw-bold">Selecciona un proveedor:</label>
                                    <select id="proveedor_id" name="proveedor_id" class="form-select border border-3">
                                        <option value="">Seleccione un proveedor</option>
                                        @foreach ($proveedores as $proveedor)
                                            <option 
                                                value="{{ $proveedor->id }}"
                                                data-nombre-proveedor="{{ $proveedor->nombreProveedor ?? 'No disponible' }}"
                                                data-direccion-proveedor="{{ $proveedor->direccionProvee ?? 'No disponible' }}"
                                                data-telefono-proveedor="{{ $proveedor->telefonoProvee ?? 'No disponible' }}"
                                                data-ciudad-proveedor="{{ $proveedor->ciudadProvee ?? 'No disponible' }}"
                                                data-email-proveedor="{{ $proveedor->emailWebProve ?? 'No disponible' }}">
                                                {{ $proveedor->nombreProveedor ?? 'No disponible' }} - {{ $proveedor->ciudadProvee ?? 'No disponible' }}
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
                                <div id="mensaje_no_proveedores" class="alert alert-warning mt-3" style="display: none;">
                                    No hay proveedores disponibles.
                                </div>
                            </div>
                        </div>
                    </div>



                {{-- INICION SCRIPT --}}

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const fabricanteSelect = document.getElementById('fabricante_id');
                        const infoFabricante = document.getElementById('info_fabricante');
                        const mensajeNoFabricantes = document.getElementById('mensaje_no_fabricantes');
                
                        if (fabricanteSelect.options.length <= 1) mensajeNoFabricantes.style.display = 'block';
                
                        fabricanteSelect.addEventListener('change', function () {
                            const selected = this.options[this.selectedIndex];
                            if (!selected || selected.value === '') return infoFabricante.style.display = 'none';
                
                            document.getElementById('nombre_fabricante').textContent = selected.getAttribute('data-nombre-fabri') || 'No disponible';
                            document.getElementById('direccion_fabricante').textContent = selected.getAttribute('data-direccion-fabri') || 'No disponible';
                            document.getElementById('telefono_fabricante').textContent = selected.getAttribute('data-telefono-fabri') || 'No disponible';
                            document.getElementById('ciudad_fabricante').textContent = selected.getAttribute('data-ciudad-fabri') || 'No disponible';
                            document.getElementById('email_fabricante').textContent = selected.getAttribute('data-email-fabri') || 'No disponible';
                
                            infoFabricante.style.display = 'block';
                        });
                
                        const proveedorSelect = document.getElementById('proveedor_id');
                        const infoProveedor = document.getElementById('info_proveedor');
                        const mensajeNoProveedores = document.getElementById('mensaje_no_proveedores');
                
                        if (proveedorSelect.options.length <= 1) mensajeNoProveedores.style.display = 'block';
                
                        proveedorSelect.addEventListener('change', function () {
                            const selected = this.options[this.selectedIndex];
                            if (!selected || selected.value === '') return infoProveedor.style.display = 'none';
                
                            document.getElementById('nombre_proveedor').textContent = selected.getAttribute('data-nombre-proveedor') || 'No disponible';
                            document.getElementById('direccion_proveedor').textContent = selected.getAttribute('data-direccion-proveedor') || 'No disponible';
                            document.getElementById('telefono_proveedor').textContent = selected.getAttribute('data-telefono-proveedor') || 'No disponible';
                            document.getElementById('ciudad_proveedor').textContent = selected.getAttribute('data-ciudad-proveedor') || 'No disponible';
                            document.getElementById('email_proveedor').textContent = selected.getAttribute('data-email-proveedor') || 'No disponible';
                
                            infoProveedor.style.display = 'block';
                        });
                    });
                </script>

                {{-- FIN FABRICANTES Y PROVEEDORES --}}

                
            </div> {{--  Cierre Div linea 51  --}}

                {{--  RECOMENDACIONES --}}

        
                {{--  RECOMENDACIONES --}}
                <div style="background-color: rgb(245, 245, 245)" class="row g-2 needs-validation formu p-5">
                    <h1 class="text-white"
                        style="background-color: rgb(0, 0, 0); margin-top: 0rem; text-align:center">
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
                <div style="background-color: rgb(245, 245, 245)" class="row g-2 needs-validation formu p-5">
                    <h1 class="text-white"
                        style="background-color: rgb(0, 0, 0); margin-top: 0rem; text-align:center">
                        Soportes Legales
                    </h1>                
                    {{-- Soporte de Factura --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="soporteFactura">Selecciona el Soporte de Factura (PDF)</label>
                            <input type="file" name="soporteFactura" id="soporteFactura"
                                class="form-control @error('soporteFactura') is-invalid @enderror" accept="application/pdf">
                            @error('soporteFactura')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Soporte de Registro Invima --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="soporteRegistroInvima">Selecciona el Soporte de Registro Invima (PDF)</label>
                            <input type="file" name="soporteRegistroInvima" id="soporteRegistroInvima"
                                class="form-control @error('soporteRegistroInvima') is-invalid @enderror" accept="application/pdf">
                            @error('soporteRegistroInvima')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Soporte de Certificado de Calibración --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="soporteCertificadoCalibracion">Selecciona el Soporte de Certificado de Calibración (PDF)</label>
                            <input type="file" name="soporteCertificadoCalibracion" id="soporteCertificadoCalibracion"
                                class="form-control @error('soporteCertificadoCalibracion') is-invalid @enderror" accept="application/pdf">
                            @error('soporteCertificadoCalibracion')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Soporte de Manual --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="soporteManual">Selecciona el Soporte de Manual (PDF)</label>
                            <input type="file" name="soporteManual" id="soporteManual"
                                class="form-control @error('soporteManual') is-invalid @enderror" accept="application/pdf">
                            @error('soporteManual')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Soporte de Limpieza y Desinfección --}}
                    <div class="col-md-6 position-relative d-flex">
                        <div class="form-group">
                            <label for="soporteLimpiezaDesinfeccion">Selecciona el Soporte de Limpieza y Desinfección (PDF)</label>
                            <input type="file" name="soporteLimpiezaDesinfeccion" id="soporteLimpiezaDesinfeccion"
                                class="form-control @error('soporteLimpiezaDesinfeccion') is-invalid @enderror" accept="application/pdf">
                            @error('soporteLimpiezaDesinfeccion')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- FIN CARGA DE SOPORTES --}}

                
                {{-- ACCION DE GUARDAR  --}}
                <div class="d-grid gap-0 col-4 mx-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Guardar
                    </button>
                    {{-- <input type="submit" class="btn btn-primary" Value="Guardar" > se pone value para eliminar el dato del envio name="Enviar" --}}
                    <br>
                    <a href="{{ url('hojadevida/listar') }}" class="btn btn-primary">
                        <h6> Lista </h6>
                    </a>
                </div>
            </div>

        </form>
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
{{-- este script es para las opciones equipo modelo marca --}}
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
</script>
    {{-- <script>
        $(document).ready(function() {
            // Evento cuando cambia el select de equipo
            $('#equipo').change(function() {
                var equipoId = $(this).val(); // Obtener el ID del equipo seleccionado

                if (equipoId) {
                    $.ajax({
                        url: '/biovic/public/modelos/' + equipoId, // Ruta en Laravel para obtener los modelos
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#modelo').empty().append('<option value="">Selecciona un modelo</option>');

                            $.each(data, function(index, modelo) {
                                $('#modelo').append('<option value="' + modelo.id + '">' + modelo.nombre_modelo + '</option>');
                            });

                            $('#modelo').prop('disabled', false);
                            $('#marca').empty().append('<option value="">Selecciona una marca</option>').prop('disabled', true);
                        },
                        error: function() {
                            alert('Error al obtener modelos.');
                        }
                    });
                } else {
                    $('#modelo').empty().append('<option value="">Selecciona un modelo</option>').prop('disabled', true);
                    $('#marca').empty().append('<option value="">Selecciona una marca</option>').prop('disabled', true);
                }
            });

            // Evento cuando cambia el select de modelo
            $('#modelo').change(function() {
                var modeloId = $(this).val(); // Obtener el ID del modelo seleccionado

                if (modeloId) {
                    $.ajax({
                        url: '{{ url("get-modelos") }}/'+ modeloId, // Ruta en Laravel para obtener las marcas
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#marca').empty().append('<option value="">Selecciona una marca</option>');

                            $.each(data, function(index, marca) {
                                $('#marca').append('<option value="' + marca.id + '">' + marca.nombre_marca + '</option>');
                            });

                            $('#marca').prop('disabled', false);
                        },
                        error: function() {
                            alert('Error al obtener marcas.');
                        }
                    });
                } else {
                    $('#marca').empty().append('<option value="">Selecciona una marca</option>').prop('disabled', true);
                }
            });
        });
    </script> --}}





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
