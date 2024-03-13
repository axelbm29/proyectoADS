<?                
    session_start();
    include_once('C:/AppServ/www/proyectoADS/moduloGestionAcademica/formHorario.php');
    class formRegistroHorario extends formHorario
    {
        public function formAgregarHorario()
        {
            $this -> formDatosHorario(
                'Registrar',
                'Agregar Horario'
            );
        }
        public function formEditarHorario($profesor, $nivel, $id,$inscritos, $hora, $horario)
        {
            $this -> formDatosHorario(
                'Actualizar',
                'Editar Horario',
                $profesor,
                $id,
                $nivel,
                $inscritos,
                $horario,
                $hora
            );
        }

        
    }
?>