<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <nav
            class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                        <!-- ##### Stock ##### -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('bienes/listar') ?>" aria-current="page">Bienes</a>
                        </li>

                        <!-- ##### Oficinas ##### -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('oficinas/listar') ?>">Oficinas</a>
                        </li>

                        <!-- ##### Categorías ##### -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('categorias/listar') ?>">Categorias</a>
                        </li>

                        <!-- ##### Movimientos ##### -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('estados/listar') ?>">Movimientos</a>
                        </li>

                        <!-- ##### Bitácora ##### -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('estados/listar') ?>">Bitácora</a>
                        </li>

                        <!-- ##### Estados ##### -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('estados/listar') ?>">Estados</a>
                        </li>

                        <!-- ##### Usuarios ##### -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('estados/listar') ?>">Usuarios</a>
                        </li>

                        <!-- ##### Reportes ##### -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('estados/listar') ?>">Reportes</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

    </header>