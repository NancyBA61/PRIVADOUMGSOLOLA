
@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container-fluid">
  <h2>Listado de rutas<a href="lugar/create">
    <button class="btn btn-success">Nuevo ruta</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de rutas </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre origen</th>
                  <th>Nombre destino</th>
                  <th>Costo pasaje</th>
                  <th>Costo paquete</th>
                  <th>Acciones </th>
                </tr>
              </thead>
              <tbody>

                @foreach($lugar as $lg)<!--- $lugar lo envia el controlador y $lg lee el foreach--->
                  <tr class="gradeX">
                    <td> {{$lg->idLugar}}</td>
                    <td> {{$lg->Nombre_origen}}</td>
                    <td> {{$lg->Nombre_destino}}</td>
                    <td> Q. {{$lg->Costo_pasaje}}</td>
                    <td> Q. {{$lg->Costo_paquete}}</td>

                    <td>
                      <a href="{{url('/lugar/'.$lg->idLugar.'/edit')}}" class="btn btn-info btn-mini"><i class=" icon-edit"></i> Editar</a>
                      <a href="{{ route('Eliminar_lugar',$lg->idLugar) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>
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
