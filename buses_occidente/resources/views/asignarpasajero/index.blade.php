@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container-fluid">
  <h2>Listado de asignación de horario a pasajeros<a href="asignarpasajero/create">
    <button class="btn btn-success">Nueva asignación de horario a pasajeros</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de asignación de horarios a pasajeros</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Datos pasajero</th>
                  <th>Lugares</th>
                  <th> Dia y Hora</th>
                  <th>Número de asiento</th>
                  <th>Costo Pasaje</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

                @foreach($asigp as $asigna)
                  <tr class="gradeX">
                     <td> {{$asigna->idAsignar_pasajero}}</td>
                    <td> {{$asigna->Nombre}} {{ $asigna->Apellido}}</td>
                    <td>{{ $asigna->Nombre_origen}}-{{ $asigna->Nombre_destino}}</td>
                    <td>{{$asigna->dia}}, {{ $asigna->hora}}</td>
                    <td> {{$asigna->Numero_asiento}}</td>
                    <td>{{ $asigna->Costo_pasaje }}</td>
                    <td>
                      <a href="{{url('/asignarpasajero/'.$asigna->idAsignar_pasajero.'/edit')}}" class="btn btn-info btn-mini"><i class=" icon-edit"></i> Editar</a>
                      <a href="{{ route('Eliminar_asignacionp',$asigna->idAsignar_pasajero) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>
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
