
@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container-fluid">
  <h2>Listado de empleados<a href="empleado/create">
    <button class="btn btn-success">Nuevo Empleado</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de empleados</h5>
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
                  <th>Puesto</th>
                  <th>Salario</th>
                  <th>Acciones</th>

                </tr>
              </thead>
              <tbody>

                @foreach($empleados as $emp)
                  <tr class="gradeX">
                    <td> {{$emp->idEmpleado}}</td>
                    <td> {{$emp->Nombre}}</td>
                    <td> {{$emp->Apellido}}</td>
                    <td> {{$emp->Telefono}}</td>
                    <td> {{$emp->Direccion}}</td>
                    <td> {{$emp->Correo_electronico}}</td>
                    <td> {{$emp->Puesto}}</td>
                    <td> {{$emp->Salario}}</td>
                    <td>
                      <a href="{{url('/empleado/'.$emp->idEmpleado.'/edit')}}" class="btn btn-info btn-mini"><i class=" icon-edit"></i> Editar</a>
                      <a href="{{ route('Eliminar_empleado',$emp->idEmpleado) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>
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
