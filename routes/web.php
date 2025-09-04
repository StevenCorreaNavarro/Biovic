<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\UsuarioWebController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\HojadevidaController;
use App\Http\Controllers\EmpleipsController;
use App\Http\Controllers\PanelAdminController;
use App\Http\Controllers\MantoCronoController;
use App\Http\Controllers\CaliCronoController;
use App\Http\Controllers\CheckListController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\CodEcriController; // para código ECRI
use App\Models\Marca;
use App\Models\Modelo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se definen todas las rutas web de la aplicación. El archivo está
| organizado por bloques: públicas, middleware admin/empleado, middleware
| admin exclusivo y rutas protegidas por auth (usuarios autenticados).
|
| Comentarios en español para facilitar mantenimiento.
|
*/




/*
|--------------------------------------------------------------------------
| Rutas públicas / generales
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    // Mensaje de bienvenida (SweetAlert) y vista principal
    Alert::success(' Bienvenido!', 'Ingreso exitoso');
    return view('main');
})->name('menu');

// Rutas auxiliares públicas
Route::get('/main', function () {
    Alert::success(' Titulo de la alerta','mensaje de la alerta');
    return view('main');
});

Route::get('/principal', function () {
    Alert::success('Bienvenido!', 'Ingreso exitoso');
    return view('main');
})->name('principal');

// Formulario de empleados (vista)
Route::get('/empleados', function () {
    return view('empleips.form');
})->name('empleados');

/*
|--------------------------------------------------------------------------
| Rutas accesibles para Admin y Empleado (grupo con rol)
|--------------------------------------------------------------------------
| Ej: crear hojas de vida desde UI (routes para create/store que usan un
| middleware personalizado que verifica roles).
*/
Route::middleware(['auth', 'role:Admin,Empleado'])->group(function () {
    Route::get('/hojadevida/creates', [HojadevidaController::class, 'creates'])->name('hojadevida.creates');
    Route::get('/hojadevida/create',  [HojadevidaController::class, 'create'])->name('hojadevida.create');
    Route::post('/hojadevida/store', [HojadevidaController::class, 'store'])->name('hojadevida.store');
});

// Ruta para devolver el HTML de una hoja de vida vía AJAX agregado 3/09/2025 para mostrar en modal la hoja de vida

