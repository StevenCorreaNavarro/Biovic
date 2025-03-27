<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo Modelo
class Modelo extends Model {
    use HasFactory;

    
    protected $fillable = ['nombre_modelo', 'equipo_id']; // Asegurar que sea "equipo_id"

    public function equipo() {
        return $this->belongsTo(Equipo::class);
    }

    public function modelo()
    {
        return $this->hasMany(hojadevida::class, 'modelo_id'); 
    }
     
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}