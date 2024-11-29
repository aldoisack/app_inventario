<form action="<?= base_url('bienes/guardar_rapido') ?>" method="post">
    <div class="d-flex justify-content-center">
        <div class="card w-75">

            <!-- Encabezado -->
            <div class="card-header d-flex justify-content-between align-items-center">

                <!-- Título -->
                <div>
                    <h1><b>Agregar bien</b></h1>
                </div>

                <!-- Botón "Agregar detallado" -->
                <div>
                    <a
                        class="btn btn-primary vistaDinamica"
                        href="<?= base_url('bienes/crear_detallado') ?>"
                        role="button">
                        <i class="bi bi-card-checklist"></i>
                        Agregar detallado</a>
                </div>

            </div>

            <div class="card-body">

                <!-- Botones "Agregar", "Remover"-->
                <div class="mb-3 d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-info ms-3" onclick="agregarInput()">Agregar</button>
                    <button type="button" class="btn btn-outline-danger ms-3" onclick="removerUltimoInput()">Quitar</button>
                </div>

                <div id="input-container" class="mb-3">
                    <div class="row justify-content-center align-items-center g-2">

                        <!-- Categoría -->
                        <div class="col-md-4">
                            <label for="categoria" class="form-label">Categorías</label>
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
                            <label for="codigo" class="form-label">Código</label>
                            <input
                                required
                                type="text"
                                class="form-control"
                                name="codigo[]"
                                aria-describedby="helpId"
                                placeholder="" />
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">

                <!-- Cancelar -->
                <a
                    class="btn btn-danger vistaDinamica"
                    href="<?= base_url('bienes/listar') ?>"
                    role="button">Cancelar</a>

                <!-- Guardar -->
                <button type="submit" class="btn btn-success formularioDinamico">Guardar</button>

            </div>
        </div>
    </div>
</form>

<script>
    // Función para agregar un nuevo conjunto de inputs
    $(document).ready(function() {
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
                            name="codigo[]"
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