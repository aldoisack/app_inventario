<div class="d-flex justify-content-end mb-3">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-image-fill"></i>
        Agregar
    </button>
</div>

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($imagenes as $index => $imagen) : ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img class="img-fluid rounded carousel-image" src="<?= base_url('oficina/') . $imagen['imagen'] ?>" alt="...">
            </div>
        <?php endforeach ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Modal -->
<form
    action="<?= base_url('carousel/guardar') ?>"
    method="post"
    enctype="multipart/form-data">


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Agregar imagen</b></h1>
                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input
                            required
                            type="file"
                            class="form-control"
                            name="imagen"
                            id=""
                            placeholder=""
                            aria-describedby="fileHelpId" />

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