@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container-fluid">
  <h2>Listado de Persona origen(paquetería)<a href="personaOrigen/create">
    <button class="btn btn-success">Ingresar nuevos datos</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado</h5>
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

                @foreach($personaori as $origen)
                  <tr class="gradeX">
                    <td> {{$origen->idPersona}}</td>
                    <td> {{$origen->Nombre}}</td>
                    <td> {{$origen->Apellido}}</td>
                    <td> {{$origen->Telefono}}</td>
                    <td> {{$origen->Direccion}}</td>
                    <td> {{$origen->Correo_electronico}}</td>
                    <td>
                      <a href="{{url('/personaOrigen/'.$origen->idPersona.'/edit')}}" class="btn btn-warning btn-mini">Editar</a>
                      <a href="{{ route('Eliminar_porigen',$origen->idPersona) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>

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
