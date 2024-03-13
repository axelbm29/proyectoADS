<?
session_start();
include_once('C:/AppServ/www/proyectoADS/compartido/panelPrincipalShow.php');
class formEditarAlumno extends panelPrincipalShow
{
    public function formEditarAlumnoShow($id_alumno, $nombre_completo, $dni, $nivel_baile, $celular, $correo, $cumpleanos)
    {
        $this->panelShow('
                <form action="./getGestionarAlumnos.php" method="post">
                    <input type="hidden" name="id_alumno" value="' . $id_alumno . '">
                    <div class="mb-3">
                        <label for="inputNombre" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="inputNombre" name="nombre_completo" placeholder="" value="' . $nombre_completo . '">
                    </div>
                    <div class="mb-3">
                        <label for="inputDNI" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="inputDNI" name="dni" placeholder="" value="' . $dni . '">
                    </div>
                    <div class="mb-3">
                        <label for="inputNivel" class="form-label">Nivel Elegido</label>
                        <select class="form-select" id="inputNivel" name="nivel_baile">
                            <option value="BASICO" ' . ($nivel_baile === 'BASICO' || $nivel_baile === 'basico' ? 'selected' : '') . '>BASICO</option>
                            <option value="INTERMEDIO" ' . ($nivel_baile === 'INTERMEDIO' || $nivel_baile === 'intermedio' ? 'selected' : '') . '>INTERMEDIO</option>
                            <option value="AVANZADO" ' . ($nivel_baile === 'AVANZADO' || $nivel_baile === 'avanzado' ? 'selected' : '') . '>AVANZADO</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputCelular" class="form-label">Número de Celular</label>
                        <input type="text" class="form-control" id="inputCelular" name="celular" placeholder="" value="' . $celular . '">
                    </div>
                    <div class="mb-3">
                        <label for="inputCorreo" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="inputCorreo" name="correo" placeholder="" value="' . $correo . '">
                    </div>
                    <div class="mb-3">
                        <label for="inputCumpleanos" class="form-label">Cumpleaños</label>
                        <input type="text" class="form-control" id="inputCumpleanos" name="cumpleanos" placeholder="" value="' . $cumpleanos . '">
                    </div>
                    <button type="submit" name="btnEditar" class="btn btn-primary" id="btnEditar">Editar</button>
                </form>
                ',

            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">'
        );
    }
}
?>