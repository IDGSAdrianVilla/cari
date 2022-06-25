<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>

    @include('layouts/cabeceraInicio')
</head>
<body class="asd">

    @include('layouts/navbarPrincipal')

    <div class="container" style="padding-top: 80px;">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible" style="z-index: 1001;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Upss!</strong> {{$errors->first()}}
            </div>
        @endif
        <h2 align="center"><b style="color:mediumaquamarine;">Pendientes</b></h2>
        <div class="col-md-12">
            <h4 align="center"><b style="color:gray;">Reportes</b></h4>
            <hr>
            <div class="notifications">
                @foreach($reportes as $reporte)
                    <div class="notifications__item verModalReporte" id="{{ $reporte->folio }}" style="height: auto; padding-top: 15px; padding-bottom: 15px;" data-toggle='modal' data-target='#verModalReporte'>
                        
                        <div class="notifications__item__avatar">
                            <img src="{{ asset('images/reportes/1.png') }}" />
                        </div>

                        <div class="notifications__item__content">
                            <span class="notifications__item__title"><b>{{$reporte->nombreCliente}} {{$reporte->apellidoPaterno}} {{$reporte->apellidoMaterno}}</b></span>
                            <span class="notifications__item__message"><b>{{$reporte->nombrePoblacion}}</b></span>
                            <span class="notifications__item__message">{{$reporte->nombreProblema}}</span>
                            <span class="notifications__item__message">{{$reporte->fechaAlta}}</span>
                        </div>

                    </div>
                @endforeach
                <a href="{{ url('reportes/Pendiente') }}"><h4><b style="color: gray;">Ver más...</b></h4></a>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 align="center"><b style="color:mediumaquamarine;">Estadísticas Generales</b></h2>
        <br>

        <div class="col-md-6">
            <h4 align="center"><b style="color:gray;">Registro de Reportes</b></h4>
            <hr>
            <canvas id="myChart"></canvas>
        </div>

        <div class="col-md-6">
            <h4 align="center"><b style="color:gray;">Atención de Reportes</b></h4>
            <hr>
            <canvas id="myChart2"></canvas>
        </div>
        <br>
    </div>

    @include('layouts/modalConsultaReporte')

    <script>
        const ctx = document.getElementById('myChart');
        const ctx2 = document.getElementById('myChart2');
        const myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: @json($nombresRegistrosRegistro),
                datasets: [{
                    label: '# of Votes',
                    data: @json($cantidadRegistrosRegistro),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(0, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(0, 0, 0, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const myChart2 = new Chart(ctx2, {
            type: 'polarArea',
            data: {
                labels: @json($nombresRegistrosAtencion),
                datasets: [{
                    label: '# of Votes',
                    data: @json($cantidadRegistrosAtencion),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>