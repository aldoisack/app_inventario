<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h1><b>Categoría: <?= $categoria['nombre_categoria'] ?></b></h1>
        </div>
        <div>
            <a
                class="btn btn-danger vistaDinamica"
                href="<?= base_url('categorias/listar') ?>"
                role="button">
                <i class="bi bi-box-arrow-in-left"></i> Regresar</a>
        </div>
    </div>
    <div class="card-body">
        <div
            class="table-responsive">
            <table
                class="table table-striped"
                id="tabla">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código patrimonial</th>
                        <th scope="col">Fecha de ingreso</th>
                        <th scope="col">Hora</th>
                        <th scope="col-md-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bienes as $index => $bien) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $bien['codigo'] ?></td>
                            <td>
                                <i class="bi bi-calendar-date"></i>
                                <?= date('d/m/Y', strtotime($bien['fecha_hora_registro'])) ?>
                            </td>
                            <td>
                                <i class="bi bi-clock"></i>
                                <?= date('H:i', strtotime($bien['fecha_hora_registro'])) ?>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-warning mostrarImagen"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalImagen"
                                    data-codigo="<?= $bien['codigo'] ?>"
                                    data-imagen="<?= $bien['imagen'] ?>">
                                    <i class="bi bi-image"></i> Imagen</button>
                                <a
                                    class="btn btn-success vistaDinamica"
                                    href="<?= base_url('categorias/transferir/') . $bien['id_bien'] . '/' . $categoria['id_categoria'] ?>"
                                    role="button">
                                    <i class="bi bi-send"></i> Transferir</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal para mostrar la imagen -->
<div
    class="modal fade"
    id="modalImagen"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Código para actualizar la imagen en el modal -->
<script>
    $(document).ready(function() {
        // Cuando se haga clic en el botón de 'Mostrar Imagen'
        $('.mostrarImagen').on('click', function() {
            // Obtener el código del bien y la imagen del atributo 'data-'
            var codigo = $(this).data('codigo');
            var imagen = $(this).data('imagen');

            // Establecer el código en el título del modal
            $('#modalImagen .modal-title').text('Código Patrimonial: ' + codigo);

            // Comprobar si la imagen está disponible
            if (imagen) {
                // Realizar una solicitud AJAX para verificar si la imagen existe
                $.ajax({
                    url: '<?= base_url('buscar_imagen') ?>/' + imagen, // Ruta al método buscar_imagen
                    method: 'GET',
                    success: function() {
                        // Si la imagen existe, mostrarla
                        $('#modalImagen .modal-body').html('<img src="<?= base_url('uploads') ?>/' + imagen + '" alt="Imagen del Bien" class="img-fluid rounded-top" width="100%" height="100%">');
                    },
                    error: function() {
                        // Si no existe, mostrar un mensaje alternativo
                        $('#modalImagen .modal-body').html('<p>No hay imagen disponible para este bien.</p>');
                    }
                });
            } else {
                // Si no hay imagen asignada, mostrar un mensaje alternativo
                $('#modalImagen .modal-body').html('<p>No hay imagen disponible para este bien.</p>');
            }
        });
    });
</script>