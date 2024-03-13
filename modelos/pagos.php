<?
    include_once('conexion.php');
    class pagos extends conexion
    {
        public function insertarPago($monto, $meses, $documentoIdentidad)
        {   
            $this->conectar();

            $SQL = "INSERT INTO pagos (monto, fecha_de_pago, meses, id_alumno)
            VALUES ('$monto', NOW(), '$meses', '$documentoIdentidad')";

            $resultado = mysql_query($SQL);

            $this->desConectar();

            return $resultado;
        }     
       
    }
?>