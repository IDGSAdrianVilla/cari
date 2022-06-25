<div id="verModalCliente" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                <h4 data-dismiss="modal" class="modal-title"><b class="tituloPrincipalModal"></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action=" {{ route('actualizarCliente') }} " autocomplete="off" method="post">
                    @csrf
                    <input type="hidden" class="form-control parametroPKCliente" name="PKTblClientes" readonly style="background: white;">
                    <input type="hidden" class="form-control parametroPKDireccion" name="PKTblDirecciones" readonly style="background: white;">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nombre:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametronombreCliente2" placeholder="Nombre" name="nombreCliente" onkeypress="return soloLetras(event);" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Apellido Paterno:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroapellidoPaterno2" placeholder="Apellido Paterno" name="apellidoPaterno" onkeypress="return soloLetras(event);" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Apellido Materno:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroapellidoMaterno2" placeholder="Apellido Materno" name="apellidoMaterno" onkeypress="return soloLetras(event);" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Teléfono:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametrotelefono2" placeholder="Teléfono"  onkeypress="return soloNumeros(event);" maxlength="10" name="telefono" required>
                        </div>
                    </div>

                    <div class="form-group" style="visibility: hidden; display: none;" id="t4">
                        <label class="control-label col-sm-3">Teléfono 2:</label>
                        <div class="col-sm-9">
                            <input id="tel4" type="text" class="form-control parametrotelefonoOpcional2" placeholder="Teléfono 2 (Opcional)" onkeypress="return soloNumeros(event);" maxlength="10" name="telefonoOpcional">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9" style="float: right;">
                            <input type="button" class="btn form-control" value="+" style="background: #6DB3FF; color: white; font-weight: bold;" id="mas2">
                            <input type="button" class="btn form-control" value="-" style="background: #6DB3FF; color: white; font-weight: bold; display: none;" id="menos2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Población:</label>
                        <div class="col-sm-9">
                            <select name="PKCatPoblaciones" class="form-control poblacion2"  style="background: #D5EDFF;" required>
                                <option class="parametropoblacion2" style="visibility: hidden; display: none;"></option>
                                @foreach($poblaciones as $poblacion)
                                    <option value="{{$poblacion->PKCatPoblaciones}}">{{$poblacion->nombrePoblacion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Coordenadas:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametrocoordenadas2" placeholder="Coordenadas" onkeypress="return soloNumeros(event);" name="coordenadas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Dirección:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control parametrodireccion2" id="direccion2" placeholder="Dirección" name="direccion" onkeypress="return descripciones(event);" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Referencias:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control parametroreferencias2" id="referencias2" placeholder="Referencias" name="referencias" onkeypress="return descripciones(event);"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6" style="text-align:center; margin-top: 3%;">
                            <button class="btn form-control" style="background: #FFA26D;"><b style="color:white;">Actualizar cliente</b></button>
                        </div>
                        <div class="col-sm-6 btnAccionClientes" style="text-align:center; margin-top: 3%;"></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/funcionalidadModales.js') }}"></script>