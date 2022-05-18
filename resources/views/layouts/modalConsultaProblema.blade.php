<div id="verModalInsumoProblema" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            
            <div class="modal-header" data-dismiss="modal" style="text-align: center;">
                <h4 class="modal-title"><b>Actualizar información</b></h4>
            </div>
            
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('actualizarProblema') }}" method="post" autocomplete="off">
                    @csrf

                    <input type="hidden" id="PKCatProblemas" name="PKCatProblemas">

                    <div class="form-group">
                        <label class="control-label col-sm-3">Nombre Problema:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroNombreProblema" name="nombreProblema" style="background: white;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Descripción Problema:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control parametroDescripcion" name="descripcionProblema" style="background: white;">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6" style="text-align:center; margin-top: 3%;">
                            <button class="btn form-control" style="background: #FFA26D;"><b style="color:white;">Actualizar Problema</b></button>
                        </div>
                        <div class="col-sm-6 btnAccion" style="text-align:center; margin-top: 3%;"></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>