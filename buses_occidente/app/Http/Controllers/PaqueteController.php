<?php

namespace App\Http\Controllers;

use App\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests\PaqueteFormRequest;

class PaqueteController extends Controller
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
    public function index(request $requests)
    {
       if($requests){
            $paquete=DB::table ('paquete')->get();
        return view ('paquete.index',["paquete"=>$paquete]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paquete.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $paquete=request()->except('_token');
      Paquete::insert($paquete);
      return redirect('/paquete')->with('Mensaje','Paquete registrado con éxito');
    }

    public function edit($id){//recibirmos la informacion a traves de la url
      $paquete=Paquete::findOrFail($id); //devuelve toda la informacion que corresponde al id
      //busca toda la información que corresponde al id
      return view('paquete.edit',compact('paquete')); //retornamos vista con la informacion del empleado
      //compact funcion que retorna la informacion de una varible
   }
   public function update(PaqueteFormRequest $request, $id)
   {
      $datospaquete=request()->except(['_token','_method']);
      Paquete::where('IdPaquete','=',$id)->update($datospaquete);
      $paquete=Paquete::findOrFail($id);
      return redirect('/paquete');
      //return view('empleado.edit',compact('empleado'));
      //return response()->json($empleado);
   }

   public function Eliminar_paquete($id)
   {
      Paquete::destroy($id);
      return redirect('paquete');
   }
}