<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests\CompraFormRequest;
use App\compra;
use App\Transporte;
use Illuminate\Http\Request;

class CompraController extends Controller
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
            $compra=DB::table ('transporte as trans')
            ->join('compra as com','trans.idtransporte','=','com.idTransporte')
            ->select('com.idCompra','trans.descripcion','trans.marca','com.cantidad','com.Fecha_compra','com.Precio_unitario','com.Total','com.numero_facturacompra')
            ->get();
        return view ('compra.index',["compra"=>$compra]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //consulta de transporte para el combo box
        $transporte=Transporte::all();
        return view('compra.create', compact('transporte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(CompraFormRequest $request){
    $compra=request()->except('_token');
      compra::insert($compra);
      return redirect('/compra')->with('Mensaje','Empleado registrado con éxito');
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $compras=compra::findOrFail($id);
       $transporte=Transporte::all();
      return view('compra.edit',compact('compras','transporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(CompraFormRequest $request, $id)
    {
      $datoscompra=request()->except(['_token','_method']);
      compra::where('idCompra','=',$id)->update($datoscompra);
      //$compras=compra::findOrFail($id);
      return redirect('/compra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function Eliminar_compra( $id)
    {
       compra::destroy($id);
      return redirect('compra');
    }
}
