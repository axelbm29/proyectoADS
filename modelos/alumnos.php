<?
include_once('conexion.php');
class alumnos extends conexion
{
    public function validarAlumnos($docIdnt)
    {
        $this->conectar();
        $SQL = "SELECT A.*
                FROM alumno A
                WHERE A.dni = '$docIdnt';
                ";
        $resultado = mysql_query($SQL);
        $filas = mysql_num_rows($resultado);
        $this->desConectar();
        if ($filas == 0)
            return NULL;
        else {
            for ($i = 0; $i < $filas; $i++)
                $respuesta[$i] = mysql_fetch_array($resultado);
            return $respuesta;
        }
    }

    public function insertarAlumno($nombre, $dni, $celular, $correo, $cumpleanos, $nivelBaile, $idHorario, $cantidadMeses)
    {
        $this->conectar();

        $fechaInicio = date('Y-m-d');
        $fechaFin = date('Y-m-d', strtotime($fechaInicio . ' + ' . $cantidadMeses . ' months'));
        $horasConsumidas = 0;
        $horasPendientes = 8 * $cantidadMeses;

        $SQL = "INSERT INTO alumno (nombre_completo, dni, celular, correo, cumpleanos, nivel_baile, id_horario, fecha_inicio, fecha_fin, horas_consumidas, horas_pendientes)
                    VALUES ('$nombre', '$dni', '$celular', '$correo', '$cumpleanos', '$nivelBaile', '$idHorario', '$fechaInicio', '$fechaFin', '$horasConsumidas', '$horasPendientes')";

        $resultado = mysql_query($SQL);

        $this->desConectar();

        return $resultado;
    }



    public function buscarAlumnos()
    {
        $this->conectar();
        $SQL = "SELECT A.*
                FROM alumno A;";
        $resultado = mysql_query($SQL);
        $filas = mysql_num_rows($resultado);
        $this->desConectar();
        if ($filas == 0)
            return NULL;
        else {
            for ($i = 0; $i < $filas; $i++)
                $respuesta[$i] = mysql_fetch_array($resultado);
            return $respuesta;
        }
    }

    public function actualizarAlumnoPorId($id_alumno, $nombre_completo, $dni, $nivel_baile, $celular, $correo, $cumpleanos)
    {
        $this->conectar();
        $SQL = "UPDATE alumno 
                SET nombre_completo = '$nombre_completo',
                    dni = '$dni',
                    nivel_baile = '$nivel_baile',
                    celular = '$celular',
                    correo = '$correo',
                    cumpleanos = '$cumpleanos'
                WHERE id_alumno = $id_alumno;";
        $resultado = mysql_query($SQL);
        $this->desConectar();

        return $resultado;
    }

    public function actualizarAlumno($nombre, $dni, $celular, $correo, $cumpleanos, $nivelBaile, $idHorario)
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


    public function eliminarAlumno($id_alumno)
    {
        $this->conectar();
        $SQL = "DELETE FROM alumno WHERE id_alumno = $id_alumno";
        mysql_query($SQL);
        $this->desConectar();
    }
    public function validarHorasPend($docIdnt)
    {
        $this->conectar();
        $SQL = "SELECT horas_pendientes FROM alumno WHERE dni = '$docIdnt'";
        $resultado = mysql_query($SQL);
        $fila = mysql_fetch_assoc($resultado);
        $horasPendientes = $fila['horas_pendientes'];
        $this->desConectar();
        return $horasPendientes;
    }

    public function actualizarHorasPendientes($docIdnt, $horasConsumidas, $horasPendientes)
    {
        $this->conectar();
        $SQL = "UPDATE alumno SET horas_consumidas = $horasConsumidas, horas_pendientes = $horasPendientes WHERE dni = '$docIdnt'";

        $resultado = mysql_query($SQL);

        $this->desConectar();

        return $resultado;
    }

}

?>