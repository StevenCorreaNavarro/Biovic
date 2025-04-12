<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicio;
use App\Models\nombreEquipo;
use App\Models\tecPredo;
use App\Models\codEcri;
use App\Models\claRiesgo;
use App\Models\claBiome;
use App\Models\claUso;
use App\Models\formaAdqui;
use App\Models\propiedad;
use App\Models\magFuenAlimen;
use App\Models\magVol;
use App\Models\equipo;
use App\Models\marca;
use App\Models\user;
use App\Models\modelo;
use App\Models\hojadevida;
use App\Models\PanelAdmin;
use App\Models\equipoMarca;
use Dompdf\Dompdf;

use Dompdf\Options;

class PanelAdminController extends Controller
{


    
    // public function create()
    // {
    //     $equipos = Equipo::all();
    //     return view('equipos.create', compact('equipos'));
    // }

    // public function store(Request $request)
    // {
    //     // Validación
    //     $request->validate([
    //         'equipo_id' => 'required|exists:equipos,id',
    //         'marca' => 'required|string|max:255',
    //         'modelos' => 'required|array',
    //         'modelos.*' => 'string|max:255'
    //     ]);

    //     // Crear la marca
    //     $marca = Marca::create([
    //         'nombre_marca' => $request->marca,
    //         'equipo_id' => $request->equipo_id
    //     ]);

    //     // Crear los modelos
    //     foreach ($request->modelos as $modeloNombre) {
    //         Modelo::create([
    //             'nombre_modelo' => $modeloNombre,
    //             'marca_id' => $marca->id
    //         ]);
    //     }

    //     return redirect()->back()->with('success', 'Datos guardados correctamente');
    // }

    // public function index()
    // {
    //     $equipos = Equipo::with('marcas.modelos')->get();
    //     return view('equipos.index', compact('equipos'));
    // }

    // $hdvs = hojadevida::orderBy('id', 'desc')->get();
    //     // $hdvs = hojadevida::with('equipo')->get();
    //     $query = Hojadevida::with('equipo','servicio');

    //     // Filtrar por el nombre del equipo si se ingresa un término en el buscador
    //     if ($request->has('search')) {
    //         $search = $request->input('search');
    //         $query->whereHas('equipo', function ($q) use ($search) {
    //             $q->where('nombre_equipo', 'LIKE', "%$search%");
    //         });
    //     }

    //     $hdvs = $query->get();

