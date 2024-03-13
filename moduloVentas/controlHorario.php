<?
    class controlHorario
    {
        public function verificarHorario($nivel)
        {       
                $nivel = strtolower($nivel);
                include_once("../modelos/horarios.php");
                $objUsuarioPriv = new horarios();
                $listHorarios = $objUsuarioPriv -> buscarHorarioDisponible($nivel);
                if(count($listHorarios) > 0)
                {
                    include_once("./tableHorario.php");
                    $objPanel = new tableHorario();
                    $objPanel -> formTableHorarioShow($listHorarios,$nivel);
                }
                else 
                {
                    include_once('C:/AppServ/www/proyectoADS/moduloVentas/formBuscarHorario.php');    
                    $objetoBuscarHorario = new formBuscarHorario();
                    $objetoBuscarHorario -> formBuscarHorarioShow();
            
                    include_once('../compartido/screenMensajeSistema.php');
                    $objMensaje = new screenMensajeSistema();
                    $objMensaje -> screenMensajeSistemaShow("Error: No hay horarios disponibles para este nivel de baile",'../index.php');
                }
        }
    }
?>