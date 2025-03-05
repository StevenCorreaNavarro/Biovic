<br>
@if(count($errors) > 0) 
<div class="alert alert-danger" role="alert">
    <ul>
    @foreach($errors->all() as $error)
        <li> {{$error}} </li>
    @endforeach
    </ul>
</div>
@endif

<h2>DESCRIPCION DEL EQUIPO</h2>

<br>
<div class="form-group">
    <label for="servicio_id">Servicio</label>
    <select name="servicio_id" id="servicio_id" class="form-control">
        <option value="">Seleccione una opcion</option>
        @foreach($nombreservicios as $servicio)
            <option value="{{ $servicio->id }}" {{ (isset($hojadevida) && $hojadevida->servicio_id == $servicio->id) ? 'selected' : '' }}>
                {{ $servicio->nombreservicio }}
        @endforeach
    </select>
</div>
<br>

<br>
<div class="form-group">
    <label for="nombre_equipos">Nombre</label>
    <select name="nombre_equipos" id="nombre_equipos" class="form-control">
        <option value="">Seleccione una opcion</option>
        @foreach($nombreEquipos as $equipo)
        <option value="{{ $equipo->id }}" {{ (isset($hojadevida) && $hojadevida->nombre_equipos == $equipo->id) ? 'selected' : '' }}>
            {{ $equipo->nombreequipo }}
        @endforeach
    </select>
</div>
<br>
<br>

<div class="form-group">
    <label for=Marca> Marca </label>
    <input type="text" name="marca" value="{{isset($hojadevida->marca)?$hojadevida->marca:old('marca')}}" id="marca">
</div>
<br>
<br>

<div class="form-group">
    <label for=modelo> Modelo </label>
    <input type="text" name="modelo" value="{{isset($hojadevida->modelo)?$hojadevida->modelo:old('modelo')}}" id="modelo">
</div>
<br>
<br>

<div class="form-group">
    <label for=serie> Serie </label>
    <input type="text" name="marca" value="{{isset($hojadevida->serie)?$hojadevida->serie:old('serie')}}" id="serie">
</div>
<br>
<br>

<div class="form-group">
    <label for="tec_predo_id">Tecnologia Predominante</label>
    <select name="tec_predo_id" id="tec_predo_id" class="form-control">
        <option value="">Seleccione una opcion</option>
        @foreach($tecPredos as $tecnopredominante)
        <option value="{{ $tecnopredominante->id }}" {{ (isset($hojadevida) && $hojadevida->tec_predo_id == $tecnopredominante->id) ? 'selected' : '' }}>
            {{ $tecnopredominante->tecpredo }}
        @endforeach
    </select>
</div>
<br>
<br>

<div class="container">
        <!-- Campo PerioCali -->
        <div class="form-group">
            <label for="perioCali">PerioCali</label>
            <input type="text" name="perioCali" value="{{ old('perioCali') }}" id="perioCali" class="form-control" oninput="toggleFechaCali(this.value)">
        </div>
        <br>
        <!-- Campo FechaCali -->
        <div class="form-group" id="fechaCaliContainer" style="display: none;">
            <label for="fechaCali">Fecha de Calibración</label>
            <input type="date" name="fechaCali" id="fechaCali" class="form-control" value="{{ old('fechaCali') }}">
        </div>
        
    </form>
</div>

<div class="form-group">
    <label for="cod_ecris">Código Ecri</label>
    <div style="display: flex; align-items: center;">
        <input type="text" id="search-codiecri" class="form-control" placeholder="Buscar" style="margin-right: 10px;" />
        <select name="cod_ecris" id="cod_ecris" class="form-control">
            <option value="">Seleccione una opción</option>
            @foreach($codiecri as $codigoecri)
            <option value="{{ $codigoecri->id }}" data-codiecri="{{ strtolower($codigoecri->codiecri) }}" {{ (isset($hojadevida) && $hojadevida->cod_ecris == $codigoecri->id) ? 'selected' : '' }}>
                {{ $codigoecri->codiecri }}
            </option>
            @endforeach
        </select>
    </div>
</div>

