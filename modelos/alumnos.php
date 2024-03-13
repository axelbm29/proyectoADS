<?
    include_once('conexion.php');
    class alumnos extends conexion
    {
        public function validarAlumnos($docIdnt)
        {
            $this -> conectar();
            $SQL ="SELECT A.*
                FROM alumno A
                WHERE A.dni = '$docIdnt';
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
        public function insertarAlumno($nombre, $dni, $celular, $correo, $cumpleanos, $nivelBaile, $idHorario)
        {   
            $this->conectar();

            $SQL = "INSERT INTO alumno (nombre_completo, dni, celular, correo, cumpleanos, nivel_baile, id_horario)
                    VALUES ('$nombre', '$dni', '$celular', '$correo', '$cumpleanos', '$nivelBaile', '$idHorario')";

            $resultado = mysql_query($SQL);

            $this->desConectar();

            return $resultado;
        }

        public function actualizarAlumno($nombre, $dni, $celular, $correo, $cumpleanos, $nivelBaile,$idHorario)
        {
            $this->conectar();

            $SQL = "UPDATE alumno
                    SET nombre_completo = '$nombre',
                        celular = '$celular',
                        correo = '$correo',
                        cumpleanos = '$cumpleanos',
                        nivel_baile = '$nivelBaile',
                        id_horario = '$idHorario'
                    WHERE dni = '$dni'";

            $resultado = mysql_query($SQL);

            $this->desConectar();

            return $resultado;
        }

    }
?>