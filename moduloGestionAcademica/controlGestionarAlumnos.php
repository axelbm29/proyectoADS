<?
class controlGestionarAlumnos
{
    public function listarAlumnos($id_alumno)
    {
        $id_alumno = strtolower($id_alumno);
        include_once("../modelos/alumnos.php");
        $objUsuarioPriv = new alumnos();
        $listAlumnos = $objUsuarioPriv->buscarAlumnos();
        if (count($listAlumnos) > 0) {
            include_once("./formGestionarAlumnos.php");
            $objPanel = new formGestionarAlumnos();
            $objPanel->formGestionarAlumnosShow($listAlumnos);
        } else {
            include_once('C:/AppServ/www/proyectoADS/moduloSeguridad/formAutenticarUsuario.php');
            $objetoFormAutenticar = new formAutenticarUsuario();
            $objetoFormAutenticar->formAutenticarUsuarioShow();

            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("No hay alumnos registrados", '../index.php', 'errorForzoso');
        }
    }

    // para buscar un alumno en la tabla
    public function buscarAlumno($docIdnt)
    {
        include_once("../modelos/alumnos.php");
        $objAlumnos = new alumnos();
        $alumno = $objAlumnos->validarAlumnos($docIdnt);

        if ($alumno !== NULL) {
            $alumnoInfo = $alumno[0];
            $listAlumnos = array($alumnoInfo);
            include_once("./formGestionarAlumnos.php");
            $objPanel = new formGestionarAlumnos();
            $objPanel->formGestionarAlumnosShow($listAlumnos);
        } else {
            $this->listarAlumnos("");
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("No se encuentra registrado el alumno", '');
        }
    }
    public function verificarAlumno($id_alumno)
    {
        $id_alumno = strtolower($id_alumno);
        include_once("../modelos/alumnos.php");
        $objAlumnos = new alumnos();
        $alumno = $objAlumnos->validarAlumnos($id_alumno);

        if ($alumno !== NULL) {
            $alumnoInfo = $alumno[0];
            include_once("./formEditarAlumno.php");
            $objFormEditarAlumno = new formEditarAlumno();
            $objFormEditarAlumno->formEditarAlumnoShow(
                $alumnoInfo['id_alumno'],
                $alumnoInfo['nombre_completo'],
                $alumnoInfo['dni'],
                $alumnoInfo['nivel_baile'],
                $alumnoInfo['celular'],
                $alumnoInfo['correo'],
                $alumnoInfo['cumpleanos']
            );
        } else {
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("No se encontro al alumno", '../index.php', 'errorForzoso');
        }
    }

    public function actualizarDatosAlumno($id_alumno, $nombre_completo, $dni, $nivel_baile, $celular, $correo, $cumpleanos)
    {
        include_once("../modelos/alumnos.php");
        $objAlumnos = new alumnos();
        $resultadoActualizacion = $objAlumnos->actualizarAlumnoPorId($id_alumno, $nombre_completo, $dni, $nivel_baile, $celular, $correo, $cumpleanos);

        if ($resultadoActualizacion) {
            $listAlumnos = $objAlumnos->buscarAlumnos();
            include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formGestionarAlumnos.php');
            $objetoGestionarAlumnos = new formGestionarAlumnos();
            $objetoGestionarAlumnos->formGestionarAlumnosShow($listAlumnos);

            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("Datos del alumno modificados", '', '', true);
        } else {
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("Ocurrió un error al modificar los datos", '');

            include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formGestionarAlumnos.php');
            $objetoGestionarAlumnos = new formGestionarAlumnos();
            $objetoGestionarAlumnos->formGestionarAlumnosShow($listAlumnos);
        }
    }



    public function eliminarAlumno($id_alumno)
    {
        // Muestra el formulario de confirmación
        include_once("../modelos/alumnos.php");
        $objAlumnos = new alumnos();
        $alumno = $objAlumnos->validarAlumnos($id_alumno);

        if ($alumno !== NULL) {
            $alumnoInfo = $alumno[0];
            include_once('C:/AppServ/www/proyectoADS/compartido/screenMensajeConfirmacion.php');
            $objFormConfirmarEliminar = new screenMensajeConfirmacion();
            $objFormConfirmarEliminar->screenMensajeConfirmacionShow(
                $alumnoInfo['id_alumno'],
                $alumnoInfo['nombre_completo']
            );
        }
    }
    public function confirmarEliminarAlumno($id_alumno)
    {
        include_once("../modelos/alumnos.php");
        $objAlumnos = new alumnos();

        $alumno = $objAlumnos->validarAlumnos($id_alumno);

        if ($alumno !== NULL) {
            include_once("../modelos/alumnos.php");
            $objAlumnos = new alumnos();
            $listAlumnos = $objAlumnos->buscarAlumnos();

            include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formGestionarAlumnos.php');
            $objetoGestionarAlumnos = new formGestionarAlumnos();
            $objetoGestionarAlumnos->formGestionarAlumnosShow($listAlumnos);

            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("El alumno no existe", '');
        } else {
            $objAlumnos->eliminarAlumno($id_alumno);

            $listAlumnos = $objAlumnos->buscarAlumnos();

            include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formGestionarAlumnos.php');
            $objetoGestionarAlumnos = new formGestionarAlumnos();
            $objetoGestionarAlumnos->formGestionarAlumnosShow($listAlumnos);

            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("Alumno eliminado exitosamente", '');
        }
    }
}
?>