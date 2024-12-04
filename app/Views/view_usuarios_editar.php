<!-- Formulario -->
<form
    action="<?= base_url('usuarios/actualizar') ?>"
    method="post">

    <div class="d-flex justify-content-center">
        <div class="card w-75">

            <!-- Encabezado -->
            <div class="card-header">
                <h1><b>Editar usuario: <?= $usuario['nombre'] ?></b></h1>
            </div>

            <div class="card-body">

                <!-- Validación de datos -->
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>

                <input
                    type="hidden"
                    class="form-control"
                    name="id_usuario"
                    value="<?= $usuario['id_usuario'] ?>" />

                <div
                    class="row justify-content-center align-items-center g-2">

                    <!-- Nombre -->
                    <div class="col">
                        <div class="mb-3">
                            <label for="nombre_oficina" class="form-label">Nombre</label>
                            <input
                                required
                                type="text"
                                class="form-control"
                                name="nombre"
                                value="<?= $usuario['nombre'] ?>">
                        </div>
                    </div>

                    <!-- Usuario -->
                    <div class="col">
                        <div class="mb-3">
                            <label for="nombre_oficina" class="form-label">Usuario</label>
                            <input
                                required
                                type="text"
                                class="form-control"
                                name="usuario"
                                value="<?= $usuario['usuario'] ?>">
                        </div>
                    </div>

                    <!-- Rol -->
                    <div class="col">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Rol</label>
                                <select
                                    required
                                    class="form-select form-select-md"
                                    name="id_rol"
                                    id="id_rol">
                                    <option value="">----- Select one -----</option>
                                    <?php foreach ($roles as $rol) : ?>
                                        <option
                                            <?= ($rol['id_rol'] == $usuario['id_rol']) ? 'selected' : '' ?>
                                            value="<?= $rol['id_rol'] ?>">
                                            <?= $rol['nombre_rol'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>

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