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
            font-size: smaller;
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
            <h1>CRONOGRAMA DE MANTENIMIENTO PRUEBA</h1>
            <form class="d-flex m-2" style="background-color: rgb(239, 239, 239); width: 100%" method="GET"
                action="{{ route('mantocrono.propiedad') }}">

                @csrf {{-- token o seguridad  --}}
                {{-- <input type="text" id="equipo" name="nombre_equipo" class="news-input" list="equipos-list"   value="{{ old('nombre') }}" required> --}}
                <input class="form-control m-2" class="form-control" id="propiedad" style="width: 400px" type="text"
                    name="search" placeholder="Buscar..." value="{{ request('search') }}" list="propiedad-list"
                    value="{{ old('propiedad') }}" required>
                <datalist style="font-size: 10%" id="propiedad-list">
                    @foreach ($propiedads as $prop)
                        <option value="{{ $prop->nombreempresa }}" data-id="{{ $prop->id }} "></option>
                    @endforeach
                </datalist>

                <button class="btn btn-primary m-2" type="submit"><i class="bi bi-search"></i></button> <a
                    href="{{ route('mantocrono.propiedad') }}"class="bi bi-arrow-repeat btn btn-primary m-2"></a>

                {{-- <a href="{{ url('hojadevida/create') }}" class="btn btn-primary m-2">
                Registrar Nueva hoja de vida
            </a> --}}
            </form>
        </div>
        <div>
            <div class="row p-0 m-0">
                <div class="w-25  bg-primary border border-light ">
                    <img src="{{ asset('IMG/logotipohancho.png') }}" height="100px" alt="">
                </div>
                <div class="w-25 p-3 bg-primary border fs-4 border-light text-center text-white">CRONOGRAMA DE
                    MANTENIMIENTO
                    <div class="w-25 p-3 bg-primary" >
                        <h5> version:</h5>
                        <h5> codigo:</h5>
                        <h5> proceso:</h5>
                    </div>
                </div>
                 <div class="w-25  bg-primary border border-light ">
                    <img src="{{ asset('IMG/logotipohancho.png') }}" height="100px" alt="">
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
                        <p>No se encontraron resultados para "{{ request('search') }}"</p>
                    @endif
                @endif
            </div>
           {{--  --}}
           {{-- TABLA CRONOGRAMA (pegar aquí) --}}
                    <div class="table-wrap" style="overflow-x:auto; margin-top:.5rem;">
                        <table class="table table-striped table-hover crono" role="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>ITEM</th>
                                    <th>UBICACACION</th>
                                    <th>EQUIPO</th>
                                    <th>MARCA</th>
                                    <th>MODELO</th>
                                    <th>SERIE</th>
                                    <th class="month-header" data-month="enero">ENERO</th>
                                    <th class="month-header" data-month="febrero">FEBRERO</th>
                                    <th class="month-header" data-month="marzo">MARZO</th>
                                    <th class="month-header" data-month="abril">ABRIL</th>
                                    <th class="month-header" data-month="mayo">MAYO</th>
                                    <th class="month-header" data-month="junio">JUNIO</th>
                                    <th class="month-header" data-month="julio">JULIO</th>
                                    <th class="month-header" data-month="agosto">AGOSTO</th>
                                    <th class="month-header" data-month="septiembre">SEPTIEMBRE</th>
                                    <th class="month-header" data-month="octubre">OCTUBRE</th>
                                    <th class="month-header" data-month="noviembre">NOVIEMBRE</th>
                                    <th class="month-header" data-month="diciembre">DICIEMBRE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $meses = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
                                @endphp

                                @foreach ($hdvs as $index => $hdv)
                                    <tr data-id="{{ $hdv->id }}" data-row-index="{{ $index }}">
                                        <td style="font-size: 8px"><h6 style="margin:0;">{{ $hdv->id }}</h6></td>
                                        <td style="font-size: 8px"><h6 style="margin:0; white-space:nowrap">{{ $hdv->ubifisica?->ubicacionfisica ?? '---' }}</h6></td>
                                        <td style="font-size:8px"><h6 style="margin:0;">{{ $hdv->equipo?->nombre_equipo ?? 'NO REGISTRA' }}</h6></td>
                                        <td style="font-size: 8px"><h6 style="margin:0;">{{ $hdv->marca?->nombre_marca ?? 'NO REGISTRA' }}</h6></td>
                                        <td style="font-size: 8px"><h6 style="margin:0;">{{ $hdv->modelo?->nombre_modelo ?? 'NO REGISTRA' }}</h6></td>
                                        <td style="font-size: 8px"><h6 style="margin:0;">{{ $hdv->serie ?? 'NO REGISTRA' }}</h6></td>

                                        @foreach($meses as $mes)
                                            @php $valor = $hdv->$mes; @endphp
                                            <td class="month-cell" data-month="{{ $mes }}" data-value="{{ $valor ?? '' }}"
                                                style="font-size:8px; border: 1px solid rgb(205,205,205); text-align:center;">
                                                @if($valor === 'X')
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

                    {{-- contenedor para toasts simples --}}
                    <div id="toast-container" aria-live="polite" aria-atomic="true" style="position:fixed; top:1rem; right:1rem; z-index:3000;"></div>

                    {{-- estilos y script locales (no tocan layout global) --}}
                    <style>
                        .mark { display:inline-block; padding:.18rem .4rem; border-radius:3px; background:#ffeb3b; color:#000; font-weight:700; }
                        .month-header { cursor:pointer; user-select:none; }
                        .month-cell { cursor:pointer; }
                        .toast-custom { background: rgba(0,0,0,0.85); color:#fff; padding:.5rem .9rem; border-radius:6px; margin-bottom:.4rem; box-shadow:0 6px 18px rgba(0,0,0,0.15); }
                    </style>

                    <script>
                    (function () {
                        // Referencia a la tabla
                        const table = document.querySelector('table.crono');
                        if (!table) return;
                        const getRows = () => Array.from(table.querySelectorAll('tbody tr'));

                        // Función para actualizar visualmente una celda
                        function setCellMarked(cell, marked) {
                            if (!cell) return;
                            cell.dataset.value = marked ? 'X' : '';
                            if (marked) {
                                cell.innerHTML = '<span class="mark">✓</span>';
                            } else {
                                cell.innerHTML = '<span style="display:inline-block; min-width:18px;">&nbsp;</span>';
                            }
                        }

                        // Toast sencillo
                        function showToast(msg, ms = 2500) {
                            const c = document.getElementById('toast-container');
                            const el = document.createElement('div');
                            el.className = 'toast-custom';
                            el.textContent = msg;
                            c.appendChild(el);
                            setTimeout(()=> { el.remove(); }, ms);
                        }

                        // Enviar cambios por POST a la ruta bulk_mark
                        async function persistBulk(month, ids, value) {
                            const url = "{{ route('mantocrono.bulk_mark') }}";
                            const tokenEl = document.querySelector('meta[name="csrf-token"]');
                            const token = tokenEl ? tokenEl.getAttribute('content') : '';

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

                        // Click en celda: marcar/desmarcar desde esa fila hacia abajo
                        table.addEventListener('click', function (ev) {
                            const cell = ev.target.closest('.month-cell');
                            if (!cell) return;
                            const row = cell.closest('tr');
                            const startIndex = parseInt(row.dataset.rowIndex, 10) || 0;
                            const month = cell.dataset.month;
                            const currentlyMarked = cell.dataset.value === 'X';
                            const newValue = currentlyMarked ? '' : 'X';

                            const rows = getRows().slice(startIndex);
                            const ids = [];
                            rows.forEach(r => {
                                const c = r.querySelector(`.month-cell[data-month="${month}"]`);
                                if (c) setCellMarked(c, newValue === 'X');
                                ids.push(r.dataset.id);
                            });

                            persistBulk(month, ids, newValue)
                                .then(resp => {
                                    if (!resp.ok) {
                                        // revertir
                                        rows.forEach(r => {
                                            const c = r.querySelector(`.month-cell[data-month="${month}"]`);
                                            if (c) setCellMarked(c, currentlyMarked);
                                        });
                                        showToast('Error al guardar. Intenta de nuevo.');
                                    } else {
                                        showToast(`Actualizados ${ids.length} registros.`);
                                    }
                                })
                                .catch(() => {
                                    rows.forEach(r => {
                                        const c = r.querySelector(`.month-cell[data-month="${month}"]`);
                                        if (c) setCellMarked(c, currentlyMarked);
                                    });
                                    showToast('Error de conexión. Cambios no guardados.');
                                });
                        });

                        // Click en encabezado: marcar/desmarcar toda la columna
                        table.querySelectorAll('.month-header').forEach(h => {
                            h.addEventListener('click', function () {
                                const month = this.dataset.month;
                                const rows = getRows();
                                if (!rows.length) return;

                                const firstCell = rows[0].querySelector(`.month-cell[data-month="${month}"]`);
                                const currentlyMarked = firstCell && firstCell.dataset.value === 'X';
                                const newValue = currentlyMarked ? '' : 'X';
                                const ids = rows.map(r => r.dataset.id);

                                rows.forEach(r => {
                                    const c = r.querySelector(`.month-cell[data-month="${month}"]`);
                                    if (c) setCellMarked(c, newValue === 'X');
                                });

                                persistBulk(month, ids, newValue)
                                    .then(resp => {
                                        if (!resp.ok) {
                                            // revertir
                                            rows.forEach(r => {
                                                const c = r.querySelector(`.month-cell[data-month="${month}"]`);
                                                if (c) setCellMarked(c, currentlyMarked);
                                            });
                                            showToast('Error al guardar cambios masivos.');
                                        } else {
                                            showToast(`Actualizados ${ids.length} registros.`);
                                        }
                                    })
                                    .catch(() => {
                                        rows.forEach(r => {
                                            const c = r.querySelector(`.month-cell[data-month="${month}"]`);
                                            if (c) setCellMarked(c, currentlyMarked);
                                        });
                                        showToast('Error de conexión. Cambios no guardados.');
                                    });
                            });
                        });

                    })();
                    </script>
                    {{-- FIN TABLA CRONOGRAMA --}}

                            <!-- BOTONES DESCARGA PDF (carta portrait / landscape) -->
        <div class="d-flex justify-content-end gap-2 mt-3">
        {{-- <a href="{{ route('mantocrono.pdf_letter', request()->only('search')) }}"
            class="btn btn-outline-primary" target="_blank">
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar PDF (Carta - Vertical)
        </a> --}}

        <a href="{{ route('mantocrono.pdf_letter_landscape', request()->only('search')) }}"
            class="btn btn-outline-secondary" target="_blank">
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar PDF (Carta - Horizontal)
        </a>
        </div>


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
