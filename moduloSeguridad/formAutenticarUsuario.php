<?                
    session_start();
    include_once('C:/AppServ/www/proyectoADS/compartido/formulario.php');
    class formAutenticarUsuario extends formulario
    {
        public function formAutenticarUsuarioShow()
        {
            $linkcss = '<link rel="stylesheet" href="http://localhost/proyectoADS/assets/styles/login.css">';
            $this -> cabeceraShow("autenticar usuario",$linkcss);
            ?>
             <div class="formulario">
                <<?php
                    if (isset($_SESSION['mensaje'])) {
                        $mensaje = $_SESSION['mensaje'];
                        unset($_SESSION['mensaje']);
                        echo "<script>window.onload = function() { screenMensajeSistema('$mensaje'); }</script>";
                    }
                ?>
                <h1>Rits</h1>
                <h2>Escuela de Bailes</h2>
                <br>
                <form action="./moduloSeguridad/getUsuario.php" method="POST" name="autenticacion">
                    <input type="text" name="txtLogin" placeholder="Usuario" required>
                    <br>
                    <input type="password" name="txtPassword" placeholder="Contraseña" required>
                    <br>
                    <br>
                    <button name = 'btnIngresar' id='btnIngresar' type='submit'>Ingresar</button>
                </form>
                <form action="" method="POST">
                    <button type="submit" class="olvidar">¿Olvidaste tu clave?</button>
                </form>
            </div>
             <script>
                function screenMensajeSistema(mensaje){
                    Swal.fire({
                        title: 'Mensaje',
                        html: mensaje,
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            </script>
            <?
            $this -> piePaginaShow();
        }
    }
?>