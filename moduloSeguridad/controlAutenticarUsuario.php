<?
    class controlAutenticarusuario
    {
        public function verificarusuario($login,$password)
        {
            session_start();
            include_once("../modelos/usuario.php");
            $objUsuario = new usuario();
            $respuesta = $objUsuario -> validarUsuario($login,$password);
            if($respuesta >= 0 and $respuesta <= 2)
            {
                switch($respuesta)
                {
                    case 0: $mensaje = "El usuario ingresado no se encuentra registrado"; break;
                    case 1: $mensaje = "El password ingresado esta errado <br>Intente nuevamente"; break;
                    case 2: $mensaje = "El usuario esta deshabilitado, contante con el administrador del sistema";break;                    
                }
                
                
                 include_once('C:/AppServ/www/proyectoADS/moduloSeguridad/formAutenticarUsuario.php');    
                $objetoFormAutenticar = new formAutenticarUsuario();
                $objetoFormAutenticar -> formAutenticarUsuarioShow();
          
                include_once('../compartido/screenMensajeSistema.php');
                $objMensaje = new screenMensajeSistema();
                $objMensaje -> screenMensajeSistemaShow($mensaje,'../index.php');                
            }
            else
            {
                include_once("../modelos/usuarioPrivilegio.php");
                $objUsuarioPriv = new usuarioPrivilegio();
                $listaPrivilegios = $objUsuarioPriv -> obtenerPrivilegiosUsuario($login);
                 $_SESSION['listaPrivilegios'] = $listaPrivilegios;
                if($listaPrivilegios != NULL)
                {
                    session_start();
                    $_SESSION['login'] = $login;
                    include_once("panelBienvenida.php");
                    

                    $objPanel = new panelBienvenida();
                    $objPanel -> panelBienvenidaShow();
                }
                else
                {
                    include_once('../compartido/screenMensajeSistema.php');
                    $objMensaje = new screenMensajeSistema();
                    $objMensaje -> screenMensajeSistemaShow("Error: el usuario no tiene privilegios registrados<br>
                                                             contacte urgentemente con el administrador",'../index.php');
                }
            }
        }
    }
?>