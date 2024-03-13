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
    return($camp != "" || strlen($camp) == 8 || strlen($camp) == 12);
}


if (validarBoton("btnBuscarAlumno")) {
    $inputDni = strtolower(trim($_POST['inputDni']));
    $nivel = strtolower(trim($_POST['nivel']));
    $inputHorario = strtolower(trim($_POST['inputHorario']));
    $id = strtolower(trim($_POST['id']));
    echo $nivel;
    if (validarCamposTexto($inputDni)) {
        //BUSCAR ALUMNO EN LA BD POR DOCIDENTIDAD
        include_once("./controlAlumno.php");
        $objcontrolAutenticacion = new controlAlumno();
        $objcontrolAutenticacion->verificarAlumno($inputDni, $inputNivel, $id);
    } else {
        include_once('C:/AppServ/www/proyectoADS/moduloVentas/formBuscarHorario.php');
        $objetoBuscarAlumno = new formBuscarHorario();
        $objetoBuscarAlumno->formBuscarHorarioShow();

        include_once('../compartido/screenMensajeSistema.php');
        $objMensaje = new screenMensajeSistema();
        $objMensaje->screenMensajeSistemaShow("El documento de identidad no es valido", '');
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