<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propiedad extends Model
{
    use HasFactory;

    public function hojadevidas(){
        return $this->hasMany('App\Models\Hojadevida');
    }

    
    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }
    public function reporteservicios(){
        return $this->hasMany('App\Models\Reporteservicio');
    }
}
