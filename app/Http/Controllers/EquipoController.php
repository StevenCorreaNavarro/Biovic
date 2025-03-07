<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Modelo;
use App\Models\Marca;
// use App\Models\Equipo;
// use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function getModelos($equipo_id)
    {
        return response()->json(Modelo::where('equipo_id', $equipo_id)->get());
    }
    public function getMarcas($equipo_id)
    {
        return response()->json(Marca::where('marca_id', $equipo_id)->get());
    }
    public function store()
    {
        // Obtener todos los equipos con sus modelos
        $equipos = Equipo::with('modelos')->get();
        // $modelos = Modelo::with('equipo')->get();
        // $equipos = Equipo::all();

        return view('equipos.index', compact('equipos'));
    }
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
    


}
