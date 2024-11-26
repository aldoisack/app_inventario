<div class="d-flex justify-content-center">
    <div class="card w-75">
        <div class="card-header d-flex justify-content-between align-items-center">

            <!-- Título -->
            <div>
                <h1><b>Editar <?= $bien['codigo'] ?></b></h1>
            </div>
            <div>
                <a
                    class="btn btn-danger vistaDinamica"
                    href="<?= base_url('bienes/listar') ?>"
                    role="button">
                    <i class="bi bi-box-arrow-in-left"></i> Regresar</a>
            </div>

        </div>
        <div class="card-body">
            <div class="row justify-content-center align-items-start g-2">
                <div class="col-md-7">

                    <!-- Categoría -->
                    <div class="mb-3">
                        <label for="id_categoria" class="form-label">Categoría</label>
                        <select
                            class="form-select form-select-md"
                            name="id_categoria"
                            id="id_categoria">
                            <option>-----</option>
                            <?php foreach ($categorias as $categoria) : ?>
                                <option
                                    <?= $categoria['nombre_categoria'] == $bien['nombre_categoria'] ? 'Selected' : ''  ?>
                                    value="<?= $categoria['id_categoria']  ?>">
                                    <?= $categoria['nombre_categoria']  ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- Código patrimonial -->
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código</label>
                        <input
                            type="text"
                            class="form-control"
                            name="codigo"
                            id="codigo"
                            aria-describedby="helpId"
                            placeholder=""
                            value="<?= $bien['codigo'] ?>" />
                    </div>


                    <!-- Oficina -->
                    <div class="mb-3">
                        <label for="oficina_actual" class="form-label">Oficina</label>
                        <select
                            class="form-select form-select-md"
                            name="oficina_actual"
                            id="oficina_actual">
                            <option>-----</option>
                            <?php foreach ($oficinas as $oficina) : ?>
                                <option
                                    <?= $oficina['nombre_oficina'] == $bien['nombre_oficina'] ? 'Selected' : ''  ?>
                                    value="<?= $oficina['id_oficina']  ?>">
                                    <?= $oficina['nombre_oficina']  ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- Estado -->
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select
                            class="form-select form-select-md"
                            name="estado"
                            id="estado">
                            <option>-----</option>
                            <?php foreach ($estados as $estado) : ?>
                                <option
                                    <?= $estado['nombre_estado'] == $bien['nombre_estado'] ? 'Selected' : ''  ?>
                                    value="<?= $estado['id_estado']  ?>">
                                    <?= $estado['nombre_estado']  ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>


                    <div class="row justify-content-center align-items-center g-2">

                        <!-- Fecha -->
                        <div class="col">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha ingreso</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="fecha"
                                    id="fecha"
                                    aria-describedby="helpId"
                                    placeholder=""
                                    value="<?= substr($bien['fecha_hora_registro'], 0, 10) ?>" />
                            </div>
                        </div>

                        <!-- Hora -->
                        <div class="col">
                            <div class="mb-3">
                                <label for="hora" class="form-label">Hora</label>
                                <input
                                    type="time"
                                    class="form-control"
                                    name="hora"
                                    id="hora"
                                    aria-describedby="helpId"
                                    placeholder=""
                                    value="<?= substr($bien['fecha_hora_registro'], 11, 5) ?>" />
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Imagen -->
                <div class="col px-4">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input
                        type="file"
                        class="form-control"
                        name="imagen"
                        id="imagen"
                        placeholder=""
                        aria-describedby="fileHelpId" />
                    <div id="previewImg" class="mb-3"></div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // Obtener el código del bien y la imagen del atributo 'data-'
        var imagen = '<?= $bien['imagen'] ?>'
        var ruta = '<?= base_url('buscar_imagen') ?>/' + imagen;

        // Comprobar si la imagen está disponible
        if (imagen) {
            $.ajax({
                url: ruta,
                method: 'GET',
                success: function() {

                    // Si la imagen existe, mostrarla
                    $('#previewImg').html('<img src="<?= base_url('uploads') ?>/' + imagen + '" alt="Imagen del Bien" class="img-fluid rounded-top" width="100%" height="100%">');

                },
                error: function() {

                    // Si no existe, mostrar un mensaje alternativo
                    $('#previewImg').html('<p>No hay imagen disponible para este bien.</p>');
                }
            });
        } else {

            // Si no hay imagen asignada, mostrar un mensaje alternativo
            $('#previewImg').html('<p>No hay imagen disponible para este bien.</p>');
        }
    });
</script>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgElement = document.getElementById("previewImg"); // Se refiere al id único de la imagen
                imgElement.src = e.target.result; // Asigna la URL de la imagen cargada
            };
            reader.readAsDataURL(file);
        }
    }
</script>