<form
    action="<?= base_url('bienes/transferir') ?>"
    method="post"
    enctype="multipart/form-data">
    <div class="d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-header">
                <h1>
                    <?= $categoria['nombre_categoria'] ?>
                </h1>
            </div>
            <div class="card-body">
                <input
                    type="hidden"
                    class="form-control"
                    name="id_bien" />
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
            <div class="card-footer text-muted">
                <a
                    class="btn btn-danger vistaDinamica"
                    href="<?= base_url('categorias/listar') ?>"
                    role="button">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-success">Guardar</button>
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
                // Elimina el texto si existe
                $('#sinImagenTexto').remove();
                // Asigna la URL de la imagen cargada al elemento con id 'previewImg-modal-transferencia'
                $('#previewImg-modal-transferencia').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    }
</script>