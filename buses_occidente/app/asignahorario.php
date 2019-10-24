<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignahorario extends Model
{
    protected $table='asignar_horario';
    protected $primaryKey='idAsignar_horario';
    public $timestamps=false;

    protected $fillable=[
    	'idLugar',
    	'idHorario',
    	'idTipo_Transporte',
    	'fecha_viaje',
    	'asientos_disponibles'
    ];
}
