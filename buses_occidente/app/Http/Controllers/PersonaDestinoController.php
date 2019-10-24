<?php

namespace App\Http\Controllers;


use DB;
use App\Persona_destino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonaDestinoFormRequest;

class PersonaDestinoController extends Controller
{


     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $requests)
    {
       if($requests){
            $pdestino=DB::table ('Persona_destino')->get();
        return view ('pdestino.index',["pdestino"=>$pdestino]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pdestino.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaDestinoFormRequest $request)
    {
      $pdestino=request()->except('_token');
      Persona_destino::insert($pdestino);
      return redirect('/pdestino')->with('Mensaje','Empleado registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona_destino  $persona_destino
     * @return \Illuminate\Http\Response
     */
    public function show(Persona_destino $persona_destino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona_destino  $persona_destino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dest=Persona_destino::findOrFail($id); //devuelve toda la informacion que corresponde al id
      //busca toda la información que corresponde al id

        //$dest es la variable que recibe en la vista!!!
      return view('pdestino.edit',compact('dest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona_destino  $persona_destino
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaDestinoFormRequest $request, $id)
    {
      $datosPersonaD=request()->except(['_token','_method']);
      Persona_destino::where('idPersona_destino','=',$id)->update($datosPersonaD);
      $personaD=Persona_destino::findOrFail($id);
      return redirect('/pdestino');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona_destino  $persona_destino
     * @return \Illuminate\Http\Response
     */
    public function Eliminar_pdestino($id)
    {
      Persona_destino::destroy($id);//Persona_destino: nombre de la tabla bd
      return redirect('pdestino');// pdestino de la vista
    }
}
