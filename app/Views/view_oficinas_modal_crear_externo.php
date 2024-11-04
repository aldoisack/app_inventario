<form method="post" id="formOficinas">
    <div class="modal fade" id="modalOficinasCrearExterno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva oficina</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Nombre</label>
                        <input
                            required
                            type="text"
                            class="form-control"
                            name="nombre"
                            id="nombre"
                            aria-describedby="helpId"
                            placeholder="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCrearDetallado">Cancelar</button>
                    <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCrearDetallado">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <input
        type="hidden"
        name="externo"
        id="externo"
        value="1" />

</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#formOficinas').on('submit', function(e) {
            e.preventDefault(); // Evita que el formulario se envíe de forma normal
            $.ajax({
                url: "<?= base_url('oficinas/guardar') ?>", // Cambia esto a la ruta de tu controlador
                type: 'GET',

            });
        });
    });
</script>