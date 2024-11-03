<form action="<?= base_url('bienes/guardar') ?>" method="post">
    <div class="modal fade" id="modalCrearRapido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar bien</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-info ms-3">Add</button>
                        <button type="button" class="btn btn-outline-danger ms-3">Remove</button>
                    </div>
                    <div
                        class="row justify-content-center align-items-center g-2">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input
                                    required
                                    type="text"
                                    class="form-control"
                                    name="descripcion"
                                    id="descripcion"
                                    aria-describedby="helpId"
                                    placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="codigo_patrimonial" class="form-label">Código patrimonial</label>
                                <input
                                    required
                                    type="text"
                                    class="form-control"
                                    name="codigo_patrimonial"
                                    id="codigo_patrimonial"
                                    aria-describedby="helpId"
                                    placeholder="" />
                            </div>
                        </div>
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