@extends('layouts.app_menu')
@section('contenido')

  <div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Registrar de lugares</h5>
            </div>
            <div class="widget-content nopadding">
            <!------------------------------------------------------------------->
            <form action="{{url('/lugar')}}" method="POST" class="form-horizontal">
         {{  csrf_field()}}

            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Nombre lugar origen:</label>
                  <div class="controls">
                    <input type="text" class="span11" name="Nombre_origen" autofocus placeholder="Escribir nombre" />
                  </div>
                </div>

            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Nombre lugar destino:</label>
                  <div class="controls">
                    <input type="text" class="span11" name="Nombre_destino" autofocus placeholder="Escribir nombre" />
                  </div>
                </div>

              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Costo pasaje:</label>
                  <div class="controls">
                    <input type="text" class="span11" name="Costo_pasaje" placeholder="Escribir costo pasaje"  />
                  </div>
                </div>
                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Costo paquete:</label>
                    <div class="controls">
                      <input type="text" class="span11" name="Costo_paquete" placeholder="Escribir costo envío paquete"  />
                    </div>
                  </div>
                  
                <!------------------------------------------------------------------->
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a type="button"  href="{{ url('lugar') }}" class="btn btn-danger" name="button">Cancelar</a>

                </div>
              </form>
            </div>
          </div>


        </div>

      </div>


  </div>
  <br>


@endsection
