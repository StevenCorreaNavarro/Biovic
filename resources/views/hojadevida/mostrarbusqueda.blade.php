<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Lista Hoja de Vida</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- DataTables + Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">

  <style>
    table { font-size: 13px; }
    table.dataTable thead th, table.dataTable thead td { text-align: center; vertical-align: middle; }
    table.dataTable tbody td { text-align: center; vertical-align: middle; }
    .btn-group { display: flex; justify-content: center; gap: 4px; }
    td:empty::after { content: "---"; color: #999; }

    /* Modal tamaño y comportamiento */
    .modal-dialog.custom-xl { max-width: 1400px; width: 98%; }
    .modal-content { max-height: 94vh; display:flex; flex-direction:column; }
    .modal-body.pdf-modal-body { padding: 0.25rem; overflow:hidden; flex:1 1 auto; }
    /* iframe ocupa todo el body del modal */
    #hdvPdfFrame { width:100%; height: calc(94vh - 130px); border:0; display:block; }

    @media (max-width: 992px) {
      .modal-dialog.custom-xl { width: 100%; margin: 0.25rem; max-width: 100%; }
      .modal-content { height: 98vh; border-radius: 0.25rem; }
      #hdvPdfFrame { height: calc(98vh - 140px); }
    }

    /* Evitar paginación / info en tabla si aparece */
    .dataTables_paginate, .dataTables_info, .dataTables_length { display: none !important; }
  </style>
</head>

<body>
  @extends('layouts.header')

  <!-- Barra superior con botón Regresar a búsqueda -->
  <div class="container mt-2">
    <a href="{{ url()->previous() ?? route('hoja_ver') }}"
       class="btn btn-outline-secondary btn-sm">
      <i class="bi bi-arrow-left"></i> Volver a buscar
    </a>
  </div>

  <br>

    <div class="table-responsive">
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
        </thead>

        <tbody>
          @foreach ($hdvs as $hdv)
          <tr>
            <td>{{ $hdv->id }}</td>
            <td>
              @if (!empty($hdv->foto) && Storage::exists('public/' . $hdv->foto))
                <img src="{{ asset('storage/' . $hdv->foto) }}" width="50" height="50" class="rounded" style="object-fit:cover;">
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
                <button type="button"
                        class="btn btn-sm btn-primary btn-view-hdv"
                        data-id="{{ $hdv->id }}"
                        title="Ver hoja de vida">
                  <i class="bi bi-eye"></i> Ver
                </button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Botón "Volver a Ver Hoja de Vida" -->
    <div class="container mt-2" center>
    <a href="{{ route('hoja_ver') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Volver a Ver Hoja de Vida
    </a>
    </div>


  <!-- Modal que mostrará el PDF en un iframe -->
  <div class="modal fade" id="hdvModal" tabindex="-1" aria-labelledby="hdvModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-xl modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hdvModalLabel">Hoja de Vida — Vista PDF</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body pdf-modal-body d-flex align-items-stretch justify-content-stretch">
          <div id="hdvModalContent" class="w-100">
            <!-- Spinner inicial -->
            <div id="hdvLoading" class="text-center py-4">
              <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div>
              <div class="mt-2">Cargando PDF...</div>
            </div>

            <!-- Aquí se insertará el iframe con el PDF -->
            <iframe id="hdvPdfFrame" style="display:none;"></iframe>
          </div>
        </div>

        <div class="modal-footer">
          <a id="hdvModalDownload" href="#" class="btn btn-warning disabled" download>
            <i class="bi bi-download"></i> Descargar PDF
          </a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- JS base -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

  <script>
    // Rutas (Blade)
    const PDF_ROUTE_BASE = "{{ url('descargar-pdf') }}"; // /descargar-pdf/{id}

    (function () {
      // Inicializar DataTable sin paginación ni info
      $('#tablaEquipos').DataTable({
        dom: 'rt',
        paging: false,
        info: false,
        ordering: true,
        autoWidth: false,
        columnDefs: [{ targets: 0, visible: false }]
      });

      let currentPdfUrl = null;   // objectURL del PDF mostrado (para revocar luego)
      let currentPdfBlob = null;  // blob para descargar

      // Click en Ver -> solicita el PDF y lo muestra en iframe
      $(document).on('click', '.btn-view-hdv', async function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        if (!id) return alert('ID no encontrado');

        // Preparar modal UI: mostrar spinner, ocultar iframe, deshabilitar download
        $('#hdvLoading').show();
        $('#hdvPdfFrame').hide().attr('src', '');
        $('#hdvModalDownload').addClass('disabled').removeAttr('download').attr('aria-disabled', 'true').attr('href', '#');

        const modal = new bootstrap.Modal(document.getElementById('hdvModal'));
        modal.show();

        try {
          // fetch al endpoint que ya tienes: downloadPDF($id) — responde application/pdf
          const url = PDF_ROUTE_BASE + '/' + id;
          const res = await fetch(url, { method: 'GET', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
          if (!res.ok) throw new Error('HTTP ' + res.status);

          const blob = await res.blob();
          currentPdfBlob = blob;

          // Revocar url anterior si existe
          if (currentPdfUrl) {
            URL.revokeObjectURL(currentPdfUrl);
            currentPdfUrl = null;
          }

          // Crear object URL y asignar al iframe
          const objectUrl = URL.createObjectURL(blob);
          currentPdfUrl = objectUrl;
          $('#hdvPdfFrame').attr('src', objectUrl).show();

          // Habilitar descarga con el mismo blob (descargará como archivo.pdf)
          $('#hdvModalDownload').removeClass('disabled').removeAttr('aria-disabled')
            .attr('href', objectUrl)
            .attr('download', 'HojaDeVida_' + id + '.pdf');

          // ocultar spinner
          $('#hdvLoading').hide();
        } catch (err) {
          console.error('Error cargando PDF:', err);
          $('#hdvLoading').hide();
          $('#hdvModalContent').prepend('<div class="alert alert-danger m-2">No se pudo cargar el PDF. Revisa la consola.</div>');
        }
      });

      // Al cerrar modal revocamos objectURL y limpiamos UI
      $('#hdvModal').on('hidden.bs.modal', function () {
        if (currentPdfUrl) {
          URL.revokeObjectURL(currentPdfUrl);
          currentPdfUrl = null;
        }
        currentPdfBlob = null;
        $('#hdvPdfFrame').hide().attr('src', '');
        $('#hdvLoading').show();
        $('#hdvModalDownload').addClass('disabled').removeAttr('download').attr('href', '#').attr('aria-disabled','true');
        // eliminar alertas de error si hay
        $('#hdvModalContent .alert').remove();
      });

    })();
  </script>
</body>
</html>
