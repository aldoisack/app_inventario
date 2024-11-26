<div class="d-flex justify-content-center">
    <div class="card w-75">
        <div class="card-header d-flex justify-content-between align-items-center">

            <!-- Título -->
            <div>
                <h1><b>Detalle</b></h1>
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
                        <label class="form-label">Categorías</label>
                        <select
                            disabled
                            class="form-select form-select-md">
                            <option selected><?= $bien['nombre_categoria'] ?></option>
                        </select>
                    </div>

                    <!-- Código patrimonial -->
                    <div class="mb-3">
                        <label class="form-label">Código patrimonial</label>
                        <input
                            readonly
                            type="text"
                            class="form-control"
                            value="<?= $bien['codigo'] ?>" />
                    </div>

                    <!-- Oficina -->
                    <div class="mb-3">
                        <label for="oficina_origen" class="form-label">Oficina</label>
                        <select
                            disabled
                            class="form-select form-select-md selectpicker">
                            <option selected><?= $bien['nombre_oficina'] ?></option>
                        </select>
                    </div>

                    <!-- Estado -->
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select
                            disabled
                            class="form-select form-select-md">
                            <option selected><?= $bien['nombre_estado'] ?></option>
                        </select>
                    </div>

                    <div class="row justify-content-center align-items-center g-2">

                        <!-- Fecha -->
                        <div class="col">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha ingreso</label>
                                <input
                                    readonly
                                    type="date"
                                    class="form-control"
                                    value="<?= substr($bien['fecha_hora_registro'], 0, 10) ?>" />
                            </div>
                        </div>

                        <!-- Hora -->
                        <div class="col">
                            <div class="mb-3">
                                <label for="hora" class="form-label">Hora</label>
                                <input
                                    readonly
                                    type="time"
                                    class="form-control"
                                    value="<?= substr($bien['fecha_hora_registro'], 11, 5) ?>" />
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Imagen -->
                <div class="col px-4">
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