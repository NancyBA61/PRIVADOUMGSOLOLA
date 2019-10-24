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
            <form action="{{url('/compra')}}" method="POST" class="form-horizontal">
         {{  csrf_field()}}

            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Transporte:</label>
                  <div class="controls">
                    
                    <select name="idTransporte" class="span6">
                      <option value="">Seleccione</option>
                      @foreach ($transporte as $transportes) 
                            <option value="{{$transportes['idtransporte']}}">{{$transportes['descripcion']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Cantidad:</label>
                  <div class="controls">
                    <input type="text" class="span6" name="cantidad" placeholder="Escribir apellidos"  />
                  </div>
                </div>
                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Fecha de compra:</label>
                    <div class="controls">
                      <input type="date" class="span6" name="Fecha_compra" />
                    </div>
                  </div>
                  <!------------------------------------------------------------------->
                    <div class="control-group">
                      <label class="control-label">Precio unitario:</label>
                      <div class="controls">
                        <input type="text" class="span6"name="Precio_unitario"  placeholder="Escribir costo unitario"  />
                      </div>
                    </div>
                    <!------------------------------------------------------------------->
                      <div class="control-group">
                        <label class="control-label">Total:</label>
                        <div class="controls">
                          <input type="text" class="span6" name="Total" placeholder="Escribir total"  />
                         </div>

                      </div>
                    <!------------------------------------------------------------------->
                        <div class="control-group">
                          <label class="control-label">No. Factura de compra:</label>
                          <div class="controls">
                            <input type="text" class="span6"name="numero_facturacompra"  placeholder="Escribir número de compra"  />
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
