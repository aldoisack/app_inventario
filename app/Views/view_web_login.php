<!doctype html>
<html lang="en">

<head>
    <title>OTI - Inventario</title>
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
        <!-- place navbar here -->
    </header>
    <main>

        <section class="vh-100" style="background-color: #bceeff;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="https://www.grupocpcon.com/wp-content/uploads/2024/03/Levantamiento-de-inventario-de-activos-fijos.jpg"
                                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%; object-fit: cover;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="<?= base_url('login') ?>" method="post" enctype="multipart/form-data">

                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                <span class="h1 fw-bold mb-0">OTI</span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Acceda a su cuenta</h5>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="usuario">Usuario</label>
                                                <input type="text" id="usuario" name="usuario" class="form-control form-control-lg" required />
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="contrasenia">Contraseña</label>
                                                <input type="password" id="contrasenia" name="contrasenia" class="form-control form-control-lg" required />
                                            </div>

                                            <div
                                                class="row justify-content-between align-items-center g-2">

                                                <!-- Botón -->
                                                <div class="col-auto">
                                                    <div class="pt-1 mb-4">
                                                        <button
                                                            data-mdb-button-init
                                                            data-mdb-ripple-init
                                                            class="btn btn-dark btn-lg btn-block"
                                                            type="submit">
                                                            Iniciar sesión
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Mostrar mensaje de error -->
                                                <div class="col-auto">
                                                    <?php if (session()->getFlashdata('error')) : ?>
                                                        <div class="alert alert-danger" role="alert" id="errorMessage">
                                                            <?= session()->getFlashdata('error') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>



                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <!-- jQuery para la validación de contraseña -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // Ocultar el mensaje de error después de 5 segundos
        document.addEventListener("DOMContentLoaded", function() {
            var errorMessage = document.getElementById('errorMessage');
            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 5000); // 5000 milisegundos = 5 segundos
            }
        });
    </script>
</body>

</html>