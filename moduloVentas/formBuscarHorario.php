<?                
    session_start();
    include_once('C:/AppServ/www/proyectoADS/compartido/indexGeneral.php');
    class formBuscarHorario extends indexGeneral
    {
        public function formBuscarHorarioShow()
        {
            $this -> panelPrincipalShow('
                <form action="./getHorario.php" method="POST">
                    <div class="welcome-message" style="margin-top: 70px">
                        <h2>BUSCAR HORARIO</h2>
                        <p>Nivel de Baile: </p>
                        <div class="input-group">
                            <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="valueNivel">
                                <option selected value="">Escoja su nivel</option>
                                <option value="BASICO">BASICO</option>
                                <option value="INTERMEDIO">INTERMEDIO</option>
                                <option value="AVANZADO">AVANZADO</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="submit" name="btnBuscarHorario">Button</button>
                        </div>
                    </div>
                </form>
            ',
            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">'
        );
        }
    }
?> 
