<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Modelo;
use App\Models\hojadevida;

class EquiposController extends Controller
{

    // public function listar()
    // {
    //     $hdvs = Hojadevida::orderBy('id', 'desc')->get();
    //     // $hdvs = Hojadevida::with('equipo')->get();
    //     return view('hojadevida.listar', ['hdvs'=> $hdvs],compact('hdvs'));
    // }
    
    // public function store()
    // {
    //     // Crear un equipo
    //     $equipoUno = Equipo::create([
    //         'nombre_equipo' => 'Equipo Uno',
    //     ]);

    //     // Crear modelos para equipo uno
    //     $equipoUno->modelos()->createMany([
    //         ['nombre_modelo' => 'Modelo Uno'],
    //         ['nombre_modelo' => 'Modelo Dos'],
    //         ['nombre_modelo' => 'Modelo Tres'],
    //     ]);

    //     // Crear otro equipo
    //     $equipoDos = Equipo::create(
    //         [
    //             'nombre_equipo' => 'Equipo Dos'
    //         ],
    //     );

    //     // Crear modelos para equipo dos
    //     $equipoDos->modelos()->createMany([
    //         ['nombre_modelo' => 'Modelo Cuatro'],
    //         ['nombre_modelo' => 'Modelo Cinco'],
    //         ['nombre_modelo' => 'Modelo Seis'],
    //     ]);

    //     return "Equipos y modelos creados exitosamente.";
    // }

    // public function getModelos($equipo_id)
    // {
    //     return response()->json(Modelo::where('equipo_id', $equipo_id)->get());
    // }
}
