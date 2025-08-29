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
    .filtro-select { font-size: 12px; padding: 2px 4px; }
    .btn-group { display: flex; justify-content: center; gap: 4px; }
    td:empty::after { content: "---"; color: #999; }
  </style>
</head>

<body>
  @extends('layouts.header')
  <br>

  <div class="d-flex flex-column justify-content-center align-items-center text-center">
    <h1 class="text-center mb-0">LISTA HOJA DE VIDA</h1>

    @if (Auth::check() && (Auth::user()->role === 'Admin' || Auth::user()->role === 'Empleado'))
    <form class="d-flex m-2" style="background-color: rgb(239, 239, 239); width: 100%" method="GET" action="{{ route('hojadevida.listar') }}">
      @csrf
      <input class="form-control m-2" style="width: 400px" type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}">
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
      <!-- Fila de filtros: SOLO Equipo (2), Servicio (7), Ubicación (9) -->
      <tr>
        <th></th>
        <th></th>
        <th>
          <select id="filter-equipo" class="form-select form-select-sm filtro-select">
            <option value="">Todas</option>
          </select>
        </th>
        <th>
            <select id="filter-marca" class="form-select form-select-sm filtro-select">
            <option value="">Todas</option>
          </select></th>
        <th>
            <select id="filter-modelo" class="form-select form-select-sm filtro-select">
            <option value="">Todas</option>
          </select>
        </th>
        <th>
            <select id="filter-propiedad" class="form-select form-select-sm filtro-select">
            <option value="">Todas</option>
          </select>
        </th>
        <th>
            <select id="filter-serie" class="form-select form-select-sm filtro-select">
            <option value="">Todas</option>
          </select>
        </th>
        <th>
          <select id="filter-servicio" class="form-select form-select-sm filtro-select">
            <option value="">Todas</option>
          </select>
        </th>
        <th>
            <select id="filter-actfijo" class="form-select form-select-sm filtro-select">
            <option value="">Todas</option>
          </select></th>
        <th>
          <select id="filter-ubicacion" class="form-select form-select-sm filtro-select">
            <option value="">Todas</option>
          </select>
        </th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      @foreach ($hdvs as $hdv)
      <tr>
        <td>{{ $hdv->id }}</td>
        <td>
          @if (!empty($hdv->foto) && Storage::exists('public/' . $hdv->foto))
            <img src="{{ asset('storage/' . $hdv->foto) }}" width="50" height="50" class="rounded"
                 data-bs-toggle="modal" data-bs-target="#imagenModal{{ $hdv->id }}" style="cursor: pointer;">
            <div class="modal fade" id="imagenModal{{ $hdv->id }}" tabindex="-1">
              <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="{{ asset('storage/' . $hdv->foto) }}" class="img-fluid" style="max-height: 90vh;">
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
            <a href="{{ url('hojadevida/' . $hdv->id . '/show') }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
            <a href="{{ url('descargar-pdf/' . $hdv->id) }}" class="btn btn-sm btn-warning" target="_blank"><i class="bi bi-download"></i></a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Toolbar: Excel IPS + PDF IPS + limpiar -->
  <div class="d-flex justify-content-center flex-wrap gap-2 mt-3 align-items-center">
    <button id="btnExcelIPS" class="btn btn-primary btn-sm">Excel (formato IPS)</button>
    <button id="btnPdfIPS" class="btn btn-primary btn-sm">PDF (formato IPS)</button>
    <button id="btnClearFilters" class="btn btn-outline-secondary btn-sm py-0 px-1 fs-6">Limpiar filtros</button>
  </div>

  <!-- JS base -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- DataTables core -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <!-- pdfmake (PDF IPS) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>

  <!-- ExcelJS + FileSaver (Excel con encabezado IPS) -->
  <script src="https://cdn.jsdelivr.net/npm/exceljs@4.4.0/dist/exceljs.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

  <script>
  // ===== Configura rutas de logos =====
  const LOGO_IPS_URL    = "{{ asset('img/logo_ips.png') }}";
  const LOGO_BIOVIC_URL = "{{ asset('img/biovic_logo.png') }}";

  // Utilidades
  async function toDataURL(url) {
    try {
      const res = await fetch(url, { cache: 'no-store' });
      if (!res.ok) throw new Error('HTTP ' + res.status);
      const blob = await res.blob();
      return await new Promise(resolve => {
        const rd = new FileReader();
        rd.onloadend = () => resolve(rd.result);
        rd.readAsDataURL(blob);
      });
    } catch (e) {
      console.warn('No se pudo convertir a base64:', url, e);
      return null;
    }
  }
  function cellText(html) { return $('<div>').html(html).text().trim(); }

  // -------- Excel (formato IPS) --------
  async function exportExcelIPS(dt) {
    const wb = new ExcelJS.Workbook();
    const ws = wb.addWorksheet('Inventario', {
      pageSetup: {
        orientation: 'landscape',
        fitToPage: true, fitToWidth: 1, fitToHeight: 1,
        margins: { left:0.3, right:0.3, top:0.3, bottom:0.3, header:0.1, footer:0.1 }
      }
    });

    const colWidths = [9, 24, 16, 16, 20, 14, 18, 14, 20]; // ID + 8 columnas
    ws.columns = colWidths.map(w => ({ width: w }));

    const BLUE = '0070C0', WHITE='FFFFFF';

    // Header filas 1..3
    ws.mergeCells('A1:C3'); ws.mergeCells('D1:F1'); ws.mergeCells('D2:F2'); ws.mergeCells('D3:F3'); ws.mergeCells('G1:I3');
    for (let r=1;r<=3;r++){ for (let c=1;c<=9;c++){
      const cell = ws.getCell(r,c);
      cell.fill = { type:'pattern', pattern:'solid', fgColor:{argb:BLUE} };
      cell.border = { top:{style:'thin'}, left:{style:'thin'}, bottom:{style:'thin'}, right:{style:'thin'} };
    }}

    ws.getCell('D1').value = 'INVENTARIO FÍSICO';
    ws.getCell('D1').font = { bold:true, size:16, color:{argb:WHITE} };
    ws.getCell('D1').alignment = { horizontal:'center', vertical:'middle' };
    ws.getCell('D2').value = 'VERSIÓN: 01       CÓDIGO: DM-FIF-045';
    ws.getCell('D2').font = { bold:true, size:11, color:{argb:WHITE} };
    ws.getCell('D2').alignment = { horizontal:'center', vertical:'middle' };
    ws.getCell('D3').value = 'PROCESO: MANTENIMIENTO';
    ws.getCell('D3').font = { bold:true, size:12, color:{argb:WHITE} };
    ws.getCell('D3').alignment = { horizontal:'center', vertical:'middle' };

    try {
      const [logoIPS64, logoBIO64] = await Promise.all([toDataURL(LOGO_IPS_URL), toDataURL(LOGO_BIOVIC_URL)]);
      if (logoIPS64) {
        const imgIPS = wb.addImage({ base64: logoIPS64, extension: (logoIPS64.match(/^data:image\/(\w+);/i)||[])[1] || 'png' });
        ws.addImage(imgIPS, 'A1:C3');
      }
      if (logoBIO64) {
        const imgBIO = wb.addImage({ base64: logoBIO64, extension: (logoBIO64.match(/^data:image\/(\w+);/i)||[])[1] || 'png' });
        ws.addImage(imgBIO, 'G1:I3');
      }
    } catch(e) { console.warn('Logos Excel:', e); }

    // Cabeceras fila 4
    const headers = ['ITEM','EQUIPO','MARCA','MODELO','PROPIEDAD','SERIE','SERVICIO','ACTIVO FIJO','UBICACIÓN FÍSICA'];
    ws.getRow(4).values = headers; ws.getRow(4).font = { bold:true };
    for (let c=1;c<=headers.length;c++){
      const cell = ws.getRow(4).getCell(c);
      cell.fill = { type:'pattern', pattern:'solid', fgColor:{argb:'D9E2F3'} };
      cell.border = { top:{style:'thin'}, left:{style:'thin'}, bottom:{style:'thin'}, right:{style:'thin'} };
      cell.alignment = { horizontal:'center', vertical:'middle', wrapText:true };
    }

    // Datos (según filtros)
    const rows = dt.rows({ search:'applied' }).data().toArray();
    let r = 5;
    rows.forEach(row => {
      const arr = [
        cellText(row[0]),
        cellText(row[2]), cellText(row[3]), cellText(row[4]), cellText(row[5]),
        cellText(row[6]), cellText(row[7]), cellText(row[8]), cellText(row[9])
      ];
      ws.getRow(r).values = arr;
      for (let c=1;c<=arr.length;c++){
        const cell = ws.getRow(r).getCell(c);
        cell.border = { top:{style:'thin'}, left:{style:'thin'}, bottom:{style:'thin'}, right:{style:'thin'} };
        cell.alignment = { vertical:'middle', wrapText:true };
      }
      r++;
    });

    const buf = await wb.xlsx.writeBuffer();
    saveAs(new Blob([buf], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' }), 'Inventario_Fisico.xlsx');
  }

  // -------- PDF (formato IPS) --------
  async function exportPdfIPS(dt) {
    try {
      if (typeof pdfMake === 'undefined' || !pdfMake || !pdfMake.createPdf) {
        alert('No se pudo generar el PDF (pdfMake no cargó).');
        return;
      }

      const [logoIPS64, logoBIO64] = await Promise.all([toDataURL(LOGO_IPS_URL), toDataURL(LOGO_BIOVIC_URL)]);

      const blue = '#0070C0';
      const leftCell  = { border:[true,true,true,true], rowSpan:3, alignment:'center', fillColor: blue, margin:[0,8,0,8] };
      const midTop    = { text:'INVENTARIO FÍSICO', bold:true, fontSize:16, color:'#fff', alignment:'center', fillColor: blue, border:[true,true,true,true] };
      const midMid    = { columns:[ {text:'VERSIÓN: 01', color:'#fff', alignment:'left'}, {text:'CÓDIGO: DM-FIF-045', color:'#fff', alignment:'right'} ],
                           fillColor: blue, border:[true,false,true,false] };
      const midBot    = { text:'PROCESO: MANTENIMIENTO', color:'#fff', alignment:'center', fillColor: blue, border:[true,false,true,true] };
      const rightCell = { border:[true,true,true,true], rowSpan:3, alignment:'center', fillColor: blue, margin:[0,8,0,8] };

      if (logoIPS64)  { leftCell.image  = logoIPS64;  leftCell.fit  = [120,60]; } else { leftCell.text  = ' '; }
      if (logoBIO64)  { rightCell.image = logoBIO64; rightCell.fit = [140,60]; } else { rightCell.text = ' '; }

      const headerTable = {
        table: { widths: ['*','*','*'], body: [
          [ leftCell, midTop, rightCell ],
          [ '',       midMid, ''        ],
          [ '',       midBot, ''        ]
        ]},
        layout: { hLineWidth:()=>1, vLineWidth:()=>1, hLineColor:()=>'#000', vLineColor:()=>'#000' },
        margin: [0,0,0,8]
      };

      const headers = ['ITEM','EQUIPO','MARCA','MODELO','PROPIEDAD','SERIE','SERVICIO','ACTIVO FIJO','UBICACIÓN FÍSICA'];
      const rows = dt.rows({ search:'applied' }).data().toArray().map(row => ([
        {text: cellText(row[0]), alignment:'center'},
        cellText(row[2]), cellText(row[3]), cellText(row[4]), cellText(row[5]),
        cellText(row[6]), cellText(row[7]), cellText(row[8]), cellText(row[9])
      ]));

      const tableDef = {
        table: {
          headerRows: 1,
          widths: ['auto','*','auto','auto','*','auto','*','auto','*'],
          body: [ headers.map(h => ({ text:h, style:'tableHeader'})), ...rows ]
        },
        layout: {
          hLineWidth:()=>0.3, vLineWidth:()=>0.3,
          hLineColor:()=> '#BDBDBD', vLineColor:()=> '#BDBDBD',
          paddingLeft:()=>4, paddingRight:()=>4, paddingTop:()=>3, paddingBottom:()=>3
        }
      };

      const doc = {
        pageSize: 'A4',
        pageOrientation: 'landscape',
        pageMargins: [20,20,20,20],
        defaultStyle: { fontSize: 9 },
        styles: { tableHeader: { bold:true, fontSize:10, color:'#111', fillColor:'#F2F2F2', alignment:'center' } },
        content: [ headerTable, tableDef ]
      };

      pdfMake.createPdf(doc).download('Inventario_Fisico.pdf');
    } catch (err) {
      console.error('Error generando PDF IPS:', err);
      alert('No se pudo generar el PDF. Revisa la consola del navegador.');
    }
  }

  // ====== APP ======
  (function () {
    const table = $('#tablaEquipos').DataTable({
      dom: 'lrtip',
      orderCellsTop: true,
      fixedHeader: true,
      stateSave: true,
      autoWidth: false,
      language: {
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ registros",
        zeroRecords: "No se encontraron resultados",
        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
        paginate: { first: "Primero", last: "Último", next: "Siguiente", previous: "Anterior" }
      },
      columnDefs: [
        { targets: 0, visible: false, searchable: false }, // ocultar ID en vista
        { targets: 1, width: 70 },  { targets: 2, width: 200 }, { targets: 3, width: 140 },
        { targets: 4, width: 140 }, { targets: 5, width: 180 }, { targets: 6, width: 120 },
        { targets: 7, width: 160 }, { targets: 8, width: 140 }, { targets: 9, width: 200 },
        { targets: 10, width: 110 }
      ]
    });

    // ==== Filtros SOLO en columnas: Equipo(2), Servicio(7), Ubicación(9) ====
    const filterCols = [
      { idx: 2, sel: '#filter-equipo' },
      { idx: 3, sel: '#filter-marca' },
      { idx: 4, sel: '#filter-modelo' },
      { idx: 5, sel: '#filter-propiedad' },
      { idx: 6, sel: '#filter-serie' },
      { idx: 7, sel: '#filter-servicio' },
      { idx: 8, sel: '#filter-actfijo' },
      { idx: 9, sel: '#filter-ubicacion' }
    ];

    filterCols.forEach(({ idx, sel }) => {
      const column = table.column(idx);
      const $select = $(sel);
      const set = new Set();

      column.data().each(function (d) {
        const text = $('<div>').html(d).text().trim();
        if (text && text !== '---') set.add(text);
      });

      Array.from(set).sort().forEach(v => $select.append(`<option value="${v}">${v}</option>`));

      // Reaplicar estado guardado si existe
      const cur = column.search();
      if (cur) $select.val(cur.replace(/^\^|\$$/g, ''));

      // Cambio de filtro (coincidencia exacta)
      $select.on('change', function () {
        const val = $.fn.dataTable.util.escapeRegex($(this).val());
        column.search(val ? '^' + val + '$' : '', true, false).draw();
      });
    });

    // Limpiar filtros
    $('#btnClearFilters').on('click', function () {
      filterCols.forEach(({ idx, sel }) => {
        $(sel).val('');
        table.column(idx).search('');
      });
      table.draw();
      table.state.clear();
    });

    // Botones export
    $('#btnExcelIPS').on('click', async () => { await exportExcelIPS(table); });
    $('#btnPdfIPS').on('click',   async () => { await exportPdfIPS(table);   });
  })();
  </script>
</body>
</html>
