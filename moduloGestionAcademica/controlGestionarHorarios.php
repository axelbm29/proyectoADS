<?
    class controlGestionarHorarios
    {
        public function listarHorarios()
        {       
                include_once("../modelos/horarios.php");
                $objHorario = new horarios();
                $response = $objHorario -> obtenerHorarisoBD();
                
                include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formGestionarHorario.php');    
                $objListarHorario = new formGestionarHorario;
                $objListarHorario -> formGestionarHorarioShow($response);
        }

        public function agregarHorario($dia, $hora, $inscritos, $nivel, $profesor)
        {       
                include_once("../modelos/horarios.php");
                $objHorario = new horarios();
                $response = $objHorario -> registrarHorarioBD($dia, $hora, $inscritos, $nivel, $profesor);
                return $response;
        }

        public function editarHorario($idHorario, $dia, $hora, $inscritos, $nivel, $profesor)
        {       
                include_once("../modelos/horarios.php");
                $objHorario = new horarios();
                $response = $objHorario -> editarHorarioBD($idHorario, $dia, $hora, $inscritos, $nivel, $profesor);
                return $response;
        }

        public function eliminarHorario($idHorario)
        {       
                include_once("../modelos/horarios.php");
                $objHorario = new horarios();
                $response = $objHorario -> eliminarHorarioBD($idHorario);
                return $response;
        }
    }
?>