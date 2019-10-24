<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignarpasajero extends Model
{
     protected $table='asignar_pasajero';
    protected $primaryKey='idAsignar_pasajero';
    public $timestamps=false;

    protected $fillable=[
    	'idPersona',
    	'idAsignar_horario',
    	'idEmpleado',
    	'Numero_asiento'
    ];
}
