{{-- resources/views/manto_crono_pdf.blade.php --}}
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Cronograma de Mantenimiento - PDF</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* --- Página y tipografías --- */
    @page { size: letter landscape; margin: 10mm; }
    body { font-family: Arial, Helvetica, sans-serif; font-size: 10px; color:#111; margin:0; }

    /* --- Header layout: tabla 3 columnas (logo - centro - logo) --- */
    .header-table { width:100%; border-collapse:collapse; margin-bottom:8px; }
    .header-table td { border:2px solid #000; padding:8px; vertical-align:middle; background:#0077e6; }
    .header-left, .header-right { width:28%; text-align:center; background:#f5f7fb; }
    .header-center { width:44%; text-align:center; color:#fff; background:#0070C0; }

    .logo-img { max-width:100%; max-height:92px; display:block; margin:0 auto; }
    .title-main { font-weight:700; font-size:18px; letter-spacing:1px; color:#fff; margin-bottom:6px; }
    .meta { font-size:10px; color:#fff; }
    .meta small { display:block; font-size:9px; }

    /* --- Tabla de datos --- */
    .table-wrap { width:100%; overflow:hidden; }

    /* IMPORTANT:
       Para que las columnas N° y meses se ajusten al contenido hacemos table-layout: auto;
       Las columnas "anchas" (servicio, equipo, etc.) mantienen min-widths calculadas por PHP.
    */
    table.data { width:100%; border-collapse:collapse; table-layout: auto; page-break-inside:auto; }
    table.data thead { display:table-header-group; }

    /* --- Estilos base para celdas --- */
    th, td {
      border:1px solid #999;
      padding: 8px 6px;
      font-size:10px;
      vertical-align: middle;
      word-break: break-word;
      white-space: normal;
    }
    th { background:#333; color:#fff; font-weight:700; text-align:center; line-height:1.1; }

    /* Clases para columnas (valores por defecto en CSS, pero muchas se fijan inline en colgroup) */
    col.col-num    { /* N° - ahora auto */ }
    col.col-serv   { /* Servicio */ }
    col.col-equip  { /* Equipo */ }
    col.col-marca  { /* Marca */ }
    col.col-modelo { /* Modelo */ }
    col.col-serie  { /* Serie */ }
    col.col-actfij { /* Act. fijo */ }

    /* Meses: no forzamos un ancho fijo: serán auto (se ajustan al contenido).
       Si quieres forzarlos a un ancho exacto vuelve a usar width: 28px. */
    col.col-month  { /* auto */ }

    /* --- Estilos específicos para los encabezados de meses (más pequeños) --- */
    th.month-th {
      font-size:8px;          /* <--- Cambia aquí el tamaño de letra de los meses si quieres más pequeño */
      padding:4px 2px;        /* <--- Cambia aquí el padding de los encabezados de meses si quieres ahorrar espacio */
      white-space:nowrap;     /* evita salto dentro del nombre del mes */
      letter-spacing:0.4px;
      text-transform:uppercase;
    }

    /* Forzar que las celdas de meses no rompan la palabra y ocupen el ancho mínimo del texto */
    td.month-td { white-space:nowrap; text-align:center; font-size:10px; padding:6px 4px; }

    /* N° estilo compacto */
    th.num-th, td.num-td { white-space:nowrap; text-align:center; padding:6px 6px; font-size:9px; }

    .mark { display:inline-block; padding:4px 6px; border-radius:4px; background:#ffeb3b; color:#000; font-weight:700; font-size:10px; }
    .foot { margin-top:10px; font-size:11px; color:#333; }
  </style>
</head>
<body>

@php
  /**
   * Funciones auxiliares:
   * embed_image_base64: embebe una imagen pública en base64 (útil para dompdf)
   */
  function embed_image_base64($relativePath){
      $full = public_path($relativePath);
      if(file_exists($full) && is_readable($full)){
          $ext = strtolower(pathinfo($full, PATHINFO_EXTENSION));
          $data = base64_encode(file_get_contents($full));
          $mime = 'png';
          if(in_array($ext, ['jpg','jpeg'])) $mime = 'jpeg';
          if($ext === 'gif') $mime = 'gif';
          if($ext === 'webp') $mime = 'webp';
          return "data:image/{$mime};base64,{$data}";
      }
      return null;
  }

  $logoLeft  = embed_image_base64('IMG/Logo_VitalTech.png') ?? embed_image_base64('IMG/logotipohancho.png');
  $logoRight = embed_image_base64('IMG/biovic_logo.png') ?? embed_image_base64('IMG/logotipo.png');

  /* -------------------------------------------------------------
     CÁLCULO DINÁMICO DE ANCHOS (aproximación)
     - conservamos el cálculo para las columnas "anchas".
     - N° y meses quedan en automático para que ocupen solo lo necesario.
     -------------------------------------------------------------
  */
  $charWidth = 6;        // <--- ajustar si la tipografía cambia (px por carácter estimado)
  $padExtra  = 28;       // espacio extra para padding/colapsos
  $minPx     = 80;       // ancho mínimo por columna "larga"
  $maxPx     = 420;      // ancho máximo aceptable

  $max = ['serv' => 0, 'equip'=> 0, 'marca'=> 0, 'modelo'=>0, 'serie'=>0, 'actf' =>0];

  foreach($hdvs as $h){
    $sserv = (string)($h->servicio?->nombreservicio ?? '');
    $u_len = mb_strlen($sserv);
    $e = mb_strlen((string)($h->equipo?->nombre_equipo ?? ''));
    $ma = mb_strlen((string)($h->marca?->nombre_marca ?? ''));
    $mo = mb_strlen((string)($h->modelo?->nombre_modelo ?? ''));
    $se = mb_strlen((string)($h->serie ?? ''));
    $af = mb_strlen((string)($h->actFijo ?? ''));

    $max['serv'] = max($max['serv'], $u_len);
    $max['equip']= max($max['equip'], $e);
    $max['marca']= max($max['marca'], $ma);
    $max['modelo']=max($max['modelo'], $mo);
    $max['serie']= max($max['serie'], $se);
    $max['actf'] = max($max['actf'], $af);
  }

  $w = [];
  foreach($max as $k => $len){
    $calc = (int)($len * $charWidth) + $padExtra;
    if($calc < $minPx) $calc = $minPx;
    if($calc > $maxPx) $calc = $maxPx;
    $w[$k] = $calc;
  }
@endphp

<!-- Header -->
<table class="header-table" role="presentation">
  <tr>
    <td class="header-left">
      @if($logoLeft)
        <img src="{{ $logoLeft }}" alt="logo-left" class="logo-img">
      @else
        <div style="height:92px; display:flex; align-items:center; justify-content:center;"><strong>LOGO</strong></div>
      @endif
    </td>

    <td class="header-center">
      <div class="title-main">CRONOGRAMA DE MANTENIMIENTO</div>
      <div class="meta">
        <small>VERSIÓN: 01</small>
        <small>CÓDIGO: DM-FIF-045</small>
        <small>PROCESO: MANTENIMIENTO</small>
      </div>
    </td>

    <td class="header-right">
      @if($logoRight)
        <img src="{{ $logoRight }}" alt="logo-right" class="logo-img">
      @else
        <div style="height:92px; display:flex; align-items:center; justify-content:center;"><strong>LOGO</strong></div>
      @endif
    </td>
  </tr>
</table>

<!-- Tabla -->
<div class="table-wrap">
  <table class="data" role="table">
    {{-- Colgroup:
        - N° y meses quedan auto (se ajustan al contenido).
        - Las columnas largas usan min-width calculado por PHP ($w).
    --}}
    <colgroup>
      <col class="col-num" style="width:auto; white-space:nowrap;"> {{-- N° auto --}}
      <col class="col-serv"  style="min-width: {{ $w['serv'] }}px;">
      <col class="col-equip" style="min-width: {{ $w['equip'] }}px;">
      <col class="col-marca" style="min-width: {{ $w['marca'] }}px;">
      <col class="col-modelo"style="min-width: {{ $w['modelo'] }}px;">
      <col class="col-serie" style="min-width: {{ $w['serie'] }}px;">
      <col class="col-actfij"style="min-width: {{ $w['actf'] }}px;">

      {{-- 12 meses en auto - su ancho será el que ocupen las 3 letras / la X, etc. --}}
      @for($i=0;$i<12;$i++)
        <col class="col-month" style="width:auto;">
      @endfor
    </colgroup>

    <thead>
      <tr>
        <th class="num-th">N°</th>
        <th>SERVICIO</th>
        <th>EQUIPO</th>
        <th>MARCA</th>
        <th>MODELO</th>
        <th>SERIE</th>
        <th>ACT. FIJO</th>

        {{-- Meses abreviados a 3 letras (encabezados pequeños) --}}
        <th class="month-th">ENE</th>
        <th class="month-th">FEB</th>
        <th class="month-th">MAR</th>
        <th class="month-th">ABR</th>
        <th class="month-th">MAY</th>
        <th class="month-th">JUN</th>
        <th class="month-th">JUL</th>
        <th class="month-th">AGO</th>
        <th class="month-th">SEP</th>
        <th class="month-th">OCT</th>
        <th class="month-th">NOV</th>
        <th class="month-th">DIC</th>
      </tr>
    </thead>

    <tbody>
      @foreach($hdvs as $hdv)
        <tr>
          {{-- Numeración 1,2,3... --}}
          <td class="num-td">{{ $loop->iteration }}</td>

          <td>{{ $hdv->servicio?->nombreservicio ?? '---' }}</td>
          <td>{{ $hdv->equipo?->nombre_equipo ?? 'NO REGISTRA' }}</td>
          <td>{{ $hdv->marca?->nombre_marca ?? '---' }}</td>
          <td>{{ $hdv->modelo?->nombre_modelo ?? '---' }}</td>
          <td>{{ $hdv->serie ?? '---' }}</td>
          <td class="center">{{ $hdv->actFijo ?? '---' }}</td>

          {{-- Meses: usamos clase month-td con white-space:nowrap para que el ancho sea justo al contenido --}}
          <td class="month-td">@if(trim($hdv->enero)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->febrero)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->marzo)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->abril)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->mayo)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->junio)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->julio)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->agosto)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->septiembre)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->octubre)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->noviembre)==='X') <span class="mark">X</span> @endif</td>
          <td class="month-td">@if(trim($hdv->diciembre)==='X') <span class="mark">X</span> @endif</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="foot">Total registros: {{ $hdvs->count() }}</div>

</body>
</html>
