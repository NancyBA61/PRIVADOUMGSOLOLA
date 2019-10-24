@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<div class="container-fluid">
  <h2>Listado de transportes<a href="transporte/create">
    <button class="btn btn-success">Nuevo transporte</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Lista de transportes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Descripcion</th>
                  <th>Cantidad de asientos</th>
                  <th>Placa</th>
                  <th>Marca</th>
                  <th>Color</th>
                  <th>Capacidad libras</th>
                  <th>Costo</th>
                   <th>Acciones</th>

                </tr>
              </thead>
              <tbody>
                @foreach($transporte as $trans)
                  <tr class="gradeX">
                    <td> {{$trans->idtransporte}}</td>
                    <td> {{$trans->descripcion}}</td>
                    <td> {{$trans->Cantidad_asientos}}</td>
                    <td> {{$trans->placa}}</td>
                    <td> {{$trans->Marca}}</td>
                    <td> {{$trans->Color}}</td>
                    <td> {{$trans->Capacidad_libras}}</td>
                    <td> {{$trans->Costo}}</td>
                    <td>
                      <a href="{{url('/transporte/'.$trans->idtransporte.'/edit')}}"class="btn btn-info btn-mini"><i class=" icon-edit"></i> Editar</a>
                      <a href="{{ route('Eliminar_transporte',$trans->idtransporte) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>
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
