<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">

        <!-- Título -->
        <div>
            <h1><b>Oficinas</b></h1>
        </div>

        <!-- Botón "Agregar" -->
        <div>
            <a
                class="btn btn-primary vistaDinamica"
                href="<?= base_url('oficinas/crear') ?>"
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
                        <th scope="col">Oficina</th>
                        <th scope="col">Total bienes</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($oficinas as $index => $oficina) : ?>
                        <tr>

                            <!-- # -->
                            <td scope="row"><?= $index + 1 ?></td>

                            <!-- Nombre oficina -->
                            <td><?= $oficina['nombre_oficina'] ?></td>

                            <!-- Total bienes -->
                            <td><?= $oficina['total_bienes'] ?></td>

                            <td class="col-md-4">

                                <!-- Botón "Detalle" -->
                                <a
                                    class="btn btn-warning vistaDinamica"
                                    href="<?= base_url('oficinas/detalle/') . $oficina['id_oficina'] . '/' . $oficina['nombre_oficina'] ?>"
                                    role="button">
                                    <i class="bi bi-search"></i>
                                    Detalle</a>

                                <!-- Botón "Editar" -->
                                <a
                                    class="btn btn-info vistaDinamica"
                                    href="<?= base_url('oficinas/editar/') . $oficina['id_oficina']  ?>"
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