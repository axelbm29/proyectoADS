<?
    include_once('conexion.php');
    class usuarioPrivilegio extends conexion
    {
        public function obtenerPrivilegiosUsuario($login)
        {
            $this -> conectar();
            $SQL ="SELECT P.labelPrivilegio, P.pathPrivilegio,P.nombrePrivilegio, P.iconPath
                   FROM usuarios U, privilegios P, usuariosPrivilegios UP
                   WHERE U.login = '$login' AND
                         U.login = UP.login AND
                         P.idPrivilegio = UP.idPrivilegio";
            $resultado = mysql_query($SQL);
            $filas = mysql_num_rows($resultado);
            $this -> desConectar();
            if($filas == 0)
                return NULL;
            else
            {
                for($i = 0 ; $i < $filas; $i++)
                     $privilegio[$i] = mysql_fetch_array($resultado);                    
                return $privilegio;
            }             
        }        
    }
?>