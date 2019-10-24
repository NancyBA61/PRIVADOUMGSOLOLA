<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona_origen extends Model
{
    protected $table='Persona';
    protected $primaryKey='idPersona';
    public $timestamps=false;

    protected $fillable=[
    	'Nombre',
    	'Apellido',
    	'Telefono',
    	'Direccion',
    	'Correo_electronico',
    	'Tipo_persona'
    ];
}
}
