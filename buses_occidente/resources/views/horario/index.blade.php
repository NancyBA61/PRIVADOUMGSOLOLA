@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<div class="container-fluid">
  <h2>Listado de horarios<a href="horario/create">
    <button class="btn btn-success">Nuevo horario</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Lista de horarios</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Día</th>
                  <th>Hora</th>
                  <th>Acciones</th>

                </tr>
              </thead>
              <tbody>
                @foreach($horario as $hr)
                  <tr class="gradeX">
                    <td> {{$hr->idHorario}}</td>
                    <td> {{$hr->dia}}</td>
                    <td> {{$hr->hora}}</td>

                    <td>
                      <a href="{{url('/horario/'.$hr->idHorario.'/edit')}}" class="btn btn-info btn-mini"><i class=" icon-edit"></i> Editar</a>
                      <a href="{{ route('Eliminar_horario',$hr->idHorario) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>
                      <!---envia el id a la ruta luego al controlador horario funcion Eliminar_empleado----------------->
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
