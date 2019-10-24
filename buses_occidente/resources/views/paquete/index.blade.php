@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container-fluid">
  <h2>Listado de paquetes<a href="paquete/create">
    <button class="btn btn-success">Registrar nuevo paquete</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de paquetes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tipo paquete</th>
                  <th>Peso en libras</th>
                  <th>Costo libras</th>
                  <th>Costo total</th>
                  <th>Acciones</th>

                </tr>
              </thead>
              <tbody>

                @foreach($paquete as $paquetes)
                  <tr class="gradeX">
                    <td> {{$paquetes->IdPaquete}}</td>
                    <td> {{$paquetes->TipoPaquete}}</td>
                    <td> {{$paquetes->Peso_lbs}}</td>
                    <td> {{$paquetes->Costo_libra}}</td>
                    <td> {{$paquetes->Costo_Total}}</td>

                    <td>
                      <a href="{{url('/paquete/'.$paquetes->IdPaquete.'/edit')}}" class="btn btn-info btn-mini"><i class=" icon-edit"></i> Editar</a>
                      <a href="{{ route('Eliminar_paquete',$paquetes->IdPaquete) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>
                      <!---envia el id a la ruta luego al controlador empelado funcion Eliminar_empleado----------------->
                    </td>
                      </tr>
                  @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>




@endsection
