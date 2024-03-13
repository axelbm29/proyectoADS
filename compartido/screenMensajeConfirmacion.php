<?php
session_start();
include_once('C:/AppServ/www/proyectoADS/compartido/indexGeneral.php');

class screenMensajeConfirmacion extends indexGeneral
{
    public function screenMensajeConfirmacionShow($id_alumno, $nombre_completo)
    {
        $this->panelPrincipalShow('
            <div class="welcome-message" style="margin-top: 70px">
                <div class="row">
                    <div class="col-12">
                        <h2>Confirmar Eliminación</h2>
                    </div>
                </div>
                <form action="./getGestionarAlumnos.php" method="post">
                    <input type="hidden" name="id_alumno" value="' . $id_alumno . '">
                    <p>¿Estás seguro de eliminar al alumno: <strong>' . $nombre_completo . '</strong>?</p>
                    <button type="submit" name="btnEliminarConfirmado" value="' . $id_alumno . '" class="btn btn-danger">Confirmar Eliminación</button>
                    <button type="submit" name="btnCancelarEliminacion" class="btn btn-secondary">Cancelar</button>
                </form>
            </div>
        ');
    }
}
?>