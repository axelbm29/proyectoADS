<?
class conexion
{
    protected function conectar()
    {
        mysql_connect('localhost', 'root', '12345');
        mysql_select_db('phpmyadmin');
    }
    protected function desConectar()
    {
        mysql_close();
    }
}
?>