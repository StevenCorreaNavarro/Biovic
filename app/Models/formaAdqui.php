<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formaAdqui extends Model
{
    use HasFactory;

    public function hojadevidas(){
        return $this->hasMany('App\Models\Hojadevida');
    }
}
