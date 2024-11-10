<!-- ##### Formulario ##### -->
<form action="<?= base_url('bienes/guardar') ?>" method="post">

    <div class="modal fade" id="modalCrearRapido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- ##### Cabecera del modal ##### -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar bien</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- ##### Cuerpo del modal ##### -->
                <div class="modal-body">

                    <!-- ##### Botones ##### -->
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-info ms-3" onclick="agregarInput()">Add</button>
                        <button type="button" class="btn btn-outline-danger ms-3" onclick="removerUltimoInput()">Remove</button>
                    </div>

                    <div id="input-container" class="mb-3">
                        <div class="row justify-content-center align-items-center g-2">

                            <!-- ###### Descripción ##### -->
                            <div class="col-md-4">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input
                                    required
                                    type="text"
                                    class="form-control"
                                    name="descripcion"
                                    id="descripcion"
                                    aria-describedby="helpId"
                                    placeholder="" />
                            </div>

                            <!-- ##### Código patrimonial ##### -->
                            <div class="col-md-8">
                                <label for="codigo_patrimonial" class="form-label">Código patrimonial</label>
                                <input
                                    required
                                    type="text"
                                    class="form-control"
                                    name="codigo_patrimonial"
                                    id="codigo_patrimonial"
                                    aria-describedby="helpId"
                                    placeholder="" />
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
    // Función para agregar un nuevo conjunto de inputs
    function agregarInput() {
        const container = document.getElementById("input-container");
        const newInputGroup = document.createElement("div");
        newInputGroup.classList.add("row", "justify-content-center", "align-items-center", "g-2", "mt-3");

        newInputGroup.innerHTML = `
            <div class="col-md-4">
                <input
                    required
                    type="text"
                    class="form-control"
                    name="descripcion[]"
                    aria-describedby="helpId"
                    placeholder="" />                                         
            </div>
            <div class="col-md-8">            
                <input
                    required
                    type="text"
                    class="form-control"
                    name="codigo_patrimonial[]"
                    aria-describedby="helpId"
                    placeholder="" />                        
            </div>
        `;
        container.appendChild(newInputGroup);
    }

    // Función para remover el último conjunto de inputs
    function removerUltimoInput() {
        const container = document.getElementById("input-container");
        if (container.children.length > 1) { // Evitar borrar el primer conjunto de inputs
            container.removeChild(container.lastChild);
        }
    }
</script>