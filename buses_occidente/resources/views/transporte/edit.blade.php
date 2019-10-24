@extends('layouts.app_menu')
@section('contenido')



    <div class="container-fluid">

      <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Registrar trasporte</h5>
              </div>
              <div class="widget-content nopadding">
              <!------------------------------------------------------------------->
              <form action="{{url('/transporte/'.$transporte->idtransporte)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('Patch')}}

              <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Descripción tipo transporte:</label>
                    <div class="controls">
                      <input type="text" class="span11"value="{{$transporte->descripcion}}" name="descripcion" placeholder="Escribir Autobus o Camión"   />
                    </div>
                  </div>

                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Cantidad de asientos:</label>
                    <div class="controls">
                      <input type="text" class="span11" value="{{$transporte->Cantidad_asientos}}" name="cantidad_asientos" placeholder="Escribir cantidad de asientos" />
                    </div>
                  </div>
                  <!------------------------------------------------------------------->
                    <div class="control-group">
                      <label class="control-label">Placa:</label>
                      <div class="controls">
                        <input type="text" class="span11"value="{{$transporte->placa}}"name="placa"placeholder="Escribir Placa"     />
                      </div>
                    </div>
                    <!------------------------------------------------------------------->
                      <div class="control-group">
                        <label class="control-label">Marca:</label>
                        <div class="controls">
                          <input type="text" class="span11"value="{{$transporte->Marca}}" name="marca" placeholder="Escribir Marca"  />
                        </div>
                      </div>
                      <!------------------------------------------------------------------->
                        <div class="control-group">
                          <label class="control-label">Color:</label>
                          <div class="controls">
                            <input type="text" class="span11"value="{{$transporte->Color}}" name="color" placeholder="Escribir Color" />

                           </div>

                        </div>
                      <!------------------------------------------------------------------->
                          <div class="control-group">
                            <label class="control-label">Capacidad libras:</label>
                            <div class="controls">
                              <input type="text" value="{{$transporte->Capacidad_libras}}" name="capacidad_libras"class="span11"placeholder="Escribir libras"     />
                            </div>
                          </div>
                          <!------------------------------------------------------------------->
                          <div class="control-group">
                            <label class="control-label">Costo:</label>
                            <div class="controls">
                              <input type="text"value="{{$transporte->Costo}}" name="costo" class="span11"placeholder="Escribir costo"   />
                            </div>
                          </div>
                  <!------------------------------------------------------------------->

                  <!------------------------------------------------------------------->
                  <div class="form-actions">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a type="button"  href="{{ url('transporte') }}" class="btn btn-danger" name="button">Cancelar</a>

                  </div>
                </form>
              </div>
            </div>


          </div>

        </div>


    </div>
    <br>



@endsection
