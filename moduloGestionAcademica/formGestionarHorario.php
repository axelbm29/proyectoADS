<?                
    session_start();
    include_once('C:/AppServ/www/proyectoADS/compartido/indexGeneral.php');
    class formGestionarHorario extends indexGeneral
    {
        public function formGestionarHorarioShow($listHorarios)
        {   
            $horariosList = "";
            foreach ($listHorarios as $horario) {
                $horariosList .= '
                    <tr>
                        <td class="col-2">' . $horario['dia'] . '</td>
                        <td class="col-2">' . $horario['hora'] . '</td>
                        <td class="col-2">' . $horario['inscritos_actual'] . '</td>
                        <td class="col-2">' . $horario['nivel'] . '</td>
                        <td class="col-2">' . $horario['profesor'] . '</td>
                        <td class="col-2">
                            <div class="row">
                                <div class="col-6">
                                    <form action="./getGestionHorarios.php" method="post">
                                        <input type="hidden" name="horario" value="' . $horario['dia'] . '">
                                        <input type="hidden" name="hora" value="'. $horario['hora'] . '">
                                        <input type="hidden" name="id" value="' . $horario['id_horario'] . '">
                                        <input type="hidden" name="nivel" value="' . $horario['nivel'] . '">
                                        <input type="hidden" name="profesor" value="' . $horario['profesor'] . '">
                                        <input type="hidden" name="inscritos" value="' . $horario['inscritos_actual'] . '">
                                        <button type="submit" name="btnEditarHorario" class="btn btn-primary w-100" value="">Editar</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form action="./getGestionHorarios.php" method="post">
                                        <input type="hidden" name="horario" value="' . $horario['dia'] . '">
                                        <input type="hidden" name="hora" value="'. $horario['hora'] . ':00 PM a ' . ($horario['hora'] + 1) . ':00 PM">
                                        <input type="hidden" name="id" value="' . $horario['id_horario'] . '">
                                        <input type="hidden" name="nivel" value="' . $horario['nivel'] . '">
                                        <input type="hidden" name="profesor" value="' . $horario['profesor'] . '">
                                        <button type="submit" name="btnEliminarHorario" class="btn btn-primary w-100" value="">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                ';
            }

            $this->panelPrincipalShow('
                <div class="welcome-message" style="margin-top: 70px">
                <h2>
                    Horarios Disponibles
                    <form action="./getGestionHorarios.php" method="post" class="float-end">
                        <button type="submit" class="btn btn-primary" name="btnAgregarHorario">Agregar Horario</button>
                    </form>
                </h2>
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th scope="col-2">Día</th>
                            <th scope="col-2">Hora</th>
                            <th scope="col-2">Inscritos</th>
                            <th scope="col-2">Nivel</th>
                            <th scope="col-2">Profesor</th>
                            <th scope="col-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        ' . $horariosList . '
                    </tbody>
                </table>
            </div>
            ',
            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">'
        );
        }
    }
?>


