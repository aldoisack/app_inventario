<form action="<?= base_url('categorias/actualizar') ?>" method="post">
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Encabezado del modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="encabezadoModalEditar">*Aquí va el nombre de la oficina*</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <!-- ID ofcina -->
                    <div>
                        <input
                            type="hidden"
                            class="form-control"
                            name="id_categoria"
                            id="id_oficina_modal_editar"
                            value="" />
                    </div>
                    <!-- Nombre oficina -->
                    <div class="mb-3">
                        <label for="nombre_oficina" class="form-label">Nuevo nombre</label>
                        <input
                            required
                            type="text"
                            class="form-control"
                            name="nombre_categoria"
                            id="nombre_oficina_modal_editar"
                            value="">
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