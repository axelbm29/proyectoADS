<?php
include_once('formulario.php');

class screenMensajeSistema extends formulario
{
    public function screenMensajeSistemaShow($mensaje, $enlace, $tipo = "", $esValido = false)
    {
        $linkcss = '
        <link rel="stylesheet" href="http://localhost/proyectoADS/assets/styles/mensaje.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    ';

        $this->cabeceraShow("Mensaje del Sistema", $linkcss);
        ?>

        <div id="myModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                        </div>
                        <h4 class="modal-title w-100">
                            <?php echo $esValido ? '¡Éxito!' : '¡Error!'; ?>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">
                            <?php echo strtoupper($mensaje) ?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <?php if ($esValido) { ?>
                            <button type="button" class="btn btn-success btn-block"
                                onclick="redirigir('<?php echo $enlace ?>')">OK</button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-danger btn-block"
                                onclick="redirigir('<?php echo $enlace ?>')">OK</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-uekMW0e6ABKg5q0B6T1u7XwZR+voCb/U5KGaH1e5bof9nEYFSJScF0+FA2RP5U" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
            integrity="sha384-cbvaXlxyo1uGVVeY0s1efxvWu6SWNIeZd5Wu1zcdvGOEVVfQyJJ4YB0d5+1uXOrn"
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                $('#myModal').modal('show');
            });

            function redirigir(enlace) {
                <?php
                if ($tipo === "errorForzoso") {
                    echo 'window.location.href = "' . $enlace . '";';
                } else {
                    echo '$("#myModal").modal("hide");';
                }
                ?>
            }
        </script>

        <?php
        $this->piePaginaShow();
    }

}
?>