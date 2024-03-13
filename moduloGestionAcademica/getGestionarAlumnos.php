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

function validarCamposTexto($campo)
{
    return($campo != "");
}

if (validarBoton("Gestionar_Alumnos")) {
    include_once("./controlGestionarAlumnos.php");
    $objcontrolAutenticacion = new controlGestionarAlumnos();
    $objcontrolAutenticacion->listarAlumnos($id_alumno);

    return;
}

if (validarBoton("btnEditarAlumno")) {
    include_once("./formEditarAlumno.php");
    $objcontrolAutenticacion = new formEditarAlumno();
    $objcontrolAutenticacion->formEditarAlumnoShow($id_alumno, $nombre_completo, $dni, $nivel_baile, $celular, $correo, $cumpleanos);
    return;
}

if (validarBoton("btnEditar")) {
    $id_alumno = $_POST['id_alumno'];
    $nombre_completo = $_POST['nombre_completo'];
    $dni = $_POST['dni'];
    $nivel_baile = $_POST['nivel_baile'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $cumpleanos = $_POST['cumpleanos'];

    if (
        validarCamposTexto($nombre_completo) &&
        validarCamposTexto($dni) &&
        validarCamposTexto($nivel_baile) &&
        validarCamposTexto($celular) &&
        validarCamposTexto($correo) &&
        validarCamposTexto($cumpleanos)
    ) {
        include_once("./controlGestionarAlumnos.php");
        $objcontrolAutenticacion = new controlGestionarAlumnos();
        $objcontrolAutenticacion->actualizarDatosAlumno($id_alumno, $nombre_completo, $dni, $nivel_baile, $celular, $correo, $cumpleanos);

    } else {
        include_once("../modelos/alumnos.php");
        $objAlumnos = new alumnos();
        $listAlumnos = $objAlumnos->buscarAlumnos();

        include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formGestionarAlumnos.php');
        $objetoGestionarAlumnos = new formGestionarAlumnos();
        $objetoGestionarAlumnos->formGestionarAlumnosShow($listAlumnos);

        include_once('../compartido/screenMensajeSistema.php');
        $objMensaje = new screenMensajeSistema();
        $objMensaje->screenMensajeSistemaShow("Algunos campos se encuentran vacios.", '');
    }
    return;
}


if (validarBoton("btnEliminarAlumno")) {
    $id_alumno = $_POST['id_alumno'];

    include_once('C:/AppServ/www/proyectoADS/compartido/screenMensajeConfirmacion.php');
    $objFormConfirmarEliminar = new screenMensajeConfirmacion();
    $objFormConfirmarEliminar->screenMensajeConfirmacionShow($id_alumno, $nombre_completo);

    return;
}

if (validarBoton("btnEliminarConfirmado")) {
    include_once("./controlGestionarAlumnos.php");
    $objControlGestionarAlumnos = new controlGestionarAlumnos();
    $objControlGestionarAlumnos->confirmarEliminarAlumno($id_alumno);
    return;
} elseif (validarBoton("btnCancelarEliminacion")) {
    include_once("../modelos/alumnos.php");
    $objAlumnos = new alumnos();
    $listAlumnos = $objAlumnos->buscarAlumnos();

    include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formGestionarAlumnos.php');
    $objetoGestionarAlumnos = new formGestionarAlumnos();
    $objetoGestionarAlumnos->formGestionarAlumnosShow($listAlumnos);

    include_once('../compartido/screenMensajeSistema.php');
    $objMensaje = new screenMensajeSistema();
    $objMensaje->screenMensajeSistemaShow("Se cancelo la operacion.", '');
    return;
}

include_once('C:/AppServ/www/proyectoADS/moduloSeguridad/formAutenticarUsuario.php');
$objetoFormAutenticar = new formAutenticarUsuario();
$objetoFormAutenticar->formAutenticarUsuarioShow();

include_once('../compartido/screenMensajeSistema.php');
$objMensaje = new screenMensajeSistema();
$objMensaje->screenMensajeSistemaShow("Se esta tratando de vulnerar el sistema <br>ingrese adecuedamente", '../index.php', 'errorForzoso');

?>