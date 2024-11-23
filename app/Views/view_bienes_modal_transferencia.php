<form action="<?= base_url('bienes/transferir') ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalTransferir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Cabecera -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">CATEGORIA + ID</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Cuerpo -->
                <div class="modal-body">
                    <!-- ID bien -->
                    <input
                        type="hidden"
                        class="form-control"
                        name="id_bien"
                        id="id_bien-modal-transferir"
                        aria-describedby="helpId"
                        placeholder="" />

                    <!-- Oficina destino -->
                    <div class="mb-3">
                        <label for="oficina_origen" class="form-label">Oficina</label>
                        <select
                            class="form-select form-select-md selectpicker"
                            name="oficina"
                            id="oficina-modal-editar">
                            <option selected>--- Selecciona una opcion ---</option>
                            <?php foreach ($oficinas as $registro) : ?>
                                <option
                                    value="<?= $registro['id_oficina'] ?>">
                                    <?= $registro['nombre_oficina'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <!-- -------------------------------------------------- -->
                    <!-- IMGAEN -->
                    <!-- -------------------------------------------------- -->
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Subir una imagen</label>
                        <input class="form-control" type="file" id="imagen" name="imagen" onchange="previewImage(event)">
                    </div>
                    <div class="mb-3">
                        <img
                            id="previewImg-modal-transferencia"
                            src=""
                            class="img-fluid rounded-top"
                            width="100%"
                            height="100%"
                            alt="" />
                    </div>
                </div>
                <!-- Pie del modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
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
                $('#sinImagenTexto').remove();
                const imgElement = document.getElementById("previewImg-modal-transferencia"); // Se refiere al id único de la imagen
                imgElement.src = e.target.result; // Asigna la URL de la imagen cargada
            };
            reader.readAsDataURL(file);
        }
    }
</script>