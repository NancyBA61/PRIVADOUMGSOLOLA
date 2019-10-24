@extends('layouts.app_menu')
@section('contenido')


    <div class="container-fluid">

      <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Registrar empleado</h5>
              </div>
              <div class="widget-content nopadding">
              <!------------------------------------------------------------------->
              <form action="{{url('/empleado/'.$empleado->idEmpleado)}}" method="POST" method="get" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('Patch')}}
              <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Nombre:</label>
                    <div class="controls">
                      <input type="text"   value="{{$empleado->Nombre}}" class="span11" name="Nombre" autofocus placeholder="Escribir nombre" />
                    </div>
                  </div>

                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Apellido:</label>
                    <div class="controls">
                      <input type="text" value="{{$empleado->Apellido}}"  class="span11" name="Apellido" placeholder="Escribir apellidos"  />
                    </div>
                  </div>
                  <!------------------------------------------------------------------->
                    <div class="control-group">
                      <label class="control-label">Teléfono:</label>
                      <div class="controls">
                        <input type="text" value="{{$empleado->Telefono}}" class="span11" name="Telefono" placeholder="Escribir teléfono"  />
                      </div>
                    </div>
                    <!------------------------------------------------------------------->
                      <div class="control-group">
                        <label class="control-label">Dirección:</label>
                        <div class="controls">
                          <input type="text" value="{{$empleado->Direccion}}" class="span11"name="Direccion"  placeholder="calle-avenida-zona-municipio-departamento"  />
                        </div>
                      </div>
                      <!------------------------------------------------------------------->
                        <div class="control-group">
                          <label class="control-label">Correo electrónico:</label>
                          <div class="controls">
                            <input type="email"value="{{$empleado->Correo_electronico}}" class="span11" name="Correo_electronico" placeholder="Correo electrónico"  />
                            <span class="help-block">ejemplo@ ejemplo.com</span>
                           </div>

                        </div>
                      <!------------------------------------------------------------------->
                          <div class="control-group">
                            <label class="control-label">Puesto:</label>
                            <div class="controls">
                              <input type="text" value="{{$empleado->Puesto}}"class="span11"name="Puesto"  placeholder="Puesto"  />
                            </div>
                          </div>
                          <!------------------------------------------------------------------->
                              <div class="control-group">
                                <label class="control-label">Salario:</label>
                                <div class="controls">
                                  <input type="text"value="{{$empleado->Salario}}" class="span11"name="Salario"  placeholder="Salario"  />
                                </div>
                              </div>
                              <!------------------------------------------------------------------->
                                  <div class="control-group">
                                    <label class="control-label">Usuario:</label>
                                    <div class="controls">
                                      <input type="text" value="{{$empleado->Usuario}}"class="span11" name="Usuario"  placeholder="Usuario"  />
                                    </div>
                                  </div>
                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Contraseña:</label>
                    <div class="controls">
                      <input type="password"value="{{$empleado->Contrasena}}" name="Contrasena" class="span11" placeholder="Enter Password"  />
                    </div>
                  </div>
                  <!------------------------------------------------------------------->

                  <!------------------------------------------------------------------->
                  <div class="form-actions">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a type="button"  href="{{ url('empleado') }}" class="btn btn-danger" name="button">Cancelar</a>
                  </div>
                </form>
              </div>
            </div>


          </div>

        </div>


    </div>
    <br>


@endsection
