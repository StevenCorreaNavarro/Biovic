<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;

    public function hojadevidas(){
        return $this->hasMany('App\Models\Hojadevida');
    }
protected $fillable = [
        'nombreProveedor',
        'direccionProvee',
        'telefonoProvee',
        'ciudadProvee',
        'emailWebProve',
        // Add any other fields you want to be able to mass-assign here
    ];
}
