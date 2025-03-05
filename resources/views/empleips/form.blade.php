<br>
<div class="form-group">
    <label for="Nombre"> NOMBRE EMPLEADO </label>
    <input type="text" class="form-control" name="nombreempleips" value="{{isset($empleips->nombreempleips)?$empleips->nombreempleips:old('nombreempleips') }}" id="nombreempleips">
</div>

<br>
<div class="form-group">
    <label for="apellioempleips"> APELLIDO EMPLEADO </label>
    <input type="text" class="form-control" name="apellioempleips" value="{{isset($empleips->apellioempleips)?$empleips->apellioempleips:old('apellioempleips') }}" id="apellioempleips">
</div>

<br>
    <label for="fotoempleips"> FOTO </label>
    {{-- {{ $empleips->fotoempleips }}
    <img src="{{ asset('storage'.'/'.$empleips->fotoempleips) }}" alt="Foto empleado" width="100" height="100"> --}}
    <input type="file" name="fotoempleips" value="" id="fotoempleips">
    

<br>
<div class="form-group">
    <label for="identificacionempleips"> IDENTIFICACION </label>
    <input type="text" class="form-control" name="identificacionempleips" value="{{isset($empleips->identificacionempleips)?$empleips->identificacionempleips:old('identificacionempleips') }}" id="identificacionempleips">
</div>

<br>
<div class="form-group">
    <label for="numerocelempleips"> NUMERO DE CONTACTO </label>
    <input type="text" class="form-control" name="numerocelempleips" value="{{isset($empleips->numerocelempleips)?$empleips->numerocelempleips:old('numerocelempleips') }}" id="numerocelempleips">
</div>

<br>
<div class="form-group">
    <label for="emailempleips"> EMAIL EMPLEADO </label>
    <input type="text" class="form-control" name="emailempleips" value="{{isset($empleips->emailempleips)?$empleips->emailempleips:old('emailempleips') }}" id="emailempleips">
</div>

<br>
<div class="form-group">
    <label for="direccionempleips"> DIRECCION EMPLEADO </label>
    <input type="text" class="form-control" name="direccionempleips" value="{{isset($empleips->direccionempleips)?$empleips->direccionempleips:old('direccionempleips') }}" id="direccionempleips">
</div>

<br>
<div class="form-group">
    <label for="profesionempleips"> PROFESION EMPLEADO </label>
    <input type="text" class="form-control" name="profesionempleips" value="{{isset($empleips->profesionempleips)?$empleips->profesionempleips:old('profesionempleips') }}" id="profesionempleips">
</div>

<br>
<br>
<div class="form-group">
    <label for="cargoempleips">  CARGO EMPLEADO </label>  
    <input type="text" class="form-control"  name="cargoempleips" value="{{isset($empleips->cargoempleips)?$empleips->cargoempleips:old('cargoempleips') }}" id="cargoempleips">
</div>

<br>
    <input type="submit" value="Guardar Datos">