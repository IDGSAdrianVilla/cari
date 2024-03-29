<div id="verModalDetalleUsuario" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                <h4 class="modal-title"><b>Actualizar Usuario</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('actualizarEmpleado') }}" autocomplete="off" method="post" onsubmit="return validarActiazacionUsuario()">
                    @csrf

                    <input type="hidden" id="PKTblEmpleados" name="PKTblEmpleados">

                    <div class="form-group">
                        <label class="control-label col-sm-3">Nombre:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroNombreEmpleado" placeholder="Nombre" name="nombreEmpleado" onkeypress="return soloLetras(event);">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Apellido Paterno:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroAPaterno" placeholder="Apellido Paterno" name="apellidoPaterno" onkeypress="return soloLetras(event);">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Apellido Materno:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroAMaterno" placeholder="Apellido Materno" name="apellidoMaterno" onkeypress="return soloLetras(event);">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Rol:</label>
                        <div class="col-sm-9">
                            <select id="rol" name="FKCatRoles" class="form-control"  style="background: #D5EDFF;">
                                <option class="rolParametro" style="visibility: hidden; display: none;"></option>
                                @foreach($roles as $rol)
                                    <option value="{{$rol->PKCatRoles}}">{{$rol->nombreRol}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h6 align="center">
                        <b>Detalles Inicio de Sesión</b>
                    </h6>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Correo:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroCorreo" placeholder="Correo" name="correo" id="correoInput">
                            <br>
                            <b class="resultInput"></b>
                        </div>
                    </div>

                    <div class="form-group nuevaContrasenia">
                        <label class="control-label col-sm-3">Actualizar Contraseña:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" placeholder="Nueva Contraseña" name="contrasenia">
                        </div>
                    </div>

                    <div class="alert alert-warning" style="text-align: justify;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p style="padding-right: 25px;">
                            <strong>Atención!</strong> En caso de realizar alguna modificación que tenga que ver con correo o cambio de rol, se debera logear nuevamente para iniciar con normalidad.
                        </p>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9" style="text-align:center; margin-top: 3%;">
                            <button name="registrar" class="btn form-control" style="background: #FFA26D; font-weight: bold; color: white;"><b>Actualizar Usuario</b></button>
                        </div>
                        <div class="col-sm-3" style="margin-top: 3%;">
                            <button data-dismiss="modal" class="btn form-control" style="background: #FF6A6A; color: white;"><b>X</b></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/funcionalidadModales.js') }}"></script>