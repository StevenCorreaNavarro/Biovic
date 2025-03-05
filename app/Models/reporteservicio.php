<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporteservicio extends Model
{
    use HasFactory;

    //relacion uno a uno Recibe dato 
    public function ubiFisica (){
        return $this->belongsTo('App\Models\UbiFisica');
    }

    public function servicio (){
        return $this->belongsTo('App\Models\Servicio');
    }

    public function propiedad (){
        return $this->belongsTo('App\Models\Propiedad');
    }

    public function tipommto (){
        return $this->belongsTo('App\Models\Tipommto');
    }

    public function empleado (){
        return $this->belongsTo('App\Models\Empleado');
    }
    
    public function empleadomtto (){
        return $this->belongsTo('App\Models\Empleadomtto');
    }

    //relacion uno a mucho inversa Recibo dato
    public function hojadevida(){
        return $this->belongsTo('App\Models\Hojadevida');
    }

    // relacion uno a uno recibo datos de Reportemtto
    public function reportemtto(){
        return $this->hasOne('App\Models\Reportemtto');
    }
    


}
