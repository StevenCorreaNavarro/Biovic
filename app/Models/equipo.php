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
    // public function marcas() {
    //     return $this->hasMany(marca::class);
    // }
    public function hojadevida()
    {
        return $this->hasMany(hojadevida::class, 'equipo_id'); 
    }
    public function marcas()
    {
        return $this->hasMany(Marca::class, 'equipo_id', 'id','nombre_equipo');
    }


    //Relacion Uno a Muchos (Inversa) 
    public function marca()
    {
        return $this->belongsTo('App\Models\Marca');
    }
    
    public function propiedad()
{
    return $this->belongsTo(Propiedad::class);
}

public function accesorios()
{
    return $this->hasMany(Accesorio::class);
}

    
}