<div class="card">

    <!-- Encabezado -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h1>
                <b>Categorías</b>
            </h1>
        </div>
        <div>
            <a
                class="btn btn-primary vistaDinamica"
                href="<?= base_url('categorias/crear') ?>"
                role="button">
                <i class="bi bi-file-earmark-plus-fill"></i>
                Agregar</a>
        </div>
    </div>

    <!-- Cuerpo -->
    <div class="card-body">
        <div class="table-responsive">
            <table
                class="table table-striped"
                id="tabla">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $index => $registro) : ?>
                        <tr>
                            <td scope="row"><?= $index + 1 ?></td>
                            <td><?= $registro['nombre_categoria'] ?></td>
                            <td><?= $registro['stock'] ?></td>
                            <td>
                                <a
                                    class="btn btn-warning vistaDinamica"
                                    href="<?= base_url('categorias/detalle/') . $registro['id_categoria'] ?>"
                                    role="button">
                                    <i class="bi bi-search"></i>
                                    Detalle
                                </a>
                                <a
                                    class="btn btn-info vistaDinamica"
                                    href="<?= base_url('categorias/editar/') . $registro['id_categoria'] ?>"
                                    role="button">
                                    <i class="bi bi-pencil-square"></i>
                                    Editar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>