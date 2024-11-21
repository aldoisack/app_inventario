<form action="<?= base_url('bienes/guardar_rapido') ?>" method="post">
    <div class="modal fade" id="modalCrearRapido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Cabecera -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar bien</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Cuerpo -->
                <div class="modal-body">
                    <!-- Botones -->
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-info ms-3" onclick="agregarInput()">Add</button>
                        <button type="button" class="btn btn-outline-danger ms-3" onclick="removerUltimoInput()">Remove</button>
                    </div>
                    <div id="input-container" class="mb-3">
                        <div class="row justify-content-center align-items-center g-2">

                            <!-- Categoría -->
                            <div class="col-md-4">
                                <label for="oficina_origen" class="form-label">Categorías</label>
                                <select
                                    class="form-select form-select-md"
                                    name="categoria[]">
                                    <option selected>-----</option>
                                    <?php foreach ($categorias as $registro) : ?>
                                        <option
                                            value="<?= $registro['id_categoria'] ?>">
                                            <?= $registro['nombre_categoria'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <!-- Código -->
                            <div class="col-md-8">
                                <label for="codigo_patrimonial" class="form-label">Código patrimonial</label>
                                <input
                                    required
                                    type="text"
                                    class="form-control"
                                    name="codigo_patrimonial[]"
                                    aria-describedby="helpId"
                                    placeholder="" />
                            </div>

                        </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Función para agregar un nuevo conjunto de inputs
        window.agregarInput = function() {
            const $container = $('#input-container');
            const $newInputGroup = $(`
                <div class="row justify-content-center align-items-center g-2 mt-3">
                    <div class="col-md-4">
                        <select
                            class="form-select form-select-md"
                            name="categoria[]">
                            <option selected>-----</option>
                            <?php foreach ($categorias as $registro) : ?>
                                <option
                                    value="<?= $registro['id_categoria'] ?>">
                                    <?= $registro['nombre_categoria'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>                                      
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
                </div>
            `);
            $container.append($newInputGroup);
        };

        // Función para remover el último conjunto de inputs
        window.removerUltimoInput = function() {
            const $container = $('#input-container');
            if ($container.children().length > 1) { // Evitar borrar el primer conjunto de inputs
                $container.children().last().remove();
            }
        };
    });
</script>