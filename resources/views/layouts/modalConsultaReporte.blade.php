<input type="hidden" id="PKTblEmpleado" value="{{ session('usuario')[0]->{'PKTblEmpleados'} }}">
<div id="verModalReporte" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header colorFondoTitulo" style="text-align: center;">
                <h4 data-dismiss="modal" class="modal-title"><b class="tituloPrincipalModal"></b></h4>
                <section id="atendiendo" style="margin-top: 0px;"></section>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('actualizarReporte') }}" autocomplete="off" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-3">Folio:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametrofolio" name="PKTblReportes" readonly style="background: white;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Nombre:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametronombreCliente" name="nombreCliente" readonly style="background: white;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Apellido Paterno:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroapellidoPaterno" name="apellidoPaterno" readonly style="background: white;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Apellido Materno:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroapellidoMaterno" name="apellidoMaterno" readonly style="background: white;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Tel&eacute;fono:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametrotelefono" onkeypress="return soloNumeros(event);" maxlength="10" name="telefono" readonly style="background: white;">
                        </div>
                    </div>

                    <section class="telefonoOcional"></section>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Poblaci&oacute;n:</label>
                        <div class="col-sm-9">
                            <!-- ver el porque de la variable cont-->
                            <!--select name="id_poblacion" class="form-control poblacion" required style="background: #FFDFDF;" id="<?php //echo $cont;?>"-->
                            <select name="PKCatPoblaciones" class="form-control poblacion" readonly style="background: #FFDFDF;">
                                <option class="poblacionParametro" style="visibility: hidden; display: none;"></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Coordenadas:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametrocoordenadas" style="background: #6DB3FF; color: white;" onkeypress="return soloNumerosp(event);" name="coordenadas" readonly style="background: white;">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Direcci&oacute;n:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control parametrodireccion" name="direccion" id="direccion" readonly style="background: white;"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Referencias:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control parametroreferencias" name="referencias" id="referencias" readonly style="background: white;"></textarea>
                        </div>
                    </div>
                    <h6 align="center">
                        <b>Detalles del reporte</b>
                    </h6>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Problema:</label>
                        <div class="col-sm-9">
                            <!-- ver el porque de la variable cont-->
                            <!--select name="id_problema" class="form-control tproblema" required style="background: #FFDFDF;" id="<?php //echo $cont;?>"-->
                            <select name="PKCatProblemas" class="form-control tproblema" readonly style="background: #FFDFDF;">
                                <option class="problemaParametro" style="visibility: hidden; display: none;"></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Descripci&oacute;n del problema:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control parametrodescripcionProblema" name="descripcionProblema"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Observaciones:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control parametroobservaciones" name="observaciones"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Diagnostico:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control parametrodiagnostico" name="diagnostico"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Soluci&oacute;n:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control parametrosolucion" name="solucion"></textarea>
                        </div>
                    </div>

                    <h6 align="center">
                        <b>Registrado por 
                            <b style="color: #008FFF;" class="empleadoRecibio"></b>
                        </b>
                    </h6>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Fecha:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametrofechaAlta" readonly style="background: white;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Hora:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametrohoraAlta" readonly style="background: white;">
                        </div>
                    </div>

                    <section class="apartadoActualizo" style="visibility: hidden; display: none;">
                        <h6 align="center">
                            <b>Ultima actualizaci&oacute;n por 
                                <b style="color: #008FFF;" class="empleadoActualizo"></b>
                            </b>
                        </h6>
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Fecha:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control parametrofechaActualizacion" readonly style="background: white;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Hora:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control parametrohoraActualizacion" readonly style="background: white;">
                            </div>
                        </div>
                    </section>

                    <section class="apartadoAtendido" style="visibility: hidden; display: none;">
                        <h6 align="center">
                            <b>Realizada por 
                                <b style="color: #008FFF;" class="empleadoRealizo"></b>
                            </b>
                        </h6>
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Fecha:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control parametrofechaAtencion" readonly style="background: white;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Hora:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control parametrohoraAtencion" readonly style="background: white;">
                            </div>
                        </div>
                    </section>
                    
                    <div class="form-group apartadoBotones" style="text-align: center;"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/js/funcionalidadModales.js"></script>