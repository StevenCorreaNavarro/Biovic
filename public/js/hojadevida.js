let contenidoOriginal;
let contenidoOriginal2;
let contenidoOriginal3;
let contenidoOriginal4;
let contenidoOriginal5;
let contenidoOriginal6;
let contenidoOriginal7;
let contenidoOriginalpropiedad;

let contenidoOriginal8;

function transformarDiv() {
    const div = document.getElementById("miDiv");
    contenidoOriginal = div.innerHTML; // Guardamos el contenido original solo una vez
    div.innerHTML = `<div class="form-group">
                        <label for="estadoequipo">Nuevo estado de equipo</label>
                        <i class="fa-solid fa-xmark" onclick="restaurarDiv()" style="cursor:pointer; margin-left:10px;"></i>

                        <input name="estadoequipo" type="text" id="estadoequipo" class="form-control dv"

                    </div> `;
}

function ubifisica() {
    const div = document.getElementById("miDiv2");
    contenidoOriginal2 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `<div class="form-group">
                        <label for="ubifisicas">Nueva ubicacion fisica</label>

                        <i class="fa-solid fa-xmark" onclick="restubifisica() " style="cursor:pointer; margin-left:10px;"></i>

                        <input name="ubifisicas" type="text" id="ubifisicas" class="form-control dv"

                        </div> `;
}

function servicio() {
    const div = document.getElementById("miDiv3");
    contenidoOriginal3 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `
                        <div class="form-group">
                        <label for="nombreservicios">Nuevo servicio</label>

                        <i class="fa-solid fa-xmark" onclick="restservicio() " style="cursor:pointer; margin-left:10px;"></i>

                        <input name="nombreservicios" type="text" id="nombreservicios" class="form-control dv"

                        </div> `;
}

function predo() {
    const div = document.getElementById("miDiv4");
    contenidoOriginal4 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `
                        <div class="form-group">
                        <label for="tecPredos">Nueva Tecnologia Predominate</label>

                        <i class="fa-solid fa-xmark" onclick="restpredo() " style="cursor:pointer; margin-left:10px;"></i>

                        <input name="tecPredos" type="text" id="tecPredos" class="form-control dv"

                        </div> `;
}

function riesgo() {
    const div = document.getElementById("miDiv5");
    contenidoOriginal5 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `
                        <div class="form-group">
                        <label for="clariesgo">Nuevo Clasificacion de riesgo</label>

                        <i class="fa-solid fa-xmark" onclick="restriesgo() " style="cursor:pointer; margin-left:10px;"></i>

                        <input name="clariesgo" type="text" id="clariesgo" class="form-control dv"

                        </div> `;
}

function biom() {
    const div = document.getElementById("miDiv6");
    contenidoOriginal6 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `
                        <div class="form-group">
                        <label for="clabiomedica">Nueva Clasificacion Biometrica</label>

                        <i class="fa-solid fa-xmark" onclick="restbiom() " style="cursor:pointer; margin-left:10px;"></i>

                        <input name="clabiomedica" type="text" id="clabiomedica" class="form-control dv"

                        </div> `;
}

function uso() {
    const div = document.getElementById("miDiv7");
    contenidoOriginal7 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `
                        <div class="form-group">
                        <label for="clauso">Nueva Clasificacion por uso</label>

                        <i class="fa-solid fa-xmark" onclick="restuso() " style="cursor:pointer; margin-left:10px;"></i>

                        <input name="clauso" type="text" id="clauso" class="form-control dv"

                        </div> `;
}
function propiedad() {
    const div = document.getElementById("miDivpropiedad");
    contenidoOriginalpropiedad = div.innerHTML;

    div.innerHTML = `
        <div class="form-group">
            <br><br>
            <label for="propiedad" class="form-label fw-bold">Registra nueva propiedad</label> 
            <i class="fa-solid fa-xmark" onclick="restpropiedad()" style="cursor:pointer; margin-left:10px;"></i>
            <br>

            <label for="propiedad">Nombre empresa</label>
            <input name="propiedad" type="text" id="propiedad" class="form-control dv">

            <label for="nitempresa">Nit Empresa</label>
            <input type="text" name="nitempresa" id="nitempresa" class="form-control dv">

            <label for="direccionempre">Dirección</label>
            <input type="text" name="direccionempre" id="direccionempre" class="form-control dv">

            <label for="telefonoempre">Teléfono</label>
            <input type="text" class="form-control dv" name="telefonoempre" id="telefonoempre">

            <label for="ciudadempre">Ciudad</label>
            <input type="text" class="form-control dv" name="ciudadempre" id="ciudadempre">

            <label for="sedeempresa">Sede</label>
            <input type="text" class="form-control dv" name="sedeempresa" id="sedeempresa">

            <label for="representanteempresa">Representante</label>
            <input type="text" class="form-control dv" name="representanteempresa" id="representanteempresa">

            <label for="emailWebempre">Email o sitio web</label>
            <input type="text" class="form-control dv" name="emailWebempre" id="emailWebempre">

            <label for="fotos">Selecciona una imagen:</label>
            <input type="file" name="fotos" id="fotos" class="form-control" accept="image/*" onchange="previewImagen(event)">
            <div id="errorFotos" class="invalid-feedback" style="display:none;">El campo es obligatorio</div>

            <img id="previews" class="img-thumbnail m-2 img-fluid mt-3" src="" width="120" style="display: none;" alt="Vista previa">
        </div>
    `;
}

