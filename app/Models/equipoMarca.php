<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo Equipo
class EquipoMarca extends Model {
    use HasFactory;
    public function equipo()
    {
        return $this->belongsTo('App\Models\Equipo');
    }

    //Relacion Uno a Muchos (Inversa) 
    public function marca()
    {
        return $this->belongsTo('App\Models\Marca');
    }

    
}