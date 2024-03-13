<?
    class controlAlumno
    {
        public function verificarAlumno($docIdentidad,$inputNivel,$id)
        {
            session_start();
            include_once("../modelos/alumnos.php");
            $objUsuario = new alumnos();
            $respuesta = $objUsuario -> validarAlumnos($docIdentidad);
            if(count($respuesta)>0)
            {
                //  include_once('C:/AppServ/www/proyectoADS/moduloSeguridad/formAutenticarUsuario.php');    
                // $objetoFormAutenticar = new formAutenticarUsuario();
                // $objetoFormAutenticar -> formAutenticarUsuarioShow();
          
                // include_once('../compartido/screenMensajeSistema.php');
                // $objMensaje = new screenMensajeSistema();
                // $objMensaje -> screenMensajeSistemaShow($mensaje,'../index.php');                
            }
            else
            {   
                include_once("./formRegistroAlumno.php");
                $objUsuarioPriv = new formRegistroAlumno();
                $objUsuarioPriv -> formRegistroAlumnoPago($docIdentidad,$inputNivel,$id);
              
            }
        }
    }
?>