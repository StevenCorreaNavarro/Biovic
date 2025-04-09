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
                    </script> --}}



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
                    </script>



                    {{-- Imagen --}}
                    <div class="col-md-6 position-relative">
                        <div class="form-group">
                            <label for="foto">Selecciona una imagen:</label>
                            <input type="file" name="foto" id="foto"
                                class="form-control @error('foto') is-invalid @enderror" accept="image/*"
                                onchange="previewImage(event)">
                            @error('foto')
                                <div class="invalid-feedback">El campo es obligatorio</div>
                            @enderror

                            {{-- Vista previa de la imagen --}}
                            <img id="preview" class="img-thumbnail img-fluid mt-3" src="" width="100"
                                style="display: none;" alt="Vista previa">
                        </div>
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

                    {{-- //######################################################################################################################################################### --}}

                    {{-- FIN DESCRIPCION DE EQUIPO  --}}


                    {{-- INICIO REGISTRO HISTORICO --}}
                    <div style="background-color: rgb(245, 245, 245);"
                        class="row g-2 needs-validation mb-4  formu p-5">
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
                                <label for=garantia> Garantía </label>
                                <input type="date" name="garantia" class="form-control"
                                    value="{{ isset($hojadevida->garantia) ? $hojadevida->garantia : old('garantia') }}"
                                    id="garantia">
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

                        <div class="col-md-3 position-relative">
                            <div class="form-group">
                                <label for=vidaUtil> Vida Util </label>
                                <input type="text" name="vidaUtil" class="form-control"
                                    value="{{ isset($hojadevida->vidaUtil) ? $hojadevida->vidaUtil : old('vidaUtil') }}"
                                    id="vidaUtil">
                            </div>
                        </div>

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
                                    @foreach ($nombreempresa as $nombreempre)
                                        <option value="{{ $nombreempre->id }}"
                                            {{ isset($hojadevida) && $hojadevida->propiedad_id == $nombreempre->id ? 'selected' : '' }}>
                                            {{ $nombreempre->nombreempresa }}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br><br>
                    </div>

                    <div style="background-color: rgb(245, 245, 245)" class="row g-2 needs-validation formu p-5">
                        <h1 class="text-white"
                            style="background-color: rgb(0, 0, 0); margin-top: 0rem; text-align:center">
                            Registro tecnico
                        </h1>
                        <div class="col-md-3 position-relative">
                            <div class="form-group">
                                <label for="mag_fuen_alimen_id"> Fuente de Alimentacion</label>
                                <select name="mag_fuen_alimen_id" id="mag_fuen_alimen_id"
                                    class="form-control form-select">
                                    <option value="">Seleccione una opcion</option>
                                    @foreach ($nombrealimentacion as $nombrefuentealimentacion)
                                        <option value="{{ $nombrefuentealimentacion->id }}"
                                            {{ isset($hojadevida) && $hojadevida->mag_fuen_alimen_id == $nombrefuentealimentacion->id ? 'selected' : '' }}>
                                            {{ $nombrefuentealimentacion->nombrealimentacion }}
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 position-relative">
                            <label for=volMax> Voltaje Max </label>
                            <input type="text" name="volMax" class="form-control"
                                value="{{ isset($hojadevida->volMax) ? $hojadevida->volMax : old('volMax') }}"
                                id="volMax">
                        </div>

                        <div class="col-md-3 position-relative">
                            <label for=volMin> Voltaje Min </label>
                            <input type="text" name="volMin" class="form-control"
                                value="{{ isset($hojadevida->covolMinsto) ? $hojadevida->volMin : old('volMin') }}"
                                id="volMin">
                        </div>

                        <div class="col-md-3 position-relative">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="mag_vol_id"> Fuente de Alimentacion</label>
                                    <select name="mag_vol_id" id="mag_vol_id" class="form-control form-select">
                                        <option value="">Seleccione una opcion</option>
                                        @foreach ($abreviacionvolumen as $abrevivolumen)
                                            <option value="{{ $abrevivolumen->id }}"
                                                {{ isset($hojadevida) && $hojadevida->mag_fuen_alimen_id == $abrevivolumen->id ? 'selected' : '' }}>
                                                {{ $abrevivolumen->abreviacionvolumen }}
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>



                        {{-- ACCION DE GUARDAR  --}}



                    </div>
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
