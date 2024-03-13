<?                
    session_start();
    include_once('C:/AppServ/www/proyectoADS/compartido/indexGeneral.php');
    class formRegistroAlumno extends indexGeneral
    {
        public function formRegistroAlumnoPago($docIdentidad,$inputNivel,$id)
        {
            $this -> panelPrincipalShow('
                <form action="./getHorario.php" method="POST">
                    <div class="welcome-message" style="margin-top: 70px">
                          <form action="./getHorario.php" method="POST">
                    <div class="welcome-message" style="margin-top: 70px">
                        <h2>Registro de Alumno y Pago</h2>

                        <!-- Nombre Completo -->
                        <div class="mb-3">
                            <label for="nombreCompleto" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" required>
                        </div>

                        <!-- Documento de Identidad -->
                        <div class="mb-3">
                            <label for="documentoIdentidad" class="form-label">Documento de Identidad</label>
                            <input type="text" class="form-control" id="documentoIdentidad" name="documentoIdentidad" required>
                        </div>

                        <!-- Celular -->
                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="celular" name="celular" required>
                        </div>

                        <!-- Correo -->
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>

                        <!-- Cumpleaños -->
                        <div class="mb-3">
                            <label for="cumpleanos" class="form-label">Cumpleaños</label>
                            <input type="date" class="form-control" id="cumpleanos" name="cumpleanos" required>
                        </div>

                        <!-- Nivel -->
                        <div class="mb-3">
                            <label for="nivel" class="form-label">Nivel</label>
                            <input type="text" class="form-control" id="nivel" name="nivel" disabled value="'.$inputNivel.'">
                        </div>

                        <!-- Horario -->
                        <div class="mb-3">
                            <label for="horario" class="form-label">Horario</label>
                            <input type="text" class="form-control" id="horario" name="horario" required>
                        </div>

                        <!-- Monto Pagado -->
                        <div class="mb-3">
                            <label for="montoPagado" class="form-label">Monto Pagado</label>
                            <input type="number" class="form-control" id="montoPagado" name="montoPagado" required>
                        </div>

                        <!-- Cantidad de Meses -->
                        <div class="mb-3">
                            <label for="cantidadMeses" class="form-label">Cantidad de Meses</label>
                            <input type="number" class="form-control" id="cantidadMeses" name="cantidadMeses" required>
                        </div>

                        <!-- Botón Registrar Pago -->
                        <button type="submit" class="btn btn-primary" name="btnRegistrarPago">Registrar Pago</button>
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