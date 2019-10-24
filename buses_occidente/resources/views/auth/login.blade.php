@extends('layouts.app_login')

@section('content')

        <form  method="POST" action="{{ route('login') }}"  id="loginform" class="form-vertical" >
       <div class="control-group normal_text"> <h3><img src="{!! asset('img/occidente11.png') !!}" alt="Logo" /></h3></div>

                        @csrf
                        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus required autocomplete="current-password" placeholder="Correo electronico" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Contraseña"name="password" class="form-control @error('password') is-invalid @enderror" />
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
            </div>
        </div>
        <div class="form-actions">
          <button type="submit"class="flip-link btn btn-success" id="to-login">
              {{ __('Iniciar sesion') }}
          </button>

        </div>
    </form>


@endsection
