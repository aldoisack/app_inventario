<div class="card">

    <!-- Encabezado -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1><b>Bitácora</b></h1>
    </div>

    <!-- Cuerpo -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabla" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Acción</th>
                        <th scope="col">Registro</th>
                        <th scope="col">Tabla</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bitacora as $registro) : ?>
                        <tr>

                            <!-- ID -->
                            <td scope="row"><?= $registro['id_bitacora'] ?></td>

                            <!-- Usuario -->
                            <td><?= $registro['nombre'] ?></td>

                            <!-- Acción -->
                            <td><?= $registro['accion'] ?></td>

                            <!-- Registro -->
                            <td><?= $registro['registro'] ?></td>

                            <!-- Tabla -->
                            <td><?= $registro['tabla'] ?></td>

                            <!-- Fecha -->
                            <td>
                                <i class="bi bi-calendar-date"></i>
                                <?= date('d/m/Y', strtotime($registro['fecha_hora_registro'])) ?>
                            </td>

                            <!-- Hora -->
                            <td>
                                <i class="bi bi-clock"></i>
                                <?= date('H:i', strtotime($registro['fecha_hora_registro'])) ?>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>