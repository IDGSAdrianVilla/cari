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
        @if ($busqueda == 'Roles')
            @include('layouts/layInsumosRol')
        @elseif($busqueda == 'Problemas')
            @include('layouts/layInsumosProblemas')
        @elseif($busqueda == 'Poblaciones')
            @include('layouts/layInsumosPoblaciones')
        @endif
    </div>

    @include('layouts/modalConsultaPoblacion')
    @include('layouts/modalConsultaProblema')
    @include('layouts/modalConsultaRol')
</body>
</html>