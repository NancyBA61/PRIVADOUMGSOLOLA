<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\DetalleEmpleado;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests\EmpleadoFormRequest;

class EmpleadoController extends Controller
{
 public function __construct()
    {
        $this->middleware('auth');
    }
   
   public function index(Request $requests)
   {
   		if($requests){
   			$empleado=DB::table ('Empleado')->get();
   		return view ('empleado.index',["empleados"=>$empleado]);
   		}
   }

   public function create()
   {
   	return view('empleado.create');
   }

   public function store(EmpleadoFormRequest $request){
   	$empleado=request()->except('_token');
      Empleado::insert($empleado);
      return redirect('/empleado')->with('Mensaje','Empleado registrado con éxito');
   }
   public function edit($id){//recibirmos la informacion a traves de la url
      $empleado=Empleado::findOrFail($id); //devuelve toda la informacion que corresponde al id
      //busca toda la información que corresponde al id
      return view('empleado.edit',compact('empleado')); //retornamos vista con la informacion del empleado
      //compact funcion que retorna la informacion de una varible
   }
   public function update(EmpleadoFormRequest $request, $id)
   {
      $datosEmpleado=request()->except(['_token','_method']);
      Empleado::where('idEmpleado','=',$id)->update($datosEmpleado);
      $empleado=Empleado::findOrFail($id);
      return redirect('/empleado');
      //return view('empleado.edit',compact('empleado'));
      //return response()->json($empleado);
   }

   public function Eliminar_empleado($id)
   {
      Empleado::destroy($id);
      return redirect('empleado');
   }
}
