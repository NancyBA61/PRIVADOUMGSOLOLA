<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests\PersonaFormRequest;

class PersonaOrigenController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $requests)
   {
   		if($requests){
   			$personaori=DB::table ('Persona')
            ->where('Tipo_persona','=','Emisor')->get();
   		return view ('personaOrigen.index',["personaori"=>$personaori]);
   		}
   }

   public function create ()
   {
   	return view('personaOrigen.create');
   }

   public function store(PersonaFormRequest $request){
   	$personaori=request()->except('_token');
      Persona::insert($personaori);
      return redirect('/personaOrigen')->with('Mensaje','Persona origen registrado con éxito');
   }

   public function edit($id){
      $personaori=Persona::findOrFail($id); //devuelve toda la informacion que corresponde al id
      //busca toda la información que corresponde al id
      return view('personaOrigen.edit',compact('personaori')); //retornamos vista con la informacion del empleado
      //compact funcion que retorna la informacion de una varible
   }
   public function update(PersonaFormRequest $request, $id)
   {
      $datosPersona=request()->except(['_token','_method']);
      Persona::where('idPersona','=',$id)->update($datosPersona);
      $personaori=Persona::findOrFail($id);
      return redirect('/personaOrigen');


   }

   public function Eliminar_porigen($id)
   {
      Persona::destroy($id);
      return redirect('personaOrigen');
   }
}
