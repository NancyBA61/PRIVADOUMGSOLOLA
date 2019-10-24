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
            <form action="{{url('/asignarpaquete/'.$asigna->idAsignar_paquete)}}" method="POST" class="form-horizontal">
              {{csrf_field()}}
              {{method_field('Patch')}}
            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Paquete:</label>
                  <div class="controls">
                    <select name="IdPaquete" class="span6">
                          @foreach ($paquetes as $pq)
                            @if($pq->IdPaquete==$asigna->IdPaquete)
                              <option value="{{$pq->IdPaquete}}" selected>{{$pq->TipoPaquete}}, peso: {{$pq->Peso_lbs}} libra (s)</option>
                            @else 
                              <option value="{{$pq->IdPaquete}}">{{$pq->TipoPaquete}}, peso: {{$pq->Peso_lbs}} libra (s)</option>
                            @endif
                          @endforeach
                    </select>
                  </div>
                </div>
              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Información horario:</label>
                  <div class="controls">
                    <select name="idAsignar_Horario" class="span6">
                      @foreach ($horario as $horas)
                        @if($horas->idAsignar_horario==$asigna->idAsignar_horario) 
                          <option value="{{$horas->idAsignar_horario}}" selected>día {{$horas->dia}}, hora: 
                            {{$horas->hora}}, de: {{$horas->Nombre_origen}} a: {{$horas->Nombre_destino}} </option>
                        @else
                          <option value="{{$horas->idAsignar_horario}}">día {{$horas->dia}}, hora: 
                            {{$horas->hora}}, de: {{$horas->Nombre_origen}} a: {{$horas->Nombre_destino}} </option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                 <!------------------------------------------------------------------->
                  <div class="control-group">
                  <label class="control-label">Costo total de envío:</label>
                  <div class="controls">
                    <input type="text"  class="span6" name="Costo_envio"  value="{{ $asigna->Costo_envio}}"autofocus placeholder="Costo total en Q." />
                  </div>
                </div>
                <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Información de la persona que envía:</label>
                  <div class="controls">
                    <select name="idPersona" class="span6">
                          @foreach ($persona as $personas)
                            @if($personas->idPersona==$asigna->idPersona) 
                                <option value="{{$personas->idPersona}}" selected> {{$personas->Nombre}} {{$personas->Apellido}}</option>
                            @else
                                <option value="{{$personas->idPersona}}"> {{$personas->Nombre}} {{$personas->Apellido}}</option>
                            @endif
                          @endforeach
                    </select>
                  </div>
                </div>
                 <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Información de la persona que recibe:</label>
                  <div class="controls">
                    <select name="idPersona_destino" class="span6">
                      @foreach ($pdestino as $pdestinos) 
                        @if($asigna->idPersona_destino==$pdestinos->idPersona_destino)
                            <option value="{{$pdestinos['idPersona_destino']}}" selected> {{$pdestinos['Nombre_destino']}} {{$pdestinos['Apellido_destino']}}</option>
                        @else
                            <option value="{{$pdestinos['idPersona_destino']}}" selected> {{$pdestinos['Nombre_destino']}} {{$pdestinos['Apellido_destino']}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                       <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Información del empleado:</label>
                  <div class="controls">
                    
                    <select name="idEmpleado" class="span6">
                      @foreach ($empleado as $emp) 
                        @if($emp->idEmpleado== $asigna->idEmpleado)
                            <option value="{{$emp['idEmpleado']}}" selected> {{$emp['Nombre']}} {{$emp['Destino']}}</option>
                        @else
                            <option value="{{$emp['idEmpleado']}}"> {{$emp['Nombre']}} {{$emp['Destino']}}</option>
                        @endif
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
