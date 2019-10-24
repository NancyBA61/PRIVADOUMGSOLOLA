<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignarpaquete extends Model
{
     protected $table='asignar_paquete';
    protected $primaryKey='idAsignar_paquete';
    public $timestamps=false;

    protected $fillable=[
        'idPaquete',
    	'idAsignar_horario',
    	'Costo_envio',
    	'idPersona',
    	'idPersona_destino',
    	'idEmpleado'
        
    ];
}
