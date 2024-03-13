<?php
session_start();
include_once('C:/AppServ/www/proyectoADS/compartido/panelPrincipalShow.php');

class formDatosAlumno extends panelPrincipalShow
{
    public function formDatosAlumnoShow($docIdnt, $nombreCom, $id)
    {
        include_once("../modelos/alumnos.php");
        $objUsuario = new alumnos();
        $respuesta = $objUsuario->validarAlumnos($docIdnt);

        $id_alumno = $respuesta[0]['id_alumno'];
        $nombreCompleto = $respuesta[0]['nombre_completo'];
        $fechaInicio = $respuesta[0]['fecha_inicio'];
        $fechaFin = $respuesta[0]['fecha_fin'];
        $horas_consumidas = $respuesta[0]['horas_consumidas'];
        $horas_pendientes = $respuesta[0]['horas_pendientes'];

        $this->panelShow('
                <form action="./getDatosDeAlumno.php" method="POST">
                    <div class="welcome-message" style="margin-top: 70px">
                        <h2>DATOS DE ALUMNO</h2>
                        
                        <div class="mb-3">
                            <label for="inputNombre" class="form-label">Fecha Actual</label>
                            <input type="text" class="form-control" id="inputNombre" name="inputHorario" placeholder="" value="' . date('Y-m-d') . '" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="inputNombre" class="form-label">Documento de Identidad (DNI)</label>
                            <input type="text" class="form-control" id="inputNombre" name="inputHorario" placeholder="" value="' . $docIdnt . '" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="inputNivel" class="form-label">Alumno</label>
                            <input type="text" class="form-control" id="inputNivel" name="nivel" placeholder="" value="' . $nombreCompleto . '" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="inputNombre" class="form-label">Fecha de Inicio</label>
                            <input type="text" class="form-control" id="inputNombre" name="inputHorario" placeholder="" value="' . $fechaInicio . '" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="inputNivel" class="form-label">Fecha de Culminación</label>
                            <input type="text" class="form-control" id="inputNivel" name="nivel" placeholder="" value="' . $fechaFin . '" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="inputNivel" class="form-label">Horas Consumidas</label>
                            <input type="text" class="form-control" id="horas_consumidas" name="horas_consumidas" placeholder="" value="' . $horas_consumidas . '" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="inputNivel" class="form-label">Horas pendientes</label>
                            <input type="text" class="form-control" id="horas_pendientes" name="horas_pendientes" placeholder="" value="' . $horas_pendientes . '" disabled>
                        </div>
                        
                        <input type="hidden" name="id" value="' . $id_alumno . '">
                        <input type="hidden" name="horasConsumidas" value="' . $horas_consumidas . '">
                        <input type="hidden" name="horasPendientes" value="' . $horas_pendientes . '">
                        <input type="hidden" name="dni" value="' . $docIdnt . '">

                        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="' . $id . '-' . $horasConsumidas . '-' . $horasPendientes . '">Registrar asistencia</button>
                        </div>
                </form>
            ',
            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">'
        );

    }
}
?>