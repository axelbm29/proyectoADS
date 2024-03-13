<?
    include_once('conexion.php');
    class horarios extends conexion
    {
        public function buscarHorarioDisponible($nivel)
        {
            $this -> conectar();
            $SQL ="SELECT U.*
                FROM horarios U
                WHERE U.NIVEL = '$nivel' and U.inscritos_actual < 20;
                ";
            $resultado = mysql_query($SQL);
            $filas = mysql_num_rows($resultado);
            $this -> desConectar();
            if($filas == 0)
                return NULL;
            else
            {
                for($i = 0 ; $i < $filas; $i++)
                     $respuesta[$i] = mysql_fetch_array($resultado);                    
                return $respuesta;
            }            
        }        
        public function obtenerHorarisoBD()
        {
            $this -> conectar();
            $SQL ="SELECT U.*
                FROM horarios U;";

            $resultado = mysql_query($SQL);
            $filas = mysql_num_rows($resultado);
            $this -> desConectar();
            if($filas == 0)
                return NULL;
            else
            {
                for($i = 0 ; $i < $filas; $i++)
                     $respuesta[$i] = mysql_fetch_array($resultado);                    
                return $respuesta;
            }            
        } 
        public function updateHorario($idHorario)
        {
            $this->conectar();

            $SQL = "UPDATE horarios
                    SET inscritos_actual = inscritos_actual + 1
                    WHERE id_horario = '$idHorario'";

            $resultado = mysql_query($SQL);

            $this->desConectar();

            return $resultado;
        }
        ///////////////////
        public function registrarHorarioBD($dia, $hora, $inscritos, $nivel, $profesor)
        {
            $this->conectar();

            $SQL = "INSERT INTO horarios (dia, hora, inscritos_actual, nivel, profesor)
                    VALUES ('$dia', '$hora', '$inscritos', '$nivel', '$profesor')";

            $resultado = mysql_query($SQL);

            $this->desConectar();

            return $resultado;
        }

        public function editarHorarioBD($idHorario, $dia, $hora, $inscritos, $nivel, $profesor)
        {
            $this->conectar();

            $SQL = "UPDATE horarios 
                    SET dia='$dia', hora='$hora', inscritos_actual='$inscritos', nivel='$nivel', profesor='$profesor'
                    WHERE id_horario='$idHorario'";

            $resultado = mysql_query($SQL);

            $this->desConectar();

            return $resultado;
        }

        public function eliminarHorarioBD($idHorario)
        {
            $this->conectar();

            $SQL = "DELETE FROM horarios WHERE id_horario='$idHorario'";
            $resultado = mysql_query($SQL);

            $this->desConectar();

            return $resultado;
        }


    }
?>