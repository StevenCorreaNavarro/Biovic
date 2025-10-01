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

        <!-- <div class="image-hoja">
            <img src="IMG/M2-5 - Cronograma de Mantenimiento.jpg" alt="">
        </div> -->

        <br><br>
        {{-- <div>
            <h1 class="text-center">Cronograma de Mantenimiento</h1>
            <p class="text-center">El cronograma de mantenimiento es una herramienta que permite planificar y organizar
                las actividades de mantenimiento de una empresa o institución. En este documento se detallan las tareas
                de mantenimiento preventivo y correctivo que se deben realizar en un determinado periodo de tiempo.</p>
            <p class="text-center">El objetivo del cronograma de mantenimiento es garantizar que los equipos,
                maquinarias e instalaciones de una empresa funcionen de manera óptima y segura. Para ello, se establecen
                las fechas en las que se deben realizar las tareas de mantenimiento, así como los recursos necesarios
                para llevarlas a cabo.</p>
            <p class="text-center">El cronograma de mantenimiento es una herramienta fundamental para la gestión del
                mantenimiento de una empresa, ya que permite planificar las actividades de mantenimiento de forma
                eficiente y ordenada. Además, facilita la asignación de recursos y la programación de las tareas de
                mantenimiento, lo que contribuye a mejorar la eficiencia y la productividad de la empresa.</p>
            <p class="text-center">En resumen, el cronograma de mantenimiento es una herramienta que permite planificar
                y organizar las actividades de mantenimiento de una empresa de manera eficiente y ordenada, lo que
                contribuye a mejorar la eficiencia y la productividad de la empresa.</p>
        </div> --}}


        <div class=" d-flex flex-column justify-content-center align-items-center text-center ">
            <h1>CRONOGRAMA DE CALIBRACION cali_crono.blade</h1>
            <form class="d-flex m-2" style="background-color: rgb(239, 239, 239); width: 100%" method="GET"
                action="{{ route('mantocrono.semaforo') }}">
                @csrf {{-- token o seguridad  --}}
                {{-- <input type="text" id="equipo" name="nombre_equipo" class="news-input" list="equipos-list"   value="{{ old('nombre') }}" required> --}}
                <input class="form-control m-2" class="form-control" id="propiedad" style="width: 400px" type="text" name="search"  placeholder="Buscar..." value="{{ request('search') }}"      list="propiedad-list"   value="{{ old('propiedad') }}" required>
                    <datalist style="font-size: 10%" id="propiedad-list">
                        @foreach ($propiedades as $prop)
                            <option value="{{ $prop->nombreempresa}}" data-id="{{ $prop->id }} "></option>
                        @endforeach
                    </datalist>

                <button class="btn btn-primary m-2" type="submit"><i class="bi bi-search"></i></button> <a
                    href="{{ route('cronocali.propiedad') }}" class="bi bi-arrow-repeat btn btn-primary m-2"></a>

                {{-- <a href="{{ url('hojadevida/create') }}" class="btn btn-primary m-2">
                Registrar Nueva hoja de vida
            </a> --}}
            </form>
        </div>
        <div>
            <div class="row p-0 m-0">
                <div class="w-25  bg-black border border-light "><img src="{{ asset('IMG/logotipohancho.png') }}"
                        height="100px" alt=""></div>
                <div class="w-25 p-3 bg-primary fs-4 border border-light text-center text-white">CRONOGRAMA DE CALIBRACION
                </div>
                <div class="w-25 p-3 bg-primary border border-light text-center">
                    <h5> version:</h5>
                    <h5> codigo:</h5>
                    <h5> proceso:</h5>
                </div>
                @if (request()->filled('search'))
                    @if ($hdvs->count() > 0)
                        {{-- Mostrar el título solo una vez --}}
                        <div class="w-25 p-3 bg-primary border border-light text-center text-white">
                            <h1 class="text-white">{{ $hdvs[0]->propiedad?->nombreempresa ?? '---' }}</h1>
                        </div>

                        {{-- Mostrar los resultados --}}
                        @foreach ($hdvs as $hdv)
                            {{-- <div class="card my-2">
                                {{-- Muestra los datos que quieras del $hdv
                                <p>{{ $hdv->campo_ejemplo }}</p>
                            </div> --}}
                        @endforeach
                    @else
                        <p >No se encontraron resultados para "{{ request('search') }}"</p>
                    @endif
                @endif
            </div>
            <table class="table  table-striped table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>ITEM</th>

                        <th>UBICACACION</th>
                        <th>EQUIPO</th>
                        <th>MARCA</th>
                        <th>MODELO</th>
                        <th>SERIE</th>
                        <th>FECHA CALIBRACION</th>
                        <th>FECHA DE VENCIMIENTO</th>
                        <th>ESTADO</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($hdvs as $hdv)
                        <tr>
                            <td style="font-size: 8px">
                                <h6>{{ $hdv->id }}</h6>
                            </td>

                            <td style="font-size: 8px">
                                <h6 style="white-space: nowrap ">{{ $hdv->ubifisica?->ubicacionfisica ?? '---' }}</h6>
                            </td>
                            <td style="font-size:8px">
                                <h6>{{ $hdv->equipo?->nombre_equipo ?? 'NO REGISTRA' }}</h6>
                            </td>
                            <td style="font-size: 8px">
                                <h6>{{ $hdv->marca?->nombre_marca ?? 'NO REGISTRA' }}</h6>
                            </td>
                            <td style="font-size: 8px">
                                <h6>{{ $hdv->modelo?->nombre_modelo ?? 'NO REGISTRA' }}</h6>
                            </td>

                            <td style="font-size: 8px; ">
                                <h6>{{ $hdv->serie ?? 'NO REGISTRA' }}</h6>
                            </td>
                            <td style="font-size: 8px; ">
                                <h6>{{ $hdv->fechaCali ?? 'NO REGISTRA' }}</h6>
                            </td>

                            <td style="font-size: 8px; ">
                                <h6>{{ $hdv->garantia ?? 'NO REGISTRA' }}</h6>
                            </td>


                            <!-- <td>{{ $hdv->enero }}</td>
                        <td>{{ $hdv->febrero }}</td>
                        <td>{{ $hdv->marzo }}</td>
                        <td>{{ $hdv->abril }}</td>
                        <td>{{ $hdv->mayo }}</td>
                        <td>{{ $hdv->junio }}</td>
                        <td>{{ $hdv->julio }}</td>
                        <td>{{ $hdv->agosto }}</td>
                        <td>{{ $hdv->septiembre }}</td>
                        <td>{{ $hdv->octubre }}</td>
                        <td>{{ $hdv->noviembre }}</td>
                        <td>{{ $hdv->diciembre }}</td> -->
                        </tr>
                    @endforeach
                </tbody>

            </table>
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
