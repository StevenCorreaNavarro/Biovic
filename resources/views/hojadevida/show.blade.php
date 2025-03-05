
<div class="container">
    <h1>HOLA DESDE MOSTRAR</h1>
    <br>

    <div>
        <p><strong>Identificación:</strong> {{ $presidente->identificacionpresidente }}</p>
        <p><strong>Nombre:</strong> {{ $presidente->nombrepresidente }}</p>
        <p><strong>Apellido:</strong> {{ $presidente->apellidopresidente }}</p>
        <p><strong>Fecha de Nacimiento:</strong> {{ $presidente->nacimientopresidente }}</p>
        <p><strong>Año:</strong> {{ $presidente->añopresidente }}</p>
    </div>
</div>

<a href="{{url('presidente')}}" class="btn btn-primary"> <h3> Regresar  </h3> </a>
