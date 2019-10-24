<?php

namespace App\Http\Controllers;

use App\horario;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\HorarioFormRequest;

class HorarioController extends Controller
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
            $horario=DB::table ('horario')->get();
        return view ('horario.index',["horario"=>$horario]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('horario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HorarioFormRequest $request)
    {
      $horario=request()->except('_token');
      Horario::insert($horario);
      return redirect('/horario')->with('Mensaje','Horario registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hr=Horario::findOrFail($id); //devuelve toda la informacion que corresponde al id
      //busca toda la información que corresponde al id
      return view('horario.edit',compact('hr'))->with('Mensaje','Horario actualizado con éxito');;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(HorarioFormRequest $request, $id)
    {
      $datoshora=request()->except(['_token','_method']);
      Horario::where('idHorario','=',$id)->update($datoshora);
      $hora=Horario::findOrFail($id);
      return redirect('/horario');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function Eliminar_horario($id)
    {
      horario::destroy($id);
      return redirect('horario');  //
    }
}
