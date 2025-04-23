<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accesorio extends Model
{
    use HasFactory;


    
    protected $fillable = [
        'nombreAccesorio',
        'marcaAccesorio',
        'modeloAccesorio',
        'serieAccesorio',
        'costoAccesorio',
        'equipo_id',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    
    public function hojadevidas(){
        return $this->hasMany('App\Models\Hojadevida');
    }
}
