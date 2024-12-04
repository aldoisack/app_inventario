<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">

        <!-- Título -->
        <div>
            <h1><b>Usuarios</b></h1>
        </div>

        <!-- Botón "Agregar" -->
        <div>
            <a
                class="btn btn-primary vistaDinamica"
                href="<?= base_url('usuarios/crear') ?>"
                role="button">
                <i class="bi bi-file-earmark-plus-fill"></i>
                Agregar</a>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabla" class="table">
                <thead>
                    <tr>
                        <th class="col-md-1" scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Fecha registro</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $index => $usuario) : ?>
                        <tr>

                            <!-- # -->
                            <td scope="row"><?= $index + 1 ?></td>

                            <!-- Nombre -->
                            <td><?= $usuario['nombre'] ?></td>

                            <!-- Usuario -->
                            <td><?= $usuario['usuario'] ?></td>

                            <!-- Rol -->
                            <td><?= $usuario['nombre_rol'] ?></td>

                            <!-- Fecha registro -->
                            <td>
                                <i class="bi bi-calendar-date"></i>
                                <?= date('d/m/Y', strtotime($usuario['fecha_hora_registro'])) ?>
                            </td>

                            <td class="col-md-4">

                                <!-- Botón "Editar" -->
                                <a
                                    class="btn btn-info vistaDinamica"
                                    href="<?= base_url('usuarios/editar/') . $usuario['id_usuario'] ?>"
                                    role="button">
                                    <i class="bi bi-pencil-square"></i>
                                    Editar</a>

                                <!-- Botón "Restablecer contraseña" -->
                                <a
                                    class="btn btn-danger vistaDinamica"
                                    href="<?= base_url('usuarios/restablecer_contrasenia/') . $usuario['id_usuario'] ?>"
                                    role="button">
                                    <i class="bi bi-key"></i>
                                    Restablecer</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>