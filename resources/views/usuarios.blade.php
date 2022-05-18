<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>

    @include('layouts/cabeceraGeneral')
</head>
<body class="asd">

    @include('layouts/navbarPrincipal')

    <div class="col-md-12" style="margin-top: 70px;">
        <!--div class="col-sm-1">
            <div class="form-group">
                <label>Folio</label>
                <input id="searchNo" type="text" class="form-control" placeholder="No." maxlength="10">
            </div>
        </div-->
        
        <div class="col-sm-10">
            <div class="form-group">
                <label>Buscar en Usuarios</label>
                <input id="search" type="text" class="form-control" placeholder="Buscar en Usuarios" maxlength="30">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>Reporte</label>
                <a href="javascript:void(0);"><button class="btn btn-info form-control"><img src="/images/reporte.png" alt="" width="22px"></button></a>
            </div>
        </div>

        <table class="table" style="margin-top:30px; text-align: center;" id="mytable">
            <thead class="table-header" style="background:gray;">
                <tr>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="bnm" class="filter__link filter__link--number" href="javascript:void(0);">Folio</a></th>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="ert" class="filter__link" href="javascript:void(0);">Rol</a></th>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="cliente" class="filter__link" href="javascript:void(0);">Nombre</a></th>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="qwe" class="filter__link" href="javascript:void(0);">Apellido Paterno</a></th>
                    <th style="text-align: center;"><a style="color: white;">Apellido Materno</a></th>
                    <th style="text-align: center;"><a style="color: white;">Nombre Usuario</a></th>
                    <th style="text-align: center;"><a style="color: white;">Fecha</a></th>
                    <th style="text-align: center;"><a style="color: white;">Opciones</a></th>
                </tr>
            </thead>
            <tbody class="table-content">

                @foreach ($usuarios as $item)

                    <tr class="table-row">
                        <td class="table-data verModalDetalleUsuario" data-toggle='modal' data-target='#verModalDetalleUsuario' id="{{ $item->PKTblEmpleados }}">
                            {{ $item->PKTblEmpleados }}
                        </td>
                        <td class="table-data verModalDetalleUsuario" data-toggle='modal' data-target='#verModalDetalleUsuario' id="{{ $item->PKTblEmpleados }}">
                            {{ $item->nombreRol }}
                        </td>
                        <td class="table-data verModalDetalleUsuario" data-toggle='modal' data-target='#verModalDetalleUsuario' id="{{ $item->PKTblEmpleados }}">
                            {{ $item->nombreEmpleado }}
                        </td>
                        <td class="table-data verModalDetalleUsuario" data-toggle='modal' data-target='#verModalDetalleUsuario' id="{{ $item->PKTblEmpleados }}">
                            {{ $item->apellidoPaterno }}
                        </td>
                        <td class="table-data verModalDetalleUsuario" data-toggle='modal' data-target='#verModalDetalleUsuario' id="{{ $item->PKTblEmpleados }}">
                            {{ $item->apellidoMaterno }}
                        </td>
                        <td class="table-data verModalDetalleUsuario" data-toggle='modal' data-target='#verModalDetalleUsuario' id="{{ $item->PKTblEmpleados }}">
                            {{ $item->usuario }}
                        </td>
                        <td class="table-data verModalDetalleUsuario" data-toggle='modal' data-target='#verModalDetalleUsuario' id="{{ $item->PKTblEmpleados }}">
                            {{ $item->fechaAlta }}
                        </td>

                        @if ( $item->PKTblEmpleados == session('usuario')[0]->{'PKTblEmpleados'} )
                            <td class="table-data">
                                <a href="javascript:void(0)">
                                    <button class="btn btn-success"><b>Activo</b></button>
                                </a>
                            </td>
                        @elseif ( $item->Activo == 1)
                            <td class="table-data">
                                <a href="/inactivarUsuario/{{ $item->PKTblEmpleados }}">
                                    <button class="btn btn-warning"><b>Inactivar</b></button>
                                </a>
                            </td>
                        @else
                            <td class="table-data">
                                <a href="/activarUsuario/{{ $item->PKTblEmpleados }}">
                                    <button class="btn btn-info"><b>Activar</b></button>
                                </a>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @include('layouts/modalConsultaUsuario')
</body>
</html>