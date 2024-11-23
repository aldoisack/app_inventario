<main class=container>
    <br>
    <div class="card">
        <!-- Encabezado -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h1><b>Categorías</b></h1>
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
                                <td class="col-md-4">
                                    <!-- Botón para abrir el modal Detalle -->
                                    <button
                                        type="button"
                                        class="btn btn-warning btn-detalle"
                                        data-id="<?= $registro['id_categoria'] ?>"
                                        data-nombre="<?= $registro['nombre_categoria'] ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDetalle">
                                        <i class="bi bi-search"></i>
                                        Detalle
                                    </button>
                                    <!-- Botón para abrir el modal Editar -->
                                    <button
                                        type="button"
                                        class="btn btn-info btn-editar"
                                        data-id="<?= $registro['id_categoria'] ?>"
                                        data-nombre="<?= $registro['nombre_categoria'] ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar
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

<!-- ------------------------------------------------------------ -->
<!-- MODALES -->
<!-- ------------------------------------------------------------ -->

<?= $modal_crear  ?>
<?= $modal_editar ?>
<?= $modal_detalle ?>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- -------------------------------------------------- -->
<!-- MODAL EDITAR -->
<!-- -------------------------------------------------- -->
<!-- NOTA: Este código es para pasar los datos al modal "Editar" -->
<script>
    $(document).ready(function() {
        // Capturar el clic en el botón Editar
        $('.btn-editar').on('click', function() {

            // Obtener los datos del botón presionado
            const id = $(this).data('id'); // ID de la oficina
            const nombre = $(this).data('nombre'); // Nombre de la oficina

            // Pasar los datos al modal
            $('#id_oficina_modal_editar').val(id);

            // Actualizar el encabezado del modal
            $('#encabezadoModalEditar').text(`${nombre}`);
        });
    });
</script>

<!-- -------------------------------------------------- -->
<!-- MODAL DETALLE -->
<!-- -------------------------------------------------- -->
<!-- NOTA: Este código es para la lista de bienes en el modal "Detalle" -->
<script>
    $(document).ready(function() {
        $('.btn-detalle').on('click', function() {
            const id = $(this).data('id');
            const nombre = $(this).data('nombre');
            $('#encabezadoModalDetalle').text(`${nombre}`);
            $.ajax({
                url: `<?= base_url('bienes_categoria') ?>/${id}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    let contenido = '';
                    data.forEach(function(item) {
                        contenido += `
                            <tr>
                                <td scope="row">${item.codigo}</td>                                
                                <td>
                                    <!-- Botón para abrir el modal Editar -->
                                    <button
                                        type="button"
                                        class="btn btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDetalle">
                                        <i class="bi bi-search"></i>
                                        Detalle
                                    </button>
                                    <!-- Botón para abrir el modal Mover -->
                                    <button
                                        type="button"
                                        class="btn btn-success btn-editar"
                                        
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar">
                                        <i class="bi bi-send"></i>
                                        Transferir
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#contenidoModalDetalle').html(contenido);
                },
                error: function(xhr, status, error) {
                    console.error('Error al obtener los datos:', error);
                }
            });
        });
    });
</script>