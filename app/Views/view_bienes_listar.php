    <main class=container>
        <br>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h1><b>Bienes</b></h1>
                </div>
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearRapido">
                        Agregar rápido
                    </button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearDetallado">
                        Agregar detallado
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Código patrimonial</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $number = 1;
                            foreach ($bienes as $registro) :
                            ?>
                                <tr class="">
                                    <td scope="row"><?= $number ?></td>
                                    <td><?= $registro['descripcion'] ?></td>
                                    <td><?= $registro['codigo_patrimonial'] ?></td>
                                    <td class="col-md-4">
                                        <a
                                            name=""
                                            id=""
                                            class="btn btn-warning"
                                            href="#"
                                            role="button">Detalle</a>
                                        <a
                                            name=""
                                            id=""
                                            class="btn btn-info"
                                            href="#"
                                            role="button">Editar</a>
                                        <a
                                            name=""
                                            id=""
                                            class="btn btn-success"
                                            href="#"
                                            role="button">Transferencia</a>
                                    </td>
                                </tr>
                            <?php
                                $number += 1;
                            endforeach;
                            ?>
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