{{-- Script para realizar busqueda en codigo ecri --}}
<script>
document.getElementById('search-codiecri').addEventListener('input', function() {
    const searchValue = this.value.toLowerCase();
    const select = document.getElementById('cod_ecris');
    const options = select.querySelectorAll('option');

    let matchingOption = null;
    let matchCount = 0;

    options.forEach(option => {
        if (option.value === "") return; // Skip the default "Seleccione una opción"
        const text = option.dataset.codiecri;

        if (text.includes(searchValue)) {
            option.style.display = '';
            matchingOption = option;
            matchCount++;
        } else {
            option.style.display = 'none';
        }
    });

    // If exactly one option matches, select it
    if (matchCount === 1 && matchingOption) {
        select.value = matchingOption.value;
    } else {
        select.value = ""; // Reset to "Seleccione una opción" if there are multiple matches or none
    }
});
</script>

<br>
<br>

<div class="form-group">
<label for=actFijo> Activo Fijo </label>
<input type="text" name="actFijo" value="{{isset($hojadevida->actFijo)?$hojadevida->actFijo:old('actFijo')}}" id="actFijo">
</div>
<br>
<br>

<div class="form-group">
<label for=regInvima> Registro Invima </label>
<input type="text" name="regInvima" value="{{isset($hojadevida->regInvima)?$hojadevida->regInvima:old('regInvima')}}" id="regInvima">
</div>
<br>
<br>

<div class="form-group">
<label for=Estado> Estado Funcionamiento </label>
<input type="text" name="Estado" value="{{isset($hojadevida->Estado)?$hojadevida->Estado:old('Estado')}}" id="Estado">
</div>
<br>
<br>

<div class="form-group">
    <label for="cla_riesgos">Clasificacion de Riesgo</label>
    <select name="cla_riesgos" id="cla_riesgos" class="form-control">
        <option value="">Seleccione una opcion</option>
        @foreach($clariesgo as $clasiriesgo)
        <option value="{{ $clasiriesgo->id }}" {{ (isset($hojadevida) && $hojadevida->cla_riesgos == $clasiriesgo->id) ? 'selected' : '' }}>
            {{ $clasiriesgo->clariesgo}}
        @endforeach
    </select>
</div>
<br>
<br>

<div class="form-group">
    <label for="cla_biomes">Clasificacion de Biomedica</label>
    <select name="cla_biomes" id="cla_biomes" class="form-control">
        <option value="">Seleccione una opcion</option>
        @foreach($clabiomedica as $clasibiomedica)
        <option value="{{ $clasibiomedica->id }}" {{ (isset($hojadevida) && $hojadevida->cla_biomes == $clasibiomedica->id) ? 'selected' : '' }}>
            {{ $clasibiomedica->clabiomedica}}
        @endforeach
    </select>
</div>
<br>
<br>

<div class="form-group">
    <label for="cla_usos">Clasificacion por Uso</label>
    <select name="cla_usos" id="cla_usos" class="form-control">
        <option value="">Seleccione una opcion</option>
        @foreach($clauso as $clasiuso)
        <option value="{{ $clasiuso->id }}" {{ (isset($hojadevida) && $hojadevida->cla_usos == $clasiuso->id) ? 'selected' : '' }}>
            {{ $clasiuso->clauso}}
        @endforeach
    </select>
</div>
<br>
<br>

<div class="form-group">
    <label for="foto"  > </label>  
    {{-- {{$equipo->foto}}     Muestra ruta de la imagen  --}}

    @if (isset($hojadevida->foto))
    <img class="img-thumbnail img-fluid"  src="{{ asset('storage').'/'.$hojadevida->foto}}" width="100" alt=""> 
    @endif

    <input type="file"name="foto" value="" id="foto" class="form-control">
    </div>
<br>
<br>

{{-- SCRIPT CAMPO PERIODO CALIBRACION --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var perioCaliField = document.getElementById('perioCali');
        toggleFechaCali(perioCaliField.value); // Ensure correct state on page load

        perioCaliField.addEventListener('input', function () {
            toggleFechaCali(this.value);
        });
    });

    function toggleFechaCali(value) {
        var fechaCaliContainer = document.getElementById('fechaCaliContainer');
        if (value.toLowerCase() === 'anual') {
            fechaCaliContainer.style.display = 'block';
        } else {
            fechaCaliContainer.style.display = 'none';
            document.getElementById('fechaCali').value = ''; // Clear the date field if not 'anual'
        }
    }
</script>

<h2>REGISTRO HISTORICO</h2>


<div class="form-group">
    <label for=fechaAdquisicion> Fecha de Adquisicion </label>
    <input type="date" name="fechaAdquisicion" value="{{isset($hojadevida->fechaAdquisicion)?$hojadevida->fechaAdquisicion:old('fechaAdquisicion')}}" id="fechaAdquisicion">
</div>
<br>
<br>

