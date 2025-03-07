<?php

use Illuminate\Database\Seeder;
use App\Models\Equipo;

class EquipoSeeder extends Seeder
{
    public function run()
    {
        // Crear un equipo
        $equipoUno = Equipo::create([
            'nombre_equipo' => 'Equipo Uno',
        ]);

        // Crear modelos para equipo uno
        $equipoUno->modelos()->createMany([
            ['nombre_modelo' => 'Modelo Uno'],
            ['nombre_modelo' => 'Modelo Dos'],
            ['nombre_modelo' => 'Modelo Tres'],
        ]);

        // Crear otro equipo
        $equipoDos = Equipo::create([
            'nombre_equipo' => 'Equipo Dos',
        ]);

        // Crear modelos para equipo dos
        $equipoDos->modelos()->createMany([
            ['nombre_modelo' => 'Modelo Cuatro'],
            ['nombre_modelo' => 'Modelo Cinco'],
            ['nombre_modelo' => 'Modelo Seis'],
        ]);
    }
}
