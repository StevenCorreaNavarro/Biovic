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
    'hojadevida_id', // 👈 importante
];
    
  public function hojadevida()
{
    return $this->belongsTo(Hojadevida::class);
}




    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
    

    
    public function hojadevidas(){
        return $this->hasMany('App\Models\Hojadevida');
    }
}
