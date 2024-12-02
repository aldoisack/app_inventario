<!-- Formulario -->
<form
    action="<?= base_url('usuarios/guardar') ?>"
    method="post">

    <div class="d-flex justify-content-center">
        <div class="card w-75">

            <!-- Encabezado -->
            <div class="card-header">
                <h1><b>Nuevo usuario</b></h1>
            </div>

            <div class="card-body">

                <!-- Validación de datos -->
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>

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
                                name="nombre">
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
                                name="usuario">
                        </div>
                    </div>

                    <!-- Rol -->
                    <div class="col">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="" class="form-label">City</label>
                                <select
                                    required
                                    class="form-select form-select-md"
                                    name="id_rol"
                                    id="id_rol">
                                    <option value="" selected>----- Select one -----</option>
                                    <?php foreach ($roles as $rol) : ?>
                                        <option value="<?= $rol['id_rol'] ?>"><?= $rol['nombre_rol'] ?></option>
                                    <?php endforeach ?>


                                </select>
                            </div>

                        </div>
                    </div>

                </div>
                <div
                    class="row justify-content-center align-items-center g-2">

                    <!-- Contraseña -->
                    <div class="col">
                        <div class="mb-3">
                            <label for="nombre_oficina" class="form-label">Contraseña</label>
                            <input
                                required
                                type="password"
                                class="form-control"
                                name="contrasenia"
                                id="contrasenia">
                            <small class="form-text text-muted invisible">none</small>
                        </div>
                    </div>

                    <!-- Repetir contraseña -->
                    <div class="col">
                        <div class="mb-3">
                            <label for="nombre_oficina" class="form-label">Repetir contraseña</label>
                            <input
                                required
                                type="password"
                                class="form-control"
                                name="repetirContrasenia"
                                id="repetirContrasenia">
                            <small id="helpId" class="form-text text-muted invisible">none</small>
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

<script>
    $(document).ready(function() {
        $('#contrasenia, #repetirContrasenia').on('input', function() {

            $('#helpId').removeClass('invisible');

            const contrasenia = $('#contrasenia').val();
            const repetirContrasenia = $('#repetirContrasenia').val();

            if (contrasenia === '' && repetirContrasenia === '') {
                // Si ambos campos están vacíos, no mostrar mensaje
                $('#helpId')
                    .html('none') // Limpia el contenido
                    .removeClass('coinciden no-coinciden') // Elimina las clases de estilo
                    .addClass('invisible');
                return; // Finaliza la ejecución
            }

            if (contrasenia === repetirContrasenia) {
                // Coinciden: mensaje verde y en negrita
                $('#helpId')
                    .html('<i class="bi bi-patch-check"></i> Las contraseñas coinciden')
                    .removeClass('no-coinciden') // Elimina la clase que indica error
                    .addClass('coinciden');
            } else {
                // No coinciden: mensaje rojo y en negrita
                $('#helpId')
                    .html('<i class="bi bi-patch-exclamation"></i> Las contraseñas no coinciden')
                    .removeClass('coinciden') // Elimina la clase que indica error
                    .addClass('no-coinciden');
            }
        });
    });
</script>