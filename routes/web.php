<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\UsuarioWebController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\FlareClient\View;

use App\Http\Controllers\HojadevidaController;
use App\Http\Controllers\EmpleipsController;
// use App\Http\Controllers\EquipoController;

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EquiposController;
// use App\Models\Modelo;
use Illuminate\Http\Request;
use App\Models\Marca;

use App\Models\Modelo;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ comienzo esta parte es para llenar equipos->modelo->marca

Route::get('/get-modelos/{equipo_id}', function ($equipo_id) {
    return response()->json(Modelo::where('equipo_id', $equipo_id)->get());
});
Route::get('/get-marcas/{modelo_id}', function ($modelo_id) {
    return response()->json(Marca::where('equipo_id', $modelo_id)->get());
});
Route::get('/get-modelo/{equipo_id}', [EquipoController::class, 'getModelos']);
Route::get('/get-marca/{equipo_id}', [EquipoController::class, 'getMarcas']);

// Obtener marcas según el modelo seleccionado
Route::get('/get-marcas/{modelo_id}', function ($modelo_id) {
    return response()->json(Marca::where('modelo_id', $modelo_id)->get());
});

Route::get('/equipos', [EquipoController::class, 'store']);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ fin esta parte es para llenar equipos->modelo->marca

Route::resource('hojadevida',HojadevidaController::class);
// acceder a show
Route::get('/hojadevida/{id}/show', [HojadevidaController::class, 'show'])->name('hojadevida.show');


Route::resource('empleips', EmpleipsController::class);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|sopor_reporte_manto
*/
Route::get('/', function () {
    Alert::success(' Titulo de la alerta','mensaje de la alerta');
    // toast('Ejemplo del toast')->success('ejemplo del tost');
    return view('main');
    // return View('admin.layouts.app');
});

Route::get('/main', function () {
    // Alert::success(' Titulo de la alerta','mensaje de la alerta');
    // toast('Ejemplo del toast')->success('ejemplo del tost');
    return view('main');
    // return View('admin.layouts.app');
});
Route::get('/menuing', function () {
    Alert::success(' Bienvenido!','Ingreso exitoso');
    // toast('Ejemplo del toast')->success('ejemplo del tost');
    return view('menu');
    // return View('admin.layouts.app');
    
})->name('menu');
Route::get('/alarma_calibracion', function ()  {return view('alarma_calibracion');});
Route::get('/mantenimiento_demosta', function ()  {return view('mantenimiento_demosta');});
Route::get('/inventario', function ()  {return view('inventario');});

Route::get('/manto_crono', function ()  {return view('manto_crono');});
Route::get('/editar_HV', function ()  {return view('editar_HV');});
Route::get('/descargar_hv', function ()  {return view('descargar_hv');});
Route::get('/hoja_ver', function ()  {return view('hoja_ver');});
Route::get('/reporte_de_servicio', function ()  {return view('reporte_de_servicio');});
Route::get('/manto_crono_cal', function ()  {return view('manto_crono_cal');});
Route::get('/sopor_reporte_manto', function ()  {return view('sopor_reporte_manto');});
Route::get('/ingreso_hoja_de_vida', function ()  {return view('ingreso_hoja_de_vida');});
Route::get('/menu', function ()                  {return view('menu');})->name('menu');//+++++++++++++++++++
Route::get('/hojas_vida', function ()            {return view('hojas_vida');})->name('hoja_vida');
Route::get('/subir_soporte', function ()            {return view('subir_soporte');});
Route::get('/mantenimiento', function ()            {return view('mantenimiento');})->name('mantenimiento');
Route::get('/soporte', function ()            {return view('soporte');})->name('soporte');

Route::get('/dashboard', function () {
    return view('admin.layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/usuario/registro', function () {
    return view('admin.users.registro');
})->middleware(['auth', 'verified'])->name('users.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::resource('usuarios',UsuarioWebController::class);


//+++++++++++++++++++++++++++++++++++++++++++++++++
// Route::get('curso/listar',[CursoController::class,'listar'])->name('curso.listar');
// Route::get('curso/create',[CursoController::class,'create'])->name('curso.create');
// Route::post('curso/store', [CursoController::class,'store'])->name('curso.store');
// Route::get('curso/{curso}',[CursoController::class,'show'])->name('curso.show');
// Route::put('curso/{curso}',[CursoController::class,'update'])->name('curso.update'); //actualizacion de datos
// Route::delete('curso/{curso}',[CursoController::class,'destroy'])->name('curso.destroy');
// Route::get('curso/{curso}/editar',[CursoController::class,'edit'])->name('curso.edit');   //actualizacion de datos