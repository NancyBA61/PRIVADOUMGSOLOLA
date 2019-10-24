@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container-fluid">
  <!-- Recirdar referenciar al formulario que corresponde --->
  <h2>Listado de Persona destino<a href="pdestino/create">
    <button class="btn btn-success">Nuevo destino</button></a></h2>
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
                  <th>Nombres </th>
                  <th>Apellidos</th>
                  <th>Teléfono uno</th>
                  <th>Teléfono dos</th>
                  <th>Nombre empresa</th>
                  <th>Dirección</th>
                  <th>Punto de referencia</th>
                    <th>Acciones</th>

                </tr>
              </thead>
              <tbody>

                @foreach($pdestino as $pdest)
                  <tr class="gradeX">
                    <td> {{$pdest->idPersona_destino}}</td>
                    <td> {{$pdest->nombres}}</td>
                    <td> {{$pdest->apellidos}}</td>
                    <td> {{$pdest->Telefono_uno}}</td>
                    <td> {{$pdest->Telefono_dos}}</td>
                    <td> {{$pdest->Nombre_empresa}}</td>
                    <td> {{$pdest->Direccion}}</td>
                    <td> {{$pdest->Punto_referencia}}</td>
                    <td>
                      <a href="{{url('/pdestino/'.$pdest->idPersona_destino.'/edit')}}" class="btn btn-warning btn-mini">Editar</a>
                      <a href="{{ route('Eliminar_pdestino',$pdest->idPersona_destino) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>

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
