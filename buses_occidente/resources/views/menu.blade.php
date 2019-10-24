
<html lang="en">
<head>
<title>Trans-occidente</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/bootstrap-responsive.min.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/uniform.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/select2.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/matrix-style.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/matrix-media.css') !!}" />
<link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet" />
<link href='{!! asset('http://fonts.googleapis.com/css?family=Open+Sans:400,700,800') !!}' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  
</div>
<!--close-Header-part-->
<!------------------------------------------------------------------------------------------------------>
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bienvenido usuario</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> Mi perfil</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> Tareas</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Cerrar sesión</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Salir</span></a></li>
  </ul>
</div>
<!--sidebar-menu-->
<!------------------------------------------------------------------------------------------------------>
<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
    <li><a href=" {!! route('empleado.index') !!}"><i class="icon icon-th"></i> <span>Registro de Empleado</span></a></li>
    <li><a href="{!! route('persona.index') !!}"><i class="icon icon-th"></i> <span>Registro de Pasajero</span></a></li>
    <li><a href="{!! route('transporte.index') !!}"><i class="icon icon-th"></i> <span>Registro de Transporte</span></a></li>
    <li><a href="{!! route('horario.index') !!}"><i class="icon icon-th"></i> <span>Registro de Horarios</span></a></li>
    <li><a href="{!! route('lugar.index') !!}"><i class="icon icon-th"></i> <span>Registro de Lugares</span></a></li>
    <li><a href="{!! route('pdestino.index') !!}"><i class="icon icon-th"></i> <span>Registro de Persona destino</span></a></li>
    <li><a href="{!! route('personaOrigen.index') !!}"><i class="icon icon-th"></i> <span>Registro de Persona Origen</span></a></li>
    <li><a href="{!! route('paquete.index') !!}"><i class="icon icon-th"></i> <span>Registro de Paquete</span></a></li>
     <li><a href="{!! route('compra.index') !!}"><i class="icon icon-th"></i> <span>Compras</span></a></li>
    <li class="submenu"> <a href="submenu"><i class="icon icon-th-list"></i> <span>Asignaciones</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="{!! route('asignarh.index') !!}"><i class="icon icon-th"></i> <span>Asignar horarios de transporte</span></a></li>
        <li><a href="{!! route('asignarpasajero.index') !!}"><i class="icon icon-th"></i> <span>Asignar horarios a pasajeros</span></a></li>
        <li><a href="{!! route('asignarpaquete.index') !!}"><i class="icon icon-th"></i> <span>Asignar horarios a paquetes</span></a></li>
        
      </ul>
    </li>
  </ul>
</div>
<!------------------------------------------------------------------------------------------------------>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  </div>

  </div>
 @yield('contenido')
</div>

<!------------------------------------------------------------------------------------------------------>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2019 UNIVERSIDAD MARIANO GALVEZ, SOLOLÁ </div>
</div>
<!--end-Footer-part-->
<script src="{!! asset('js/jquery.min.js') !!}"></script>
<script src="{!! asset('js/jquery.ui.custom.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/jquery.uniform.js') !!}"></script>
<script src="{!! asset('js/select2.min.js') !!}"></script>
<script src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('js/matrix.js') !!}"></script>
<script src="{!! asset('js/matrix.tables.js') !!}"></script>
</body>
</html>
