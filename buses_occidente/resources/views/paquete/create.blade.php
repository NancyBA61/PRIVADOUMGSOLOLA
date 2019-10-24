@extends('layouts.app_menu')
@section('contenido')

  <div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Registrar de paquetes</h5>
            </div>
            <div class="widget-content nopadding">
            <!------------------------------------------------------------------->
            <form action="{{url('/paquete')}}" method="POST" class="form-horizontal">
         {{  csrf_field()}}

          <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Tipo de paquete:</label>
                  <div class="controls">
                    
                    <select name="TipoPaquete">
                      <option value="">Seleccione un tipo de paquete</option>
                     <option value="Sobre">Sobre</option>
                     <option value="Paquete">Paquete</option>
                    </select>
                  </div>
                </div>
              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Peso (libras)</label>
                  <div class="controls">
                    <input type="text" class="span11" name="Peso_lbs" placeholder="Escribir cantidad de libras"  />
                  </div>
                </div>
                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Costo por libra:</label>
                    <div class="controls">
                      <input type="text" class="span11" name="Costo_libra" placeholder="Escribir el costo por libra"  />
                    </div>
                  </div>
                  <!------------------------------------------------------------------->
                    <div class="control-group">
                      <div class="controls">
                        <input type="hidden" class="span11"name="Costo_Total" value="0" placeholder="Costo total"  />
                      </div>
                    </div>
                    <!------------------------------------------------------------------->
                      
                <!------------------------------------------------------------------->
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a type="button"  href="{{ url('paquete') }}" class="btn btn-danger" name="button">Cancelar</a>

                </div>
              </form>
            </div>
          </div>


        </div>

      </div>


  </div>
  <br>


@endsection
