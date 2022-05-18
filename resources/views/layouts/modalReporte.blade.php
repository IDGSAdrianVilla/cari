<div id="modalReporte" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                <h4 class="modal-title"><b>Generar reporte</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('registrarReporte') }}" autocomplete="off" method="post">
                    @csrf

                    <div class="form-group">
                        <label class="control-label col-sm-3">Cliente:</label>
                        <div class="col-sm-9">
                            <select name="PKTblClientes" class="form-control" required style="background: #D5EDFF;">
                                <option value="" style="visibility: hidden; display: none;">Seleccione un cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->PKTblClientes}}">{{$cliente->nombreCliente}} {{$cliente->apellidoPaterno}} {{$cliente->apellidoMaterno}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Problema:</label>
                        <div class="col-sm-9">
                            <select id="tproblema" name="PKCatProblemas" class="form-control" required style="background: #D5EDFF;">
                                <option value="" style="visibility: hidden; display: none;">Seleccione un problema</option>
                                @foreach($problemas as $problema)
                                    <option value="{{$problema->PKCatProblemas}}">{{$problema->nombreProblema}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Descripci&oacute;n del problema:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control" id="problema" placeholder="Descripci&oacute;n del problema" name="descripcionProblema" onkeypress="return letrasYNumeros(event);"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Observaciones:</label>
                        <div class="col-sm-9">
                            <textarea rows="1" class="form-control" id="observaciones" placeholder="Observaciones" name="observaciones" onkeypress="return letrasYNumeros(event);"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9" style="text-align:center; margin-top: 3%;">
                            <button name="registrar" class="btn form-control" style="background: #FFA26D; font-weight: bold; color: white;"><b>Generar reporte</b></button>
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