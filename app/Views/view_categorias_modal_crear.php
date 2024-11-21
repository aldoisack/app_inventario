<form action="<?= base_url('categorias/guardar') ?>" method="post">
    <div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Encabezado del modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre_oficina" class="form-label">Nombre</label>
                        <input
                            required
                            type="text"
                            class="form-control"
                            name="nombre_categoria"
                            id="nombre_categoria"
                            aria-describedby="helpId"
                            placeholder="">
                    </div>
                </div>
                <!-- Pie del modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>