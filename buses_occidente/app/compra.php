<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
      protected $table='compra';
    protected $primaryKey='idCompra';
    public $timestamps=false;

    protected $fillable=[
    	'idTransporte',
    	'cantidad',
    	'Fecha_compra',
    	'Precio_unitario',
    	'Total',
    	'numero_facturacompra'
        
    ];
}
