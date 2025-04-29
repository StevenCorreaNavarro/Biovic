<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadoequipo extends Model
{
    use HasFactory;

    public function hojadevidas(){ // envio a hoja de vida
        return $this->hasMany('App\Models\Hojadevida');
    }

    public function reportemtto(){ // envio a reportemtto
        return $this->hasMany('App\Models\reportemtto');
    }

}
