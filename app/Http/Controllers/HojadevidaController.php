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
    public function index()
    {
        $datos['hojadevida']=Hojadevida::paginate(10);//
        return view ('hojadevida.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
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
        $formaadqui= Formaadqui::all();
        $nombreempresa = Propiedad::all();
        $nombrealimentacion = magFuenAlimen::all(); //
        $abreviacionvolumen = magVol::all(); //


        return view ('hojadevida.create', compact('nombreEquipos', 'nombreservicios','tecPredos', 'codiecri', 'clariesgo', 'clabiomedica', 'clauso','formaadqui', 'equipos','nombreempresa', 'nombrealimentacion','abreviacionvolumen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'perioCali' => 'required|string',
            'fechaCali' => 'nullable|date',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $hojadevida = new Hojadevida();
        $hojadevida->perioCali = $request->input('perioCali');
        
        // Solo establecer fechaCali si perioCali es 'anual'
        if (strtolower($request->input('perioCali')) === 'Anual') {
            $hojadevida->fechaCali = $request->input('fechaCali');
        } else {
            $hojadevida->fechaCali = null;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(hojadevida $hojadevida)
    {
        //
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
