<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\hojadevida;
// use App\Models\Equipo;
// use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function getMarcas($equipo_id)
    {
        $marcas = Marca::where('equipo_id', $equipo_id)->get();
        return response()->json($marcas);
    }

    public function getModelos($marca_id)
    {
        $modelos = Modelo::where('marca_id', $marca_id)->get();
        return response()->json($modelos);
    }

    
    // }
    // public function store()
    // {
    //     // Obtener todos los equipos con sus modelos
    //     $equipos = Equipo::with('modelos')->get();
    //     // $modelos = Modelo::with('equipo')->get();
    //     // $equipos = Equipo::all();

    //     return view('hojadevida.create', compact('equipos'));
    
    // public function listar()
    // {
    //     // $hdvs = Hojadevida::orderBy('id', 'desc')->get();
    //     $hdvs = Hojadevida::with('hojadevida')->get();
    //     return view('hojadevida.listar', ['hdvs'=> $hdvs],compact('hdvs'));
    // }
    

    


}
