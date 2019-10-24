@extends('layouts.app_menu')
@section('contenido')

  <div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Actualizar asignaciones de transportes</h5>
            </div>
            <div class="widget-content nopadding">
            <!------------------------------------------------------------------->
            <form action="{{url('/asignarh/'.$asigna['idAsignar_horario'])}}" method="POST" class="form-horizontal">
                {{csrf_field()}}
                {{method_field('Patch')}}

            <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Lugar:</label>
                  <div class="controls">
                    <select name="idLugar" class="span6">
                      @foreach ($lugar as $lugares) 
                        @if($lugares->idLugar==$asigna->idLugar)
                            <option value="{{$lugares['idLugar']}}" selected>{{$lugares['Nombre_origen']}}-{{$lugares['Nombre_destino']}}</option>
                        @else
                            <option value="{{$lugares['idLugar']}}">{{$lugares['Nombre_origen']}}-{{$lugares['Nombre_destino']}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Horar salida:</label>
                  <div class="controls">
                    <select name="idHorario" class="span6">
                      @foreach ($horario as $horas) 
                        @if($horas->idHorario==$asigna->idHorario)
                            <option value="{{$horas['idHorario']}}" selected>{{$horas['dia']}}-{{$horas['hora']}}</option>
                        @else
                            <option value="{{$horas['idHorario']}}">{{$horas['dia']}}-{{$horas['hora']}}
                            </option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>

                <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Transporte:</label>
                  <div class="controls">
                    <select name="idTipo_Transporte" class="span6">
                      @foreach ($transporte as $transportes) 
                        @if($transportes->idtransporte==$asigna->idtransporte)
                            <option value="{{$transportes['idtransporte']}}" selected>{{$transportes['descripcion']}}</option>
                        @else
                            <option value="{{$transportes['idtransporte']}}">{{$transportes['descripcion']}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <!------------------------------------------------------------------->
                  <div class="control-group">
                    <label class="control-label">Fecha de viaje:</label>
                    <div class="controls">
                      <input type="date" class="span6" name="fecha_viaje" value="{{$asigna->fecha_viaje}}" />
                    </div>
                  </div>
                  <!------------------------------------------------------------------->
                    <div class="control-group">
                      <label class="control-label">Asientos disponibles:</label>
                      <div class="controls">
                        <input type="text" class="span6"name="asientos_disponibles"  placeholder="asientos disponibles" value="{{$asigna->asientos_disponibles}}" />
                      </div>
                    </div>
                        
                <!------------------------------------------------------------------->
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a type="button"  href="{{ url('asignarh') }}" class="btn btn-danger" name="button">Cancelar</a>

                </div>
              </form>
            </div>
          </div>


        </div>

      </div>


  </div>
  <br>


@endsection
