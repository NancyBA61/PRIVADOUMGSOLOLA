@extends('layouts.app_menu')
@section('contenido')

  <div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Registrar compras</h5>
            </div>
            <div class="widget-content nopadding">
            <!------------------------------------------------------------------->

              <form action="{{url('/compra/'.$compras->idCompra)}}" method="POST"  class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('Patch')}}


            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Transporte:</label>
                  <div class="controls">
                    <select name="idTransporte" class="span6">
                    @foreach($transporte as $trans)
                      @if($trans->idtransporte==$compras->idTransporte)
                          <option value="{{ $trans->idtransporte }}" selected>{{ $trans->descripcion}}</option>
                      @else
                          <option value="{{ $trans->idtransporte }}">{{ $trans->descripcion}}</option>
                      @endif
                    @endforeach    
                    </select>
                  </div>
                </div>
              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Cantidad:</label>
                  <div class="controls">
                    <input type="text" class="span6" name="cantidad" placeholder="Escribir cantidad"  value="{{$compras->cantidad}}" />
                  </div>
                </div>
                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Fecha de compra:</label>
                    <div class="controls">
                      <input type="date" class="span6" name="Fecha_compra"  value="{{$compras->Fecha_compra}}"/>
                    </div>
                  </div>
                  <!------------------------------------------------------------------->
                    <div class="control-group">
                      <label class="control-label">Precio unitario:</label>
                      <div class="controls">
                        <input type="text" class="span6"name="Precio_unitario"  placeholder="Escribir costo unitario"  value="{{$compras->Precio_unitario}}" />
                      </div>
                    </div>
                    <!------------------------------------------------------------------->
                      <div class="control-group">
                        <label class="control-label">Total:</label>
                        <div class="controls">
                          <input type="text" class="span11" name="Total" placeholder="Escribir total"  value="{{$compras->Total}}" />
                         </div>

                      </div>
                    <!------------------------------------------------------------------->
                        <div class="control-group">
                          <label class="control-label">No. Factura de compra:</label>
                          <div class="controls">
                            <input type="text" class="span11"name="numero_facturacompra"  placeholder="Escribir número de compra"  value="{{$compras->numero_facturacompra}}" />
                          </div>
                        </div>
                        
                <!------------------------------------------------------------------->
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a type="button"  href="{{ url('compra') }}" class="btn btn-danger" name="button">Cancelar</a>

                </div>
              </form>
            </div>
          </div>


        </div>

      </div>


  </div>
  <br>


@endsection
