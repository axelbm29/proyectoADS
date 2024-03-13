<?                
    session_start();
    include_once('C:/AppServ/www/proyectoADS/compartido/indexGeneral.php');
    class formBuscarAlumno extends indexGeneral
    {
        public function formBuscarAlumnoShow($horario,$id,$nivel,$hora)
        {
            $this -> panelPrincipalShow('
                <form action="./getDatosAlumno.php" method="POST">
                    <div class="welcome-message" style="margin-top: 70px">
                        <h2>BUSCAR ALUMNO</h2>
                        <input type="hidden" name="id" value="' . $id . '">
                        <input type="hidden" name="hora" value="' . $hora . '">
                        <div class="mb-3">
                            <label for="inputNombre" class="form-label">Horario Elegido</label>
                            <input type="text" class="form-control" id="inputHorario" name="inputHorario" placeholder="" value="'.$horario.'" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="inputNivel" class="form-label">Nivel Elegido</label>
                            <input type="text" class="form-control" id="inputNivel" name="nivel" placeholder="" value="'.$nivel.'" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="inputApellido" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="inputApellido" name="inputDni" placeholder="Ingrese el número de DNI">
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="btnBuscarAlumno">Buscar Alumno</button>
                    </div>
                </form>

            ',
            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">'
        );
        }
    }
?>