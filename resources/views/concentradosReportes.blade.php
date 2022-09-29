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

        <div class="col-sm-2">
            <div class="form-group">
                <label>Clente:</label>

                <label for="clienteReporteExcel" style="float:right;"> &nbsp;&nbsp;Habilitar</label>
                <input type="checkbox" id="clienteReporteExcel" onclick="habilitaApartado('clienteReporteExcel')" style="float:right;">

                <select name="PKTblClientes" class="form-control" style="background: #D5EDFF;">
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
                <input type="checkbox" id="poblacionReporteExcel" onclick="habilitaApartado('poblacionReporteExcel')" style="float:right;">

                <select name="PKCatPoblaciones" class="form-control"  style="background: #D5EDFF;" required>
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
                <input type="checkbox" id="problemaReporteExcel" onclick="habilitaApartado('problemaReporteExcel')" style="float:right;">

                <select name="PKCatProblemas" class="form-control" required style="background: #D5EDFF;">
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
                <input type="checkbox" id="fInicioReporteExcel" onclick="habilitaApartado('fInicioReporteExcel')" style="float:right;">

                <input name="fechaDesde" type="date" class="form-control">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label>Fecha fin:</label>

                <label for="fFinReporteExcel" style="float:right;"> &nbsp;&nbsp;Habilitar</label>
                <input type="checkbox" id="fFinReporteExcel" onclick="habilitaApartado('fFinReporteExcel')" style="float:right;">
                
                <input name="fechaHasta" type="date" class="form-control">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label>Estado:</label>

                <label for="estadoReporteExcel" style="float:right;"> &nbsp;&nbsp;Habilitar</label>
                <input type="checkbox" id="estadoReporteExcel" onclick="habilitaApartado('estadoReporteExcel')" style="float:right;">

                <select name="IDStatus" class="form-control" required style="background: #D5EDFF;">
                    <option value="" style="visibility: hidden; display: none;">Seleccione un estado</option>
                    <option value="pendientes">Pendientes</option>
                    <option value="pendientes">Atendidos</option>
                    <option value="pendientes">Todos</option>
                </select>
            </div>
        </div>

        <center>
            <button class="btn btn-info" style="margin-top:20px; margin-bottom:10px;"><b>Generar reporte</b></button>
            <hr>
        </center>

    </div>
    
</body>
</html>