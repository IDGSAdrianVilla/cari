<div id="modalProblema" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                <h4 class="modal-title"><b style="color: #6C3483;">Registrar problema</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('registrarProblema') }}" autocomplete="off" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-3">Problema:</label>
                        <div class="col-sm-9">
                            <input id="nombreProblema" type="text" class="form-control" placeholder="Problema" required name="nombreProblema" onkeypress="return soloLetras(event);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Descripción del problema:</label>
                        <div class="col-sm-9">
                            <input id="descripcionProblema" type="text" class="form-control" placeholder="Descripción del problema" required name="descripcionProblema" onkeypress="return letrasYNumeros(event);">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" style="text-align:center; margin-top: 3%;">
                            <button class="btn" id="envio1" style="background: #6C3483;"><b style="color:white;">Registrar problema</b></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>