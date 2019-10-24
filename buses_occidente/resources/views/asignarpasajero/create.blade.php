@extends('layouts.app_menu')
@section('contenido')
  <div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Registrar asignaciones de horarios a pasajeros</h5>
            </div>
            <div class="widget-content nopadding">
            <!------------------------------------------------------------------->
            <form action="{{url('/asignarpasajero')}}" method="POST" class="form-horizontal">
            {{csrf_field()}}

            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Datos persona:</label>
                  <div class="controls">
                    <select name="idPersona" class="span6">
                      <option value="">Seleccione</option>
                      @foreach ($persona as $personas) 
                          <option value="{{$personas->idPersona}}">{{$personas->Nombre}} {{$personas->Apellido}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

               <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Datos de horario</label>
                  <div class="controls">
                    <select name="idAsignar_horario" class="span6">
                      <option value="">Seleccione</option>
                      @foreach ($lugar1 as $lg) 
                      <option value="{{$lg->idAsignar_horario}}">{{$lg->Nombre_origen}} {{$lg->Nombre_destino}}, {{$lg->Costo_pasaje}}, {{$lg->hora}}-{{$lg->dia}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
             
                 <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Datos de Empleado:</label>
                  <div class="controls">
                    
                    <select name="idEmpleado" class="span6">
                      <option value="">opcion</option>
                      @foreach ($empleado as $empleados) 
                      <option value="{{$empleados->idEmpleado}}">{{$empleados->Nombre}} {{$empleados->Apellido}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                  <!------------------------------------------------------------------->
                    <div class="control-group">
                      <label class="control-label">Número de asiento:</label>
                      <div class="controls">
                        <input type="text" class="span6"name=Numero_asiento  placeholder="asientos disponibles"  />
                      </div>
                    </div>
                <!------------------------------------------------------------------->
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a type="button"  href="{{ url('asignarpasajero') }}" class="btn btn-danger" name="button">Cancelar</a>

                </div>
              </form>
            </div>
          </div>


        </div>

      </div>


  </div>
  <br>


@endsection
