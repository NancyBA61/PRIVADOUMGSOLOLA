<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='Empleado';
    protected $primaryKey='idEmpleado';
    public $timestamps=false;

    protected $fillable=[
    	'Nombre',
    	'Apellido',
    	'Telefono',
    	'Direccion',
    	'Correo_electronico',
    	'Puesto',
        'Salario',
        'Usuario', 
        'Contrasena'
    ];
}
