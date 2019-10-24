@extends('layouts.app_menu')
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="container-fluid">
  <h2>Listado de compras<a href="compra/create">
    <button class="btn btn-success">Nuevo registro de compras</button></a></h2>
    <div class="row-fluid">
      <div class="span12">
            <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Listado de compras</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Transporte</th>
                  <th>Cantidad</th>
                  <th>Fecha compra</th>
                  <th>Precio unitario</th>
                  <th>Total</th>
                  <th>No. Factura de compra</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                @foreach($compra as $comp)
                  <tr class="gradeX">
                     <td> {{$comp->idCompra}}</td>
                    <td> {{$comp->descripcion}}, {{ $comp->marca}}</td>
                    <td> {{$comp->cantidad}}</td>
                    <td> {{$comp->Fecha_compra}}</td>
                    <td> {{$comp->Precio_unitario}}</td>
                    <td> {{$comp->Total}}</td>
                    <td> {{$comp->numero_facturacompra}}</td>
                   
                    <td>
                      <a href="{{url('/compra/'.$comp->idCompra.'/edit')}}" class="btn btn-info btn-mini"><i class=" icon-edit"></i> Editar</a>
                      <a href="{{ route('Eliminar_compra',$comp->idCompra) }}" onclick="myFunction()" class="btn btn-inverse btn-mini"><i class=" icon-trash"></i> Borrar </a>
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
