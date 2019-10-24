@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container-fluid">
  <h2>Listado de horarios<a href="asignarh/create">
    <button class="btn btn-success">Nueva asignación de horario</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de horarios</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Lugar</th>
                  <th>Horario</th>
                  <th>Transporte</th>
                  <th>Fecha viaje</th>
                  <th>Asientos disponibles</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                @foreach($asignarh as $asigh)
                  <tr class="gradeX">
                     <td> {{$asigh->idAsignar_horario}}</td>
                    <td> {{$asigh->Nombre_origen}}-{{$asigh->Nombre_destino}}</td>
                    <td> {{$asigh->dia}}-{{$asigh->hora}}</td>
                    <td> {{$asigh->descripcion}}</td>
                    <td> {{$asigh->fecha_viaje}}</td>
                    <td> {{$asigh->asientos_disponibles}}</td>
                   
                    <td>
                      <a href="{{url('/asignarh/'.$asigh->idAsignar_horario.'/edit')}}" class="btn btn-info btn-mini"><i class=" icon-edit"></i> Editar</a>
                      <a href="{{ route('Eliminar_asignacionh',$asigh->idAsignar_horario) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>
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