Route::get('/hojadevida/fetch/{id}', [HojadevidaController::class, 'fetch'])->name('hojadevida.fetch');
/*
|--------------------------------------------------------------------------
| Rutas para administradores (middleware 'Admin')
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'Admin'])->group(function () {

    // Dashboard admin
    Route::get('/admin', function () {
        return view('admin.admin.layouts.app');
    })->name('adminad.dashboard');

    // Acciones relacionadas a panel administrador
    Route::post('/guardar-datos', [HojadevidaController::class, 'guardarDatos']);

    Route::get('/equipos/{id}/seleccionar-marcas', [PanelAdminController::class, 'mostrarFormulario'])->name('equipos.mostrarFormulario');
    Route::post('/equipos/{id}/asignar-marcas', [PanelAdminController::class, 'asignarMarcas'])->name('equipos.asignarMarcas');

    // Gestión usuarios/empleados (panel admin)
    Route::get('/admin/usuarios', [PanelAdminController::class, 'listausers'])->name('user.listausers');
    Route::get('/admin/empleados', [PanelAdminController::class, 'listausersempleados'])->name('user.listaempleados');
    Route::get('/admin/usuariosuni', [PanelAdminController::class, 'listauseronly'])->name('user.listauseronly');

    // Listados y CRUD varios (admin)
    Route::get('/admin/listar_marca', [PanelAdminController::class, 'listar_marca'])->name('adminlista.listar_dos');
    Route::get('/admin/listar_modelo', [PanelAdminController::class, 'listar_modelo'])->name('adminlista.listar_tres');
    Route::get('/admin/listar', [PanelAdminController::class, 'listar'])->name('adminlista.listar');
    Route::get('/admin/lista_registrada', [PanelAdminController::class, 'lista_Registrada'])->name('adminlistaR.lista_registrada');

    Route::get('/admin/asociar', [PanelAdminController::class, 'asociar'])->name('adminaso.asociar');
    Route::get('/admin/asociar/mod', [PanelAdminController::class, 'asociarmod'])->name('adminaso.asociarmod');
    Route::post('/admin/store_aso/mod', [PanelAdminController::class, 'storeasomod'])->name('adminasomod.storeasomod');

    // Create views para admin
    Route::get('/admin/create', [PanelAdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/create_dos', [PanelAdminController::class, 'create_dos'])->name('admin.create_dos');
    Route::get('/admin/create_tres', [PanelAdminController::class, 'create_tres'])->name('admin.create_tres');

    // Almacenes / stores para admin
    Route::post('/admin/store_aso', [PanelAdminController::class, 'storeaso'])->name('adminaso.storeaso');
    Route::post('/admin/store', [PanelAdminController::class, 'store'])->name('admin.store');
    Route::post('/admin/store_dos', [PanelAdminController::class, 'store_dos'])->name('admin.store_dos');
    Route::post('/admin/store_tres', [PanelAdminController::class, 'store_tres'])->name('admin.store_tres');
    Route::post('/admin/stores', [PanelAdminController::class, 'stores'])->name('admin.stores');

    // Eliminación desde admin (lista registrada)
    Route::delete('/admin/lista_registrada/{hdv}', [PanelAdminController::class, 'destroy'])->name('adminlistarR.destroy');

    // Rutas auxiliares para obtener marcas/modelos (pueden usarse en AJAX)
    Route::get('/marcas/{equipo_id}', [EquipoController::class, 'getMarcas']);
    Route::get('/modelos/{marca_id}', [EquipoController::class, 'getModelos']);

    // Gestión de usuarios/propiedades desde admin
    Route::put('/admin/{user}', [PanelAdminController::class, 'update'])->name('user.updateuser');
    Route::get('/admin/{user}/edit', [PanelAdminController::class, 'edituser'])->name('user.edituser');

    Route::put('/admin/prop/{prop}', [PanelAdminController::class, 'updateprop'])->name('propiedad.updateprop');
    Route::get('/admin/prop/{prop}/edit', [PanelAdminController::class, 'editpropiedad'])->name('propiedad.editpropiedad');
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas por autenticación (usuarios normales)
|--------------------------------------------------------------------------
| Aquí van las rutas que requieren que el usuario esté autenticado (auth).
*/
Route::middleware('auth')->group(function () {

    // Ver PDF de checklist (ejemplo)
    Route::get('/documento/{id}/ver', [CheckListController::class, 'verPDF']);

    // Endpoints para poblar selects (AJAX) - modelos/marcas según selección
    Route::get('/get-modelos/{equipo_id}', function ($equipo_id) {
        return response()->json(Modelo::where('equipo_id', $equipo_id)->get());
    });
    Route::get('/get-marcas/{modelo_id}', function ($modelo_id) {
        return response()->json(Marca::where('equipo_id', $modelo_id)->get());
    });

    // Rutas del controlador de equipos (alternativas)
    Route::get('/marcas/{equipo_id}', [EquipoController::class, 'getMarcas']);
    Route::get('/modelos/{marca_id}', [EquipoController::class, 'getModelos']);

    // Ruta auxiliar para listar equipos (se usa en formulario)
    Route::get('/equipos', [EquipoController::class, 'stores']);

    // Hoja de vida: mostrar / descargar / listar
    Route::get('/hojadevida/{id}/show', [HojadevidaController::class, 'show'])->name('hojadevida.show');

    // Resource para empleados
    Route::resource('empleips', EmpleipsController::class);

    // Descargar PDF (por id)
    Route::get('/descargar-pdf/{id}', [HojadevidaController::class, 'downloadPDF'])->name('descargar.pdf');

    // Actualizar usuario (ruta reutilizada con HojadevidaController en tu proyecto original)
    Route::put('/user/{user}', [HojadevidaController::class, 'update'])->name('user.updateusers');
    Route::get('/user/{user}/edit', [HojadevidaController::class, 'edituser'])->name('user.editusers');

    // Listado principal de hojas de vida
    Route::get('hojadevida/listar', [HojadevidaController::class, 'listar'])->name('hojadevida.listar');

    /**
     * Ruta nueva para la búsqueda desde la vista 'hoja_ver'
     * - Nombre principal: hojadevida.mostrarbusqueda (recomendado)
     * - Nombre adicional 'mostrarbusqueda' añadido por compatibilidad
     *
     * Ambas apuntan al mismo método: HojadevidaController::mostrarbusqueda
     */
    Route::get('hojadevida/mostrarbusqueda', [HojadevidaController::class, 'mostrarbusqueda'])
        ->name('hojadevida.mostrarbusqueda');

    // Ruta adicional con nombre corto por compatibilidad (si alguna vista la llama)
    Route::get('mostrarbusqueda', [HojadevidaController::class, 'mostrarbusqueda'])
        ->name('mostrarbusqueda');

    // Rutas para crear/store desde formulario (POST)
    Route::post('/hojadevida/stores', [HojadevidaController::class, 'stores'])->name('hojadevida.stores');

    // Nota: antes el nombre de la ruta delete era 'hojadevida.stores' (colisión).
    // Lo cambié a 'hojadevida.destroy' para evitar nombres duplicados (más lógico).
    Route::delete('/hojadevida/{dato}', [HojadevidaController::class, 'destroy'])->name('hojadevida.destroy');

    // Repetición (se deja la otra show por compatibilidad aunque ya existe arriba)
    Route::get('hojadevida/{hdv}', [HojadevidaController::class, 'show'])->name('hojadevida.show');

    // Rutas de cronogramas/calibración/checklists
    Route::get('crono_cali/listar', [CaliCronoController::class, 'listarcali'])->name('cronocali.listarcali');
    Route::get('crono_cali/propiedadbuscar', [CaliCronoController::class, 'propiedadbuscarcali'])->name('cronocali.propiedadbuscarcali');
    Route::get('crono_cali/propiedad', [CaliCronoController::class, 'propiedadCali'])->name('cronocali.propiedad');

    Route::get('check_list/listar', [CheckListController::class, 'listarchecklist'])->name('check_list.listarchecklisti');
    Route::get('check_list/propiedadbuscar', [CheckListController::class, 'propiedadbuscarchecklist'])->name('check_list.propiedadbuscarchecklist');
    Route::get('check_list/propiedad', [CheckListController::class, 'propiedadchecklist'])->name('check_list.propiedad');

    // Mantenimientos / cronogramas
    Route::get('manto_crono/listar', [MantoCronoController::class, 'listar'])->name('mantocrono.listar');
    Route::get('manto_crono/propiedadbuscar', [MantoCronoController::class, 'propiedadbuscar'])->name('mantocrono.propiedadbuscar');
    Route::get('manto_crono/propiedad', [MantoCronoController::class, 'propiedad'])->name('mantocrono.propiedad');
    Route::get('manto_crono/create', [MantoCronoController::class, 'create'])->name('mantocrono.create');

    Route::get('alarma_calibracion', [MantoCronoController::class, 'listar_alarma'])->name('alarma');
    Route::get('inventario', [MantoCronoController::class, 'listar_inventario'])->name('inventario');

    // Vista para 'ver hoja de vida' (manto cronos)
    Route::get('verhojadevida', [MantoCronoController::class, 'verhojadevida'])->name('hoja_ver');

    // Rutas para vistas estáticas o helper pages
    Route::get('/orden_trabajo', function () { return view('orden_trabajo'); });
    Route::get('/mantenimiento_demosta', function () { return view('mantenimiento_demosta'); });
    Route::get('/editar_HV', function () { return view('editar_HV'); });
    Route::get('/descargar_hv', function () { return view('descargar_hv'); });
    Route::get('/reporte_de_servicio', function () { return view('reporte_de_servicio'); });
    Route::get('/manto_crono_cal', function () { return view('manto_crono_cal'); });
    Route::get('/sopor_reporte_manto', function () { return view('sopor_reporte_manto'); });
    Route::get('/ingreso_hoja_de_vida', function () { return view('ingreso_hoja_de_vida'); });

    // Menu / vistas básicas
    Route::get('/menu', function () { return view('menu'); })->name('menu');
    Route::get('/hojas_vida', function () { return view('hojas_vida'); })->name('hoja_vida');
    Route::get('/subir_soporte', function () { return view('subir_soporte'); });
    Route::get('/mantenimiento', function () { return view('mantenimiento'); })->name('mantenimiento');
    Route::get('/soporte', function () { return view('soporte'); })->name('soporte');

    // Dashboard protegido
    Route::get('/dashboard', function () { return view('admin.layouts.app'); })->middleware(['auth', 'verified'])->name('dashboard');

    // Registro de usuario (vista)
    Route::get('/usuario/registro', function () { return view('admin.users.registro'); })->middleware(['auth', 'verified'])->name('users.create');
});

/*
|--------------------------------------------------------------------------
| Perfil / edición de profile (protegido)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'ver'])->name('profile.edit');
    Route::patch('/profiless', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profilesss', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Rutas públicas residuales / recurso usuarios web
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';

// Resource controller para usuarios web (API/CRUD)
Route::resource('usuarios', UsuarioWebController::class);

// Fin de archivo
