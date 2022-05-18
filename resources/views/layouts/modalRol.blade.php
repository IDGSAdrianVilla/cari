<div id="modalRol" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            
            <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                <h4 class="modal-title"><b style="color: #6C3483;">Registrar rol</b></h4>
            </div>
            
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('registrarRol') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nombre:</label>
                        <div class="col-sm-9">
                            <input id="nombreRol" type="text" class="form-control" placeholder="Nombre Rol" required name="nombreRol" onkeypress="return soloLetras(event);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Descripción del Rol:</label>
                        <div class="col-sm-9">
                            <input id="descripcionRol" type="text" class="form-control" placeholder="Descripción del Rol" required name="descripcionRol" onkeypress="return letrasYNumeros(event);">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" style="text-align:center; margin-top: 3%;">
                            <button class="btn" id="envio" style="background: #6C3483;"><b style="color:white;">Registrar Rol</b></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>