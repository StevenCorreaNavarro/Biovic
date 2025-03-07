<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo Equipo
class Equipo extends Model {
    use HasFactory;
    protected $fillable = ['nombre_equipo']; // Agregar este campo

    public function modelos() {
        return $this->hasMany(modelo::class);
    }
    // public function marcas() {
    //     return $this->hasMany(marca::class);
    // }
}