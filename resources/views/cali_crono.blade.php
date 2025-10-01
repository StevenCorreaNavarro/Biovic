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
    <!-- <link rel="stylesheet" href="/path/to/styles.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/menu.css"> -->
    <link rel="icon" type="image/x-icon" href="/IMG/logotipo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: small;
        }

        tr,
        th {
            /* border: 1px solid black; */
            /* font-size: smaller; */
        }

        .bg-yellow {
            background-color: yellow !important;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    @extends('layouts.header')


    {{-- borrar desde aqui @extends('layouts.header') --}}

    <main>
        <br><br>
        <div class="d-flex flex-column justify-content-center align-items-center text-center">
            <h1>CRONOGRAMA DE CALIBRACION PRUEBA</h1>

            {{-- Buscador por propiedad + filtro por UBICACIÓN (no rompe la estructura visual) --}}
            <form class="d-flex w-100 align-items-center" style="background:#efefef; padding:8px; border-radius:6px;" method="GET" action="{{ route('mantocrono.propiedad') }}">
                @csrf

                {{-- FILTRO: Ubicación (llena por PHP y reforzado por JS) --}}
                <div class="ms-3 d-flex align-items-center">
                    <label for="filter-ubicacion" class="me-2 mb-0"><strong>Filtrar Ubicación:</strong></label>
                    <select id="filter-ubicacion" class="form-select form-select-sm" style="min-width:200px;">
                        <option value="">Todas</option>
                        @php
                            // Generar lista única de ubicaciones (desde PHP para mejor rendimiento)
                            $ubicaciones = [];
                            foreach($hdvs as $h) {
                                $u = trim((string)($h->ubifisica?->ubicacionfisica ?? ''));
                                if($u !== '' && !in_array($u, $ubicaciones)) $ubicaciones[] = $u;
                            }
                            sort($ubicaciones);
                        @endphp
                        @foreach($ubicaciones as $u)
                            <option value="{{ $u }}">{{ $u }}</option>
                        @endforeach
                    </select>
                </div>


                {{-- FILTRO POR SERVICIO (coloca esto antes de la tabla) --}}
                @php
                // Generar lista única de servicios (desde PHP para mejor rendimiento)
                $servicios = [];
                foreach($hdvs as $h){
                    $s = trim((string)($h->servicio?->nombreservicio ?? ''));
                    if($s !== '' && !in_array($s, $servicios)) $servicios[] = $s;
                }
                sort($servicios);
                @endphp

                <div class="d-flex align-items-center mb-2">
                    <label for="filter-servicio" class="me-2 mb-0"><strong>Filtrar por Servicio:</strong></label>
                    <select id="filter-servicio" name="servicio" class="form-select form-select-sm" style="min-width:240px;">
                        <option value="">Todos</option>
                        @foreach($servicios as $s)
                        <option value="{{ $s }}" {{ request('servicio') == $s ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>


                </div>
            </form>
        </div>

        {{-- Cabecera con logos y título (se respeta estructura) --}}
        <div>
            <div class="row p-0 m-0">
                <div class="w-25 bg-primary border border-light">
                    <img src="{{ asset('IMG/logotipohancho.png') }}" height="100px" alt="">
                </div>
                <div class="w-25 p-3 bg-primary border fs-4 border-light text-center text-white">
                    CRONOGRAMA DE MANTENIMIENTO
                    <div class="w-25 p-3 bg-primary">
                        <h5> version:</h5>
                        <h5> codigo:</h5>
                        <h5> proceso:</h5>
                    </div>
                </div>
                <div class="w-25 bg-primary border border-light">
                    <img src="{{ asset('IMG/logotipohancho.png') }}" height="100px" alt="">
                </div>


            </div>

            {{-- inicio de pegado  --}}





                {{-- TABLA CRONOGRAMA --}}
                <div class="table-wrap" style="overflow-x:auto; margin-top:.5rem;">
                    <table class="table table-striped table-hover crono" role="table">
                        <thead class="table-dark">
                            <tr>
                                {{-- Numeración --}}
                                <th>N°</th>

                                {{-- columna SERVICIO --}}
                                <th>SERVICIO</th>

                                {{-- Columnas existentes --}}
                                <th>UBICACIÓN</th>
                                <th>EQUIPO</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>SERIE</th>

                                {{-- Meses abreviados --}}
                                <th class="month-header" data-month="enero">ENE</th>
                                <th class="month-header" data-month="febrero">FEB</th>
                                <th class="month-header" data-month="marzo">MAR</th>
                                <th class="month-header" data-month="abril">ABR</th>
                                <th class="month-header" data-month="mayo">MAY</th>
                                <th class="month-header" data-month="junio">JUN</th>
                                <th class="month-header" data-month="julio">JUL</th>
                                <th class="month-header" data-month="agosto">AGO</th>
                                <th class="month-header" data-month="septiembre">SEP</th>
                                <th class="month-header" data-month="octubre">OCT</th>
                                <th class="month-header" data-month="noviembre">NOV</th>
                                <th class="month-header" data-month="diciembre">DIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $meses = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
                            @endphp

                            @foreach ($hdvs as $index => $hdv)
                                <tr data-id="{{ $hdv->id }}" data-row-index="{{ $index }}">
                                    {{-- Numeración consecutiva (N°) --}}
                                    <td style="font-size: 8px"><h6 style="margin:0;">{{ $loop->iteration }}</h6></td>

                                    {{-- celda SERVICIO con clase para filtrar (col-servicio) --}}
                                    <td class="small col-servicio" style="font-size: 8px">
                                        <h6 style="margin:0; white-space:nowrap">{{ $hdv->servicio?->nombreservicio ?? '---' }}</h6>
                                    </td>

                                    {{-- UBICACIÓN --}}
                                    <td class="small col-ubic" style="font-size: 8px">
                                        <h6 style="margin:0; white-space:nowrap">{{ $hdv->ubifisica?->ubicacionfisica ?? '---' }}</h6>
                                    </td>

                                    <td style="font-size:8px"><h6 style="margin:0;">{{ $hdv->equipo?->nombre_equipo ?? 'NO REGISTRA' }}</h6></td>
                                    <td style="font-size: 8px"><h6 style="margin:0;">{{ $hdv->marca?->nombre_marca ?? 'NO REGISTRA' }}</h6></td>
                                    <td style="font-size: 8px"><h6 style="margin:0;">{{ $hdv->modelo?->nombre_modelo ?? 'NO REGISTRA' }}</h6></td>
                                    <td style="font-size: 8px"><h6 style="margin:0;">{{ $hdv->serie ?? 'NO REGISTRA' }}</h6></td>

                                    {{-- Celdas de meses --}}
                                    @foreach($meses as $mes)
                                        @php $valor = $hdv->$mes; @endphp
                                        <td class="month-cell" data-month="{{ $mes }}" data-value="{{ $valor ?? '' }}"
                                            style="font-size:8px; border: 1px solid rgb(205,205,205); text-align:center;">
                                            @if(trim($valor) === 'X')
                                                <span class="mark" aria-hidden="true">&#10004;</span>
                                            @else
                                                <span style="display:inline-block; min-width:18px;">&nbsp;</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- SCRIPT: filtrado cliente-side por SERVICIO y actualización del link al PDF --}}
                <script>
                (function(){
                    // Normaliza texto (quita tildes, lower-case)
                    function normalizeText(str) {
                        if (!str) return '';
                        try {
                            return str.toString().normalize('NFD').replace(/\p{Diacritic}/gu, '').toLowerCase().trim();
                        } catch (e) {
                            return str.toString().normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLowerCase().trim();
                        }
                    }

                    const selectServ = document.getElementById('filter-servicio');
                    const table = document.querySelector('table.crono');
                    if (!selectServ || !table) return; // si no existe el select o la tabla, no hacemos nada

                    const tbody = table.querySelector('tbody');

                    // Actualiza href del/los enlaces PDF para incluir filtros actuales (search y servicio)
                    function updatePdfLinks() {
                        // encuentra enlaces posibles (top/bottom)
                        const pdfIds = ['pdf-download','pdf-download-bottom'];
                        pdfIds.forEach(id => {
                            const el = document.getElementById(id);
                            if (!el) return;
                            try {
                                const base = el.href.split('?')[0];
                                const params = new URLSearchParams(window.location.search);

                                // tomar valor actual del select (no del querystring necesariamente)
                                const servVal = selectServ.value ? selectServ.value.trim() : '';
                                if (servVal) params.set('servicio', servVal);
                                else params.delete('servicio');

                                // mantener search si existe en URL (opcional)
                                const searchInput = document.querySelector('input[name="search"]');
                                if (searchInput && searchInput.value.trim()) params.set('search', searchInput.value.trim());

                                el.href = base + (params.toString() ? ('?' + params.toString()) : '');
                            } catch (e) {
                                // ignore
                            }
                        });
                    }

                    function applyServiceFilter() {
                        const raw = selectServ.value || '';
                        const filter = normalizeText(raw);
                        Array.from(tbody.querySelectorAll('tr')).forEach(row => {
                            const servTd = row.querySelector('.col-servicio');
                            const servText = servTd ? normalizeText(servTd.textContent || '') : '';
                            // coincidencia por "contiene"
                            if (!filter || servText.indexOf(filter) !== -1) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        });

                        updatePdfLinks();
                    }

                    // aplicar al cambiar el select
                    selectServ.addEventListener('change', applyServiceFilter);

                    // aplicar al cargar (si viene seleccionado por querystring)
                    window.addEventListener('load', function(){
                        try {
                            const qs = new URLSearchParams(window.location.search);
                            const servicioQS = qs.get('servicio');
                            if (servicioQS && selectServ) selectServ.value = servicioQS;
                        } catch(e){ /* ignore */ }
                        applyServiceFilter();
                    });
                })();
                </script>



            {{-- Fin pegado --}}

                {{-- enlace PDF que se actualizará automáticamente con el filtro --}}
                <a id="pdf-download" class="btn btn-outline-secondary btn-sm ms-3" href="{{ route('mantocrono.pdf_letter_landscape') }}" target="_blank" >
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar PDF
                </a>

        </div>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
