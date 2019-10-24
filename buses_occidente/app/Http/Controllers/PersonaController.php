<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests\PersonaFormRequest;

class PersonaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   public function index(Request $requests)
   {
   		if($requests){
   			$persona=DB::table ('Persona')
            ->where('Tipo_persona','=','Pasajero')->get();
   		return view ('persona.index',["persona"=>$persona]);
   		}
   }

   public function create ()
   {
   	return view('persona.create');
   }

   public function store(PersonaFormRequest $request){
   	$persona=request()->except('_token');
      Persona::insert($persona);
      return redirect('/persona')->with('Mensaje','Empleado registrado con éxito');
   }

   public function edit($id){
      $persona=Persona::findOrFail($id); //devuelve toda la informacion que corresponde al id
      //busca toda la información que corresponde al id
      return view('persona.edit',compact('persona')); //retornamos vista con la informacion del empleado
      //compact funcion que retorna la informacion de una varible
   }
   public function update(PersonaFormRequest $request, $id)
   {
      $datosPersona=request()->except(['_token','_method']);
      Persona::where('idPersona','=',$id)->update($datosPersona);
      $persona=Persona::findOrFail($id);
      return redirect('/persona');


   }

   public function Eliminar_persona($id)
   {
      Persona::destroy($id);
      return redirect('persona');
   }
}
