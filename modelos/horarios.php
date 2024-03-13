<?
    include_once('conexion.php');
    class horarios extends conexion
    {
        public function buscarHorarioDisponible($nivel)
        {
            $this -> conectar();
            $SQL ="SELECT U.*
                FROM horarios U
                WHERE U.NIVEL = '$nivel';
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
    }
?>