<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipomtto extends Model
{
    use HasFactory;

    public function reporteservicios(){
        return $this->hasMany('App\Models\Reporteservicio');
    }
}
