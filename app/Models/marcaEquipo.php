<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marcaEquipo extends Model // error en el llamado de la clase Get-ChildItem -Path "C:\xampp\htdocs\Biovic" -Recurse -File | Select-String -Pattern "class nombreEquipo"
{
    use HasFactory;

    public function hojadevidas(){
        return $this->hasMany('App\Models\Hojadevida');
    }
}
