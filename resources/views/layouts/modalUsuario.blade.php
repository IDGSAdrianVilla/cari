<div id="modalUsuario" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                <h4 class="modal-title"><b> {{ session('usuario')[0]->{'nombreEmpleado'} }} {{ session('usuario')[0]->{'apellidoPaterno'} }} {{ session('usuario')[0]->{'apellidoMaterno'} }} </b></h4>
            </div>
            <div class="modal-body">
                <form name="sesionForm" class="form-horizontal" action="{{ route('actualizarSesion') }}" autocomplete="off" method="post" onsubmit="return validarActiazacionUsuarioC()">
                    @csrf

                    <div class="form-group" style="display: none;">
                        <input name="PKTblEmpleados" type="text" class="form-control" value="{{ session('usuario')[0]->{'PKTblEmpleados'} }}">
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Nombre:</label>
                        <div class="col-sm-9">
                            <input name="nombreEmpleado" type="text" class="form-control" placeholder="Nombre" value="{{ session('usuario')[0]->{'nombreEmpleado'} }}" onkeypress="return soloLetras(event);">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Apellido Paterno:</label>
                        <div class="col-sm-9">
                            <input name="apellidoPaterno" type="text" class="form-control" placeholder="Apellido Paterno" value="{{ session('usuario')[0]->{'apellidoPaterno'} }}" onkeypress="return soloLetras(event);">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Apellido Materno:</label>
                        <div class="col-sm-9">
                            <input name="apellidoMaterno" type="text" class="form-control" placeholder="Apellido Materno" value="{{ session('usuario')[0]->{'apellidoMaterno'} }}" onkeypress="return soloLetras(event);">
                        </div>
                    </div>

                    <h6 align="center"><b style="color: gray;">Datos de la sesión</b></h6>
                    <hr>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Correo:</label>
                        <div class="col-sm-9">
                            <input name="correo" type="text" id="correoInput2" class="form-control" placeholder="Correo" value="{{ session('usuario')[0]->{'correo'} }}">
                            <b class="resultInput2"></b>
                        </div>
                    </div>

                    <div class="form-group contrasenaac">
                        <label class="control-label col-sm-3">Contraseña Actual:</label>
                        <div class="col-sm-9">
                            <input id="contrasena" name="contraseniaant" type="password" class="form-control" placeholder="Contraseña Actual">
                        </div>
                    </div>

                    <div class="form-group contrasenan" style="display: none;">
                        <label class="control-label col-sm-3">Nueva Contraseña:</label>
                        <div class="col-sm-9">
                            <input id="contrasenan" name="contrasenia" type="password" class="form-control" placeholder="Nueva Contraseña">
                        </div>
                    </div>

                    <div class="alert alert-warning" style="text-align: justify;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p style="padding-right: 25px;">
                            <strong>Atención!</strong> Para realizar alguna actualización de su información posteriormente se tendrá que loguear nuevamente para aplicar los cambios.
                        </p>
                    </div>

                    <div class="form-group">
                        <center>
                            <b id="errorEnvioSesion" style="color: red;"></b>
                        </center>
                        <div class="col-sm-12" style="text-align:center; margin-top: 3%;">
                            <button class="btn btn-primary"><b style="color:white;">Actualizar informaci&oacute;n</b></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<script>
    $("#contrasena").keyup(function(){
        var contrasenaac  = $(this).val();
        var contrasenaac1 = "{{ session('usuario')[0]->{'contrasenia'} }}";
        if (contrasenaac == contrasenaac1) {
            $(".contrasenan").show();
            $("#contrasenan").attr('required','required');
            $(".contrasenaac").hide();
        }
    });

    const PKTblEmpleados = "{{ session('usuario')[0]->{'PKTblEmpleados'} }}";
    const nombreEmpleado = "{{ session('usuario')[0]->{'nombreEmpleado'} }}";
    const apellidoPaterno = "{{ session('usuario')[0]->{'apellidoPaterno'} }}";
    const apellidoMaterno = "{{ session('usuario')[0]->{'apellidoMaterno'} }}";
    const correo2 = "{{ session('usuario')[0]->{'correo'} }}";

    function validarActiazacionUsuarioC() {
        let correo = $('#correoInput2').val();


        if (
            PKTblEmpleados  == document.sesionForm.PKTblEmpleados.value &&
            nombreEmpleado  == document.sesionForm.nombreEmpleado.value &&
            apellidoPaterno == document.sesionForm.apellidoPaterno.value &&
            apellidoMaterno == document.sesionForm.apellidoMaterno.value &&
            correo2         == document.sesionForm.correo.value &&
            (document.sesionForm.contrasenia.value == '' || document.sesionForm.contrasenia.value == null)
        ) {
            $('#errorEnvioSesion').text('No se ha realizado ningún cambio');
        } else {
            $('#errorEnvioSesion').text('');
        }

        return validateEmailC(correo) &&
            (
                PKTblEmpleados  != document.sesionForm.PKTblEmpleados.value ||
                nombreEmpleado  != document.sesionForm.nombreEmpleado.value ||
                apellidoPaterno != document.sesionForm.apellidoPaterno.value ||
                apellidoMaterno != document.sesionForm.apellidoMaterno.value ||
                correo2         != document.sesionForm.correo.value ||
                (document.sesionForm.contrasenia.value != '' && document.sesionForm.contrasenia.value != null)
                ) ?
            true : false ;
    }

    $('#correoInput2').on('input', function () {
        if (
            PKTblEmpleados  != document.sesionForm.PKTblEmpleados.value ||
            nombreEmpleado  != document.sesionForm.nombreEmpleado.value ||
            apellidoPaterno != document.sesionForm.apellidoPaterno.value ||
            apellidoMaterno != document.sesionForm.apellidoMaterno.value ||
            correo2         != document.sesionForm.correo.value ||
            (document.sesionForm.contrasenia.value == '' || document.sesionForm.contrasenia.value == null)
        ) {
            $('#errorEnvioSesion').text('');
        }
    });

</script>