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
              <form action="{{url('/asignarpasajero/'.$asigna->idAsignar_pasajero)}}" method="POST" class="form-horizontal">
                {{csrf_field()}}
                {{method_field('Patch')}}  
            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Datos pasajero:</label>
                  <div class="controls">
                    <select name="idPersona" class="span6">
                      @foreach ($persona as $per) 
                          @if($per->idPersona==$asigna->idPersona)
                                <option value="{{$per->idPersona}}" selected>{{$per->Nombre}} {{$per->Apellido}}</option>
                          @else
                              <option value="{{$per->idPersona}}">{{$per->Nombre}} {{$per->Apellido}}</option>
                          @endif
                      @endforeach
                    </select>
                  </div>
                </div>
            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Lugar y Horario:</label>
                  <div class="controls">
                    <select name="idAsignar_horario" class="span6">
                      @foreach ($lugares_horarios as $lugar) 
                          @if($lugar->idAsignar_horario==$asigna->idAsignar_horario)
                                <option value="{{$lugar->idAsignar_horario}}" selected>{{$lugar->Nombre_origen}}-{{$lugar->Nombre_destino}}-{{$lugar->dia}}-{{$lugar->hora}}</option>
                          @else
                              <option value="{{$lugar->idAsignar_horario}}">{{$lugar->Nombre_origen}}-{{$lugar->Nombre_destino}}-{{$lugar->dia}}-{{$lugar->hora}}</option>
                          @endif
                      @endforeach
                    </select>
                  </div>
                </div>
            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Empleado:</label>
                  <div class="controls">
                    <select name="idEmpleado" class="span6">
                      @foreach ($empleado as $emp)
                          @if($emp->idEmpleado==$asigna->idEmpleado) 
                              <option value="{{$emp->idEmpleado}}" selected>{{$emp->Nombre}}</option>
                          @else
                              <option value="{{$emp->idEmpleado}}">{{$emp->Nombre}}</option>
                          @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <!------------------------------------------------------------------->
                  <div class="control-group">
                      <label class="control-label">Número de asiento:</label>
                      <div class="controls">
                        <input type="text" class="span6"name="Numero_asiento" value="{{$asigna->Numero_asiento}}" />
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
