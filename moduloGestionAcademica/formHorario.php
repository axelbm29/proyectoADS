<?
session_start();
include_once('C:/AppServ/www/proyectoADS/compartido/panelPrincipalShow.php');
class formHorario extends panelPrincipalShow
{
    public function formDatosHorario($tipoAccion, $title, $profesor = "", $id = "", $nivel = "", $inscritos = "", $dia = "", $hora = "")
    {
        $this->panelShow('
                <form action="./getGestionHorarios.php" method="POST">
                    <input type="hidden" name="id" value="' . $id . '">
                    <input type="hidden" name="tipoAccion" value="' . $tipoAccion . '">
                    <div class="welcome-message" style="margin-top: 70px">
                          <form action="./getHorario.php" method="POST">
                    <div class="welcome-message" style="margin-top: 70px">
                        <h2>' . $title . '</h2>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="documentoIdentidad" class="form-label">Profesor</label>
                                <input type="text" class="form-control" id="profesor" name="profesor" required value="' . $profesor . '">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="celular" class="form-label">Nivel</label>
                                <input type="tel" class="form-control" id="nivel" name="nivel" required value="' . $nivel . '">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="inscritos" class="form-label">Inscritos</label>
                                <input type="number" class="form-control" id="inscritos" name="inscritos" required value="' . $inscritos . '">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="nivel" class="form-label">Día</label>
                                <input type="text" class="form-control" id="dia" name="dia" value="' . $dia . '">
                            </div>
                        </div>
                        
                        <div class="mb-3 col-6">
                            <label for="nivel" class="form-label">Hora</label>
                            <input type="text" class="form-control" id="hora" name="hora" value="' . $hora . '">
                        </div>
                       

                        <!-- Botón -->
                        <button type="submit" class="btn btn-primary" name="btn' . $tipoAccion . '">' . $tipoAccion . '</button>
                    </div>
                </form>
                    </div>
                </form>
            ',
            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">'
        );
    }
}
?>