<?php

namespace App\Http\Controllers;

use App\asignarpaquete;
use DB;
use Illuminate\Http\Request;
use App\asignahorario;
use App\Horario;
use App\Lugar;
use App\Empleado;
use App\Persona;
use App\Paquete;
use App\Persona_destino;
use App\Http\Requests\asignarpaqueteFormRequest;

class AsignarpaqueteController extends Controller
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

           $asignarpaquete=DB::table('paquete as pq')
            ->join('asignar_paquete as asigpaquete', 'asigpaquete.idPaquete', '=', 'pq.IdPaquete') //union de las dos tablas

            //obtenemos informacion de la tabala asignacion horario
            ->join('Asignar_horario as asighora', 'asighora.idAsignar_Horario','=', 'asigpaquete.idAsignar_horario')
            ->join('horario as hora', 'hora.idHorario','=', 'asighora.idHorario')
            ->join('lugar as lug', 'lug.idLugar','=', 'asighora.idLugar')

            //nombre de la persona que envia el paquete
            ->join('persona as per','per.idPersona','=','asigpaquete.idPersona')
            ->join('persona_destino as perd','perd.idPersona_destino','=','asigpaquete.idPersona_destino')
            //obtenemos informacion de la persona que envia el paquete
            ->Select('asigpaquete.idAsignar_paquete','pq.IdPaquete','pq.Tipopaquete','pq.Peso_lbs', 'lug.Nombre_origen','lug.Nombre_destino', 'lug.Costo_paquete', 'hora.dia', 'hora.hora','asigpaquete.Costo_envio','per.Nombre','per.Apellido','perd.nombres','perd.apellidos')
            ->get();  
        return view ('asignarpaquete.index',["asignarpaquete"=>$asignarpaquete]);
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $paquetes=Paquete::all();
       $persona=DB::table('persona')->where('Tipo_persona','=','Emisor')->get();
       $pdestino=Persona_destino::all();
       $empleado=empleado::all();
       $horario=DB::table('horario as hr')
       ->join('Asignar_horario as ahora', 'ahora.idHorario','=','hr.idHorario' )
       ->join('lugar as lg','lg.idLugar','=','ahora.idLugar')
       ->Select('ahora.idAsignar_horario','lg.Nombre_origen','lg.Nombre_destino','hr.dia','hr.hora')
       ->get();
        return view('asignarpaquete.create', compact('paquetes','horario','persona','pdestino','empleado'));
        //return response()->json($horario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $asigna=request()->except('_token');
      asignarpaquete::insert($asigna);
      //return response()->json($asigna);
      return redirect('/asignarpaquete')->with('Mensaje','Asignación de paquete registrada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\asignarpaquete  $asignarpaquete
     * @return \Illuminate\Http\Response
     */
    public function show(asignarpaquete $asignarpaquete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asignarpaquete  $asignarpaquete
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $paquetes=Paquete::all();
       $asigna=asignarpaquete::findOrFail($id);
       $persona=DB::table('persona')->where('Tipo_persona','=','Emisor')->get();
       $pdestino=Persona_destino::all();
       $empleado=empleado::all();
       $horario=DB::table('horario as hr')
       ->join('Asignar_horario as ahora', 'ahora.idHorario','=','hr.idHorario' )
       ->join('lugar as lg','lg.idLugar','=','ahora.idLugar')
       ->Select('ahora.idAsignar_horario','lg.Nombre_origen','lg.Nombre_destino','hr.dia','hr.hora')
       ->get();
        return view('asignarpaquete.edit', compact('asigna','paquetes','horario','persona','pdestino','empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asignarpaquete  $asignarpaquete
     * @return \Illuminate\Http\Response
     */
    public function update(asignarpaquete $request, $id)
    {
        $asigna=request()->except(['_token','_method']);
        asignarpaquete::where('idAsignar_paquete','=',$id)->update($asigna);
        return redirect('/asignarpaquete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asignarpaquete  $asignarpaquete
     * @return \Illuminate\Http\Response
     */
    public function destroy(asignarpaquete $asignarpaquete)
    {
        //
    }

    public function Eliminar_asignacionpaquete($id)
    {
      asignarpaquete::destroy($id);
      return redirect('asignarpaquete');
    }
}
