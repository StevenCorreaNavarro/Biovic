<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportemtto extends Model
{
    use HasFactory;

    //Relacion uno a uno recibo datos
    public function empleado (){
        return $this->belongsTo('App\Models\Empleado');
    }

    //relacion uno a uno envio datos
    public function reporteservicio(){
        return $this->belongsTo('App\Models\Reporteservicio');
    }


    // relacion uno a muchos recibo datos
    public function hojadevida(){ // de hoja de vida
        return $this->belongsTo('App\Models\hojadevida');
    }

    public function ubifisica (){ // de ubicacion
        return $this->belongsTo('App\Models\ubifisica');
    }

    public function estadoequipo (){ // de estado equipo
        return $this->belongsTo('App\Models\estadoequipo');
    }

    public function empleadomtto (){ // de empleado mantenimiento
        return $this->belongsTo('App\Models\empleadomtto');
    }

}
