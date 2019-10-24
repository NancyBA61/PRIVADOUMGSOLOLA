<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table='paquete';
    protected $primaryKey='IdPaquete';
    public $timestamps=false;

    protected $fillable=[
    	'TipoPaquete',
    	'Peso_lbs',
    	'Costo_libra',
    	'Costo_Total'
    ];
}
