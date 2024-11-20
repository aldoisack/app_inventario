<?php
$sesion = session();
$modulos = $sesion->get('modulos');
?>
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
                <a class="navbar-brand">OTI</a>
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
                    <div class="d-flex flex-column flex-lg-row justify-content-between w-100 align-items-start align-items-lg-center">
                        <!-- Módulos -->
                        <ul class="navbar-nav d-flex flex-column flex-lg-row">
                            <?php foreach ($modulos as $registro) : ?>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="<?= base_url($registro['ruta']) ?>"
                                        aria-current="page">
                                        <?= $registro['nombre_modulo'] ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>

                        <!-- Cuenta y Cerrar sesión -->
                        <ul class="navbar-nav d-flex flex-column flex-lg-row">
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="<?= base_url('perfil') ?>"
                                    aria-current="page">
                                    Cuenta
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="<?= base_url('logout') ?>"
                                    aria-current="page">
                                    Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

    </header>