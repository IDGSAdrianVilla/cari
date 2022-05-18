<div id="verModalDetalleUsuario" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                <h4 class="modal-title"><b>Actualizar Usuario</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('actualizarEmpleado') }}" autocomplete="off" method="post">
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
                        <label class="control-label col-sm-3">Usuario:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroUsuario" placeholder="Usuario" onkeypress="return soloLetras(event);" name="usuario">
                        </div>
                    </div>

                    <div class="form-group nuevaContrasenia" style="display:none;">
                        <label class="control-label col-sm-3">Nueva Contraseña:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" placeholder="Nueva Contraseña" name="contrasenia">
                        </div>
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

<script src="/js/funcionalidadModales.js"></script>