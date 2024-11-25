<form
    action="<?= base_url('movimientos/transferir') ?>"
    method="post"
    enctype="multipart/form-data">

    <div class="d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-header">

                <!-- Título -->
                <h1><b><?= $categoria['nombre_categoria'] . ' ' . $bien['codigo'] ?></b></h1>
            </div>
            <div class="card-body">

                <input
                    type="hidden"
                    class="form-control"
                    name="id_bien"
                    value="<?= $bien['id_bien'] ?>" />

                <!-- Oficina destino -->
                <div class="mb-3">
                    <label for="oficina" class="form-label">Oficina</label>
                    <select
                        class="form-select form-select-md selectpicker"
                        name="oficina">
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
                    <label for="imagen" class="form-label">Choose file</label>
                    <input
                        type="file"
                        class="form-control"
                        name="imagen" />

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
            <div class="card-footer text-muted">
                <button
                    type="submit"
                    class="btn btn-primary">
                    Submit
                </button>

</form>