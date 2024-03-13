<?php
session_start();

include_once('../compartido/screenMensajeSistema.php');
include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistrarAsistencia.php');
include_once('C:/AppServ/www/proyectoADS/modelos/alumnos.php');

function validarBoton($nameButton)
{
    $boton = $_POST[$nameButton];
    if (isset($boton)) {
        return true;
    } else {
        return false;
    }
}
function validarCamposTexto($camp)
{
    return empty($camp) || strlen($camp) != 8 || !ctype_digit($camp);
}


if (validarBoton("Registrar_Asistencia")) {
    include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistrarAsistencia.php');
    $objetoRegistrarAsistencia = new formRegistrarAsistencia();
    $objetoRegistrarAsistencia->formRegistrarAsistenciaShow();
    return;
}
if (validarBoton("btnBuscarAlumno")) {
    $docIdentidad = strtolower(trim($_POST['dniAlumno']));

    if (validarCamposTexto($docIdentidad)) {
        include_once('../compartido/screenMensajeSistema.php');
        $objMensaje = new screenMensajeSistema();
        $objMensaje->screenMensajeSistemaShow("El campo DNI es incorrecto.", '');

        include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistrarAsistencia.php');
        $objetoRegistrarAsistencia = new formRegistrarAsistencia();
        $objetoRegistrarAsistencia->formRegistrarAsistenciaShow();
        return;
    } else {
        include_once("./controlDeAlumno.php");
        $objcontrolAutenticacion = new controlDeAlumno();
        $objcontrolAutenticacion->verificarDNIAlumno($docIdentidad);
    }
    return;
}


if (validarBoton("btnRegistrar")) {
    $docIdentidad = strtolower(trim($_POST['dni']));


    include_once('../moduloGestionAcademica/controlDeAlumno.php');
    $objcontrolAlumno = new controlDeAlumno();
    $horasPendientes = $objcontrolAlumno->validarHorasPendientes($docIdentidad);

    if ($horasPendientes > 0) {

        $objAlumnos = new alumnos();
        $respuesta = $objAlumnos->validarAlumnos($docIdentidad);
        $horasConsumidas = $respuesta[0]['horas_consumidas'] + 2;
        $horasPendientes = $horasPendientes - 2;

        $actualizacionExitosa = $objAlumnos->actualizarHorasPendientes($docIdentidad, $horasConsumidas, $horasPendientes);

        if ($actualizacionExitosa) {
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("Asistencia registrada correctamente.", '');

            include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistrarAsistencia.php');
            $objetoRegistrarAsistencia = new formRegistrarAsistencia();
            $objetoRegistrarAsistencia->formRegistrarAsistenciaShow();
        } else {
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("No se pudo registrar la asistencia. Intente nuevamente.", '');

            include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistrarAsistencia.php');
            $objetoRegistrarAsistencia = new formRegistrarAsistencia();
            $objetoRegistrarAsistencia->formRegistrarAsistenciaShow();
        }
    } else {
        include_once('../compartido/screenMensajeSistema.php');
        $objMensaje = new screenMensajeSistema();
        $objMensaje->screenMensajeSistemaShow("El alumno no cuenta con horas pendientes.", '');

        include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistrarAsistencia.php');
        $objetoRegistrarAsistencia = new formRegistrarAsistencia();
        $objetoRegistrarAsistencia->formRegistrarAsistenciaShow();
    }
    return;
}


include_once('C:/AppServ/www/proyectoADS/moduloSeguridad/formAutenticarUsuario.php');
$objetoFormAutenticar = new formAutenticarUsuario();
$objetoFormAutenticar->formAutenticarUsuarioShow();

include_once('../compartido/screenMensajeSistema.php');
$objMensaje = new screenMensajeSistema();
$objMensaje->screenMensajeSistemaShow("Se esta tratando de vulnerar el sistema <br>ingrese adecuedamente", '../index.php', 'errorForzoso');

?>