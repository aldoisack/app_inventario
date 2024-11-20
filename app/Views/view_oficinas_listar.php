<main class=container>
    <br>
    <div class="card">
        <!-- Encabezado -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h1><b>Oficinas</b></h1>
            </div>
            <div>
                <!-- Botón para abrir el modal -->
                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#modalCrear">
                    Agregar
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
                            <th scope="col">Oficina</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($oficinas as $index => $registro) : ?>
                            <tr>
                                <td scope="row"><?= $index + 1 ?></td>
                                <td><?= $registro['nombre_oficina'] ?></td>
                                <td class="col-md-4">
                                    <a
                                        class="btn btn-warning"
                                        href="#"
                                        role="button">Detalle</a>
                                    <a
                                        class="btn btn-info"
                                        href="#"
                                        role="button">Editar</a>
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

<?= $modal_crear; ?>