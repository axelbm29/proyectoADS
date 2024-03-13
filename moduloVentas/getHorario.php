<?  
        session_start();
        function validarBoton($nameButton)
        {
            $boton = $_POST[$nameButton];
            if(isset($boton)){
                return true;
            }else{
                return false;
            }
        }
        function validarCamposTexto($nivel)
        {
            return ($nivel!="" );            
        }

        
        if(validarBoton("Registrar_Pagos"))
        {
            include_once('C:/AppServ/www/proyectoADS/moduloVentas/formBuscarHorario.php');    
            $objetoBuscarHorario = new formBuscarHorario();
            $objetoBuscarHorario -> formBuscarHorarioShow();
            return;
        }

        if(validarBoton("btnBuscarHorario"))
        {
            $nivelBaile = strtolower(trim($_POST['valueNivel']));

            if(validarCamposTexto($nivelBaile))
            {
                    include_once("./controlHorario.php");
                    $objcontrolAutenticacion = new controlHorario();
                    $objcontrolAutenticacion -> verificarHorario($nivelBaile);
            }
            else
            {
                include_once('C:/AppServ/www/proyectoADS/moduloVentas/formBuscarHorario.php');    
                $objetoBuscarHorario = new formBuscarHorario();
                $objetoBuscarHorario -> formBuscarHorarioShow();
          
                include_once('../compartido/screenMensajeSistema.php');
                $objMensaje = new screenMensajeSistema();
                $objMensaje -> screenMensajeSistemaShow("Debe de escoger un nivel de baile",'');                
            }
            return;
        }

        if(validarBoton("btnElegirHorario"))
        {
            $horario = strtolower(trim($_POST['horario']));
            $hora = strtolower(trim($_POST['hora']));
            $id = strtolower(trim($_POST['id']));
            $nivel = strtolower(trim($_POST['nivel']));

            include_once("./formBuscarAlumno.php");
            $objcontrolAutenticacion = new formBuscarAlumno();
            $objcontrolAutenticacion -> formBuscarAlumnoShow($horario,$id,$nivel,$hora);
            
            return;
        }

        

        

            include_once('C:/AppServ/www/proyectoADS/moduloSeguridad/formAutenticarUsuario.php');    
            $objetoFormAutenticar = new formAutenticarUsuario();
            $objetoFormAutenticar -> formAutenticarUsuarioShow();
          
            include_once('../compartido/screenMensajeSistema.php');
            $objMensaje = new screenMensajeSistema();
            $objMensaje -> screenMensajeSistemaShow("Se esta tratando de vulnerar el sistema <br>ingrese adecuedamente",'../index.php','errorForzoso');
        
?>