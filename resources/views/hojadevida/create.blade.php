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
    <!-- Modal -->


    @extends('layouts.header')
    <main class=" p-2 " style="background-color: rgb(225, 225, 225);">
        {{-- <form action="{{ url('/hojadevida') }}" method="POST"  enctype="multipart/form-data" class="row g-2 needs-validation  p-5" style=" border-radius:10px; " --}}
        <form action="{{ route('hojadevida.store') }}" method="POST" enctype="multipart/form-data"
            class="row g-2  p-5 needs-validation" style=" border-radius:10px; " novalidate>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Seguro quieres guardar los datos?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <div style="background-color: rgb(245, 245, 245);" class="row g-2 needs-validation formu p-5">
                <h1 class="text-white" style="background-color: rgb(0, 0, 0); margin-top: 0rem; text-align:center">
                    Descripcion de quipo</h1>
                @csrf {{-- LLave de seguridad obligatoria --}}

                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>Ingrese los valores requeridos </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row g-0 needs-validation   py-3 " style="background-color: #a6a6a630; border-radius:10px;">
                    <div class="col-md-4 position-relative nnn px-2">
                        <label for="equipo_id" class="form-label">Selecciona un equipo:</label>
                        <select id="equipo" name="equipo_id" class="form-control form-select">
                            <option value="">Selecciona un equipo</option>
                            @foreach ($equipos as $equipo)
                                <option value="{{ $equipo->id }}">{{ $equipo->nombre_equipo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 position-relative px-2">
                        <label for="modelo" class="form-label">Selecciona un modelo:</label>
                        <select id="modelo" name="modelo_id" class="form-control form-select" disabled>
                            <option value="">Selecciona un modelo</option>
                        </select>
                    </div>
                    <div class="col-md-4 position-relative px-2">
                        <label for="marca_id" class="form-label">Selecciona una marca:</label>
                        <select id="marca" name="marca_id" class="form-control form-select" disabled>
                            <option value="">Selecciona una marca</option>
                        </select>
                    </div>
                </div>


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
                        <input type="text" name="serie" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 ">
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
                {{-- <div class="col-md-4 position-relative">
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
                </div> --}}
                <div class="col-md-4 position-relative">
                    <label for="perioCali">PerioCali</label>
                    <input type="text" name="perioCali" value="{{ old('perioCali') }}" id="perioCali"
                        class="form-control @error('perioCali') is-invalid @enderror"
                        oninput="toggleFechaCali(this.value)">
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
                    <div class="form-group mb-3">
                        <label for="foto"> </label>
                        {{-- {{$equipo->foto}}     Muestra ruta de la imagen  --}}
                        @if (isset($hojadevida->foto))
                            <img class="img-thumbnail img-fluid"
                                src="{{ asset('storage') . '/' . $hojadevida->foto }}" width="100"
                                alt="">
                        @endif
                        <input type="file" name="foto" value="" id="foto"
                            class="form-control @error('foto') is-invalid @enderror">
                        @error('foto')
                            <div class="invalid-feedback">El campo es obligatorio</div>
                        @enderror

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
            </div>

            <div style="background-color: rgb(245, 245, 245)" class="row g-2 needs-validation formu p-5">
                <h1 class="text-white" style="background-color: rgb(0, 0, 0); margin-top: 0rem; text-align:center">
                    Registro
                    historico
                </h1>
                <div class="col-md-4 position-relative">
                    <div class="form-group">
                        <label for=fechaAdquisicion> Fecha de Adquisicion </label>
                        <input type="date" name="fechaAdquisicion" class="form-control"
                            value="{{ isset($hojadevida->fechaAdquisicion) ? $hojadevida->fechaAdquisicion : old('fechaAdquisicion') }}"
                            id="fechaAdquisicion">
                    </div>
                </div>

                <div class="col-md-4 position-relative">
                    <div class="form-group">
                        <label for=fechaInstalacion> Fecha de Instalacion </label>
                        <input type="date" name="fechaInstalacion" class="form-control"
                            value="{{ isset($hojadevida->fechaInstalacion) ? $hojadevida->fechaInstalacion : old('fechaInstalacion') }}"
                            id="fechaInstalacion">
                    </div>
                </div>
                <div class="col-md-4 position-relative">
                    <div class="form-group">
                        <label for=garantia> Garantía </label>
                        <input type="date" name="garantia" class="form-control"
                            value="{{ isset($hojadevida->garantia) ? $hojadevida->garantia : old('garantia') }}"
                            id="garantia">
                    </div>
                </div>

                <div class="col-md-4 position-relative">
                    <div class="form-group">
                        <label for=factura> Factura </label>
                        <input type="text" name="factura" class="form-control"
                            value="{{ isset($hojadevida->factura) ? $hojadevida->factura : old('factura') }}"
                            id="factura">
                    </div>
                </div>

                <div class="col-md-4 position-relative">
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

                <div class="col-md-4 position-relative">
                    <div class="form-group">
                        <label for=vidaUtil> Vida Util </label>
                        <input type="text" name="vidaUtil" class="form-control"
                            value="{{ isset($hojadevida->vidaUtil) ? $hojadevida->vidaUtil : old('vidaUtil') }}"
                            id="vidaUtil">
                    </div>
                </div>

                <div class="col-md-4 position-relative">
                    <div class="form-group">
                        <label for=costo> Costo </label>
                        <input type="text" name="costo" class="form-control"
                            value="{{ isset($hojadevida->costo) ? $hojadevida->costo : old('costo') }}"
                            id="costo">
                    </div>
                </div>

                <div class="col-md-4 position-relative">
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
                <h1 class="text-white" style="background-color: rgb(0, 0, 0); margin-top: 0rem; text-align:center">
                    Registro tecnico
                </h1>
                <div class="col-md-4 position-relative">
                    <div class="form-group">
                        <label for="mag_fuen_alimen_id"> Fuente de Alimentacion</label>
                        <select name="mag_fuen_alimen_id" id="mag_fuen_alimen_id" class="form-control form-select">
                            <option value="">Seleccione una opcion</option>
                            @foreach ($nombrealimentacion as $nombrefuentealimentacion)
                                <option value="{{ $nombrefuentealimentacion->id }}"
                                    {{ isset($hojadevida) && $hojadevida->mag_fuen_alimen_id == $nombrefuentealimentacion->id ? 'selected' : '' }}>
                                    {{ $nombrefuentealimentacion->nombrealimentacion }}
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 position-relative">
                    <label for=volMax> Voltaje Max </label>
                    <input type="text" name="volMax" class="form-control"
                        value="{{ isset($hojadevida->volMax) ? $hojadevida->volMax : old('volMax') }}"
                        id="volMax">
                </div>

                <div class="col-md-4 position-relative">
                    <label for=volMin> Voltaje Min </label>
                    <input type="text" name="volMin" class="form-control"
                        value="{{ isset($hojadevida->covolMinsto) ? $hojadevida->volMin : old('volMin') }}"
                        id="volMin">
                </div>

                <div class="col-md-4 position-relative">
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
                <br>
                <br>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Guarda
                </button>
                {{-- <input type="submit" class="btn btn-primary" Value="Guardar" > se pone value para eliminar el dato del envio name="Enviar" --}}
                <br>
                <a href="{{ url('hojadevida') }}" class="btn btn-primary">
                    <h3> Regresar </h3>
                </a>
            </div>

        </form>


        </div>
        {{-- @extends('layouts.header') --}}
        {{-- 17- Creacion de formulario de envio --}}
        {{-- <h1>HOLA DESDE CREATE 2</h1> --}}
        {{-- desde aqui se envia a storage, con el uso del methoso post --}}
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
