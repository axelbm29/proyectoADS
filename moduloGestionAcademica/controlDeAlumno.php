<?php
class controlDeAlumno
{
    public function verificarDNIAlumno($docIdnt)
    {
        session_start();
        include_once("../modelos/alumnos.php");
        $objUsuario = new alumnos();
        $respuesta = $objUsuario->validarAlumnos($docIdnt);

        if (count($respuesta) == 0) {
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("El alumno no se encuentra registrado", '');

            include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistrarAsistencia.php');
            $objetoRegistrarAsistencia = new formRegistrarAsistencia();
            $objetoRegistrarAsistencia->formRegistrarAsistenciaShow();
            return;
        } else {
            include_once("../moduloGestionAcademica/formDatosAlumno.php");
            $objUsuarioPriv = new formDatosAlumno();
            $objUsuarioPriv->formDatosAlumnoShow($docIdnt, $nombreCom, $id);
        }
    }

    public function validarHorasPendientes($docIdnt)
    {
        include_once("../modelos/alumnos.php");
        $objAlumnos = new alumnos();
        return $objAlumnos->validarHorasPend($docIdnt);
    }

}
?>