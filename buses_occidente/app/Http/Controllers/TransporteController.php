<?php

namespace App\Http\Controllers;

use App\Transporte;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TransporteFormRequest;

class TransporteController extends Controller
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
            $transporte=DB::table ('transporte')->get();
        return view ('transporte.index',["transporte"=>$transporte]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transporte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransporteFormRequest $request)
    {
        $transporte=request()->except('_token');
        Transporte::insert($transporte);
        return redirect('/transporte')->with('Mensaje','Transporte registrado con éxito');
        //return response()->json($transporte);
    }

      public function edit($id){
      $transporte=Transporte::findOrFail($id); //devuelve toda la informacion que corresponde al id
      //busca toda la información que corresponde al id
      return view('transporte.edit',compact('transporte')); //retornamos vista con la informacion del empleado
      //compact funcion que retorna la informacion de una varible
   }
   public function update(TransporteFormRequest $request, $id)
   {
      $datostransporte=request()->except(['_token','_method']);
      Transporte::where('idtransporte','=',$id)->update($datostransporte);
      $transporte=Transporte::findOrFail($id);
      return redirect('/transporte');

   }

   public function Eliminar_transporte ($id)
   {
      Transporte::destroy($id);
      return redirect('transporte');
   }
}