<div class="form-group">
    <label for=fechaInstalacion> Fecha de Instalacion </label>
    <input type="date" name="fechaInstalacion" value="{{isset($hojadevida->fechaInstalacion)?$hojadevida->fechaInstalacion:old('fechaInstalacion')}}" id="fechaInstalacion">
</div>
<br>
<br>

<div class="form-group">
    <label for=garantia> Garantía </label>
    <input type="date" name="garantia" value="{{isset($hojadevida->garantia)?$hojadevida->garantia:old('garantia')}}" id="garantia">
</div>
<br>
<br>

<div class="form-group">
    <label for=factura> Factura </label>
    <input type="text" name="factura" value="{{isset($hojadevida->factura)?$hojadevida->factura:old('factura')}}" id="factura">
</div>
<br>
<br>

<div class="form-group">
    <label for="forma_adqui_id">Forma de Adquisicion</label>
    <select name="forma_adqui_id" id="forma_adqui_id" class="form-control">
        <option value="">Seleccione una opcion</option>
        @foreach($formaadqui as $formaadquisicion)
        <option value="{{ $formaadquisicion->id }}" {{ (isset($hojadevida) && $hojadevida->forma_adqui_id == $formaadquisicion->id) ? 'selected' : '' }}>
            {{ $formaadquisicion->formaadqui}}
        @endforeach
    </select>
</div>
<br>
<br>

<div class="form-group">
    <label for=vidaUtil> Vida Util </label>
    <input type="text" name="vidaUtil" value="{{isset($hojadevida->vidaUtil)?$hojadevida->vidaUtil:old('vidaUtil')}}" id="vidaUtil">
</div>
<br>
<br>

<div class="form-group">
    <label for=costo> Costo </label>
    <input type="text" name="costo" value="{{isset($hojadevida->costo)?$hojadevida->costo:old('costo')}}" id="costo">
</div>
<br>
<br>

<div class="form-group">
    <label for="propiedad_id">Propiedad</label>
    <select name="propiedad_id" id="propiedad_id" class="form-control">
        <option value="">Seleccione una opcion</option>
        @foreach($nombreempresa as $nombreempre)
        <option value="{{ $nombreempre->id }}" {{ (isset($hojadevida) && $hojadevida->propiedad_id == $nombreempre->id) ? 'selected' : '' }}>
            {{ $nombreempre->nombreempresa}}
        @endforeach
    </select>
</div>
<br>
<br>


<h2>REGISTRO TECNICO</h2>

<div class="form-group">
    <label for="mag_fuen_alimen_id"> Fuente de Alimentacion</label>
    <select name="mag_fuen_alimen_id" id="mag_fuen_alimen_id" class="form-control">
        <option value="">Seleccione una opcion</option>
        @foreach($nombrealimentacion as $nombrefuentealimentacion)
        <option value="{{ $nombrefuentealimentacion->id }}" {{ (isset($hojadevida) && $hojadevida->mag_fuen_alimen_id == $nombrefuentealimentacion->id) ? 'selected' : '' }}>
            {{ $nombrefuentealimentacion->nombrealimentacion}}
        @endforeach
    </select>
</div>
<br>
<br>

<div class="form-group">
    <label for=volMax> Voltaje Max </label>
    <input type="text" name="volMax" value="{{isset($hojadevida->volMax)?$hojadevida->volMax:old('volMax')}}" id="volMax">
    <br>
    <label for=volMin> Voltaje Min  </label>
    <input type="text" name="volMin" value="{{isset($hojadevida->covolMinsto)?$hojadevida->volMin:old('volMin')}}" id="volMin">
    
    <div class="form-group">
        <label for="mag_vol_id"> Fuente de Alimentacion</label>
        <select name="mag_vol_id" id="mag_vol_id" class="form-control">
            <option value="">Seleccione una opcion</option>
            @foreach($abreviacionvolumen as $abrevivolumen)
            <option value="{{ $abrevivolumen->id }}" {{ (isset($hojadevida) && $hojadevida->mag_fuen_alimen_id == $abrevivolumen->id) ? 'selected' : '' }}>
                {{ $abrevivolumen->abreviacionvolumen}}
            @endforeach
        </select>
    </div>
    <br>
    <br>


</div>
<br>
<br>







{{-- ACCION DE GUARDAR  --}}
<br>
<br>
<input type="submit" Value="Guardar"> {{-- se pone value para eliminar el dato del envio name="Enviar" --}}
<br>

<a href="{{url('hojadevida')}}" class="btn btn-primary"> <h3> Regresar  </h3> </a>

