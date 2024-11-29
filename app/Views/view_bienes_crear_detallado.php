<form
    action="<?= base_url('bienes/guardar_detallado') ?>"
    method="post"
    enctype="multipart/form-data">
    <div class="d-flex justify-content-center">
        <div class="card w-75">

            <!-- Encabezado -->
            <div class="card-header d-flex justify-content-between align-items-center">

                <!-- Título -->
                <div>
                    <h1><b>Nuevo bien</b></h1>
                </div>

                <!-- Botón "Agregar simple" -->
                <div>
                    <a
                        class="btn btn-primary vistaDinamica"
                        href="<?= base_url('bienes/crear_rapido') ?>"
                        role="button">
                        <i class="bi bi-file-earmark-plus-fill"></i>
                        Agregar rapido</a>
                </div>

            </div>

            <div class="card-body">
                <div class="row justify-content-center align-items-start g-2">
                    <div class="col-md-7">

                        <!-- Categoría -->
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categorías</label>
                            <select
                                required
                                class="form-select form-select-md"
                                name="id_categoria"
                                id="id_categoria">
                                <option value="" selected>--- Selecciona una opcion ---</option>
                                <?php foreach ($categorias as $registro) : ?>
                                    <option
                                        value="<?= $registro['id_categoria'] ?>">
                                        <?= $registro['nombre_categoria'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Código patrimonial -->
                        <div class="mb-3">
                            <label for="codigo_patrimonial" class="form-label">Código patrimonial</label>
                            <input
                                required
                                type="text"
                                class="form-control"
                                name="codigo"
                                id="codigo"
                                aria-describedby="helpId"
                                placeholder="" />
                        </div>


                        <!-- Oficina -->
                        <div class="mb-3">
                            <label for="oficina_origen" class="form-label">Oficina</label>
                            <select
                                class="form-select form-select-md selectpicker"
                                name="oficina"
                                id="oficina">
                                <option selected>--- Selecciona una opcion ---</option>
                                <?php foreach ($oficinas as $registro) : ?>
                                    <option
                                        <?= ($registro['nombre_oficina'] == 'OTI') ? 'selected' : ''; ?>
                                        value="<?= $registro['id_oficina'] ?>">
                                        <?= $registro['nombre_oficina'] ?>
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
                                <option selected>--- Selecciona una opcion ---</option>
                                <?php foreach ($estados as $registro) : ?>
                                    <option
                                        <?= ($registro['nombre_estado'] == 'Activo') ? 'Selected' : '' ?>
                                        value="<?= $registro['id_estado'] ?>">
                                        <?= $registro['nombre_estado'] ?>
                                    </option>
                                <?php endforeach; ?>
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
                                        value="<?= date('Y-m-d'); ?>" />
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
                                        value="<?= date('H:i') ?>" />
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Imagen -->
                    <div class="col px-4">
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Subir una imagen</label>
                            <input required class="form-control" type="file" id="imagen" name="imagen" onchange="previewImage(event)">
                        </div>
                        <div class="mb-3">
                            <img
                                id="previewImg"
                                src=""
                                class="img-fluid rounded"
                                width="100%"
                                height="100%"
                                alt="" />
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer text-muted">

                <!-- Botón cancelar -->
                <a
                    class="btn btn-danger vistaDinamica"
                    href="<?= base_url('bienes/listar') ?>"
                    role="button">Cancelar</a>

                <!-- Botón guardar -->
                <button type="submit" class="btn btn-success formularioDinamico">Guardar</button>

            </div>
        </div>
    </div>
</form>

<!-- Código para mostrar la imagen en el formulario -->
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