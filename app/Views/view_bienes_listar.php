<div class="card">

    <!-- Encabezado -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h1><b>Bienes</b></h1>
        </div>
        <div>
            <a
                class="btn btn-primary vistaDinamica"
                href="<?= base_url('bienes/crear_rapido') ?>"
                role="button">
                <i class="bi bi-file-earmark-plus-fill"></i>
                Agregar rapido</a>
            <a
                class="btn btn-primary vistaDinamica"
                href="<?= base_url('bienes/crear_detallado') ?>"
                role="button">
                <i class="bi bi-node-plus-fill"></i>
                Agregar detallado</a>
        </div>
    </div>
    <!-- Cuerpo -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabla" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Oficina</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bienes as $index => $registro) : ?>
                        <tr>
                            <td scope="row"><?= $index + 1 ?></td>
                            <td><?= $registro['codigo'] ?></td>
                            <td><?= $registro['nombre_categoria'] ?></td>
                            <td><?= $registro['nombre_oficina'] ?></td>
                            <td class="col-md-4">

                                <!-- Botón "Detalle" -->
                                <a
                                    class="btn btn-warning vistaDinamica"
                                    href="<?= base_url('bienes/detalle/') . $registro['id_bien'] ?>"
                                    role="button">
                                    <i class="bi bi-search"></i>
                                    Detalle</a>

                                <!-- Botón "Editar" -->
                                <a
                                    class="btn btn-info vistaDinamica"
                                    href="<?= base_url('bienes/editar/') . $registro['id_bien'] ?>"
                                    role="button">
                                    <i class="bi bi-pencil-square"></i>
                                    Editar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>