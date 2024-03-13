<?
session_start();
include_once('C:/AppServ/www/proyectoADS/compartido/indexGeneral.php');
class formGestionarAlumnos extends indexGeneral
{
    public function formGestionarAlumnosShow($listAlumnos)
    {
        $alumnosList = "";
        if (!empty($listAlumnos) && is_array($listAlumnos)) {
            foreach ($listAlumnos as $alumno) {
                $alumnosList .= '
        <tr>
            <td class="col">' . $alumno['nombre_completo'] . '</td>
            <td class="col">' . $alumno['dni'] . '</td>
            <td class="col">' . $alumno['correo'] . '</td>
            <td class="col">' . $alumno['cumpleanos'] . '</td>
            <td class="col">' . $alumno['celular'] . '</td>
            <td class="col">' . $alumno['nivel_baile'] . '</td>
            <td class="col-2">
                <script>
                function confirmarEliminar(id_alumno) {
                    var confirmacion = confirm("¿Estás seguro de eliminar al alumno?");
                    if(confirmacion) {
                        window.location.href = "./getGestionarAlumnos.php?accion=confirmarEliminar&id_alumno=" + id_alumno;
                    }
                }
                </script> 
                <form action="./getGestionarAlumnos.php" method="post">
                    <input type="hidden" name="nombre_completo" value="' . $alumno['nombre_completo'] . '">
                    <input type="hidden" name="dni" value="' . $alumno['dni'] . '">
                    <input type="hidden" name="id_alumno" value="' . $alumno['id_alumno'] . '">
                    <input type="hidden" name="nivel" value="' . $alumno['nivel'] . '">
                    <input type="hidden" name="celular" value="' . $alumno['celular'] . '">
                    <input type="hidden" name="correo" value="' . $alumno['correo'] . '">
                    <input type="hidden" name="cumpleanos" value="' . $alumno['cumpleanos'] . '">
                    <input type="hidden" name="nivel_baile" value="' . $alumno['nivel_baile'] . '">
                    
                    <button type="submit" name="btnEditarAlumno" class="btn btn-warning w-100" value="' . $alumno['id'] . '-' . $alumno['nombre_completo'] . '">Editar Alumno</button>
                    <button type="submit" name="btnEliminarAlumno" class="btn btn-danger w-100" value="' . $alumno['id_alumno'] . '">Eliminar Alumno</button>
                </form>
            </td>
        </tr>
                ';
            }
        }
        $this->panelPrincipalShow('
                <div class="welcome-message" style="margin-top: 70px">
                    <div class="row">
                        <div class="col-12">
                            <h2>Gestionar alumnos</h2>
                        </div>
                    </div>
                    <form action="./getAlumno.php" method="post">
                        <div class="col-md-1">
                            <label for="buscar">Buscar</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="buscar" name="dni" placeholder="Ingrese nombre o DNI">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" name="btnBuscarAlumno">Buscar Alumno</button>
                        </div>
                    </form>

                    <div class="row mt-4">
                        <div class="col-22">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre completo</th>
                                        <th>DNI</th>
                                        <th>Correo</th>
                                        <th>Cumpleanos</th>
                                        <th>Numero de celular</th>
                                        <th>Nivel de baile</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ' . $alumnosList . '
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            ',
            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">'
        );
    }
}

?>

<!-- 
                        <td class="col-2">
                            <form action="./getGestionarAlumnos.php" method="post">
                                <input type="hidden" name="horario" value="' . $alumnos['dia'] . '">
                                <input type="hidden" name="hora" value="' . $alumnos['hora'] . ':00 PM a ' . ($alumnos['hora'] + 1) . ':00 PM">
                                <input type="hidden" name="id" value="' . $alumnos['id_horario'] . '">
                                <input type="hidden" name="nivel" value="' . $docIdnt . '">
                                <button class="btn btn-primary" id="btnBuscarAlumno">Editar Alumno</button>
                                <button class="btn btn-primary" id="btnBuscarAlumno">Eliminar Alumno</button>
                                <button type="submit" name="btnElegirHorario" class="btn btn-primary w-100" value="' . $alumnos['dia'] . '-' . $alumnos['hora'] . '">Elegir Horario</button>
                            </form>
                        </td> -->