<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista Hoja de Vida</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Estilos -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">

    <style>
        table {
            font-size: 13px;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            text-align: center;
            vertical-align: middle;
        }

        table.dataTable tbody td {
            text-align: center;
            vertical-align: middle;
        }

        .filtro-select {
            font-size: 12px;
            padding: 2px 4px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 4px;
        }

        td:empty::after {
            content: "---";
            color: #999;
        }

        .dt-buttons {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .dt-button {
            font-size: 12px !important;
            padding: 4px 10px !important;
        }
    </style>
</head>

<body>
    @extends('layouts.header')
    <br>
    <div >
        <br>
        

        <div class=" d-flex flex-column justify-content-center align-items-center text-center ">
            <h1 class="text-center mb-0">LISTA HOJA DE VIDA</h1>
            @if (Auth::check() && (Auth::user()->role === 'Admin' || Auth::user()->role === 'Empleado'))

                <form class="d-flex m-2" style="background-color: rgb(239, 239, 239); width: 100%" method="GET"
                    action="{{ route('hojadevida.listar') }}">
                    @csrf {{-- token o seguridad  --}}
                    <input class="form-control m-2" class="form-control" id="propiedad" style="width: 400px" type="text" name="search"
                        placeholder="Buscar..." value="{{ request('search') }}">
                    <button class="btn btn-primary m-2" type="submit"><i class="bi bi-search"></i></button>
                    <a href="{{ route('hojadevida.listar') }}" class="bi bi-arrow-repeat btn btn-primary m-2"></a>
                    <a href="{{ url('hojadevida/create') }}" class="btn btn-primary m-2">Registrar nueva Hoja de Vida</a>

                    
                </form>
            @endif
        </div>

        <table id="tablaEquipos" class="table table-striped table-bordered w-100">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Equipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Propiedad</th>
                    <th>Serie</th>
                    <th>Servicio</th>
                    <th>Activo Fijo</th>
                    <th>Ubicación Física</th>
                    <th>Acciones</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><select class="form-select form-select-sm filtro-select">
                            <option value="">Todas</option>
                        </select></th>
                    <th><select class="form-select form-select-sm filtro-select">
                            <option value="">Todas</option>
                        </select></th>
                    <th><select class="form-select form-select-sm filtro-select">
                            <option value="">Todas</option>
                        </select></th>
                    <th><select class="form-select form-select-sm filtro-select">
                            <option value="">Todas</option>
                        </select></th>
                    <th></th>
                    <th><select class="form-select form-select-sm filtro-select">
                            <option value="">Todas</option>
                        </select></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hdvs as $hdv)
                    <tr>
                        <td>{{ $hdv->id }}</td>
                        <td>
                            @if (!empty($hdv->foto) && Storage::exists('public/' . $hdv->foto))
                                <img src="{{ asset('storage/' . $hdv->foto) }}" width="50" height="50"
                                    class="rounded" data-bs-toggle="modal"
                                    data-bs-target="#imagenModal{{ $hdv->id }}" style="cursor: pointer;">
                                <div class="modal fade" id="imagenModal{{ $hdv->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $hdv->foto) }}" class="img-fluid"
                                                    style="max-height: 90vh;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>{{ $hdv->equipo?->nombre_equipo ?? '---' }}</td>
                        <td>{{ $hdv->marca?->nombre_marca ?? '---' }}</td>
                        <td>{{ $hdv->modelo?->nombre_modelo ?? '---' }}</td>
                        <td>{{ $hdv->propiedad?->nombreempresa ?? '---' }}</td>
                        <td>{{ $hdv->serie }}</td>
                        <td>{{ $hdv->servicio?->nombreservicio ?? '---' }}</td>
                        <td>{{ $hdv->actFijo ?? '---' }}</td>
                        <td>{{ $hdv->ubifisica?->ubicacionfisica ?? '---' }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ url('hojadevida/' . $hdv->id . '/show') }}"
                                    class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                <a href="{{ url('descargar-pdf/' . $hdv->id) }}" class="btn btn-sm btn-warning"
                                    target="_blank"><i class="bi bi-download"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Contenedor para exportar -->
        <div id="exportButtons" class="dt-buttons"></div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            const table = $('#tablaEquipos').DataTable({
                dom: 'lrtip', // sin botones arriba
                orderCellsTop: true,
                fixedHeader: true,
                language: {
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ registros",
                    zeroRecords: "No se encontraron resultados",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    paginate: {
                        first: "Primero",
                        last: "Último",
                        next: "Siguiente",
                        previous: "Anterior"
                    }
                },
                buttons: [{
                        extend: 'excelHtml5',
                        text: 'Exportar a Excel',
                        className: 'btn btn-primary btn-sm'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Exportar a PDF',
                        className: 'btn btn-primary btn-sm',
                        orientation: 'landscape',
                        pageSize: 'A4'
                    }
                ]
            });

            // Colocar botones en contenedor inferior
            table.buttons().container().appendTo('#exportButtons');

            // Filtros por columna
            table.columns().every(function() {
                const column = this;
                const index = column.index();
                const headerCell = $('#tablaEquipos thead tr:eq(1) th').eq(index);
                const select = $('select', headerCell);

                if (select.length > 0) {
                    const uniqueValues = new Set();
                    column.data().each(function(d) {
                        const text = $('<div>').html(d).text().trim();
                        if (text !== '') uniqueValues.add(text);
                    });

                    Array.from(uniqueValues).sort().forEach(function(val) {
                        select.append(`<option value="${val}">${val}</option>`);
                    });

                    select.on('change', function() {
                        const val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });
                }
            });
        });
    </script>
</body>

</html>
