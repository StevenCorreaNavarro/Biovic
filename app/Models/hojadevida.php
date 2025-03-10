<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hojadevida extends Model
{
    use HasFactory;
    // Relacion uno a uno
    public function accesorio (){
        return $this->belongsTo('App\Models\Accesorio');
    }
    public function claBiome (){
        return $this->belongsTo('App\Models\ClaBiome');
    }
    public function claRiesgo (){
        return $this->belongsTo('App\Models\ClaRiesgo');
    }
    public function ClaUso  (){
        return $this->belongsTo('App\Models\ClaUso');
    }
    public function codEcri (){
        return $this->belongsTo('App\Models\CodEcri');
    }
    public function fabricante (){
        return $this->belongsTo('App\Models\Fabricante');
    }
    public function formaAdqui (){
        return $this->belongsTo('App\Models\FormaAdqui');
    }
    public function magCapa (){
        return $this->belongsTo('App\Models\MagCapa');
    }
    public function magCorriente (){
        return $this->belongsTo('App\Models\MagCorriente');
    }
    public function magDimension (){
        return $this->belongsTo('App\Models\MagDimension');
    }
    public function magFre (){
        return $this->belongsTo('App\Models\MagFre');
    }
    public function magFuenAlimen (){
        return $this->belongsTo('App\Models\MagFuenAlimen');
    }
    public function magPeso (){
        return $this->belongsTo('App\Models\MagPeso');
    }
    public function magPot (){
        return $this->belongsTo('App\Models\MagPot');
    }
    public function magPre (){
        return $this->belongsTo('App\Models\MagPre');
    }
    public function magTemp (){
        return $this->belongsTo('App\Models\MagTemp');
    }
    public function magVel (){
        return $this->belongsTo('App\Models\MagVel');
    }
    public function magVol (){
        return $this->belongsTo('App\Models\MagVol');
    }
    public function nombreEquipo (){
        return $this->belongsTo('App\Models\NombreEquipo');
    }
    public function propiedad (){
        return $this->belongsTo('App\Models\Propiedad');
    }
    public function proveedor (){
        return $this->belongsTo('App\Models\Proveedor');
    }
    public function servicio (){
        return $this->belongsTo('App\Models\Servicio');
    }
    public function tecPredo (){
        return $this->belongsTo('App\Models\TecPredo');
    }
    public function ubiFisica (){
        return $this->belongsTo('App\Models\UbiFisica');
    }
    

    //Relacion uno  a muchos envio - un equipo tiene muchos reportes
    public function reporteservicios(){
        return $this->hasMany('App\Models\Reporteservicio');
    }
    
    protected $fillable = ['foto']; // Agregamos 'foto' para que se pueda asignar masivamente
        //     $request->validate([
        //     'perioCali' => 'required|string',
        //     'fechaCali' => 'nullable|date',
        //     'foto'=>'required|max:10000|mimes:jpeg,png,jpg,gif,svg',
        // ]);
}
