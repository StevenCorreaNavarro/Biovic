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
    
    public function empleadomtto (){
        return $this->belongsTo('App\Models\Empleadomtto');
    }

    //relacion uno a uno envio datos
    public function reporteservicio(){
        return $this->belongsTo('App\Models\Reporteservicio');
    }
}
