<form action="<?= base_url('estados/guardar') ?>" method="post">
    <div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre_estado" class="form-label">Nombre estado</label>
                        <input
                            Required
                            type="text"
                            class="form-control"
                            name="nombre_estado"
                            id="nombre_estado"
                            aria-describedby="helpId"
                            placeholder="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>