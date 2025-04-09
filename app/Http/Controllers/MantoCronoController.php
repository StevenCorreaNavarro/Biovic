<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


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
use Dompdf\Dompdf;
use Dompdf\Options;

class MantoCronoController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    // public function index()
    // {
    //     $datosempleips['empleips']=empleips::paginate(5);// se crea la variable $datos
    //     return view('empleips.index',$datosempleips);
    //     //
    // }

    public function listar()
    {


        
        $hdvs = hojadevida::orderBy('id', 'desc')->get();
        // $empleips = new Empleips();
        return view('manto_crono', compact('hdvs'));
    }
    public function create()
    {
        $nombreservicios = Servicio::all();
        $nombreEquipos = NombreEquipo::all();
        $equipos = Equipo::orderBy('nombre_equipo', 'asc');
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
}
