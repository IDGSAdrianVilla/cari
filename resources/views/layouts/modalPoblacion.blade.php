<div id="modalPoblacion" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            
            <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                <h4 class="modal-title"><b style="color: #6C3483;">Registrar poblaci&oacute;n</b></h4>
            </div>
            
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('registrarPoblacion') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nombre:</label>
                        <div class="col-sm-9">
                            <input id="nombrePoblacion" type="text" class="form-control" placeholder="Nombre de la poblaci&oacute;n" required name="nombrePoblacion" onkeypress="return soloLetras(event);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Código postal:</label>
                        <div class="col-sm-9">
                            <input id="nombrePoblacion" type="text" class="form-control" placeholder="Código postal" required name="codigoPostal" onkeypress="return soloNumeros(event);" maxlength="5">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" style="text-align:center; margin-top: 3%;">
                            <button class="btn" id="envio" style="background: #6C3483;"><b style="color:white;">Registrar poblaci&oacute;n</b></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>