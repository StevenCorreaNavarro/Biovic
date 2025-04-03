<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ubiFisica extends Model
{
    use HasFactory;

    
    protected $table = 'ubifisicas'; // Nombre correcto de la tabla

    public function hojadevidas(){
        return $this->hasMany('App\Models\Hojadevida');
    }

    public function reporteservicios(){
        return $this->hasMany('App\Models\Reporteservicio');
    }
    
}
