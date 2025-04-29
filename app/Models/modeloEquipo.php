<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modeloEquipo extends Model{ // error en como estaba llamada la class
    use HasFactory;

    public function hojadevidas(){
        return $this->hasMany('App\Models\Hojadevida');
    }
}
