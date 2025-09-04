let contenidoOriginal;
let contenidoOriginal2;
let contenidoOriginal3;
let contenidoOriginal4;
let contenidoOriginal5;
let contenidoOriginal6;
let contenidoOriginal7;
let contenidoOriginalpropiedad;

let contenidoOriginal8;
let contenidoOriginal9;
let contenidoOrigina20;
let contenidoOrigina21;
let contenidoOrigina22;
let contenidoOrigina23;
// let contenidoOrigina24;
// let contenidoOrigina25;

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

            
            

            <label for="fotos ">Selecciona una imagen:</label>
            <input type="file" name="fotos" id="fotos" accept="image/*"
            class="form-control" onchange="previewImagen(event, 'preview2')">
            <div class="invalid-feedback">El campo es obligatorio</div>
            
            </div>
            <img id="preview2" class="img-thumbnail m-2 img-fluid mt-3" src="" width="220"
            style="display: none;" alt="Vista previa 2">
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

function fuenteali() {
    const div = document.getElementById("miDiv9");
    contenidoOriginal9 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `
                        <div class="form-group">
                        <label for="mag_fuen_alimen_id">Nueva Fuente de alimentacion</label>
                        <i class="fa-solid fa-xmark" onclick="restfuenteali() " style="cursor:pointer; margin-left:10px;"></i>
                        <input name="nombrealimentacion" type="text" id="nombrealimentacion" class="form-control dv"
                        </div> `;
}


function ufrecuencia() {
    const div = document.getElementById("miDiv10");
    contenidoOrigina20 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `
                        <div >
                            <div >
                                <div >
                                <label "  for="mag_fre_id">Nueva Unidad de frecuencia</label><i class="fa-solid fa-xmark" onclick="restufrecuencia() " style="cursor:pointer; margin-left:10px;"></i>
                                </div>
                                <input name="nombrefrecuencia" type="text" id="nombrefrecuencia" class="form-control dv c">
                            
                            </div>
                            <div >
                                <label "  for="mag_fre_id">Nueva abreviacion de frecuencia</label>
                                <input name="abreviacionfrecuencia" type="text" id="abreviacionfrecuencia" class="form-control dv ">
                            </div>
                        </div>
                    `;
}
function ualimentacion() {
    const div = document.getElementById("miDiv11");
    contenidoOrigina21 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `
                        <div>
                            <div style="position: relative;">
                                <div >
                                <label " for="mag_fuen_ali_id" >Nueva Unidad de alimentacion</label><i class="fa-solid  fa-xmark" onclick="restualimentacion()" style="cursor:pointer; margin-left:10px;"></i>
                                </div>
                                <input name="abrefuentealimen" type="text" id="abrefuentealimen" class="form-control dv c ">
                            </div>
                        
                        </div>`;
}
function ucorriente() {
    const div = document.getElementById("miDiv12");
    contenidoOrigina22 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
    div.innerHTML = `
                        <div style="">
                            <div style="position: relative;">
                                <div style="background: linear-gradient(45deg, #0062E6, #33AEFF); color:red">
                                
                                <label " for="mag_corriente_id" >Nueva Unidad de corriente</label><i class="fa-solid  fa-xmark" onclick="restucorriente()" style="cursor:pointer; margin-left:10px;"></i>
                                </div>
                                <input name="nombrecorriente" type="text" id="no" class="form-control dv c ">
                            </div>
                            <div style="position: relative;">
                                <div >
                                <label " for="mag_corriente_id" >Nueva abreviacion de corriente</label>
                                </div>
                                <input name="abreviacioncorriente" type="text" id="abreviacioncorriente" class="form-control dv c ">
                            </div>
                        
                        </div>`;
}
function upeso() {
    const div = document.getElementById("miDiv13");
    contenidoOrigina23 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar       style="background: linear-gradient(45deg, #0062E6, #33AEFF); color:red; padding-left:5px; padding-right:5px; padding-button:5px; border-radius:5px;"
    div.innerHTML = `
                        <div >
                            <div style="position: relative;">
                                <div >
                                <label " for="mag_peso_id" >Nuevo Nombre Unidad de Peso</label><i class="fa-solid  fa-xmark" onclick="restupeso()" style="cursor:pointer; margin-left:10px;"></i>
                                </div>
                                <input name="nombrepeso" type="text" id="nombrepeso" class="form-control dv c ">
                            </div>
                            <div style="position: relative;">
                                <div >
                                <label " for="mag_peso_id" >Nueva abreviacion de Peso</label>
                                </div>
                                <input name="abreviacionpeso" type="text" id="abreviacionpeso" class="form-control dv c ">
                            </div>
                            <br>
                        </div>`;
}


// function fab() {
//     const div = document.getElementById("miDiv14");
//     contenidoOrigina24 = div.innerHTML; // Guardamos el contenido original solo una vez    cambiar
//     div.innerHTML = `
//                         <div>
//                                 <label for="" class="form-label fw-bold">Registra nuevo fabricante</label>
//                                 <i class="fa-solid fa-xmark" onclick="restfab() " style="cursor:pointer; margin-left:10px;"></i>
                                
//                             <div>
                               
//                                 <label  for="mag_fre_id">Nombre</label>
//                                 <input name="nombrefrecuencia" type="text" id="nombrefrecuencia" class="form-control dv c">
//                             </div>

//                             <div >
//                                 <label  for="mag_fre_id">Direccion</label>
//                                 <input name="abreviacionfrecuencia" type="text" id="abreviacionfrecuencia" class="form-control dv ">
//                             </div>
//                             <div >
//                                 <label  for="mag_fre_id">Telefono</label>
//                                 <input name="abreviacionfrecuencia" type=Telefono "text" id="abreviacionfrecuencia" class="form-control dv ">
//                             </div>
//                             <div >
//                                 <label  for="mag_fre_id">Ciudad</label>
//                                 <input name="abreviacionfrecuencia" type="text" id="abreviacionfrecuencia" class="form-control dv ">
//                             </div>
//                             <div >
//                                 <label  for="mag_fre_id">Correo electronico</label>
//                                 <input name="abreviacionfrecuencia" type="text" id="abreviacionfrecuencia" class="form-control dv ">
//                             </div>
//                         </div>
//                     `;
// }


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

function restfuenteali() {
    document.getElementById("miDiv9").innerHTML = contenidoOriginal9;
}

function restufrecuencia() {
    document.getElementById("miDiv10").innerHTML = contenidoOrigina20;
}
function restualimentacion() {
    document.getElementById("miDiv11").innerHTML = contenidoOrigina21;
}
function restucorriente() {
    document.getElementById("miDiv12").innerHTML = contenidoOrigina22;
}
function restupeso() {
    document.getElementById("miDiv13").innerHTML = contenidoOrigina23;
}
function restfab() {
    document.getElementById("miDiv14").innerHTML = contenidoOrigina24;
}

function restprove() {
    document.getElementById("miDiv15").innerHTML = contenidoOrigina25;
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



