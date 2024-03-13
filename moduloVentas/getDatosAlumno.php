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

function validarCamposVacios($txtNivelBaile, $txtMonto, $txtCorreo, $txtCelular, $txtNombreCompleto, $txDocumentoIdnt, $txtMeses)
{
    return($txtNivelBaile != "" && $txtMonto != "" && $txtCorreo != "" && $txtCelular != "" && $txtNombreCompleto != "" && $txDocumentoIdnt != "" && $txtMeses != "");
}

if (validarBoton("btnBuscarAlumno")) {
    $inputDni = strtolower(trim($_POST['inputDni']));
    $nivel = strtolower(trim($_POST['nivel']));
    $inputHorario = strtolower(trim($_POST['inputHorario']));
    $id = strtolower(trim($_POST['id']));
    $hora = strtolower(trim($_POST['hora']));

    if (validarCamposTexto($inputDni)) {
        //BUSCAR ALUMNO EN LA BD POR DOCIDENTIDAD
        include_once("./controlAlumno.php");
        $objControlAlumno = new controlAlumno();
        $objControlAlumno->verificarAlumno($inputDni, $nivel, $id, $hora, $inputHorario);
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

if (validarBoton("btnRegistrar")) {
    $idHorario = strtolower(trim($_POST['id']));
    $tipoAccion = strtolower(trim($_POST['tipoAccion']));
    $nombreCompleto = strtolower(trim($_POST['nombreCompleto']));
    $documentoIdentidad = strtolower(trim($_POST['documentoIdentidad']));
    $celular = strtolower(trim($_POST['celular']));
    $correo = strtolower(trim($_POST['correo']));
    $cumpleanos = strtolower(trim($_POST['cumpleanos']));
    $nivel = strtolower(trim($_POST['nivel']));
    $montoPagado = strtolower(trim($_POST['montoPagado']));
    $cantidadMeses = strtolower(trim($_POST['cantidadMeses']));

    if (validarCamposVacios($nivel, $montoPagado, $correo, $celular, $nombreCompleto, $documentoIdentidad, $cantidadMeses)) {
        if ($tipoAccion == "registro") {
            // inserta
            include_once("./controlAlumno.php");
            $objControlAlumno = new controlAlumno();
            $response = $objControlAlumno->agregarAlumno($nivel, $correo, $celular, $nombreCompleto, $documentoIdentidad, $idHorario, $cumpleanos);
            if ($response != 1) {
                include_once('C:/AppServ/www/proyectoADS/moduloVentas/formRegistroAlumno.php');
                $objetoFormRegistroAlumno = new formRegistroAlumno();
                $objetoFormRegistroAlumno->formRegistroAlumnoPagoShow($documentoIdentidad, $nivel, $idHorario, $hora, $inputHorario);

                include_once('../compartido/screenMensajeSistema.php');
                $objMensaje = new screenMensajeSistema();
                $objMensaje->screenMensajeSistemaShow("Ocurrio un error al crear al nuevo alumno", '');
                return;
            }
        } else {
            //update
            include_once("./controlAlumno.php");
            $objControlAlumno = new controlAlumno();
            $response = $objControlAlumno->actualizarAlumno($nombreCompleto, $documentoIdentidad, $celular, $correo, $cumpleanos, $nivel, $idHorario);
            if ($response != 1) {
                include_once('C:/AppServ/www/proyectoADS/moduloVentas/formRegistroAlumno.php');
                $objetoFormRegistroAlumno = new formRegistroAlumno();
                $objetoFormRegistroAlumno->formRegistroAlumnoPagoShow($documentoIdentidad, $nivel, $idHorario, $hora, $inputHorario);

                include_once('../compartido/screenMensajeSistema.php');
                $objMensaje = new screenMensajeSistema();
                $objMensaje->screenMensajeSistemaShow("Ocurrio un error al actualizar el alumno", '');
                return;
            }
        }
        // actualizar inscritos del horario
        include_once("./controlHorario.php");
        $objControlHorario = new controlHorario();
        $response = $objControlHorario->actualizarInscritosHorario($idHorario);
        if ($response != 1) {
            include_once('C:/AppServ/www/proyectoADS/moduloVentas/formRegistroAlumno.php');
            $objetoFormRegistroAlumno = new formRegistroAlumno();
            $objetoFormRegistroAlumno->formRegistroAlumnoPagoShow($documentoIdentidad, $nivel, $idHorario, $hora, $inputHorario);

            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("Ocurrio un error, intente nuevamente", '');
            return;
        }
        //insertar pago
        include_once("./controlPago.php");
        $objcontrolPago = new controlPago();
        $response = $objcontrolPago->insertarPagos($montoPagado, $cantidadMeses, $documentoIdentidad);
        if ($response != 1) {
            include_once('C:/AppServ/www/proyectoADS/moduloVentas/formRegistroAlumno.php');
            $objetoFormRegistroAlumno = new formRegistroAlumno();
            $objetoFormRegistroAlumno->formRegistroAlumnoPagoShow($documentoIdentidad, $nivel, $idHorario, $hora, $inputHorario);

            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje->screenMensajeSistemaShow("Ocurrio un error, intente nuevamente", '');
            return;
        }

        include_once("./controlPago.php");
        $objcontrolPago = new controlPago();
        $response = $objcontrolPago->generarPdfPago($montoPagado, $nombreCompleto, $documentoIdentidad, $cantidadMeses);
    } else {
        include_once('C:/AppServ/www/proyectoADS/moduloVentas/formRegistroAlumno.php');
        $objetoFormRegistroAlumno = new formRegistroAlumno();
        $objetoFormRegistroAlumno->formRegistroAlumnoPagoShow($documentoIdentidad, $nivel, $idHorario, $hora, $inputHorario);

        include_once('../compartido/screenMensajeSistema.php');
        $objMensaje = new screenMensajeSistema();
        $objMensaje->screenMensajeSistemaShow("Algunos campos se encuentran vacios", '');
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