    public function listausers(Request $request)
    {
        $query = User::query(); // Consulta base sin relaciones innecesarias

        // Filtrar por el nombre si hay un término de búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('contact', 'LIKE', "%$search%")
                    ->orWhere('role', 'LIKE', "%$search%")
                    ->orWhere('identity', 'LIKE', "%$search%");
            });
        }
        $users = $query->orderBy('id', 'desc')->get();
        return view('users.lista', compact('users'));
    }


    
    public function listauseronly()
    {
        $users = User::whereNotIn('role', ['admin', 'empleado'])->orderBy('id', 'desc')->get();

        return view('users.lista', compact('users'));
    }






    public function listausersempleados()
    {
        $users = User::whereIn('role', ['admin', 'empleado'])
            ->orderBy('id', 'desc')
            ->get();
        return view('users.lista', compact('users'));
    }

    public function index()
    {
        return view('admin.admin.layouts.app');
    }

    public function listar()
    {
        $hdvs = Equipo::orderBy('id', 'desc')->get();
        return view('equipos.listar', compact('hdvs'));
    }

    public function listar_marca()
    {
        $hdvs = Marca::orderBy('id', 'desc')->get();
        return view('equipos.listar_dos', compact('hdvs'));
    }
    public function listar_modelo()
    {
        $hdvs = Modelo::orderBy('id', 'desc')->get();
        return view('equipos.listar_tres', compact('hdvs'));
    }
    public function lista_Registrada()
    {
        $hdvs = hojadevida::orderBy('id', 'desc')->get();
        // $hdvs = hojadevida::with('equipo')->get();
        $query = Hojadevida::with('equipo', 'servicio');

        // Filtrar por el nombre del equipo si se ingresa un término en el buscador
        // if ($request->has('search')) {
        //     $search = $request->input('search');
        //     $query->whereHas('equipo', function ($q) use ($search) {
        //         $q->where('nombre_equipo', 'LIKE', "%$search%");
        //     });
        // }

        $hdvs = $query->get();
        return view('equipos.listarGeneral', compact('hdvs'));
    }
    public function create()
    {
        // $nombreservicios = Servicio::all();
        $nombreEquipos = NombreEquipo::all();
        $equipos = Equipo::all();
        // $tecPredos = TecPredo::all();
        // $codiecri = codEcri::all();
        // $clariesgo = Clariesgo::all();
        // $clabiomedica = ClaBiome::all();
        // $clauso = ClaUso::all();
        // $formaadqui = Formaadqui::all();
        // $nombreempresa = Propiedad::all();
        // $nombrealimentacion = magFuenAlimen::all(); //
        // $abreviacionvolumen = magVol::all(); //
        // return view('equipos.create', compact('nombreEquipos', 'nombreservicios', 'tecPredos', 'codiecri', 'clariesgo', 'clabiomedica', 'clauso', 'formaadqui', 'equipos', 'nombreempresa', 'nombrealimentacion', 'abreviacionvolumen'));
        return view('equipos.create', compact('nombreEquipos', 'equipos'));
    }
    public function create_dos()
    {
        // $nombreservicios = Servicio::all();
        // $nombreEquipos = NombreEquipo::all();
        $marcas = Marca::all();
        // $tecPredos = TecPredo::all();
        // $codiecri = codEcri::all();
        // $clariesgo = Clariesgo::all();
        // $clabiomedica = ClaBiome::all();
        // $clauso = ClaUso::all();
        // $formaadqui = Formaadqui::all();
        // $nombreempresa = Propiedad::all();
        // $nombrealimentacion = magFuenAlimen::all(); //
        // $abreviacionvolumen = magVol::all(); //
        // return view('equipos.create', compact('nombreEquipos', 'nombreservicios', 'tecPredos', 'codiecri', 'clariesgo', 'clabiomedica', 'clauso', 'formaadqui', 'equipos', 'nombreempresa', 'nombrealimentacion', 'abreviacionvolumen'));
        return view('equipos.create_dos', compact('marcas'));
    }
    public function create_tres()
    {
        // $nombreservicios = Servicio::all();
        // $nombreEquipos = NombreEquipo::all();
        $modelos = Modelo::all();
        // $tecPredos = TecPredo::all();
        // $codiecri = codEcri::all();
        // $clariesgo = Clariesgo::all();
        // $clabiomedica = ClaBiome::all();
        // $clauso = ClaUso::all();
        // $formaadqui = Formaadqui::all();
        // $nombreempresa = Propiedad::all();
        // $nombrealimentacion = magFuenAlimen::all(); //
        // $abreviacionvolumen = magVol::all(); //
        // return view('equipos.create', compact('nombreEquipos', 'nombreservicios', 'tecPredos', 'codiecri', 'clariesgo', 'clabiomedica', 'clauso', 'formaadqui', 'equipos', 'nombreempresa', 'nombrealimentacion', 'abreviacionvolumen'));
        return view('equipos.create_tres', compact('modelos'));
    }

    public function asociarmod(Request $request)
    {
        // $datoma = Equipo::with('marcas')->get();
        // $datoma = Equipo::all();
        $datoma = Marca::with('equipo')->get();
        $datomo = Modelo::all();

        return view('equipos.asociardos', compact('datoma', 'datomo'));
    }
    public function storeasomod(Request $request)
    {
        $datos = new Modelo();
        $datos->nombre_modelo = $request->nombre_modelo;
        $datos->marca_id = $request->marca_id;
        $datos->save();
        return redirect()->route('hojadevida.create'); // para llevar al la lista o direccionar ruta
    }

    public function asociar(Request $request)
    {
        $datom = Marca::all();
        $datoe = Equipo::all();
        return view('equipos.asociar', compact('datoe', 'datom'));
    }

    public function storeaso(Request $request)
    {
        $datom = new Marca();
        $datom->nombre_marca = $request->nombre_marca;
        $datom->equipo_id = $request->equipo_id;
        $datom->save();
        return redirect()->route('adminaso.asociarmod'); // para llevar al la lista o direccionar ruta
    }

    public function store_tres(Request $request)
    {
        $request->validate(
            [
                'nombre_modelo' => 'required|string|unique:modelos,nombre_modelo', // Cambia 'usuarios' por tu tabla
            ],
            [
                'nombre_modelo.unique' => 'Solo se admite registro unico.',
            ],
        );
        Modelo::create([
            'nombre_modelo' => $request->nombre_modelo,
        ]);
        return redirect()->route('admin.create_tres')->with('success', 'Registro guardado correctamente.');
    }
    public function store_dos(Request $request)
    {
        $request->validate(
            [
                'nombre_marca' => 'required|string|unique:marcas,nombre_marca', // Cambia 'usuarios' por tu tabla
            ],
            [
                'nombre_marca.unique' => 'Solo se admite registro unico.',
            ],
        );
        Marca::create([
            'nombre_marca' => $request->nombre_marca,
        ]);
        return redirect()->route('admin.create_tres')->with('success', 'Registro guardado correctamente.');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre_equipo' => 'required|string|unique:equipos,nombre_equipo', // Cambia 'usuarios' por tu tabla
            ],
            [
                'nombre_equipo.unique' => 'Solo se admite registro unico.',
            ],
        );
        // Si pasa la validación, guardar el registro
        Equipo::create([
            'nombre_equipo' => $request->nombre_equipo,
        ]);
        return redirect()->route('adminaso.asociar')->with('success', 'Registro guardado correctamente.');

        // $hdv = new Equipo(); //modelo  de la tabla donde se va a guardar los datos
        // $request->validate([
        //      'nombre_equipo' => 'required|string|max:255',
        //     'perioCali' => 'required|string',
        //     'fechaCali' => 'nullable|date',
        //     // 'foto' => 'required|max:10000|mimes:jpeg,png,jpg,gif,svg',
        // ]);
        // $hdv->equipo_id = $request->equipo_id;
        // $hdv->modelo_id = $request->modelo_id;
        // $hdv->marca_id = $request->marca_id;
        // $hdv->equipos = $request->equipos;
        // $hdv->nombre_equipo = $request->nombre_equipo;
        // $hdv->servicio_id = $request->servicio_id;
        // $hdv->serie = $request->serie;
        // $hdv->tec_predo_id = $request->tec_predo_id;
        // $hdv->perioCali = $request->perioCali;
        // $hdv->fechaCali = $request->fechaCali;
        // $hdv->cod_ecris = $request->cod_ecris;
        // $hdv->actFijo = $request->actFijo;
        // $hdv->Estado = $request->Estado;
        // if ($request->hasFile('foto')) {
        //     $hdv->foto = $request->file('foto')->store('public/fotos');
        //     $hdv->foto = str_replace('public/', '', $hdv->foto); // Eliminar 'public/' para la BD
        // }
        // $hdv->perioCali = $request->input('perioCali');
        // // Solo establecer fechaCali si perioCali es 'anual'
        // if (strtolower($request->input('perioCali')) === 'Anual') {
        //     $hdv->fechaCali = $request->input('fechaCali');
        // } else {
        //     $hdv->fechaCali = null;
        // }
        // dd($request->all());
        // $hdv->save();
        // return redirect()->route('admin.listar');        // para llevar al la lista o direccionar a listar ojo
    }

    public function show($id) {}

    public function update(Request $request, User $user)
    {
        $user->role = $request->role;
        $user->name = $request->name;
        $user->identity = $request->identity;
        $user->foto = $request->foto;
        $user->contact = $request->contact;
        $user->adress = $request->adress;
        $user->profession = $request->profession;
        $user->post = $request->post;
        $user->email = $request->email;
      
        
        $user->save();

        return redirect()->route('user.listausers');
    }
       //Update
  
    public function edituser(User $user)
    {
        return view('users.edit', compact('user'));
    
    }


    

    public function destroy(hojadevida $hdv)
    {
        $hdv->delete();
        return redirect()->route('adminlistaR.lista_registrada');
    }
}
