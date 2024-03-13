<?php
include_once('../compartido/formulario.php');

class panelBienvenida extends formulario
{
    public function panelBienvenidaShow()
    {
        $this->cabeceraShow("Bienvenido:" . $_SESSION['login'], '');
        session_start();

        ?>

        <?php
          
        include_once("C:/AppServ/www/proyectoADS/compartido/indexGeneral.php");
        $objPanel = new indexGeneral();
        $objPanel->panelPrincipalShow('
            <div class="welcome-message" style="margin-top: 70px">
                <h2>Bienvenido!!!!</h2>
                <p>Hola ' . $_SESSION['login'] . ', bienvenido al panel principal</p>
            </div>
        ');
        ?>

        <?php
        $this->piePaginaShow();
    }
}
?>


