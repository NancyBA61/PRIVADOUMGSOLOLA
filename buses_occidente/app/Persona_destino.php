<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona_destino extends Model
{
    protected $table='persona_destino';
    protected $primaryKey='idPersona_destino';
    public $timestamps=false;

    protected $fillable=[
    	'nombres',
    	'apellidos',
    	'Telefono_uno',
    	'Telefono_dos',
    	'Nombre_empresa',
    	'Direccion',
    	'Punto_referencia'
    ];
}
