<?php

namespace App\Http\Controllers;

use App\Http\Requests\LugarFormRequest;
use DB;
use App\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
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
            $lugar=DB::table ('lugar')->get();
        return view ('lugar.index',["lugar"=>$lugar]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lugar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LugarFormRequest $request)
    {
      $lg=request()->except('_token');
      Lugar::insert($lg);
     return redirect('/lugar')->with('Mensaje','Lugar registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function show(Lugar $lugar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $lugar=Lugar::findOrFail($id); //devuelve toda la informacion que corresponde al id
      //busca toda la información que corresponde al id
      return view('lugar.edit',compact('lugar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function update(LugarFormRequest $request, $id)
    {
      $datoslugar=request()->except(['_token','_method']);
      Lugar::where('idLugar','=',$id)->update($datoslugar);
      $lugar=Lugar::findOrFail($id);
      return redirect('/lugar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lugar  $lugar
     * @return \Illuminate\Http\Response
     */
    public function Eliminar_lugar($id)
    {
     lugar::destroy($id);
     return redirect('lugar');
    }
}
