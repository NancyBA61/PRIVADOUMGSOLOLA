<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table='horario';
    protected $primaryKey='idHorario';
    public $timestamps=false;

    protected $fillable=[
    	'dia',
    	'hora'
    ];
}

