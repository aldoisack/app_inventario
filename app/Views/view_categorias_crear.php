<form
    action="<?= base_url('categorias/guardar') ?>"
    method="post">
    <div class="d-flex justify-content-center ">
        <div class="card w-75">
            <div class="card-header">
                <h1><b>Nueva categoría</b></h1>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nombre_oficina" class="form-label">Nombre</label>
                    <input
                        required
                        type="text"
                        class="form-control"
                        name="nombre_categoria">
                </div>
            </div>
            <div class="card-footer text-muted">
                <a
                    class="btn btn-danger vistaDinamica"
                    href="<?= base_url('categorias/listar') ?>"
                    role="button">
                    Cancelar
                </a>
                <button
                    type="submit"
                    class="btn btn-success formularioDinamico">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</form>