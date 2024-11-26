<?= view('view_web_header') ?>

<main class="container mt-4">
    <div id="contenidoDinamico"></div> <!-- Aquí se insertará el contenido dinámico -->
</main>

<?= view('view_web_footer') ?>



<script>
    $(document).on('click', '.menuDinamico, .vistaDinamica', function(e) {
        e.preventDefault();
        let ruta = $(this).attr('href');
        $.ajax({
            url: ruta,
            method: 'GET',
            success: function(response) {
                cargando();
                setTimeout(() => { // Esperar a que cargue el mensaje "Cargando..."
                    // exito();
                    $('#contenidoDinamico').html(response);
                    inicializarDataTables();
                }, 750);

            }
        });
    });

    $(document).on('click', '.formularioDinamico', function(e) {
        e.preventDefault();

        let form = $(this).closest('form');
        let ruta = form.attr('action');

        // Crear un objeto FormData para incluir todos los campos, incluyendo archivos
        let formData = new FormData(form[0]);

        $.ajax({
            url: ruta,
            method: 'POST',
            data: formData,
            processData: false, // Evita que jQuery procese los datos
            contentType: false, // Evita que jQuery establezca el content-type
            success: function(response) {
                cargando();
                setTimeout(() => { // Esperar a que cargue el mensaje "Cargando..."
                    exito();
                    $('#contenidoDinamico').html(response);
                    inicializarDataTables();
                }, 750);
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
            timer: 500,
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
            timer: 1000, // El modal se cierra automáticamente después de 2000 milisegundos (2 segundos)
            showConfirmButton: false // Opcional: Esto oculta el botón de confirmación
        });
    }
</script>