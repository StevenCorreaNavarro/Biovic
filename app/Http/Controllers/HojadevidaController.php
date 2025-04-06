<?php

namespace App\Http\Controllers;

use App\Models\estadoequipo;
use App\Models\servicio;
use App\Models\nombreEquipo;
use App\Models\Ubifisica;
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
use Dompdf\Dompdf;
use Dompdf\Options;

class HojadevidaController extends Controller
{
    

    // return view('users.lista', compact('users'));

    public function busqueda(Request $request)
    {
        $query = Equipo::query(); // Consulta base sin relaciones innecesarias

        // Filtrar por el nombre si hay un término de búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');
    
            $query->where(function ($q) use ($search) {
                $q->where('nombre_equipo', 'LIKE', "%$search%");
                    // ->orWhere('email', 'LIKE', "%$search%")
                    // ->orWhere('contact', 'LIKE', "%$search%")
                    // ->orWhere('role', 'LIKE', "%$search%")
                    // ->orWhere('identity', 'LIKE', "%$search%");
            });
        }
    
        $hdvs = $query->orderBy('id', 'desc')->get();
            
        return view('hojadevida.listar', compact('hdvs'));
    }




    public function downloadPDF($id)
    {
        // Buscar los datos de la tabla Hdvs usando el ID
        $hdvs = Hojadevida::findOrFail($id);

        // // Pasar la variable a la vista
        // $data = ['hdvs' => $hdvs];

        // // Configurar DomPDF
        // $options = new Options();
        // $options->set('defaultFont', 'Arial', 'isRemoteEnabled', true);

        // $pdf = new Dompdf($options);
        // $pdf->loadHtml(view('hojadevida.show', $data)->render());

        // $pdf->render();

        // // Descargar el PDF
        // return $pdf->stream('hdvs_' . $hdvs->id . '.pdf');



        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // Habilita imágenes remotas

        $pdf = new Dompdf($options);
        $pdf->loadHtml(view('hojadevida.showpdf', compact('hdvs'))->render());
        $pdf->setPaper('A4', 'portrait'); // Tamaño A4 vertical
        $pdf->render();
        return $pdf->stream('documento.pdf');
    }

    public function listar(Request $request)
    {
        $hdvs = hojadevida::orderBy('id', 'desc')->get();
        // $hdvs = hojadevida::with('equipo')->get();
        $query = Hojadevida::with('equipo', 'servicio');

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

    public function creates() // por que hay dos create ?
    {
        return view('hojadevida.create');
    }

    public function create()
    {
        $nombreservicios = Servicio::all();
        $nombreEquipos = NombreEquipo::all();
        $equipos = Equipo::orderBy('nombre_equipo', 'asc')->get();

        $estadoequipo = estadoequipo::all(); // usar el modelo estadoequipo Obtiene todos los estados de equipo. $estadoequipo, copiar en compact
        $ubifisicas = Ubifisica::all(); // Obtiene todas las ubicaciones físicas
        $nombreservicios = Servicio::all();

        $tecPredos = TecPredo::all();
        $clariesgo = Clariesgo::all();
        $clabiomedica = ClaBiome::all();
        $clauso = ClaUso::all();
        $codiecri = codEcri::all();


        $formaadqui = Formaadqui::all();
        $nombreempresa = Propiedad::all();
        $nombrealimentacion = magFuenAlimen::all(); //
        $abreviacionvolumen = magVol::all(); //
        // return view('hojadevida.create', compact( 'nombreservicios','nombreEquipos', 'nombreservicios', 'tecPredos', 'codiecri', 'clariesgo', 'clabiomedica', 'clauso', 'formaadqui', 'equipos', 'nombreempresa', 'nombrealimentacion', 'abreviacionvolumen', 'ubifisicas', 'estadoequipo')); // pasar las variables  a la vista
        return view('hojadevida.create', compact(                   'nombreEquipos', 'nombreservicios', 'tecPredos', 'codiecri', 'clariesgo', 'clabiomedica', 'clauso', 'formaadqui', 'equipos', 'nombreempresa', 'nombrealimentacion', 'abreviacionvolumen','ubifisicas', 'estadoequipo'));
 
    }
    // public function create()
    // {

    //     $estadoequipo = estadoequipo::all(); // usar el modelo estadoequipo Obtiene todos los estados de equipo. $estadoequipo, copiar en compact
    //     $ubifisicas = Ubifisica::all(); // Obtiene todas las ubicaciones físicas
      

    //     $nombreservicios = Servicio::all();
    //     $nombreEquipos = NombreEquipo::all();
    //     $equipos = Equipo::all();
    //     $tecPredos = TecPredo::all();
    //     $codiecri = codEcri::all();
    //     $clariesgo = Clariesgo::all();
    //     $clabiomedica = ClaBiome::all();
    //     $clauso = ClaUso::all();
    //     $formaadqui = Formaadqui::all();
    //     $nombreempresa = Propiedad::all();
    //     $nombrealimentacion = magFuenAlimen::all(); //
    //     $abreviacionvolumen = magVol::all(); //
    //     return view('hojadevida.create', compact('nombreEquipos', 'nombreservicios', 'tecPredos', 'codiecri', 'clariesgo', 'clabiomedica', 'clauso', 'formaadqui', 'equipos', 'nombreempresa', 'nombrealimentacion', 'abreviacionvolumen','ubifisicas', 'estadoequipo'));
    // }


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
        // dd($request->all());  Agregar esta línea para ver los datos recibidos, luego eliminar  despues de la prueba
        $hdv = new Hojadevida();
        $request->validate([
            'perioMto' => 'nullable|string|max:255', // agregado para periodo de mantenimiento
            'perioCali' => 'nullable|string',
            'fechaCali' => 'nullable|date',
            'foto' => 'nullable|max:10000|mimes:jpeg,png,jpg,gif,svg',
        ]);
        // se hace uno por uno de los datos para que sean guardados
        $hdv->equipo_id = $request->equipo_id;
        $hdv->modelo_id = $request->modelo_id;
        $hdv->marca_id = $request->marca_id;
        $hdv->servicio_id = $request->servicio_id;
        $hdv->serie = $request->serie;
        $hdv->actFijo = $request->actFijo;
        $hdv->estadoequipo_id = $request->estadoequipo_id; // para estado poder guardar  original $hdv->estadoequipo = $request->estadoequipo; 
        $hdv->ubifisica_id = $request->ubifisica_id;
        $hdv->servicio_id = $request->servicio_id;
        $hdv->tec_predo_id = $request->tec_predo_id;
        $hdv->regInvima = $request->regInvima;
        $hdv->cla_riesgo_id = $request->cla_riesgo_id;
        $hdv->cla_biome_id = $request->cla_biome_id;
        $hdv->cla_uso_id = $request->cla_uso_id;
        $hdv->perioMto = $request->perioMto; // agregado para periodo de mantenimiento
        $hdv->cod_ecri_id = $request->cod_ecri_id;
        if ($request->hasFile('foto')) {
            $hdv->foto = $request->file('foto')->store('public/fotos');
            $hdv->foto = str_replace('public/', '', $hdv->foto); // Eliminar 'public/' para la BD
        }
        $hdv->perioCali = $request->input('perioCali');
        // Solo establecer fechaCali si perioCali es 'anual'
        if (strtolower($request->input('perioCali')) === 'Anual') {
            $hdv->fechaCali = $request->input('fechaCali');
        } else {
            $hdv->fechaCali = null;
        }
        $hdv->save();
        return redirect()->route('hojadevida.listar');        // para llevar al la lista o direccionar
        // return view('hojadevida.listar');
    }


    // public function store(Request $request)
    // {
    //     $hdv = new Hojadevida();

    //     $request->validate([
    //         'perioCali' => 'required|string',
    //         'fechaCali' => 'nullable|date',
    //         'foto' => 'required|max:10000|mimes:jpeg,png,jpg,gif,svg',
    //     ]);

    //     $hdv->equipo_id = $request->equipo_id;
    //     $hdv->modelo_id = $request->modelo_id;
    //     $hdv->marca_id = $request->marca_id;
    //     $hdv->servicio_id = $request->servicio_id;
    //     $hdv->serie = $request->serie;
    //     $hdv->tec_predo_id = $request->tec_predo_id;
    //     // $hdv->perioCali = $request->perioCali;
    //     // $hdv->fechaCali = $request->fechaCali;
    //     // $hdv->cod_ecris = $request->cod_ecris;
    //     $hdv->actFijo = $request->actFijo;
    //     // $hdv->regInvimai = $request->regInvimai;
    //     $hdv->Estado = $request->Estado;
    //     // $hdv->cla_riesgos = $request->cla_riesgos;
    //     // $hdv->cla_biomes = $request->cla_biomes;
    //     // $hdv->foto = $request->foto;
    //     // $hdv->foto = $request->file('foto')->store('public/fotos');
    //     if ($request->hasFile('foto')) {
    //         $hdv->foto = $request->file('foto')->store('public/fotos');
    //         $hdv->foto = str_replace('public/', '', $hdv->foto); // Eliminar 'public/' para la BD
    //     }
    //     // Hojadevida::create([
    //     //     // 'nombre' => $request->nombre,
    //     //     'foto' => $nombreImagen ?? null
    //     // ]);
    //     // $hojadevida = new Hojadevida();
    //     $hdv->perioCali = $request->input('perioCali');

    //     // Solo establecer fechaCali si perioCali es 'anual'
    //     if (strtolower($request->input('perioCali')) === 'Anual') {
    //         $hdv->fechaCali = $request->input('fechaCali');
    //     } else {
    //         $hdv->fechaCali = null;
    //     }
    //     $hdv->save();
    //     // return $curso;
    //     return redirect()->route('hojadevida.listar');        // para llevar al la lista o direccionar
    //     // return view('hojadevida.listar');
    // }





    /**
     * Display the specified resource.
     */
    public function show($hdvs)
    {
        // $query = Hojadevida::with('equipo','servicio');
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
