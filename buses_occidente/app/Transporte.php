<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $table='transporte';
    protected $primaryKey='idtransporte';
    public $timestamps=false;

    protected $fillable=[
    	'descripcion',
    	'Cantidad_asientos',
    	'placa',
    	'Marca',
    	'Color',
    	'Capacidad_libras',
    	'Costo'
    ];
}
