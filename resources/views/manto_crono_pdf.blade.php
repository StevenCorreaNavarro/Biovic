<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Cronograma / Inventario</title>
  <style>
    /* Page */
    @page { margin: 12mm; }
    body { font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #111; }

    /* HEADER layout via table para compatibilidad con DomPDF */
    .header-table { width: 100%; border-collapse: collapse; margin-bottom: 6px; }
    .header-table td { border: 2px solid #000; padding: 6px; background: #0077e6; vertical-align: middle; }
    .header-left, .header-right { width: 28%; text-align:center; background:#f5f7fb; } /* logos con fondo claro */
    .header-center { width: 44%; text-align:center; color:#fff; background:#0070C0; }

    .title-main { font-weight:700; font-size:18px; letter-spacing:1px; margin-bottom:6px; }
    .meta { font-size:11px; margin:2px 0; }
    .meta small { display:block; font-size:10px; opacity:0.95; }

    /* Table of data */
    table.data { width:100%; border-collapse: collapse; page-break-inside: auto; }
    table.data thead { display:table-header-group; }
    th, td { border:1px solid #999; padding:6px; font-size:10px; vertical-align: middle; }
    th { background:#333; color:#fff; font-weight:700; text-align:center; }
    .center { text-align:center; }
    .small { font-size:9px; color:#111; }

    /* footer small text */
    .foot { margin-top:8px; font-size:10px; color:#333; }
  </style>
</head>
<body>

@php
  // Helper para convertir imagen a base64 (si existe)
  function embed_image_base64($relativePath) {
      $full = public_path($relativePath);
      if (file_exists($full) && is_readable($full)) {
          $ext = pathinfo($full, PATHINFO_EXTENSION);
          $data = base64_encode(file_get_contents($full));
          return "data:image/{$ext};base64,{$data}";
      }
      return null;
  }

  $logoLeft = embed_image_base64('IMG/Logo_VitalTech.png') ?? embed_image_base64('IMG/logotipohancho.png');
  $logoRight = embed_image_base64('IMG/biovic_logo.png') ?? embed_image_base64('IMG/logotipo.png');
@endphp

<!-- Header: tabla 3 columnas -->
<table class="header-table" role="presentation">
  <tr>
    <td class="header-left">
      @if($logoLeft)
        <img src="{{ $logoLeft }}" style="max-width:100%; max-height:90px; display:block; margin:0 auto;" alt="logo-left">
      @else
        <div style="height:90px; display:flex; align-items:center; justify-content:center;"><strong>LOGO</strong></div>
      @endif
    </td>

    <td class="header-center">
      <div class="title-main">INVENTARIO FÍSICO</div>
      <div class="meta small">
        <small>VERSIÓN: 01</small>
        <small>CÓDIGO: DM-FIF-045</small>
        <small>PROCESO: MANTENIMIENTO</small>
      </div>
    </td>

    <td class="header-right">
      @if($logoRight)
        <img src="{{ $logoRight }}" style="max-width:100%; max-height:90px; display:block; margin:0 auto;" alt="logo-right">
      @else
        <div style="height:90px; display:flex; align-items:center; justify-content:center;"><strong>LOGO</strong></div>
      @endif
    </td>
  </tr>
</table>

<!-- Tabla de datos -->
<table class="data">
  <thead>
    <tr>
      <th class="center">ITEM</th>
      <th>UBICACIÓN</th>
      <th>EQUIPO</th>
      <th>MARCA</th>
      <th>MODELO</th>
      <th>SERIE</th>
      <th class="center">ENERO</th>
      <th class="center">FEBRERO</th>
      <th class="center">MARZO</th>
      <th class="center">ABRIL</th>
      <th class="center">MAYO</th>
      <th class="center">JUNIO</th>
      <th class="center">JULIO</th>
      <th class="center">AGOSTO</th>
      <th class="center">SEP</th>
      <th class="center">OCT</th>
      <th class="center">NOV</th>
      <th class="center">DIC</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hdvs as $hdv)
      <tr>
        <td class="center small">{{ $hdv->id }}</td>
        <td class="small">{{ $hdv->ubifisica?->ubicacionfisica ?? '---' }}</td>
        <td class="small">{{ $hdv->equipo?->nombre_equipo ?? 'NO REGISTRA' }}</td>
        <td class="small">{{ $hdv->marca?->nombre_marca ?? '---' }}</td>
        <td class="small">{{ $hdv->modelo?->nombre_modelo ?? '---' }}</td>
        <td class="small">{{ $hdv->serie ?? '---' }}</td>

        <td class="center">@if($hdv->enero === 'X') X @endif</td>
        <td class="center">@if($hdv->febrero === 'X') X @endif</td>
        <td class="center">@if($hdv->marzo === 'X') X @endif</td>
        <td class="center">@if($hdv->abril === 'X') X @endif</td>
        <td class="center">@if($hdv->mayo === 'X') X @endif</td>
        <td class="center">@if($hdv->junio === 'X') X @endif</td>
        <td class="center">@if($hdv->julio === 'X') X @endif</td>
        <td class="center">@if($hdv->agosto === 'X') X @endif</td>
        <td class="center">@if($hdv->septiembre === 'X') X @endif</td>
        <td class="center">@if($hdv->octubre === 'X') X @endif</td>
        <td class="center">@if($hdv->noviembre === 'X') X @endif</td>
        <td class="center">@if($hdv->diciembre === 'X') X @endif</td>
      </tr>
    @endforeach
  </tbody>
</table>

<div class="foot">
  Total registros: {{ $hdvs->count() }}
</div>

</body>
</html>
