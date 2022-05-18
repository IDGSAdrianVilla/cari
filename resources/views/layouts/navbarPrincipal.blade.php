<nav class="navbar navbar-inverse" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">Emenet Sistemas</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('inicio') }}">Inicio</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Reportes <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li data-toggle="modal" data-target="#modalReporte"><a>Generar reporte</a></li>
                        <li><a href="{{ url('reportes/Pendiente') }}">Pendientes</a></li>
                        <li><a href="{{ url('reportes/Atendido') }}">Atendidos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Insumos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li data-toggle="modal" data-target="#modalPoblacion"><a>Agregar Poblaci&oacute;n</a></li>
                        <li data-toggle="modal" data-target="#modalProblema"><a>Agregar Problema</a></li>
                        <li data-toggle="modal" data-target="#modalRol"><a>Agregar Rol</a></li>
                        <hr>
                        <li data-toggle="modal"><a href="{{ url('obtenerInsumosPoblaciones') }}">Poblaciones</a></li>
                        <li data-toggle="modal"><a href="{{ url('obtenerInsumosProblemas') }}">Problemas</a></li>
                        <li data-toggle="modal"><a href="{{ url('obtenerInsumosRoles') }}">Roles</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Clientes <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li data-toggle="modal" data-target="#modalClienteRegistro"><a>Agregar Cliente</a></li>
                        <li data-toggle="modal"><a href="{{ url('obtenerClientes') }}">Ver todos</a></li>
                    </ul>
                </li>
                <!--li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">M&aacute;s <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="estadisticas.php">Estad&iacute;sticas</a></li>
                        <li><a href="generarReporte.php">Generar reporte</a></li>
                    </ul>
                </li-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li data-toggle="modal" data-target="#modalUsuarioRegistro"><a>Agregar Usuario</a></li>
                        <li data-toggle="modal"><a href="{{ url('obtenerUsuarios') }}">Ver todos</a></li>
                    </ul>
                </li>
                <li data-toggle="modal" data-target="#modalUsuario"><a><span class="glyphicon glyphicon-user"></span> &nbsp;{{ session('usuario')[0]->{'nombreEmpleado'} }} {{ session('usuario')[0]->{'apellidoPaterno'} }}</a></li>
                <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modales para la barra de navegación-->
@include('layouts/modalReporte')
@include('layouts/modalPoblacion')
@include('layouts/modalProblema')
@include('layouts/modalRol')
@include('layouts/modalUsuario')
@include('layouts/modalUsuarioRegistro')
@include('layouts/modalClienteRegistro')