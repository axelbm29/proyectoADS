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

function validarCamposVacios($profesor, $nivel, $hora, $horario, $inscritos)
{
    return($profesor != "" && $nivel != "" && $hora != "" && $horario != "" && $inscritos != "");
}

if (validarBoton("Gestionar_Horarios")) {
    include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/controlGestionarHorarios.php');
    $objetoBuscarHorario = new controlGestionarHorarios();
    $response = $objetoBuscarHorario->listarHorarios();
    return;
}

if (validarBoton("btnAgregarHorario")) {
    include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistroHorario.php');
    $objetoBuscarHorario = new formRegistroHorario();
    $objetoBuscarHorario->formAgregarHorario();
    return;
}

if (validarBoton("btnEditarHorario")) {
    $profesor = strtolower(trim($_POST['profesor']));
    $nivel = strtolower(trim($_POST['nivel']));
    $id = strtolower(trim($_POST['id']));
    $hora = strtolower(trim($_POST['hora']));
    $horario = strtolower(trim($_POST['horario']));
    $inscritos = strtolower(trim($_POST['inscritos']));

    include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistroHorario.php');
    $objetoBuscarHorario = new formRegistroHorario();
    $objetoBuscarHorario->formEditarHorario($profesor, $nivel, $id, $inscritos, $hora, $horario);
    return;
}

if (validarBoton("btnEliminarHorario")) {


    include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/controlGestionarHorarios.php');
    $objetoEliminarHorario = new controlGestionarHorarios();
    $response = $objetoEliminarHorario->eliminarHorario($id);
    if ($response == 1) {
        include_once('../compartido/screenMensajeSistema.php');
        $objMensaje = new screenMensajeSistema();
        $objMensaje->screenMensajeSistemaShow("Horario eliminado correctamente", '', '', true);

        $id = strtolower(trim($_POST['id']));
        include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/controlGestionarHorarios.php');
        $objetoBuscarHorario = new controlGestionarHorarios();
        $response = $objetoBuscarHorario->listarHorarios();

    }
    return;
}
/////////
if (validarBoton("btnRegistrar")) {
    $profesor = strtolower(trim($_POST['profesor']));
    $nivel = strtolower(trim($_POST['nivel']));
    $hora = strtolower(trim($_POST['hora']));
    $dia = strtolower(trim($_POST['dia']));
    $inscritos = strtolower(trim($_POST['inscritos']));

    if (validarCamposVacios($profesor, $nivel, $hora, $dia, $inscritos)) {
        include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/controlGestionarHorarios.php');
        $objetoBuscarHorario = new controlGestionarHorarios();
        $response = $objetoBuscarHorario->agregarHorario($dia, $hora, $inscritos, $nivel, $profesor);

        if ($response == 1) {
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("Horario registrado correctamente", '', '', true);
            $id = strtolower(trim($_POST['id']));
            include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/controlGestionarHorarios.php');
            $objetoBuscarHorario = new controlGestionarHorarios();
            $response = $objetoBuscarHorario->listarHorarios();
        } else {
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("Error al registrar el horario", '', 'errorForzoso');
        }

        return;
    } else {
        include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistroHorario.php');
        $objetoBuscarHorario = new formRegistroHorario();
        $objetoBuscarHorario->formAgregarHorario();

        include_once('../compartido/screenMensajeSistema.php');
        $objMensaje = new screenMensajeSistema();
        $objMensaje->screenMensajeSistemaShow("Todos los campos son obligatorios", '', '');
        return;
    }


}

if (validarBoton("btnActualizar")) {
    $profesor = strtolower(trim($_POST['profesor']));
    $nivel = strtolower(trim($_POST['nivel']));
    $hora = strtolower(trim($_POST['hora']));
    $dia = strtolower(trim($_POST['dia']));
    $inscritos = strtolower(trim($_POST['inscritos']));
    $id = strtolower(trim($_POST['id']));

    if (validarCamposVacios($profesor, $nivel, $hora, $dia, $inscritos)) {
        include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/controlGestionarHorarios.php');
        $objetoBuscarHorario = new controlGestionarHorarios();
        $response = $objetoBuscarHorario->editarHorario($id, $dia, $hora, $inscritos, $nivel, $profesor);
        if ($response == 1) {
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("Horario actualizado correctamente", '', '', true);

            $id = strtolower(trim($_POST['id']));
            include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/controlGestionarHorarios.php');
            $objetoBuscarHorario = new controlGestionarHorarios();
            $response = $objetoBuscarHorario->listarHorarios();
        } else {
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("Error al registrar el horario", '../moduloSeguridad/panelBienvenida.php', 'errorForzoso');
        }
        return;
    } else {
        include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formRegistroHorario.php');
        $objetoBuscarHorario = new formRegistroHorario();
        $objetoBuscarHorario->formEditarHorario($profesor, $nivel, $id, $inscritos, $hora, $dia);

        include_once('../compartido/screenMensajeSistema.php');
        $objMensaje = new screenMensajeSistema();
        $objMensaje->screenMensajeSistemaShow("Todos los campos son obligatorios", './formGestionarHorario.php', '');
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