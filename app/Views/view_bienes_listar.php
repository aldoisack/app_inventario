<main class=container>
    <br>
    <div class="card">
        <!-- Encabezado -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h1><b>Bienes</b></h1>
            </div>
            <div>
                <!-- Botón para abrir el modal "Crear rápido"-->
                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#modalCrearRapido">
                    <i class="bi bi-file-earmark-plus-fill"></i>
                    Agregar rápido
                </button>
                <!-- Botón para abrir el modal "Crear detallado"-->
                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#modalCrearDetallado">
                    <i class="bi bi-patch-plus-fill"></i>
                    Agregar detallado
                </button>
            </div>
        </div>
        <!-- Cuerpo -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Código patrimonial</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bienes as $index => $registro) : ?>
                            <tr>
                                <td scope="row"><?= $index + 1 ?></td>
                                <td><?= $registro['nombre_categoria'] ?></td>
                                <td><?= $registro['codigo'] ?></td>
                                <td class="col-md-4">
                                    <!-- Botón para abrir el modal Detalle -->
                                    <button
                                        type="button"
                                        class="btn btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDetalle">
                                        <i class="bi bi-search"></i>
                                        Detalle
                                    </button>
                                    <!-- Botón para abrir el modal Editar -->
                                    <button
                                        type="button"
                                        class="btn btn-info btn-editar"
                                        data-id="<?= $registro['id_oficina'] ?>"
                                        data-nombre="<?= $registro['nombre_oficina'] ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar
                                    </button>
                                    <!-- Botón para abrir el modal Mover -->
                                    <button
                                        type="button"
                                        class="btn btn-success btn-editar"
                                        data-id="<?= $registro['id_oficina'] ?>"
                                        data-nombre="<?= $registro['nombre_oficina'] ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar">
                                        <i class="bi bi-send"></i>
                                        Mover
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>

<!-- ▗▖  ▗▖ ▗▄▖ ▗▄▄▄  ▗▄▖ ▗▖    -->
<!-- ▐▛▚▞▜▌▐▌ ▐▌▐▌  █▐▌ ▐▌▐▌    -->
<!-- ▐▌  ▐▌▐▌ ▐▌▐▌  █▐▛▀▜▌▐▌    -->
<!-- ▐▌  ▐▌▝▚▄▞▘▐▙▄▄▀▐▌ ▐▌▐▙▄▄▖ -->

<?= $modal_crear_rapido ?>
<?= $modal_crear_detallado ?>
<?= $modal_editar ?>
<?= $modal_detalle ?>