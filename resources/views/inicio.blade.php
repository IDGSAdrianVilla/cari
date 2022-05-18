<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>

    @include('layouts/cabeceraInicio')
</head>
<body>

    @include('layouts/navbarPrincipal')

    <div class="container">
        <h2 align="center"><br><br><b style="color:mediumaquamarine;">Pendientes</b></h2>
        <div class="col-md-12">
            <hr>
            <h4 align="center"><b style="color:gray;">Reportes</b></h4>
            <hr>
            <div class="notifications">
                @foreach($reportes as $reporte)
                    <div class="notifications__item verModalReporte" id="{{ $reporte->folio }}" style="height: auto; padding-top: 15px; padding-bottom: 15px;" data-toggle='modal' data-target='#verModalReporte'>
                        
                        <div class="notifications__item__avatar">
                            <img src="images/reportes/1.png" />
                        </div>

                        <div class="notifications__item__content">
                            <span class="notifications__item__title"><b>{{$reporte->nombreCliente}} {{$reporte->apellidoPaterno}} {{$reporte->apellidoMaterno}}</b></span>
                            <span class="notifications__item__message"><b>{{$reporte->nombrePoblacion}}</b></span>
                            <span class="notifications__item__message">{{$reporte->nombreProblema}}</span>
                            <span class="notifications__item__message">{{$reporte->fechaAlta}}</span>
                        </div>

                    </div>
                @endforeach
                <a href="javascript:void(0);"><h4><b style="color: gray;">Ver m&aacute;s...</b></h4></a>
            </div>
        </div>
    </div>

    @include('layouts/modalConsultaReporte')
</body>
</html>