<?= view('view_web_header') ?>

<main class="container mt-4">
    <div id="contenidoDinamico"></div> <!-- Aquí se insertará el contenido dinámico -->
</main>

<?= view('view_web_footer') ?>


<script>
    let abierto = false;

    // Ocultar navbar al hacer clic en un enlace
    $(document).on("click", ".navbar-nav .nav-link", function() {
        $(".navbar-collapse").collapse("hide");
        abierto = !abierto;
    });

    $(document).on("click", ".navbar .navbar-brand", function() {
        $(".navbar-collapse").collapse("hide");
        abierto = !abierto;
    });

    // Alternar el navbar al hacer clic en el botón de colapsar
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

        // Cambiar el estado de la variable
        abierto = !abierto;
    });







    $(document).on('click', '.menuDinamico, .vistaDinamica', function(e) {
        e.preventDefault();
        let ruta = $(this).attr('href');

        // Si es un enlace del menú, gestionar el estado "activo"
        if ($(this).hasClass('menuDinamico')) {
            // Quitar la clase 'active' de todos los enlaces del menú
            $('.menuDinamico').removeClass('active');

            // Agregar la clase 'active' al enlace clicado
            $(this).addClass('active');
        }

        $.ajax({
            url: ruta,
            method: 'GET',
            success: function(response) {
                cargando();
                setTimeout(() => { // Esperar a que cargue el mensaje "Cargando..."
                    // exito();
                    $('#contenidoDinamico').html(response);
                    inicializarDataTables();
                }, 250);

            }
        });
    });

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
            error: function(xhr, status, error) {
                console.error('Error en la solicitud:', error);
            },
        });
    });


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