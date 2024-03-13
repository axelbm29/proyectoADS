<?php
session_start();
include_once('C:/AppServ/www/proyectoADS/compartido/indexGeneral.php');

class formRegistrarAsistencia extends indexGeneral
{
    public function formRegistrarAsistenciaShow()
    {
        $this->panelPrincipalShow('
            <form action="./getDatosDeAlumno.php" method="POST">
                <div class="welcome-message" style="margin-top: 70px">
                    <h2>REGISTRAR ASISTENCIA</h2>
                    <!-- Agregado: Cuadro para ingresar DNI -->
                    <div class="mb-3">
                        <label for="dniAlumno" class="form-label">Ingrese el DNI del Alumno:</label>
                        <input type="text" class="form-control" id="dniAlumno" name="dniAlumno" required>
                    </div>
                    <!-- Fin de la sección agregada -->

                        <!-- Cambiado: Texto del botón y nombre del botón -->
                        <button class="btn btn-outline-secondary" type="submit" name="btnBuscarAlumno">Buscar Alumno</button>
                        <!-- Fin de los cambios -->
                    </div>
                </div>
            </form>
        ',
            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">'
        );
    }
}
?>