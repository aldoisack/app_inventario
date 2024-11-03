<form action="<?= base_url('bienes/guardar') ?>" method="post">
    <div class="modal fade" id="modalCrearDetallado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo bien</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div
                        class="row justify-content-center align-items-center g-2">
                        <div class="col-md-7">

                            <!-- ##### Oficina origen ##### -->
                            <div class="mb-3">
                                <label for="" class="form-label">Oficina origen</label>
                                <select
                                    class="form-select form-select-md"
                                    name=""
                                    id="">
                                    <option selected>Select one</option>
                                </select>
                            </div>
                            <div
                                class="row justify-content-center align-items-center g-2">
                                <div class="col">

                                    <!-- ##### Modelo ##### -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Modelo</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name=""
                                            id=""
                                            aria-describedby="helpId"
                                            placeholder="" />
                                    </div>
                                </div>
                                <div class="col">

                                    <!-- ##### Código patrimonial ##### -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Código patrimonial</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name=""
                                            id=""
                                            aria-describedby="helpId"
                                            placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="row justify-content-center align-items-center g-2">
                                <div class="col">

                                    <!-- ##### Categoría ##### -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Categoría</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name=""
                                            id=""
                                            aria-describedby="helpId"
                                            placeholder="" />
                                    </div>
                                </div>
                                <div class="col">

                                    <!-- ##### Estado ##### -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Estado</label>
                                        <select
                                            class="form-select form-select-md"
                                            name=""
                                            id="">
                                            <option selected>Select one</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="row justify-content-center align-items-center g-2">
                                <div class="col">

                                    <!-- ##### Fecha ##### -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Date</label>
                                        <input
                                            type="date"
                                            class="form-control"
                                            name=""
                                            id=""
                                            aria-describedby="helpId"
                                            placeholder="" />
                                    </div>
                                </div>
                                <div class="col">

                                    <!-- ##### Hora ##### -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Hora</label>
                                        <input
                                            type="time"
                                            class="form-control"
                                            name=""
                                            id=""
                                            aria-describedby="helpId"
                                            placeholder="" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col px-4">
                            <!-- ##### Imagen ##### -->
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
                                    alt="" />
                            </div>
                        </div>

                    </div>
                </div>
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