<?
session_start();
include_once('C:/AppServ/www/proyectoADS/compartido/indexGeneral.php');
class tableHorario extends indexGeneral
{
    public function formTableHorarioShow($listHorarios, $nivel)
    {
        $horariosList = "";
        foreach ($listHorarios as $horario) {
            $horariosList .= '
                    <tr>
                        <td class="col">' . $horario['dia'] . '</td>
                        <td class="col-6">' . $horario['hora'] . ':00 PM a ' . ($horario['hora'] + 1) . ':00 PM</td>
                        <td class="col-2">
                            <form action="./getHorario.php" method="post">
                                <input type="hidden" name="horario" value="' . $horario['dia'] . '">
                                <input type="hidden" name="hora" value="' . $horario['hora'] . ':00 PM a ' . ($horario['hora'] + 1) . ':00 PM">
                                <input type="hidden" name="id" value="' . $horario['id_horario'] . '">
                                <input type="hidden" name="nivel" value="' . $nivel . '">
                                <button type="submit" name="btnElegirHorario" class="btn btn-primary w-100" value="' . $horario['dia'] . '-' . $horario['hora'] . '">Elegir Horario</button>
                            </form>
                        </td>
                    </tr>
                ';
        }

        $this->panelPrincipalShow('
                <div class="welcome-message" style="margin-top: 70px">
                    <h2>Horarios Disponibles</h2>
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th scope="col">Día</th>
                                <th scope="col-6">Hora</th>
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
