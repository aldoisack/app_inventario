<form action="<?= base_url('bienes/guardar_detallado') ?>" method="post" enctype="multipart/form-data">

    <!-- ##### Propiedades del modal ##### -->
    <div class="modal fade" id="modalCrearDetallado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">

                <!-- ##### Cabecera del modal ##### -->
                <div class="modal-header">
                    <!-- Título -->
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo bien</h1>
                    <!-- Botón cerrar -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- ##### Cuerpo del modal ##### -->
                <div class="modal-body">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-md-7">

                            <!-- ##### Oficina origen ##### -->
                            <div class="mb-3">
                                <label for="oficina_origen" class="form-label">Oficina origen</label>
                                <select
                                    class="form-select form-select-md selectpicker"
                                    name="oficina_origen"
                                    id="oficina_origen"
                                    data-live-search="true">
                                    <option selected>Select one</option>
                                    <?php foreach ($oficinas as $registro) : ?>
                                        <option
                                            <?= ($registro['nombre'] == 'OTI') ? 'selected' : ''; ?>
                                            value="<?= $registro['id_oficina'] ?>">
                                            <?= $registro['nombre'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="row justify-content-center align-items-center g-2">

                                <!-- ##### Modelo ##### -->
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="modelo" class="form-label">Modelo</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="modelo"
                                            id="modelo"
                                            aria-describedby="helpId"
                                            placeholder="" />
                                    </div>
                                </div>

                                <!-- ##### Código patrimonial ##### -->
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="codigo_patrimonial" class="form-label">Código patrimonial</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="codigo_patrimonial"
                                            id="codigo_patrimonial"
                                            aria-describedby="helpId"
                                            placeholder="" />
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-center align-items-center g-2">

                                <!-- ##### Categoría ##### -->
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="categoria" class="form-label">Categorías</label>
                                        <select
                                            class="form-select form-select-md"
                                            name="categoria"
                                            id="categoria">
                                            <option selected>Select one</option>
                                            <?php foreach ($categorias as $registro) : ?>
                                                <option
                                                    value="<?= $registro['id_categoria'] ?>">
                                                    <?= $registro['nombre_categoria'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- ##### Estado ##### -->
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <select
                                            class="form-select form-select-md"
                                            name="estado"
                                            id="estado">
                                            <option selected>Select one</option>
                                            <?php foreach ($estados as $registro) : ?>
                                                <option
                                                    <?= ($registro['nombre_estado'] == 'Nuevo') ? 'Selected' : '' ?>
                                                    value="<?= $registro['id_estado'] ?>">
                                                    <?= $registro['nombre_estado'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-center align-items-center g-2">

                                <!-- ##### Fecha ##### -->
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

                                <!-- ##### Hora ##### -->
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

                        <!-- ##### Imagen ##### -->
                        <div class="col px-4">
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Subir una imagen</label>
                                <input class="form-control" type="file" id="imagen" onchange="previewImage(event)">
                            </div>
                            <div class="mb-3">
                                <img
                                    id="previewImg"
                                    src=""
                                    class="img-fluid rounded-top"
                                    width="100%"
                                    height="100%"
                                    alt="" />
                            </div>
                        </div>

                    </div>
                </div>

                <!-- ##### Pie del modal ##### -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

            </div>
        </div>
    </div>
</form>


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