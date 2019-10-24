@extends('layouts.app_menu')@section('contenido')
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Registro de horarios</h5>
            </div>
            <div class="widget-content nopadding">
            <!------------------------------------------------------------------->
            <form action="{{url('/horario/'.$hr->idHorario)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('Patch')}}
              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Día:</label>
                  <div class="controls">
                  <input type="text" class="span11" name="dia"placeholder="Escribir día" value="{{$hr->dia}}" />
                  </div>
                </div>

              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Hora::</label>
                  <div class="controls">
                    <input type="time" class="span11"  name="hora" placeholder="Escribir hora"  value="{{$hr->hora}}"/>/>
                  </div>
                </div>

                <!------------------------------------------------------------------->
                <div class="form-actions">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a type="button"  href="{{ url('horario') }}" class="btn btn-danger" name="button">Cancelar</a>

                </div>
              </form>
            </div>
          </div>

        </div>

      </div>


  </div>
  <br>
@endsection