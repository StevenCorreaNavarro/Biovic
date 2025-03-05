<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    // relacion uno a uno    Envia el dato a Reporteservicio
    public function reporteservicios(){
        return $this->hasMany('App\Models\Reporteservicio');
    }

    // relacion uno a uno    Envia el dato a Reportemtto
    public function reportemtto(){
        return $this->hasMany('App\Models\Reportemtto');
    }

    
}
