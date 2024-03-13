<?
    include_once('conexion.php');
    class usuario extends conexion
    {
        public function validarUsuario($login,$password)
        {
            $this -> conectar();
            $SQL ="SELECT login FROM usuarios WHERE login = '$login'";
            $resultado = mysql_query($SQL);
            $filas = mysql_num_rows($resultado);
            if($filas != 1)
            {
                return 0; //usuario no existe
            }
            else
            {
                $SQL = "SELECT login FROM usuarios WHERE login = '$login' AND password = '$password'";
                $resultado = mysql_query($SQL);
                $filas = mysql_num_rows($resultado);
                if($filas != 1)
                {
                    return 1; // password errado
                }
                else
                {
                    $SQL = "SELECT login FROM usuarios WHERE login = '$login' AND password = '$password' AND estado = 1";
                    $resultado = mysql_query($SQL);
                    $filas = mysql_num_rows($resultado);
                    if($filas != 1)
                    {
                        return 2; //usuario deshabilitado
                    }
                    else
                    {
                        return 3;// usuario ok
                    }
                }
            }
            $this -> desConectar();
        }        
    }
?>