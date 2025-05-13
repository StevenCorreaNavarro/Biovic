<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\UsuarioWebController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\FlareClient\View;
use App\Http\Controllers\HojadevidaController;
use App\Http\Controllers\EmpleipsController;
use App\Http\Controllers\PanelAdminController;
use App\Http\Controllers\MantoCronoController;
use App\Http\Controllers\CaliCronoController;
use App\Http\Controllers\CheckListController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\CodEcriController; // agregado para enviar codigo ecri
use App\Models\hojadevida;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\PanelAdmin;



// guardado hoy 4 abril 11:11
Route::get('main', function () {
    // Alert::success(' Titulo de la alerta','mensaje de la alerta');
    // toast('Ejemplo del toast')->success('ejemplo del tost');
    return view('main');
    // return View('admin.layouts.app');
});
Route::get('/', function () {
    Alert::success(' Titulo de la alerta', 'mensaje de la alerta');
    // toast('Ejemplo del toast')->success('ejemplo del tost');
    return view('main');
    // return View('admin.layouts.app');
});

Route::get('/empleados', function () {
    return view('empleips.form');
})->name('empleados');
Route::post('hojadevida/actualizar-meses', [HojadevidaController::class, 'actualizarMeses'])->name('actualizarMeses');
Route::get('/hojadevida/resultado_lista', [HojadevidaController::class, 'busqueda'])->name('busqueda');
//###################################################################################################### GRUPO RUTAS PARA ADMIN Y EMPLEADOS
Route::middleware(['auth', 'role:Admin,Empleado'])->group(function () {
    Route::get('/hojadevida/creates', [HojadevidaController::class, 'creates'])->name('hojadevida.creates');
    Route::get('/hojadevida/create', [HojadevidaController::class, 'create'])->name('hojadevida.create');
    Route::post('/hojadevida/store', [HojadevidaController::class, 'store'])->name('hojadevida.store');
});


//######################################################################################################## GRUPOS RUTAS ADMINISTRADOR COMIENZO
Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin.layouts.app');
    })->name('adminad.dashboard');

    // Route::get('/admin/create', function () {return view('admin.admin.layouts.app');})->name('admin.dashboard');
    Route::get('/equipos/{id}/seleccionar-marcas', [PanelAdminController::class, 'mostrarFormulario'])->name('equipos.mostrarFormulario');
    Route::post('/equipos/{id}/asignar-marcas', [PaneladminController::class, 'asignarMarcas'])->name('equipos.asignarMarcas');

    Route::get('/admin/usuarios', [PanelAdminController::class, 'listausers'])->name('user.listausers');
    Route::get('/admin/empleados', [PanelAdminController::class, 'listausersempleados'])->name('user.listaempleados');
    Route::get('/admin/usuariosuni', [PanelAdminController::class, 'listauseronly'])->name('user.listauseronly');

    Route::get('/admin/listar_marca', [PanelAdminController::class, 'listar_marca'])->name('adminlista.listar_dos');
    Route::get('/admin/listar_modelo', [PanelAdminController::class, 'listar_modelo'])->name('adminlista.listar_tres');
    Route::get('/admin/listar', [PanelAdminController::class, 'listar'])->name('adminlista.listar');
    Route::get('/admin/lista_registrada', [PanelAdminController::class, 'lista_Registrada'])->name('adminlistaR.lista_registrada');

    Route::get('/admin/asociar', [PanelAdminController::class, 'asociar'])->name('adminaso.asociar');
    Route::get('/admin/asociar/mod', [PanelAdminController::class, 'asociarmod'])->name('adminaso.asociarmod');
    Route::post('/admin/store_aso/mod', [PanelAdminController::class, 'storeasomod'])->name('adminasomod.storeasomod');

    Route::get('/admin/create', [PanelAdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/create_dos', [PanelAdminController::class, 'create_dos'])->name('admin.create_dos');
    Route::get('/admin/create_tres', [PanelAdminController::class, 'create_tres'])->name('admin.create_tres');

    Route::post('/admin/store_aso', [PanelAdminController::class, 'storeaso'])->name('adminaso.storeaso');
    Route::post('/admin/store', [PanelAdminController::class, 'store'])->name('admin.store');
    Route::post('/admin/store_dos', [PanelAdminController::class, 'store_dos'])->name('admin.store_dos');
    Route::post('/admin/store_tres', [PanelAdminController::class, 'store_tres'])->name('admin.store_tres');
    Route::post('/admin/stores', [PanelAdminController::class, 'stores'])->name('admin.stores');
    Route::post('/admin/store_aso', [PanelAdminController::class, 'storeaso'])->name('adminaso.storeaso');
    Route::delete('/admin/lista_registrada/{hdv}', [PanelAdminController::class, 'destroy'])->name('adminlistarR.destroy');

    Route::get('/marcas/{equipo_id}', [EquipoController::class, 'getMarcas']);
    Route::get('/modelos/{marca_id}', [EquipoController::class, 'getModelos']);
    Route::put('/admin/{user}', [PanelAdminController::class, 'update'])->name('user.updateuser');
    Route::get('/admin/{user}/edit', [PanelAdminController::class, 'edituser'])->name('user.edituser');

    Route::put('/admin/prop/{prop}', [PanelAdminController::class, 'updateprop'])->name('propiedad.updateprop');
    Route::get('/admin/prop/{prop}/edit', [PanelAdminController::class, 'editpropiedad'])->name('propiedad.editpropiedad');

    // Route::get('tiendas_oficiales',[UnitController::class,'listar'])->name('unit.listar');  
    // Route::get('unidad/create',[UnitController::class,'create'])->name('unit.create');
    // Route::post('unidad/store', [UnitController::class,'store'])->name('unit.store');
    // Route::get('unidad/{unit}', [UnitController::class, 'show'])->name('unit.show');
    // Route::put('unidad/{unit}',[UnitController::class,'update'])->name('unit.update');
    // Route::get('unidad/{unit}/editar',[UnitController::class,'edit'])->name('unit.edit');
    // Route::delete('unidad/{unit}',[UnitController::class,'destroy'])->name('unit.destroy');
});
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ GRUPOS RUTAS ADMINISTRADOR FIN



