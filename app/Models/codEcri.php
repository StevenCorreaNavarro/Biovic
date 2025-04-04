<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class codEcri extends Model
{
    use HasFactory;

    public function hojadevidas(){
        return $this->hasMany('App\Models\Hojadevida');
    }
}
