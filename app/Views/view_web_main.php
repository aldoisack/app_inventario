<?= view('view_web_header') ?>

<main class="container mt-4">
    <div id="contenidoDinamico"></div> <!-- Aquí se insertará el contenido dinámico -->
</main>

<?= view('view_web_footer') ?>


<script>
    // --------------------------------------------------
    // Vista inicial
    // --------------------------------------------------

    $(document).ready(function() {
        let ruta = `<?= base_url('carousel') ?>`;
        $.ajax({
            url: ruta,
            method: 'GET',
            success: function(response) {
                cargando();
                setTimeout(() => {
                    $('#contenidoDinamico').html(response);
                }, 250);
            },
        });
    });


    // --------------------------------------------------
    // NAVBAR
    // --------------------------------------------------

    let abierto = false;

    //
    // ----- MODULOS -----
    //

    $(document).on("click", ".navbar-nav .nav-link", function() {
        $(".navbar-collapse").collapse("hide");
        abierto = !abierto;
    });

    $(document).on("click", ".navbar .navbar-brand", function() {
        $(".navbar-collapse").collapse("hide");
        abierto = !abierto;
    });

    //
    // ----- BOTÓN MOSTRAR / OCULTAR -----
    //

    $(document).on("click", ".navbar-toggler", function() {
        const navbarCollapse = $("#collapsibleNavId");
        if (abierto) {
            console.log("Navbar contraído");
            setTimeout(() => {
                navbarCollapse.collapse("hide");
                // navbarCollapse.removeClass("show");
                // navbarCollapse.addClass("collapsing");
            }, 360);
        } else {
            console.log("Navbar desplegado");
        }
        abierto = !abierto;
    });

    // --------------------------------------------------
    // Cargar vistas en el contenedor
    // --------------------------------------------------

    $(document).on('click', '.menuDinamico, .vistaDinamica', function(e) {
        e.preventDefault();
        let ruta = $(this).attr('href');
        if ($(this).hasClass('menuDinamico')) {
            $('.menuDinamico').removeClass('active');
            $(this).addClass('active');
        }
        $.ajax({
            url: ruta,
            method: 'GET',
            success: function(response) {
                cargando();
                setTimeout(() => {
                    // exito();
                    $('#contenidoDinamico').html(response);
                    inicializarDataTables();
                }, 250);
            }
        });
    });

    // --------------------------------------------------
    // Cargar las respuestas de los formularios en el contenedor
    // --------------------------------------------------

    $(document).on('click', '.formularioDinamico', function(e) {
        e.preventDefault();
        let form = $(this).closest('form')[0]; // Obtener el formulario como objeto DOM
        if (!form.checkValidity()) {
            form.reportValidity(); // Mostrar mensajes de validación nativos
            return; // Detener la ejecución si no es válido
        }
        let ruta = $(form).attr('action');
        let formData = new FormData(form);
        $.ajax({
            url: ruta,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                cargando();
                setTimeout(() => {
                    // exito();
                    $('#contenidoDinamico').html(response);
                    inicializarDataTables();
                }, 250);
            },
        });
    });

    // --------------------------------------------------
    // Funciones extra
    // --------------------------------------------------

    function inicializarDataTables() {
        let tabla = $('#tabla');
        tabla.DataTable();
    }

    function cargando() {
        let timerInterval;
        Swal.fire({
            title: "",
            html: "",
            timer: 250,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
    }

    function exito() {
        Swal.fire({
            title: "Buen trabajo!",
            text: "",
            icon: "success",
            timer: 1000, // El modal se cierra automáticamente después de 1000 milisegundos (1 segundos)
            showConfirmButton: false // Opcional: Esto oculta el botón de confirmación
        });
    }
</script>