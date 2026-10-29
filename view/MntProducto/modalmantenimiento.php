<div id="modalmantenimiento" class="modal fade" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="producto_form">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdltitulo"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_producto" name="id_producto">

                    <div class="form-group">
                        <label class="form-label" for="nom_prod">Nombre</label>
                        <input type="text" class="form-control" id="nom_prod" name="nom_prod" placeholder="Ingrese Nombre" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>