// vista previa de foto

function previewImagen(event) {
    let reader = new FileReader();
    reader.onload = function () {
        let preview = document.getElementById('previews');
        preview.src = reader.result;
        preview.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}

function adqui() {
    const div = document.getElementById("miDiv8");
    contenidoOriginal8 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `
                        <div class="form-group">
                        <label for="formaadqui">Nueva Clasificacion por uso</label>

                        <i class="fa-solid fa-xmark" onclick="restadqui() " style="cursor:pointer; margin-left:10px;"></i>

                        <input name="formaadqui" type="text" id="formaadqui" class="form-control dv"

                        </div> `;
}



function restaurarDiv() {
    document.getElementById("miDiv").innerHTML = contenidoOriginal;
}

function restubifisica() {
    document.getElementById("miDiv2").innerHTML = contenidoOriginal2;
}

function restservicio() {
    document.getElementById("miDiv3").innerHTML = contenidoOriginal3;
}

function restpredo() {
    document.getElementById("miDiv4").innerHTML = contenidoOriginal4;
}

function restriesgo() {
    document.getElementById("miDiv5").innerHTML = contenidoOriginal5;
}

function restbiom() {
    document.getElementById("miDiv6").innerHTML = contenidoOriginal6;
}

function restuso() {
    document.getElementById("miDiv7").innerHTML = contenidoOriginal7;
}

function restpropiedad() {
    document.getElementById("miDivpropiedad").innerHTML = contenidoOriginalpropiedad;
}

function restadqui() {
    document.getElementById("miDiv8").innerHTML = contenidoOriginal8;
}









document.addEventListener('DOMContentLoaded', function () {
    const fechaAdquisicionInput = document.getElementById('fechaAdquisicion');
    const aniosVidaSelect = document.getElementById('aniosVida');
    const vidaUtilVisible = document.getElementById('vidaUtilCalculada');
    const vidaUtilHidden = document.getElementById('vidaUtil');

    // Función para calcular la vida útil
    function calcularVidaUtil() {
        const fechaAdq = new Date(fechaAdquisicionInput.value);
        const anios = parseInt(aniosVidaSelect.value);

        if (!isNaN(fechaAdq.getTime()) && !isNaN(anios)) {
            const vidaUtil = new Date(fechaAdq);
            vidaUtil.setFullYear(vidaUtil.getFullYear() + anios);

            const yyyy = vidaUtil.getFullYear();
            const mm = String(vidaUtil.getMonth() + 1).padStart(2, '0');
            const dd = String(vidaUtil.getDate()).padStart(2, '0');
            const vidaFinal = `${yyyy}-${mm}-${dd}`;

            // Mostrar y guardar la vida útil calculada
            vidaUtilVisible.value = vidaFinal;
            vidaUtilHidden.value = vidaFinal;
        } else {
            // Si no hay fecha, limpiar los campos
            vidaUtilVisible.value = '';
            vidaUtilHidden.value = '';
        }
    }

    // Llamar a la función al cargar la página para calcular la vida útil si ya se tiene una fecha
    calcularVidaUtil();

    // Escuchar cambios en la fecha de adquisición y los años seleccionados
    fechaAdquisicionInput.addEventListener('change', calcularVidaUtil);
    aniosVidaSelect.addEventListener('change', calcularVidaUtil);
});



// script para accesorios
document.addEventListener('DOMContentLoaded', function () {
    const equipoSelect = document.getElementById('equipo_id');
    const accesorioSelect = document.getElementById('accesorio_id');
    const mensajeNoAccesorios = document.getElementById('mensaje_no_accesorios');
    const infoAccesorio = document.getElementById('info_accesorio');

    if (!equipoSelect || !accesorioSelect) return;

    equipoSelect.addEventListener('change', function () {
        const equipoId = this.value;
        const opciones = accesorioSelect.querySelectorAll('option');
        let hayAccesorios = false;

        // Oculta todos excepto el primero (placeholder)
        opciones.forEach((option, index) => {
            if (index === 0) {
                option.style.display = '';
                return;
            }

            const idEquipo = option.getAttribute('data-equipo-id');
            if (equipoId && idEquipo === equipoId) {
                option.style.display = '';
                hayAccesorios = true;
            } else {
                option.style.display = 'none';
            }
        });

        accesorioSelect.selectedIndex = 0;
        infoAccesorio.classList.add('d-none');

        if (!hayAccesorios) {
            mensajeNoAccesorios.classList.remove('d-none');
        } else {
            mensajeNoAccesorios.classList.add('d-none');
        }
    });

    accesorioSelect.addEventListener('change', function () {
        const option = this.options[this.selectedIndex];

        if (!option || option.value === '') {
            infoAccesorio.classList.add('d-none');
            return;
        }

        document.getElementById('descripcion_accesorio').textContent = option.getAttribute(
            'data-nombre-accesorio') || 'No disponible';
        document.getElementById('modelo_accesorio').textContent = option.getAttribute(
            'data-modelo') || 'No disponible';
        document.getElementById('serie_accesorio').textContent = option.getAttribute(
            'data-serie') || 'No disponible';
        document.getElementById('costo_accesorio').textContent = option.getAttribute(
            'data-costo') || 'No disponible';

        infoAccesorio.classList.remove('d-none');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const fabricanteSelect = document.getElementById('fabricante_id');
    const infoFabricante = document.getElementById('info_fabricante');
    const mensajeNoFabricantes = document.getElementById('mensaje_no_fabricantes');

    if (fabricanteSelect.options.length <= 1) mensajeNoFabricantes.style.display = 'block';

    fabricanteSelect.addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        if (!selected || selected.value === '') return infoFabricante.style.display = 'none';

        document.getElementById('nombre_fabricante').textContent = selected.getAttribute(
            'data-nombre-fabri') || 'No disponible';
        document.getElementById('direccion_fabricante').textContent = selected.getAttribute(
            'data-direccion-fabri') || 'No disponible';
        document.getElementById('telefono_fabricante').textContent = selected.getAttribute(
            'data-telefono-fabri') || 'No disponible';
        document.getElementById('ciudad_fabricante').textContent = selected.getAttribute(
            'data-ciudad-fabri') || 'No disponible';
        document.getElementById('email_fabricante').textContent = selected.getAttribute(
            'data-email-fabri') || 'No disponible';

        infoFabricante.style.display = 'block';
    });

    const proveedorSelect = document.getElementById('proveedor_id');
    const infoProveedor = document.getElementById('info_proveedor');
    const mensajeNoProveedores = document.getElementById('mensaje_no_proveedores');

    if (proveedorSelect.options.length <= 1) mensajeNoProveedores.style.display = 'block';

    proveedorSelect.addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        if (!selected || selected.value === '') return infoProveedor.style.display = 'none';

        document.getElementById('nombre_proveedor').textContent = selected.getAttribute(
            'data-nombre-proveedor') || 'No disponible';
        document.getElementById('direccion_proveedor').textContent = selected.getAttribute(
            'data-direccion-proveedor') || 'No disponible';
        document.getElementById('telefono_proveedor').textContent = selected.getAttribute(
            'data-telefono-proveedor') || 'No disponible';
        document.getElementById('ciudad_proveedor').textContent = selected.getAttribute(
            'data-ciudad-proveedor') || 'No disponible';
        document.getElementById('email_proveedor').textContent = selected.getAttribute(
            'data-email-proveedor') || 'No disponible';

        infoProveedor.style.display = 'block';
    });
});


document.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) { // Ajusta el valor según sea necesario
        navbar.classList.add('navbar-scrolled');
    } else {
        navbar.classList.remove('navbar-scrolled');
    }
});