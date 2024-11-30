<!-- Formulario -->
<form
    action="<?= base_url('oficinas/actualizar') ?>"
    method="post">

    <div class="d-flex justify-content-center">
        <div class="card w-75">

            <!-- Encabezado -->
            <div class="card-header">
                <h1><b>Nombre actual: <?= $oficina['nombre_oficina'] ?></b></h1>
            </div>

            <div class="card-body">

                <!-- ID -->
                <div>
                    <input
                        type="hidden"
                        class="form-control"
                        name="id_oficina"
                        value="<?= $oficina['id_oficina'] ?>">
                </div>

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre_oficina" class="form-label">Nombre nuevo</label>
                    <input
                        required
                        type="text"
                        class="form-control"
                        name="nombre_oficina">
                </div>

            </div>
            <div class="card-footer text-muted">

                <!-- Botón "Cancelar" -->
                <a
                    class="btn btn-danger vistaDinamica"
                    href="<?= base_url('oficinas/listar') ?>"
                    role="button">
                    Cancelar
                </a>

                <!-- Botón "Guardar" -->
                <button
                    type="submit"
                    class="btn btn-success formularioDinamico">
                    Guardar
                </button>

            </div>
        </div>
    </div>
</form>