<!DOCTYPE html>
<html lang="en">
<head>
    <title>Concentrados</title>

    @include('layouts/cabeceraGeneral')
</head>
<body class="asd">

    @include('layouts/navbarPrincipal')

    <div class="col-md-12" style="margin-top: 100px;">

        <h2 align="center" style="color: mediumaquamarine;"><b>Generar concentrado de reportes</b></h2>
        <br><br>

        @if($errors->any())
            <div class="container">
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Upss!</strong> {{$errors->first()}}
                </div>
            </div>
        @endif

        <form action="{{ route('consultarConcentradoReportes') }}" autocomplete="off" method="post">
            @csrf
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Clente:</label>
    
                    <label for="clienteReporteExcel" style="float:right;"> &nbsp;&nbsp;Habilitar</label>
                    <input type="checkbox" name="clienteReporteExcel" value="true" id="clienteReporteExcel" class="checks" style="float:right;">
    
                    <select name="PKTblClientes" class="clienteReporteExcel form-control" disabled style="background: #D5EDFF;">
                        <option value="" style="visibility: hidden; display: none;">Seleccione un cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{$cliente->PKTblClientes}}">{{$cliente->nombreCliente}} {{$cliente->apellidoPaterno}} {{$cliente->apellidoMaterno}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Población:</label>
    
                    <label for="poblacionReporteExcel" style="float:right;"> &nbsp;&nbsp;Habilitar</label>
                    <input type="checkbox" name="poblacionReporteExcel" value="true" id="poblacionReporteExcel" class="checks" style="float:right;">
    
                    <select name="PKCatPoblaciones" class="poblacionReporteExcel form-control" disabled style="background: #D5EDFF;" required>
                        <option value="" style="visibility: hidden; display: none;">Seleccione una población</option>
                        @foreach($poblaciones as $poblacion)
                            <option value="{{$poblacion->PKCatPoblaciones}}">{{$poblacion->nombrePoblacion}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Problema:</label>
    
                    <label for="problemaReporteExcel" style="float:right;"> &nbsp;&nbsp;Habilitar</label>
                    <input type="checkbox" name="problemaReporteExcel" value="true" id="problemaReporteExcel" class="checks" style="float:right;">
    
                    <select name="PKCatProblemas" class="problemaReporteExcel form-control" disabled style="background: #D5EDFF;">
                        <option value="" style="visibility: hidden; display: none;">Seleccione un problema</option>
                        @foreach($problemas as $problema)
                            <option value="{{$problema->PKCatProblemas}}">{{$problema->nombreProblema}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Fecha inicio:</label>
    
                    <label for="fInicioReporteExcel" style="float:right;"> &nbsp;&nbsp;Habilitar</label>
                    <input type="checkbox" name="fInicioReporteExcel" value="true" id="fInicioReporteExcel" class="checks" style="float:right;">
    
                    <input name="fechaDesde" class="fInicioReporteExcel form-control" disabled type="date">
                </div>
            </div>
    
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Fecha fin:</label>
    
                    <label for="fFinReporteExcel" style="float:right;"> &nbsp;&nbsp;Habilitar</label>
                    <input type="checkbox" name="fFinReporteExcel" value="true" id="fFinReporteExcel" class="checks" style="float:right;">
                    
                    <input name="fechaHasta" class="fFinReporteExcel form-control" disabled type="date" >
                </div>
            </div>
    
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Estado:</label>
    
                    <label for="estadoReporteExcel" style="float:right;"> &nbsp;&nbsp;Habilitar</label>
                    <input type="checkbox" name="estadoReporteExcel" value="true" id="estadoReporteExcel" class="checks" style="float:right;">
    
                    <select name="IDStatus" class="estadoReporteExcel form-control" disabled style="background: #D5EDFF;">
                        <option value="" style="visibility: hidden; display: none;">Seleccione un estado</option>
                        <option value="pendientes">Pendientes</option>
                        <option value="pendientes">Atendidos</option>
                        <option value="pendientes">Todos</option>
                    </select>
                </div>
            </div>
    
            <center>
                <button class="btn btn-info generarReporte" disabled style="margin-top:20px; margin-bottom:10px;"><b>Generar reporte</b></button>
                <hr>
            </center>
        </form>

        <div class="col-sm-10">
            <div class="form-group">
                <label>Buscar en concentrado</label>
                <input id="search" type="text" class="form-control" placeholder="Buscar en concentrado" maxlength="30">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>Exportar concentrado</label>
                <a href=""><button class="btn btn-info form-control"><img src="{{ asset('images/reporte.png') }}"alt="" width="22px"></button></a>
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
                    <th class="header__item" style="text-align: center;"><a style="color: white;" id="ert" class="filter__link" href="javascript:void(0);">Población</a></th>
                    <th style="text-align: center;"><a style="color: white;">Maps</a></th>
                </tr>
            </thead>
            <tbody class="table-content">
                @if(isset($reportesas))
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
                                    <td><b></b>
                                        <a target="_blank" href="https://www.google.es/maps?q={{ $item->coordenadas }}">
                                            <div style="width: 100%; height: 100%;">
                                                <img src="{{ asset('images/maps.png') }}" alt="" width="22px">
                                            </div>
                                        </a>
                                    </td>
                                @else
                                    <td class="table-data verModalReporte" data-toggle='modal' data-target='#verModalReporte' id="{{ $item->folio }}">
                                        <img src="{{ asset('images/sinmaps.png') }}" alt="" width="22px">
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    @else
                        <td colspan="7"><b>No se encontraron coincidencias</b></td>
                    @endif

            </tbody>
        </table>

    </div>
    
</body>
</html>