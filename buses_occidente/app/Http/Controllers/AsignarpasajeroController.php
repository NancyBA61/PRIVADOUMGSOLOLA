<?php

namespace App\Http\Controllers;


use DB;
use App\asignarpasajero;
use App\Persona;
use App\Lugar;
use App\asignahorario;
use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\asignarpasajeroFormRequest;


class AsignarpasajeroController extends Controller
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

            $pasajero=DB::table('asignar_pasajero as apasajero')
            ->join('persona as per', 'per.idPersona', '=', 'apasajero.idPersona') //union de las dos tablas
            ->join('asignar_horario as asighora', 'asighora.idAsignar_Horario','=',  
                'apasajero.idAsignar_horario')
            ->join('lugar as lug','lug.idLugar','=','asighora.idLugar')
            ->join('horario as hora','hora.idHorario','=','asighora.idHorario')
            ->Select('apasajero.idAsignar_pasajero','per.Nombre','per.Apellido','lug.Nombre_origen',           'lug.Nombre_destino','lug.Costo_pasaje','hora.dia','hora.hora','apasajero.Numero_asiento')
            ->get();
        return view ('asignarpasajero.index',["asigp"=>$pasajero]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $persona=DB::table('Persona') ->where('Tipo_persona','=','Pasajero')->get();
        $lugar1=DB::table('lugar as lugares')
        ->join('asignar_horario as asigna','asigna.idLugar','=','lugares.idLugar')
        ->join('horario as hora','hora.idHorario','=','asigna.idHorario')
        ->select('asigna.idAsignar_horario','lugares.Nombre_origen','lugares.Nombre_destino','lugares.Costo_pasaje', 'hora.dia','hora.hora')
        ->get(); 
        $empleado=Empleado::all();      
       return view('asignarpasajero.create',["persona"=>$persona,"lugar1"=>$lugar1,"empleado"=>$empleado]);
        //las variables transporte, horario y lugar son las que deben ir al foreach en la vista
       //return response()->json($persona);//retornar info de la consulta


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(asignarpasajeroFormRequest $request)
    {
      $asigna=request()->except('_token');
      asignarpasajero::insert($asigna);
      return redirect('/asignarpasajero')->with('Mensaje','Asignación de pasajero con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\asignahorario  $asignahorario
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asignahorario  $asignahorario
     * @return \Illuminate\Http\Response
     */
    public function edit($id){//recibirmos la informacion a traves de la url
      $asigna=asignarpasajero::findOrFail($id); //devuelve toda la informacion que corresponde al id
      //busca toda la información que corresponde al id
      $persona=DB::table('persona')->where('Tipo_persona','=','Pasajero')->get();
       $lugares_horarios=DB::table('lugar as lugares')
        ->join('asignar_horario as asigna','asigna.idLugar','=','lugares.idLugar')
        ->join('horario as hora','hora.idHorario','=','asigna.idHorario')
        ->select('asigna.idAsignar_horario','lugares.Nombre_origen','lugares.Nombre_destino','lugares.Costo_pasaje', 'hora.dia','hora.hora')
        ->get();
        $empleado=Empleado::all();
       return view('asignarpasajero.edit',["persona"=>$persona,"lugares_horarios"=>$lugares_horarios,"asigna"=>$asigna,
                    "empleado"=>$empleado]);
       //return response()->json($persona);
      //compact funcion que retorna la informacion de una varible
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asignahorario  $asignahorario
     * @return \Illuminate\Http\Response
     */
    public function update(asignarpasajeroFormRequest $request, $id)
    {
      $asigna=request()->except(['_token','_method']);
      asignarpasajero::where('idAsignar_pasajero','=',$id)->update($asigna);
      return redirect('/asignarpasajero');
      //return view('empleado.edit',compact('empleado'));
      //return response()->json($empleado);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asignahorario  $asignahorario
     * @return \Illuminate\Http\Response
     */
    public function Eliminar_asignacionp($id)
    {
      asignarpasajero::destroy($id);
      return redirect('/asignarpasajero');
    }
}
