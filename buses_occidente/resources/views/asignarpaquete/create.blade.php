@extends('layouts.app_menu')
@section('contenido')

  <div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Registrar asignaciones de paqueteria/h5>
            </div>
            <div class="widget-content nopadding">
            <!------------------------------------------------------------------->
            <form action="{{url('/asignarpaquete')}}" method="POST" class="form-horizontal">
              {{ csrf_field()}}

            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Paquete:</label>
                  <div class="controls">
                    <select name="IdPaquete" class="span6">
                      <option value="">Seleccione</option>
                          @foreach ($paquetes as $pq) 
                            <option value="{{$pq->IdPaquete}}">{{$pq->TipoPaquete}}, peso: {{$pq->Peso_lbs}} libra (s)</option>
                          @endforeach
                    </select>
                  </div>
                </div>
              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Información horario:</label>
                  <div class="controls">
                    <select name="idAsignar_Horario" class="span6">
                      <option value="">Seleccione</option>
                      @foreach ($horario as $horas) 
                          <option class="span11" value="{{$horas->idAsignar_horario}}">día {{$horas->dia}}, hora: 
                            {{$horas->hora}}, de: {{$horas->Nombre_origen}} a: {{$horas->Nombre_destino}} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                 <!------------------------------------------------------------------->
                    <input type="hidden"  class="span6" value="0" name="Costo_envio" autofocus placeholder="Costo total en Q." />
                <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Información de la persona que envía:</label>
                  <div class="controls">
                    
                    <select name="idPersona" class="span6">
                      <option value="">opcion</option>
                          @foreach ($persona as $personas) 
                          <option value="{{$personas->idPersona}}"> {{$personas->Nombre}} {{$personas->Apellido}}</option>
                          @endforeach
                    </select>
                  </div>
                </div>
                 <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Información de la persona que recibe:</label>
                  <div class="controls">
                    
                    <select name="idPersona_destino" class="span6">
                      <option value="">Seleccione</option>
                      @foreach ($pdestino as $pdestinos) 
                      <option value="{{$pdestinos['idPersona_destino']}}"> {{$pdestinos['Nombre_destino']}} {{$pdestinos['Apellido_destino']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                       <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Información del empleado:</label>
                  <div class="controls">
                    
                    <select name="idEmpleado" class="span6">
                      <option value="">Seleccione</option>
                      @foreach ($empleado as $emp) 
                                <option value="{{$emp['idEmpleado']}}"> {{$emp['Nombre']}} {{$emp['Destino']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <!------------------------------------------------------------------->
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a type="button"  href="{{ url('asignarpaquete') }}" class="btn btn-danger" name="button">Cancelar</a>

                </div>
              </form>
            </div>
          </div>


        </div>

      </div>


  </div>
  <br>


@endsection
