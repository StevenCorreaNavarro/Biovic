{{-- resources/views/manto_crono.blade.php --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalTech - Cronograma</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/img/Logo_VitalTech2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">

    <style>
        /* Mantengo tus estilos originales y agrego mínimos ajustes para que el filtrado no rompa el layout */
        table { width: 100%; border-collapse: collapse; font-size: small; }
        tr, th { font-size: smaller; }
        .bg-yellow { background-color: yellow !important; text-align: center; font-weight: bold; }

        /* estilos que ya estaban (pequeñas clases utilitarias) */
        .mark { display:inline-block; padding:.18rem .4rem; border-radius:3px; background:#ffeb3b; color:#000; font-weight:700; }
        .month-header { cursor:pointer; user-select:none; }
        .month-cell { cursor:pointer; }
        .toast-custom { background: rgba(0,0,0,0.85); color:#fff; padding:.5rem .9rem; border-radius:6px; margin-bottom:.4rem; box-shadow:0 6px 18px rgba(0,0,0,0.15); }

        /* pequeño ajuste para que las celdas de meses se mantengan pequeñas y uniformes */
        .month-header, .month-cell { font-size: 10px; padding:6px 6px; text-align:center; white-space:nowrap; }
        /* hace que las celdas de texto largo (ubicación/equipo/marca...) se ajusten al contenido más largo */
        .small { font-size: 12px; }
        .col-ubic { /* clase que usa JS para filtrar por ubicación */ word-break: break-word; }
    </style>
</head>

<body>
    @extends('layouts.header')

    <main>
        <br><br>
        <div class="d-flex flex-column justify-content-center align-items-center text-center">
            <h1>CRONOGRAMA DE MANTENIMIENTO PRUEBA</h1>

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

    <footer class="bg-primary text-white text-center py-4 mt-4">
        <div class="container">
            <h4>VitalSoft</h4>
            <p>&copy; Soluciones biomédicas a la medida</p>
        </div>
    </footer>

    {{-- SCRIPTS --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    {{-- FUNCIONALIDAD: filtro por UBICACIÓN + marcar celdas con límite 4 por fila + persistencia bulk --}}
    <script>
    (function () {
        // -----------------------------
        // UTILS
        // -----------------------------
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        function showToast(msg, ms = 2500) {
            const c = document.getElementById('toast-container');
            if (!c) return;
            const el = document.createElement('div');
            el.className = 'toast-custom';
            el.textContent = msg;
            c.appendChild(el);
            setTimeout(()=> el.remove(), ms);
        }

        // set visual state of a cell: marked (X) or empty
        function setCellMarked(cell, marked) {
            if (!cell) return;
            cell.dataset.value = marked ? 'X' : '';
            cell.innerHTML = marked ? '<span class="mark">&#10004;</span>' : '<span style="display:inline-block; min-width:18px;">&nbsp;</span>';
        }

        // count how many months are marked (X) in a given row
        function countMarksInRow(row) {
            return Array.from(row.querySelectorAll('.month-cell')).reduce((acc, c) => {
                return acc + ((c.dataset.value === 'X' || c.textContent.trim() === 'X' || c.querySelector('.mark')) ? 1 : 0);
            }, 0);
        }

        // get all tbody rows
        const table = document.querySelector('table.crono');
        if (!table) return;
        const tbody = table.querySelector('tbody');
        const getRows = () => Array.from(tbody.querySelectorAll('tr'));

        // -----------------------------
        // PERSISTENCIA (bulk)
        // -----------------------------
        async function persistBulk(month, ids, value) {
            const url = "{{ route('mantocrono.bulk_mark') }}";
            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ month, ids, value })
                });
                return res;
            } catch (err) {
                console.error('Network error', err);
                throw err;
            }
        }

        // -----------------------------
        // Click en celda: marcar/desmarcar desde esa fila hacia abajo
        // - al marcar se respeta máximo 4 marcas por fila
        // - si una fila ya tiene 4 marcas y la celda no estaba marcada, esa fila se saltará
        // - se persiste para las filas realmente modificadas
        // -----------------------------
        table.addEventListener('click', function (ev) {
            const cell = ev.target.closest('.month-cell');
            if (!cell) return;
            const row = cell.closest('tr');
            const startIndex = parseInt(row.dataset.rowIndex, 10) || 0;
            const month = cell.dataset.month;
            const currentlyMarked = cell.dataset.value === 'X';
            const newValue = currentlyMarked ? '' : 'X';

            const rows = getRows().slice(startIndex);
            const idsToPersist = [];
            const changed = []; // {row, cell, prevMarked, newMarked}
            const skippedRows = [];

            rows.forEach(r => {
                const c = r.querySelector(`.month-cell[data-month="${month}"]`);
                if (!c) return;
                const prevMarked = c.dataset.value === 'X';
                // If unmarking: always allow
                if (newValue === '') {
                    if (prevMarked) {
                        changed.push({ r, c, prevMarked: true, newMarked: false });
                        idsToPersist.push(r.dataset.id);
                        setCellMarked(c, false); // optimistic UI update
                    }
                    return;
                }
                // Marking: check limit per row
                const marksCount = countMarksInRow(r);
                // if this cell already marked, nothing to do
                if (prevMarked) {
                    // nothing
                    return;
                }
                // if adding would exceed 4, skip this row
                if (marksCount >= 4) {
                    skippedRows.push(r);
                    return;
                }
                // otherwise mark
                changed.push({ r, c, prevMarked: false, newMarked: true });
                idsToPersist.push(r.dataset.id);
                setCellMarked(c, true); // optimistic UI update
            });

            // If nothing changed, exit (nothing to persist)
            if (changed.length === 0) {
                if (skippedRows.length > 0) showToast('Algunas filas tenían 4 marcas y fueron omitidas.');
                return;
            }

            // Persist only the rows actually changed
            persistBulk(month, idsToPersist, newValue)
                .then(resp => {
                    if (!resp.ok) {
                        // revert changes because server failed
                        changed.forEach(ch => setCellMarked(ch.c, ch.prevMarked));
                        showToast('Error al guardar. Se revirtieron los cambios.');
                    } else {
                        if (skippedRows.length > 0) showToast(`Actualizados ${idsToPersist.length} registros. ${skippedRows.length} omitidos por límite de 4.`);
                        else showToast(`Actualizados ${idsToPersist.length} registros.`);
                    }
                })
                .catch(() => {
                    // revert optimistic updates on network error
                    changed.forEach(ch => setCellMarked(ch.c, ch.prevMarked));
                    showToast('Error de conexión. Cambios no guardados.');
                });
        });

        // -----------------------------
        // Click en encabezado: marcar/desmarcar toda la columna
        // - aplica la misma lógica (máx 4 por fila)
        // -----------------------------
        table.querySelectorAll('th.month-header').forEach(h => {
            h.addEventListener('click', function () {
                const month = this.dataset.month;
                const rows = getRows();
                if (!rows.length) return;

                // Determine if we are marking or unmarking: look at first visible row cell
                const firstVisibleRow = rows.find(r => r.style.display !== 'none');
                if (!firstVisibleRow) return;
                const firstCell = firstVisibleRow.querySelector(`.month-cell[data-month="${month}"]`);
                const currentlyMarked = firstCell && firstCell.dataset.value === 'X';
                const newValue = currentlyMarked ? '' : 'X';

                const changed = [];
                const idsToPersist = [];
                const skippedCountPerRow = 0;
                const skippedRows = [];

                rows.forEach(r => {
                    if (r.style.display === 'none') return; // skip filtered-out rows
                    const c = r.querySelector(`.month-cell[data-month="${month}"]`);
                    if (!c) return;
                    const prevMarked = c.dataset.value === 'X';

                    if (newValue === '') {
                        // unmark: only if previously marked
                        if (prevMarked) {
                            changed.push({ r, c, prevMarked: true, newMarked: false });
                            idsToPersist.push(r.dataset.id);
                            setCellMarked(c, false);
                        }
                        return;
                    }

                    // marking:
                    if (prevMarked) return; // already marked

                    const marksCount = countMarksInRow(r);
                    if (marksCount >= 4) {
                        skippedRows.push(r);
                        return;
                    }

                    changed.push({ r, c, prevMarked: false, newMarked: true });
                    idsToPersist.push(r.dataset.id);
                    setCellMarked(c, true);
                });

                if (changed.length === 0) {
                    if (skippedRows.length > 0) showToast('Algunas filas tenían 4 marcas y fueron omitidas.');
                    return;
                }

                persistBulk(month, idsToPersist, newValue)
                    .then(resp => {
                        if (!resp.ok) {
                            // revert
                            changed.forEach(ch => setCellMarked(ch.c, ch.prevMarked));
                            showToast('Error al guardar. Se revirtieron los cambios.');
                        } else {
                            if (skippedRows.length > 0) showToast(`Actualizados ${idsToPersist.length} registros. ${skippedRows.length} omitidos por límite de 4.`);
                            else showToast(`Actualizados ${idsToPersist.length} registros.`);
                        }
                    })
                    .catch(() => {
                        changed.forEach(ch => setCellMarked(ch.c, ch.prevMarked));
                        showToast('Error de conexión. Cambios no guardados.');
                    });
            });
        });

        // -----------------------------
        // FILTRO por Ubicación (ya presente)
        // -----------------------------
        (function () {
            // Normaliza texto: quita tildes, convierte a minúsculas y trim
            function normalizeText(str) {
                if (!str) return '';
                try {
                    return str.toString().normalize('NFD').replace(/\p{Diacritic}/gu, '').toLowerCase().trim();
                } catch (e) {
                    return str.toString().normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLowerCase().trim();
                }
            }

            const selectUbic = document.getElementById('filter-ubicacion');
            if (!selectUbic) return;

            function applyUbicFilter() {
                const rawVal = selectUbic.value || '';
                const filterVal = normalizeText(rawVal);

                Array.from(tbody.querySelectorAll('tr')).forEach(row => {
                    const ubicTd = row.querySelector('.col-ubic');
                    const text = ubicTd ? normalizeText(ubicTd.textContent || '') : '';
                    if (!filterVal || text.indexOf(filterVal) !== -1) row.style.display = '';
                    else row.style.display = 'none';
                });
            }

            selectUbic.addEventListener('change', applyUbicFilter);
            window.addEventListener('load', applyUbicFilter);
        })();

    })();
    </script>

    {{-- pequeño script para la barra superior (no cambia) --}}
    <script>
        document.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (!navbar) return;
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>
</body>

</html>
