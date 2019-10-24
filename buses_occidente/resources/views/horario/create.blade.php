@extends('layouts.app_menu')
@section('contenido')

  <div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Registro de horarios</h5>
            </div>
            <div class="widget-content nopadding">
            <!------------------------------------------------------------------->
            <form action="{{url('/horario')}}" method="POST" class="form-horizontal">
              {{csrf_field()}}
              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Día:</label>
                  <div class="controls">
                    <input type="text" class="span11" name="dia"placeholder="Escribir día"  />
                  </div>
                </div>

              <!------------------------------------------------------------------->
                <div class="control-group">
                  <label class="control-label">Hora::</label>
                  <div class="controls">
                    <input type="time" class="span11"  name="hora" placeholder="Escribir hora" />
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
