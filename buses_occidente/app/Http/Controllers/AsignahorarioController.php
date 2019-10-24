<?php

namespace App\Http\Controllers;

use DB;

use App\asignahorario;
use App\Transporte;
use App\Horario;
use App\Lugar;
use Illuminate\Http\Request;
use App\Http\Requests\asignarhorarioFormRequest;
class AsignahorarioController extends Controller
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

            $lugar=DB::table('lugar as lg')
            ->join('asignar_horario as asigh', 'asigh.idLugar', '=', 'lg.idLugar') //union de las dos tablas
            ->join('horario as hora', 'hora.idHorario','=', 'asigh.idHorario')
            ->join('transporte as trans', 'trans.idtransporte','=', 'asigh.idTipo_transporte')
            ->Select('asigh.idAsignar_horario','lg.Nombre_origen','lg.Nombre_destino','hora.dia','hora.hora','trans.descripcion','asigh.fecha_viaje','asigh.asientos_disponibles')
            ->get();
        return view ('asignarh.index',["asignarh"=>$lugar]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transporte=Transporte::all();
        $horario=Horario::all();
        $lugar=Lugar::all();
        return view('asignarh.create', compact('transporte','horario','lugar'));
        //las variables transporte, horario y lugar son las que deben ir al foreach en la vista


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(asignarhorarioFormRequest $request)
    {
      $asigna=request()->except('_token');
      asignahorario::insert($asigna);
      return redirect('/asignarh')->with('Mensaje','Empleado registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\asignahorario  $asignahorario
     * @return \Illuminate\Http\Response
     */
    public function show(asignahorario $asignahorario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asignahorario  $asignahorario
     * @return \Illuminate\Http\Response
     */
    public function edit($id){//recibirmos la informacion a traves de la url
      $asigna=asignahorario::findOrFail($id); //devuelve toda la informacion que corresponde al id
      //busca toda la información que corresponde al id
       $transporte=Transporte::all();
       $horario=Horario::all();
       $lugar=Lugar::all();
       return view('asignarh.edit', compact('transporte','horario','lugar','asigna'));
      
      //compact funcion que retorna la informacion de una varible
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asignahorario  $asignahorario
     * @return \Illuminate\Http\Response
     */
    public function update(asignarhorarioFormRequest $request, $id)
    {
      $asigna=request()->except(['_token','_method']);
      asignahorario::where('idAsignar_horario','=',$id)->update($asigna);
      $ahorario=asignahorario::findOrFail($id);
      return redirect('/asignarh');
      //return view('empleado.edit',compact('empleado'));
      //return response()->json($empleado);
            }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asignahorario  $asignahorario
     * @return \Illuminate\Http\Response
     */
    public function Eliminar_asignacionh($id)
    {
      asignahorario::destroy($id);
      return redirect('asignarh');
    }
}
