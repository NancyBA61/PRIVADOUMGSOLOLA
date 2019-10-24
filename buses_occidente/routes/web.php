<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('menu', function () {
    return view('menu');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//crear ruta para formulario registro persona
//empleado=ruta
//EmpleadoController=Controlador
Route::resource('empleado','EmpleadoController');
Route::get('Eliminar_empleado/{id}', 'EmpleadoController@Eliminar_empleado')->name('Eliminar_empleado');

Route::resource('persona','PersonaController');
Route::get('Eliminar_persona/{id}', 'PersonaController@Eliminar_persona')->name('Eliminar_persona');

Route::resource('transporte','TransporteController');
Route::get('Eliminar_transporte/{id}', 'TransporteController@Eliminar_transporte')->name('Eliminar_transporte');

Route::resource('horario','HorarioController');
Route::get('Eliminar_horario/{id}', 'HorarioController@Eliminar_horario')->name('Eliminar_horario');

//lugar:carpeta donde estan las vistas
//LugarController: controlador
Route::resource('lugar','LugarController');
Route::get('Eliminar_lugar/{id}', 'LugarController@Eliminar_lugar')->name('Eliminar_lugar');

Route::resource('pdestino','PersonaDestinoController');
Route::get('Eliminar_pdestino/{id}', 'PersonaDestinoController@Eliminar_pdestino')->name('Eliminar_pdestino');

Route::resource('personaOrigen','PersonaOrigenController');
Route::get('Eliminar_porigen/{id}', 'PersonaOrigenController@Eliminar_porigen')->name('Eliminar_porigen');

Route::resource('compra','CompraController');
Route::get('Eliminar_compra/{id}', 'compraController@Eliminar_compra')->name('Eliminar_compra');

Route::resource('asignarh','AsignahorarioController');
Route::get('Eliminar_asignacionh/{id}', 'AsignahorarioController@Eliminar_asignacionh')->name('Eliminar_asignacionh');

Route::resource('asignarpasajero','AsignarpasajeroController');
Route::get('Eliminar_asignacionp/{id}', 'AsignarpasajeroController@Eliminar_asignacionp')->name('Eliminar_asignacionp');

Route::resource('paquete','PaqueteController');
Route::get('Eliminar_paquete/{id}', 'PaqueteController@Eliminar_paquete')->name('Eliminar_paquete');

Route::resource('asignarpaquete','AsignarpaqueteController');
Route::get('Eliminar_asignacionpaquete/{id}', 'AsignarpaqueteController@Eliminar_asignacionpaquete')->name('Eliminar_asignacionpaquete');






