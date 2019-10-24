@extends('layouts.app_menu')
@section('contenido')


    <div class="container-fluid">

      <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <!------------------------------------------------------------------->

              <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Actualizar información de persona origen</h5>
              </div>
              <!------------------------------------------------------------------->

              <div class="widget-content nopadding">
              <!------------------------------------------------------------------->
              <form action="{{url('/personaOrigen/'.$personaori->idPersona)}}" method="POST"  class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('Patch')}}
            <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Nombre:</label>
                    <div class="controls">
                      <input type="text" class="span11"   value="{{$personaori->Nombre}}" name="Nombre" autofocus placeholder="Escribir nombre" />
                    </div>
                  </div>

                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Apellido:</label>
                    <div class="controls">
                      <input type="text" class="span11"  value="{{$personaori->Apellido}}"  name="Apellido" placeholder="Escribir apellidos"  />
                    </div>
                  </div>
                  <!------------------------------------------------------------------->
                    <div class="control-group">
                      <label class="control-label">Teléfono:</label>
                      <div class="controls">
                        <input type="text" class="span11"value="{{$personaori->Telefono}}"name="Telefono"   placeholder="Escribir teléfono"  />
                      </div>
                    </div>
                    <!------------------------------------------------------------------->
                      <div class="control-group">
                        <label class="control-label">Dirección:</label>
                        <div class="controls">
                          <input type="text" class="span11"value="{{$personaori->Direccion}}" name="Direccion" placeholder="calle-avenida-zona-municipio-departamento"  />
                        </div>
                      </div>
                      <!------------------------------------------------------------------->
                        <div class="control-group">
                          <label class="control-label">Correo electrónico:</label>
                          <div class="controls">
                            <input type="email" class="span11"value="{{$personaori->Correo_electronico}}"  name="Correo_electronico" placeholder="Correo electrónico"  />
                            <span class="help-block">ejemplo@ ejemplo.com</span>
                           </div>

                        </div>
                      <!------------------------------------------------------------------->
                          <div class="control-group">
                            
                            <div class="controls">
                              <input type="hidden" class="span11"value="{{$personaori->Tipo_persona}}" name="Tipo_persona" value="Emisor"    />
                            </div>
                          </div>
                          <!------------------------------------------------------------------->

                  <div class="form-actions">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a type="button"  href="{{ url('persona') }}" class="btn btn-danger" name="button">Cancelar</a>
                    <!------------------------------------------------------------------->

                  </div>
                </form>
              </div>
            </div>


          </div>

        </div>


    </div>
    <br>


@endsection
