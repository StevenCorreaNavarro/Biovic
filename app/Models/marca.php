<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo Modelo
class Marca extends Model {
    use HasFactory;

    
    protected $fillable = ['nombre_marca', 'modelo_id']; // Asegurar que sea "equipo_id"

    // public function equipo() {
    //     return $this->belongsTo(Equipo::class);
    // }
    
    public function modelo() {
        return $this->belongsTo(Modelo::class);
    }
}