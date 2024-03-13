<?
session_start();
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
    return(is_numeric($camp) && strlen($camp) == 8);
}

// PRUEBA

if (validarBoton("btnBuscarAlumno")) {
    $dni = strtolower(trim($_POST['dni']));

    if (validarCamposTexto($dni)) {
        include_once("./controlGestionarAlumnos.php");
        $objcontrolAutenticacion = new controlGestionarAlumnos();
        $objcontrolAutenticacion->buscarAlumno($dni);
        return;
    } else {
        include_once("../modelos/alumnos.php");
        $objAlumnos = new alumnos();
        $listAlumnos = $objAlumnos->buscarAlumnos();

        include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formGestionarAlumnos.php');
        $objetoGestionarAlumnos = new formGestionarAlumnos();
        $objetoGestionarAlumnos->formGestionarAlumnosShow($listAlumnos);

        include_once('../compartido/screenMensajeSistema.php');
        $objMensaje = new screenMensajeSistema();
        $objMensaje->screenMensajeSistemaShow("El documento de identidad no es valido.", '');
        return;
    }
}





include_once('C:/AppServ/www/proyectoADS/moduloSeguridad/formAutenticarUsuario.php');
$objetoFormAutenticar = new formAutenticarUsuario();
$objetoFormAutenticar->formAutenticarUsuarioShow();

include_once('../compartido/screenMensajeSistema.php');
$objMensaje = new screenMensajeSistema();
$objMensaje->screenMensajeSistemaShow("Se esta tratando de vulnerar el sistema <br>ingrese adecuedamente", '../index.php', 'errorForzoso');

?>