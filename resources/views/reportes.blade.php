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
                <label>Buscar en Reportes {{ $status }}s</label>
                <input id="search" type="text" class="form-control" placeholder="Buscar en Reportes {{ $status }}" maxlength="30">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>Reporte</label>
                <a href="{{ url('reporteExcel') }}"><button class="btn btn-info form-control"><img src="/images/reporte.png" alt="" width="22px"></button></a>
            </div>
        </div>

        <table class="table" style="margin-top:30px; text-align: center;" id="mytable">
            <thead class="table-header" style="background:gray;">
                <tr>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="bnm" class="filter__link filter__link--number" href="javascript:void(0);">Folio</a></th>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="cliente" class="filter__link" href="javascript:void(0);">Cliente</a></th>
                    <th style="text-align: center;"><a style="color: white;">Tel&eacute;fono</a></th>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="qwe" class="filter__link" href="javascript:void(0);">Problema</a></th>
                    <th style="text-align: center;"><a style="color: white;">Fecha</a></th>
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="ert" class="filter__link" href="javascript:void(0);">Poblaci&oacute;n</a></th>
                    <th style="text-align: center;"><a style="color: white;">Maps</a></th>
                    @if ( $status == 'Pendiente')
                        <th style="text-align: center;"><a style="color: white;">Atender</a></th>
                    @else
                        <th style="text-align: center;"><a style="color: white;">Retomar</a></th>
                    @endif
                </tr>
            </thead>
            <tbody class="table-content">

                @foreach ($reportes as $item)
                
                    @if ( !empty($item->empleadoRealizo) )
                        <tr class="table-row" style='background:#ECFFE1;'>
                    @elseif ( !empty($item->diagnostico) || !empty($item->solucion) )
                        <tr class="table-row" style='background:#E1F5FF;'>
                    @elseif ( !empty($item->empleadoAtendiendo) )
                        <tr class="table-row" style='background:#FFEDE2;'>
                    @else
                        <tr class="table-row">
                    @endif
                            <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                {{ $item->folio }}
                            </td>
                            <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                {{ $item->nombreCliente }} {{ $item->apellidoPaterno }}
                            </td>
                            <td class="table-data">
                                <a href="tel:{{ $item->telefono }}">
                                    <div style="height: 100%; width: 100%;">
                                        <b style="color: #00809C;">{{ $item->telefono }}</b>
                                    </div>
                                </a>
                            </td>
                            <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                {{ $item->nombreProblema }}
                            </td>
                            <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                {{ $item->fechaAlta }}
                            </td>
                            <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                {{ $item->nombrePoblacion }}
                            </td>

                            @if ( !empty($item->coordenadas) )
                                <td class="table-data verModalReporte"><b></b>
                                    <a target="_blank" href="https://www.google.es/maps?q={{ $item->coordenadas }}">
                                        <div style="width: 100%; height: 100%;">
                                            <img src="/images/maps.png" alt="" width="22px">
                                        </div>
                                    </a>
                                </td>
                            @else
                                <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                    <img src="/images/sinmaps.png" alt="" width="22px">
                                </td>
                            @endif

                            @if ( !empty($item->empleadoRealizo) )
                                <td style="text-align: center;">
                                    <a href="/retomar/{{ $item->folio }}">
                                        <div style="width: 100%; height: 100%;">
                                            <img src="/images/retomar.png" alt="" width="22px">
                                        </div>
                                    </a>
                                </td>
                            @elseif ( !empty($item->diagnostico) || !empty($item->solucion) )
                                <td class="table-data">                
                                    <a href="/atender/{{ $item->folio }}">
                                        <div style="width: 100%; height: 100%;">
                                            <img src="/images/atender.png" alt="" width="22px">
                                        </div>
                                    </a>
                                </td>
                            @else
                                <td class="table-data">
                                    <img src="/images/incompleto.png" alt="" width="22px">
                                </td>
                            @endif

                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>

    @include('layouts/modalConsultaReporte')
</body>
</html>