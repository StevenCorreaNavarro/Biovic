<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Cronograma de Mantenimiento</title>
  <style>
    @page { margin: 18mm; }
    body { font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #111; }
    .header { display:flex; align-items:center; justify-content:space-between; margin-bottom:8px; }
    .logo { max-height:60px; }
    .title { text-align:center; font-weight:700; font-size:14px; flex:1; }
    table { width:100%; border-collapse: collapse; page-break-inside: auto; }
    thead { display: table-header-group; }
    th, td { border: 1px solid #999; padding:4px; vertical-align: middle; font-size:10px; }
    th { background:#333; color:#fff; font-weight:600; text-align:center; }
    .center { text-align:center; }
    .small { font-size:9px; }
  </style>
</head>
<body>
  <div class="header">
    <div>
      @if(file_exists(public_path('IMG/logotipohancho.png')))
        <img src="{{ public_path('IMG/logotipohancho.png') }}" class="logo" alt="logo-left">
      @endif
    </div>
    <div class="title">CRONOGRAMA DE MANTENIMIENTO</div>
    <div style="text-align:right;">
      <div class="small">Fecha: {{ now()->format('Y-m-d') }}</div>
    </div>
  </div>

  <table>
    <thead>
      <tr>
        <th>ITEM</th>
        <th>UBICACION</th>
        <th>EQUIPO</th>
        <th>MARCA</th>
        <th>MODELO</th>
        <th>SERIE</th>
        <th>ENE</th><th>FEB</th><th>MAR</th><th>ABR</th><th>MAY</th><th>JUN</th>
        <th>JUL</th><th>AGO</th><th>SEP</th><th>OCT</th><th>NOV</th><th>DIC</th>
      </tr>
    </thead>
    <tbody>
      @foreach($hdvs as $hdv)
        <tr>
          <td class="center small">{{ $hdv->id }}</td>
          <td class="small">{{ $hdv->ubifisica?->ubicacionfisica ?? '---' }}</td>
          <td class="small">{{ $hdv->equipo?->nombre_equipo ?? 'NO REGISTRA' }}</td>
          <td class="small">{{ $hdv->marca?->nombre_marca ?? 'NO REGISTRA' }}</td>
          <td class="small">{{ $hdv->modelo?->nombre_modelo ?? 'NO REGISTRA' }}</td>
          <td class="small">{{ $hdv->serie ?? 'NO REGISTRA' }}</td>
          <td class="center">{{ $hdv->enero === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->febrero === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->marzo === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->abril === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->mayo === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->junio === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->julio === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->agosto === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->septiembre === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->octubre === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->noviembre === 'X' ? 'X' : '' }}</td>
          <td class="center">{{ $hdv->diciembre === 'X' ? 'X' : '' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div style="margin-top:8px; font-size:10px;">
    Total registros: {{ $hdvs->count() }}
  </div>
</body>
</html>