//#################################################################################################### comienzo INGRESO USUARIO NORMAL
Route::middleware('auth')->group(function () {
    Route::get('/documento/{id}/ver', [ChecklistController::class, 'verPDF']);

    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ comienzo esta parte es para llenar equipos->modelo->marca
    Route::get('/get-modelos/{equipo_id}', function ($equipo_id) {
        return response()->json(Modelo::where('equipo_id', $equipo_id)->get());
    });
    Route::get('/get-marcas/{modelo_id}', function ($modelo_id) {
        return response()->json(Marca::where('equipo_id', $modelo_id)->get());
    });
    Route::get('/marcas/{equipo_id}', [EquipoController::class, 'getMarcas']);
    Route::get('/modelos/{marca_id}', [EquipoController::class, 'getModelos']);
    // Obtener marcas según el modelo seleccionado
    Route::get('/get-marcas/{modelo_id}', function ($modelo_id) {
        return response()->json(Marca::where('modelo_id', $modelo_id)->get());
    });
    Route::get('/equipos', [EquipoController::class, 'stores']);
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ fin esta parte es para llenar equipos->modelo->marca
    Route::get('/hojadevida/{id}/show', [HojadevidaController::class, 'show'])->name('hojadevida.show');


    Route::resource('empleips', EmpleipsController::class);


    //####################################################################### DESCARGAR PDF
    Route::get('/descargar-pdf/{id}', [HojadevidaController::class, 'downloadPDF'])->name('descargar.pdf');

    Route::put('/user/{user}', [HojadevidaController::class, 'update'])->name('user.updateusers');
    Route::get('/user/{user}/edit', [HojadevidaController::class, 'edituser'])->name('user.editusers');

    Route::get('hojadevida/listar', [HojadevidaController::class, 'listar'])->name('hojadevida.listar');
    Route::post('/hojadevida/stores', [HojadevidaController::class, 'stores'])->name('hojadevida.stores');
    Route::delete('/hojadevida/{dato}', [HojadevidaController::class, 'destroy'])->name('hojadevida.stores');
    Route::get('hojadevida/{hdv}', [HojadevidaController::class, 'show'])->name('hojadevida.show');

    Route::get('crono_cali/listar', [CaliCronoController::class, 'listarcali'])->name('cronocali.listarcali');
    Route::get('crono_cali/propiedadbuscar', [CaliCronoController::class, 'propiedadbuscarcali'])->name('cronocali.propiedadbuscarcali');
    Route::get('crono_cali/propiedad', [CaliCronoController::class, 'propiedadCali'])->name('cronocali.propiedad');

    Route::get('check_list/listar', [CheckListController::class, 'listarchecklist'])->name('check_list.listarchecklisti');
    Route::get('check_list/propiedadbuscar', [CheckListController::class, 'propiedadbuscarchecklist'])->name('check_list.propiedadbuscarchecklist');
    Route::get('check_list/propiedad', [CheckListController::class, 'propiedadchecklist'])->name('check_list.propiedad');

    Route::get('manto_crono/listar', [MantoCronoController::class, 'listar'])->name('mantocrono.listar');
    Route::get('manto_crono/propiedadbuscar', [MantoCronoController::class, 'propiedadbuscar'])->name('mantocrono.propiedadbuscar');
    Route::get('manto_crono/propiedad', [MantoCronoController::class, 'propiedad'])->name('mantocrono.propiedad');
    Route::get('manto_crono/create', [MantoCronoController::class, 'create'])->name('mantocrono.create');

    Route::get('alarma_calibracion', [MantoCronoController::class, 'listar_alarma'])->name('alarma');
    Route::get('inventario', [MantoCronoController::class, 'listar_inventario'])->name('inventario');

    Route::get('verhojadevida', [MantoCronoController::class, 'verhojadevida'])->name('hoja_ver');

    // Route::get('/manto_crono', function ()  {return view('manto_crono');});

    Route::get('/orden_trabajo', function () {
        return view('orden_trabajo');
    });

    Route::get('/mantenimiento_demosta', function () {
        return view('mantenimiento_demosta');
    });

    Route::get('/mantenimiento_demosta', function () {
        return view('mantenimiento_demosta');
    });
    // Route::get('/inventario', function () {
    //     return view('inventario');
    // });
    Route::get('/editar_HV', function () {
        return view('editar_HV');
    });
    Route::get('/descargar_hv', function () {
        return view('descargar_hv');
    });
    // Route::get('/hoja_ver', function () {
    //     return view('hoja_ver');
    // });
    Route::get('/reporte_de_servicio', function () {
        return view('reporte_de_servicio');
    });
    Route::get('/manto_crono_cal', function () {
        return view('manto_crono_cal');
    });
    Route::get('/sopor_reporte_manto', function () {
        return view('sopor_reporte_manto');
    });
    Route::get('/ingreso_hoja_de_vida', function () {
        return view('ingreso_hoja_de_vida');
    });
    Route::get('/menu', function () {
        return view('menu');
    })->name('menu'); //+++++++++++++++++++
    Route::get('/hojas_vida', function () {
        return view('hojas_vida');
    })->name('hoja_vida');
    Route::get('/subir_soporte', function () {
        return view('subir_soporte');
    });
    Route::get('/mantenimiento', function () {
        return view('mantenimiento');
    })->name('mantenimiento');
    Route::get('/soporte', function () {
        return view('soporte');
    })->name('soporte');

    Route::get('/dashboard', function () {
        return view('admin.layouts.app');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/usuario/registro', function () {
        return view('admin.users.registro');
    })->middleware(['auth', 'verified'])->name('users.create');
});
//########################################################################################fin ingresar primero para navegar FIN USUARIO NORMAL

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'ver'])->name('profile.edit');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiless', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profilesss', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', function () {
    Alert::success(' Bienvenido!', 'Ingreso exitoso');
    // toast('Ejemplo del toast')->success('ejemplo del tost');
    return view('main');
    // return View('admin.layouts.app');
})->name('menu');

require __DIR__ . '/auth.php';

route::resource('usuarios', UsuarioWebController::class);

// ->middleware('auth')
//+++++++++++++++++++++++++++++++++++++++++++++++++
// Route::get('curso/listar',[CursoController::class,'listar'])->name('curso.listar');
// Route::get('curso/create',[CursoController::class,'create'])->name('curso.create');
// Route::post('curso/store', [CursoController::class,'store'])->name('curso.store');
// Route::get('curso/{curso}',[CursoController::class,'show'])->name('curso.show');
// Route::put('curso/{curso}',[CursoController::class,'update'])->name('curso.update'); //actualizacion de datos
// Route::delete('curso/{curso}',[CursoController::class,'destroy'])->name('curso.destroy');
// Route::get('curso/{curso}/editar',[CursoController::class,'edit'])->name('curso.edit');   //actualizacion de datos