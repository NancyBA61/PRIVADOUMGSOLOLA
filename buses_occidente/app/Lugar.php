<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table='lugar';
    protected $primaryKey='idLugar';
    public $timestamps=false;

    protected $fillable=[
    	'Nombre_origen',
    	'Nombre_destino',
    	'Costo_pasaje',
    	'Costo_paquete',
    ];
}
