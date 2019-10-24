@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container-fluid">
  <h2>Listado de Pasajeros<a href="persona/create">
    <button class="btn btn-success">Nuevo Pasajero</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de Pasajeros</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Correo electrónico</th>
                    <th>Acciones</th>

                </tr>
              </thead>
              <tbody>

                @foreach($persona as $per)
                  <tr class="gradeX">
                    <td> {{$per->idPersona}}</td>
                    <td> {{$per->Nombre}}</td>
                    <td> {{$per->Apellido}}</td>
                    <td> {{$per->Telefono}}</td>
                    <td> {{$per->Direccion}}</td>
                    <td> {{$per->Correo_electronico}}</td>
                    <td>
                      <a href="{{url('/persona/'.$per->idPersona.'/edit')}}" class="btn btn-warning btn-mini">Editar</a>
                      <a href="{{ route('Eliminar_persona',$per->idPersona) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>

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
