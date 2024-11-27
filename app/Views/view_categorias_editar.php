<form
    action="<?= base_url('categorias/actualizar') ?>"
    method="post">
    <div class="d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-header">
                <h1>Nombre actual: <b><?= $categoria['nombre_categoria'] ?></b></h1>
            </div>
            <div class="card-body">

                <!-- ID -->
                <input
                    required
                    type="hidden"
                    class="form-control"
                    name="id_categoria"
                    value="<?= $categoria['id_categoria'] ?>">

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre_oficina" class="form-label">Nuevo nombre</label>
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