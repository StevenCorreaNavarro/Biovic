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
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function hojadevida()
    {
        return $this->hasMany(hojadevida::class, 'equipo_id'); 
    }


 
    
    public function marca()
    {
        return $this->hasMany(Marca::class);
    }
}