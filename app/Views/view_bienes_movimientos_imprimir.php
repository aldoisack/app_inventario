<h1><b>Movimientos</b></h1>
<hr>
<?php foreach ($movimientos as $index => $movimiento) :  ?>
    <br>
    <div class="row justify-content-center align-items-start g-2">
        <div class="col">

            <!-- Categoría -->
            <div class="mb-3">
                <div class="d-flex">
                    <label class="form-label w-50 text-end pe-2"><b>Categoría:</b></label>
                    <label><?= $movimiento['nombre_categoria'] ?></label>
                </div>
            </div>

            <!-- Tipo movimiento -->
            <?php $es_entrada = ($movimiento['nombre_tipo_movimiento'] == 'Entrada') ? 'entrada' : 'salida' ?>
            <div class="mb-3">
                <div class="d-flex align-items-center">
                    <label class="form-label w-50 text-end pe-2"><b>Tipo movimiento:</b></label>
                    <label class="etiqueta <?= $es_entrada ?> "><?= $movimiento['nombre_tipo_movimiento'] ?></label>

                </div>
            </div>

            <!-- Oficina origen -->
            <div class="mb-3">
                <div class="d-flex">
                    <label class="form-label w-50 text-end pe-2"><b>Oficina origen:</b></label>
                    <label><?= $movimiento['oficina_origen'] ?></label>
                </div>
            </div>

            <!-- Oficina destino -->
            <div class="mb-3">
                <div class="d-flex">
                    <label class="form-label w-50 text-end pe-2"><b>Oficina destino:</b></label>
                    <label><?= $movimiento['oficina_destino'] ?></label>
                </div>
            </div>

            <!-- Fecha -->
            <div class="mb-3">
                <div class="d-flex">
                    <label class="form-label w-50 text-end pe-2"><b>Fecha:</b></label>
                    <label><?= date('d/m/Y', strtotime($movimiento['fecha_hora_registro'])) ?></label>
                </div>
            </div>

            <!-- Hora -->
            <div class="mb-3">
                <div class="d-flex">
                    <label class="form-label w-50 text-end pe-2"><b>Hora:</b></label>
                    <label><?= date('H:i', strtotime($movimiento['fecha_hora_registro'])) ?></label>
                </div>
            </div>

            <!-- Usuario -->
            <div class="mb-3">
                <div class="d-flex">
                    <label class="form-label w-50 text-end pe-2"><b>Usuario:</b></label>
                    <label><?= $movimiento['nombre'] ?></label>
                </div>
            </div>

        </div>
        <br>
        <!-- Imagen -->
        <div class="col">
            <div id="previewImg" class="mb-3" style="text-align: center;">
                <img
                    class="img-fluid rounded"
                    style="height:400px; width: auto;"
                    src="<?= base_url('uploads') . '/' . $movimiento['imagen'] ?>"
                    alt="Imagen del bien">
            </div>
        </div>

    </div>

    <?php if ($index == count($movimientos) - 2): ?>
        <div style="page-break-before: always;"></div>
    <?php endif; ?>

<?php endforeach ?>