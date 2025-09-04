<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fabricante extends Model
{
    use HasFactory;

    public function hojadevidas()
    {
        return $this->hasMany('App\Models\Hojadevida');
    }
    //     public function hojasdevidas()
    // {
    //     return $this->hasMany(HojaDeVida::class);
    // }
    protected $fillable = [
        'nombreFabri',
        'direccionFabri',
        'telefonoFabri',
        'ciudadFabri',
        'emailWebFabri',
        // Add any other fields you want to be able to mass-assign here.
    ];
}
