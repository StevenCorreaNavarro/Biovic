<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleadomtto extends Model
{
    use HasFactory;

    // relacion uno a uno envio datos a Reporteservicio
    public function reporteservicio(){
        return $this->hasOne('App\Models\Reporteservicio');
    }


        // relacion uno a uno envio datos a Reportemtto
        public function reportemtto(){
            return $this->hasOne('App\Models\Reportemtto');
        }
}
