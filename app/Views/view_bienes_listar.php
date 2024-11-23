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
                                        class="btn btn-warning btn-detalle"
                                        data-id_bien="<?= $registro['id_bien'] ?>"
                                        data-id_categoria="<?= $registro['id_categoria'] ?>"
                                        data-codigo="<?= $registro['codigo'] ?>"
                                        data-oficina_actual="<?= $registro['oficina_actual'] ?>"
                                        data-id_estado="<?= $registro['id_estado'] ?>"
                                        data-fecha_hora_registro="<?= $registro['fecha_hora_registro'] ?>"
                                        data-imagen="<?= $registro['imagen'] ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDetalle">
                                        <i class="bi bi-search"></i>
                                        Detalle
                                    </button>
                                    <!-- Botón para abrir el modal Editar -->
                                    <button
                                        type="button"
                                        class="btn btn-info btn-editar"
                                        data-id_bien="<?= $registro['id_bien'] ?>"
                                        data-id_categoria="<?= $registro['id_categoria'] ?>"
                                        data-codigo="<?= $registro['codigo'] ?>"
                                        data-oficina_actual="<?= $registro['oficina_actual'] ?>"
                                        data-id_estado="<?= $registro['id_estado'] ?>"
                                        data-fecha_hora_registro="<?= $registro['fecha_hora_registro'] ?>"
                                        data-imagen="<?= $registro['imagen'] ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar
                                    </button>
                                    <!-- Botón para abrir el modal Transferir -->
                                    <button
                                        type="button"
                                        class="btn btn-success btn-transferir"
                                        data-id_bien="<?= $registro['id_bien'] ?>"
                                        data-id_categoria="<?= $registro['id_categoria'] ?>"
                                        data-codigo="<?= $registro['codigo'] ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalTransferir">
                                        <i class="bi bi-send"></i>
                                        Transferir
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
<?= $modal_detalle ?>
<?= $modal_editar ?>
<?= $modal_transferencia ?>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- -------------------------------------------------- -->
<!-- MODAL DETALLE -->
<!-- -------------------------------------------------- -->
<!-- NOTA: Este código es para pasar los datos al modal "Detalle" -->
<script>
    $(document).ready(function() {
        // Capturar el clic en el botón Editar
        $('.btn-detalle').on('click', function() {

            // Obtener los datos del botón presionado
            const id_bien = $(this).data('id_bien');
            const id_categoria = $(this).data('id_categoria');
            const codigo = $(this).data('codigo');
            const oficina_actual = $(this).data('oficina_actual');
            const id_estado = $(this).data('id_estado');
            const fecha = $(this).data('fecha_hora_registro').split(' ')[0];
            const hora = $(this).data('fecha_hora_registro').split(' ')[1].split(':').slice(0, 2).join(':');;
            const imagen = '<?= base_url('uploads/') ?>' + $(this).data('imagen');

            // Pasar los datos al modal
            $('#id_categoria-modal-detalle').val(id_categoria);
            $('#codigo-modal-detalle').val(codigo);
            $('#oficina-modal-detalle').val(oficina_actual);
            $('#estado-modal-detalle').val(id_estado);
            $('#fecha-modal-detalle').val(fecha);
            $('#hora-modal-detalle').val(hora);

            if (imagen === 'http://localhost/app_inventario/public/uploads/') {
                console.log('No hay imagen');
                $('#previewImg-modal-detalle').attr('src', ''); // Vaciar el src   
                $('#sinImagenTexto').remove();
                $('#previewImg-modal-detalle').after('<p id="sinImagenTexto"><i>*Sin imagen*</i></p>'); // Agregar el texto
            } else {
                $('#sinImagenTexto').remove();
                $('#previewImg-modal-detalle').attr('src', imagen);
            }


            console.log(imagen);
        });
    });
</script>

<!-- -------------------------------------------------- -->
<!-- MODAL EDITAR -->
<!-- -------------------------------------------------- -->
<!-- NOTA: Este código es para pasar los datos al modal "Editar" -->
<script>
    $(document).ready(function() {
        // Capturar el clic en el botón Editar
        $('.btn-editar').on('click', function() {

            // Obtener los datos del botón presionado
            const id_bien = $(this).data('id_bien');
            const id_categoria = $(this).data('id_categoria');
            const codigo = $(this).data('codigo');
            const oficina_actual = $(this).data('oficina_actual');
            const id_estado = $(this).data('id_estado');
            const fecha = $(this).data('fecha_hora_registro').split(' ')[0];
            const hora = $(this).data('fecha_hora_registro').split(' ')[1].split(':').slice(0, 2).join(':');;
            const imagen = '<?= base_url('uploads/') ?>' + $(this).data('imagen');

            // Pasar los datos al modal
            $('#id_bien-modal-editar').val(id_bien);
            $('#id_categoria-modal-editar').val(id_categoria);
            $('#codigo-modal-editar').val(codigo);
            $('#oficina-modal-editar').val(oficina_actual);
            $('#estado-modal-editar').val(id_estado);
            $('#fecha-modal-editar').val(fecha);
            $('#hora-modal-editar').val(hora);

            if (imagen === 'http://localhost/app_inventario/public/uploads/') {
                console.log('No hay imagen');
                $('#previewImg-modal-editar').attr('src', ''); // Vaciar el src   
                $('#sinImagenTexto').remove();
                $('#previewImg-modal-editar').after('<p id="sinImagenTexto"><i>*Sin imagen*</i></p>'); // Agregar el texto
            } else {
                $('#sinImagenTexto').remove();
                $('#previewImg-modal-editar').attr('src', imagen);
            }


            console.log(imagen);
        });
    });
</script>

<!-- -------------------------------------------------- -->
<!-- MODAL TRANSFERIR -->
<!-- -------------------------------------------------- -->
<!-- NOTA: Este código es para pasar los datos al modal "Transferir" -->
<script>
    $(document).ready(function() {
        // Capturar el clic en el botón Editar
        $('.btn-transferir').on('click', function() {

            // Obtener los datos del botón presionado
            const id_bien = $(this).data('id_bien');
            const id_categoria = $(this).data('id_categoria');
            const codigo = $(this).data('codigo');

            // Pasar los datos al modal
            $('#id_bien-modal-transferir').val(id_bien);
            $('#id_categoria-modal-transferir').val(id_categoria);
            $('#codigo-modal-transferir').val(codigo);

        });
    });
</script>