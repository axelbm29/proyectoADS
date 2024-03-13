<?  
        session_start();
        function validarBoton($boton)
        {
            return isset($boton);            
        }
        function validarCamposTexto($login,$password)
        {
            return (strlen($login) >3 and strlen($password) > 3);            
        }

        $boton = $_POST['btnIngresar'];
        if(validarBoton($boton))
        {
            $login = strtolower(trim($_POST['txtLogin']));
            $password = trim($_POST['txtPassword']);
            if(validarCamposTexto($login,$password))
            {
                    include_once("controlAutenticarUsuario.php");
                    $objcontrolAutenticacion = new controlAutenticarUsuario();
                    $objcontrolAutenticacion -> verificarusuario($login,$password);
            }
            else
            {
                include_once('C:/AppServ/www/proyectoADS/moduloSeguridad/formAutenticarUsuario.php');    
                $objetoFormAutenticar = new formAutenticarUsuario();
                $objetoFormAutenticar -> formAutenticarUsuarioShow();
          
                include_once('../compartido/screenMensajeSistema.php');
                $objMensaje = new screenMensajeSistema();
                $objMensaje -> screenMensajeSistemaShow("Los datos ingresados no son validos<br>intente nuevamente",'../index.php');                
            }
        }
        else
        {

            include_once('C:/AppServ/www/proyectoADS/moduloSeguridad/formAutenticarUsuario.php');    
            $objetoFormAutenticar = new formAutenticarUsuario();
            $objetoFormAutenticar -> formAutenticarUsuarioShow();
          
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje -> screenMensajeSistemaShow("Se esta tratando de vulnerar el sistema <br>ingrese adecuedamente",'../index.php','errorForzoso');
        }
?>