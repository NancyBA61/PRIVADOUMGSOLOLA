@extends('layouts.app_menu')
@section('contenido')

  <div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Registrar Persona destino</h5>
            </div>
            <div class="widget-content nopadding">
            <!------------------------------------------------------------------->
            <form action="{{url('/pdestino')}}" method="POST"  class="form-horizontal">
              {{csrf_field()}}

            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Nombre:</label>
                  <div class="controls">
                    <input type="text" class="span11"  name="nombres" autofocus placeholder="Escribir nombre" />
                  </div>
                </div>

              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Apellido:</label>
                  <div class="controls">
                    <input type="text" class="span11"  name="apellidos" placeholder="Escribir apellidos"  />
                  </div>
                </div>
                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Teléfono uno:</label>
                    <div class="controls">
                      <input type="text" class="span11"name="Telefono_uno"   placeholder="Escribir teléfono"  />
                    </div>
                  </div>
                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Teléfono dos:</label>
                    <div class="controls">
                      <input type="text" class="span11"name="Telefono_dos"   placeholder="Escribir teléfono"  />
                    </div>
                  </div>
                  <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Nombre empresa:</label>
                    <div class="controls">
                      <input type="text" class="span11"name="Nombre_empresa"   placeholder="Escribir nombre de la empresa"  />
                    </div>
                  </div>
                  <!------------------------------------------------------------------->
                    <div class="control-group">
                      <label class="control-label">Dirección:</label>
                      <div class="controls">
                        <input type="text" class="span11" name="Direccion" placeholder="calle-avenida-zona-municipio-departamento"  />
                      </div>
                    </div>
                    <!------------------------------------------------------------------->
                        <div class="control-group">
                          <label class="control-label">Punto de referencia:</label>
                          <div class="controls">
                            <input type="text" class="span11"name="Punto_referencia" placeholder="Escribir punto de referencia"  />
                          </div>
                        </div>
                        <!------------------------------------------------------------------->

                <!------------------------------------------------------------------->

                <!------------------------------------------------------------------->
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a type="button"  href="{{ url('pdestino') }}" class="btn btn-danger" name="button">Cancelar</a>

                </div>
              </form>
            </div>
          </div>


        </div>

      </div>


  </div>
  <br>


@endsection
