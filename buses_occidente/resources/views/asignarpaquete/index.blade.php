@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container-fluid">
  <h2>Listado de asignación de paquetes<a href="asignarpaquete/create">
    <button class="btn btn-success">Nueva asignación de paquetes</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de asignaciones de paquetes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Detalles paquete</th>
                  <th>Lugar</th>
                  <th>Día y Hora</th>
                  <th>Costo de envío</th>
                  <th>Persona que envia paquete</th>
                  <th>Persona que recibe paquete</th>
                  
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

                @foreach($asignarpaquete as $asigpaquete)
                  <tr class="gradeX">
                     <td> {{$asigpaquete->idAsignar_paquete}}</td>
                    <td> {{$asigpaquete->Tipopaquete}}, {{$asigpaquete->Peso_lbs}} lbs</td>
                    <td> {{$asigpaquete->Nombre_origen}}-{{$asigpaquete->Nombre_destino}}</td>
                    <td> {{$asigpaquete->dia}}, {{$asigpaquete->hora}}</td>
                    <td> {{$asigpaquete->Costo_envio}}</td>
                    <td> {{$asigpaquete->Nombre}} {{$asigpaquete->Apellido}}</td>
                    <td> {{$asigpaquete->nombres}} {{$asigpaquete->apellidos}}</td>
                    <td>
                      <a href="{{url('/asignarpaquete/'.$asigpaquete->idAsignar_paquete.'/edit')}}" class="btn btn-info btn-mini"><i class=" icon-edit"></i> Editar</a>
                      <a href="{{ route('Eliminar_asignacionpaquete',$asigpaquete->idAsignar_paquete) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>
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
