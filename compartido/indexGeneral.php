<?
    include_once('../compartido/formulario.php');
    class indexGeneral extends formulario
    {
        public function panelPrincipalShow($body,$link="")
        {   
            $listaPrivilegios = $_SESSION['listaPrivilegios'];
            $cantidadPrivilegios = count($listaPrivilegios);
             $link = '
                <link rel="stylesheet" href="http://localhost/proyectoADS/assets/styles/panel.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">'.$link.'' ;

            $this -> cabeceraShow("Bienvenido:".$_SESSION['login'],$link);
            ?>
            <div class="container position-relative" style="left: -140px;">
                <div class="sidebar">
                    <img
                    style="margin-left: 25px"
                    src="../assets/images/logo.png"
                    alt="Logo"
                    />
                    <h1 style="text-align: center">Escuela de Baile Rits</h1>
                    <hr />
                    <ul>
        
                    <form id="formRegistrarPago" action="../moduloSeguridad/panelBienvenida.php" method="POST">
                        <li>
                            <button type="submit" class="link-button active" name="btnIngresar">
                                <i class="fas fa-home"></i> Inicio
                            </button>
                        </li>
                    </form>

                    <?php
                        for ($i = 0; $i < $cantidadPrivilegios; $i++) {
                            ?>
                         
                            <form id="formRegistrarPago" action="<?php echo $listaPrivilegios[$i]['pathPrivilegio']; ?>" method="POST">
                                <li>
                                    <button type="submit" class="link-button active" name="<?echo$listaPrivilegios[$i]['labelPrivilegio']?>">
                                        <i class="fas fa-money-bill"></i> <?php echo $listaPrivilegios[$i]['labelPrivilegio']; ?>
                                    </button>
                                </li>
                            </form>


                            <?php
                        }
                    ?>




                    </ul>
                </div>
                <div class="main-content">
                    <? echo $body; ?>
                </div>
                <div class="user-info">
                    <img src="../assets/images/profile_photo.png" alt="Foto de Perfil" />
                    <span><? echo $_SESSION['login']?></span>
                </div>
                </div>
                 <script>
                document.addEventListener("DOMContentLoaded", function () {
                    mostrarBienvenida(document.querySelector(".sidebar a"));
                });

                function mostrarBienvenida(elemento) {
                    document
                    .querySelectorAll(".main-content > div")
                    .forEach(function (contenido) {
                        contenido.style.display = "none";
                    });
                    document.querySelectorAll(".sidebar a").forEach(function (enlace) {
                    enlace.classList.remove("active");
                    });
                    document.querySelector(".welcome-message").style.display = "block";
                    elemento.classList.add("active");
                }

                function mostrarContenido(id, elemento) {
                    document.querySelector(".welcome-message").style.display = "none";
                    document
                    .querySelectorAll(".main-content > div")
                    .forEach(function (contenido) {
                        contenido.style.display = "none";
                    });
                    document.querySelectorAll(".sidebar a").forEach(function (enlace) {
                    enlace.classList.remove("active");
                    });
                    document.getElementById(id).style.display = "block";
                    elemento.classList.add("active");
                }
                </script>
 
            <?
            $this -> piePaginaShow();
        }
    
    }
?>