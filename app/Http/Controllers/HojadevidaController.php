<?php

namespace App\Http\Controllers;

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

use App\Models\hojadevida;
use Illuminate\Http\Request;

class HojadevidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function listar(Request $request)
    {
        // $hdvs = hojadevida::with('equipo')->get();
        $query = Hojadevida::with('equipo');

    // Filtrar por el nombre del equipo si se ingresa un término en el buscador
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->whereHas('equipo', function ($q) use ($search) {
            $q->where('nombre_equipo', 'LIKE', "%$search%");
            

        });
    }

    $hdvs = $query->get();
    return view('hojadevida.listar', compact('hdvs'));
        
        
        // $hdvs = Hojadevida::orderBy('id', 'desc')->get();
        // return view('hojadevida.listar', compact('hdvs'));
    }

    public function index()
    {
        $datos['hojadevida'] = Hojadevida::paginate(10); //
        return view('hojadevida.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function creates()
    {
        return view('hojadevida.create');
    }

    public function create()
    {
        $nombreservicios = Servicio::all();
        $nombreEquipos = NombreEquipo::all();
        $equipos = Equipo::all();
        $tecPredos = TecPredo::all();
        $codiecri = codEcri::all();
        $clariesgo = Clariesgo::all();
        $clabiomedica = ClaBiome::all();
        $clauso = ClaUso::all();
        $formaadqui = Formaadqui::all();
        $nombreempresa = Propiedad::all();
        $nombrealimentacion = magFuenAlimen::all(); //
        $abreviacionvolumen = magVol::all(); //
        return view('hojadevida.create', compact('nombreEquipos', 'nombreservicios', 'tecPredos', 'codiecri', 'clariesgo', 'clabiomedica', 'clauso', 'formaadqui', 'equipos', 'nombreempresa', 'nombrealimentacion', 'abreviacionvolumen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function stores()
    {
        // Obtener todos los equipos con sus modelos
        $equipos = Equipo::with('modelos')->get();
        // $modelos = Modelo::with('equipo')->get();
        // $equipos = Equipo::all();

        return view('hojadevida.create', compact('equipos'));
    }

    //+++++++++++++++++++++++++++++++++++++++++++aqui se guarda todos los datos delformulario hoja de vida
    public function store(Request $request)
    {

        $hdv = new Hojadevida();

        $request->validate([
            'perioCali' => 'required|string',
            'fechaCali' => 'nullable|date',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $hdv->equipo_id = $request->equipo_id;
        $hdv->modelo_id = $request->modelo_id;
        $hdv->marca_id = $request->marca_id;
        $hdv->servicio_id = $request->servicio_id;
        $hdv->serie = $request->serie;
        $hdv->tec_predo_id = $request->tec_predo_id;
        // $hdv->perioCali = $request->perioCali;
        // $hdv->fechaCali = $request->fechaCali;
        // $hdv->cod_ecris = $request->cod_ecris;
        $hdv->actFijo = $request->actFijo;
        // $hdv->regInvimai = $request->regInvimai;
        $hdv->Estado = $request->Estado;
        // $hdv->cla_riesgos = $request->cla_riesgos;
        // $hdv->cla_biomes = $request->cla_biomes;
        // $hdv->foto = $request->foto;
        // $hdv->foto = $request->file('foto')->store('public/fotos');
        if ($request->hasFile('foto')) {
            $hdv->foto = $request->file('foto')->store('public/fotos'); 
            $hdv->foto = str_replace('public/', '', $hdv->foto); // Eliminar 'public/' para la BD
        }

        // Hojadevida::create([
        //     // 'nombre' => $request->nombre,
        //     'foto' => $nombreImagen ?? null
        // ]);




        // $hojadevida = new Hojadevida();
        $hdv->perioCali = $request->input('perioCali');

        // Solo establecer fechaCali si perioCali es 'anual'
        if (strtolower($request->input('perioCali')) === 'Anual') {
            $hdv->fechaCali = $request->input('fechaCali');
        } else {
            $hdv->fechaCali = null;
        }





      


        $hdv->save();
        // return $curso;
        return redirect()->route('hojadevida.listar');        // para llevar al la lista o direccionar
        // return view('hojadevida.listar');


    }

    /**
     * Display the specified resource.
     */
    public function show($hdvs)
    {
        $hdvs = Hojadevida::findOrFail($hdvs);
        return view('hojadevida.show', compact('hdvs'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hojadevida $hojadevida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hojadevida $hojadevida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hojadevida $hojadevida)
    {
        //
    }
}
