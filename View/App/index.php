<?php

/**
 * Vista para el index principal del sitio para usuario autenticados.
 *
 * @package     View
 * @subpackage  App
 * @author      JpBaena13
 * @since       PHP 5
 */
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo PRJCT_NAME ?></title>

        <!-- Importando las cabeceras por defecto-->
        <?php require VIEW . 'Layouts' . DS . 'head.php'; ?>

        <!--Stylesheet para index-->
        <link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_URL ?>css/home.css" media="screen" />
    </head>

    <body>

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. 
            Please <a href="http://browsehappy.com/">upgrade your browser</a> or 
            <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> 
            to improve your experience.</p>
        <![endif]-->

        <header class="untHeaderWrapper">
            <div class="untHeaderContent">
                <img src="<?php echo WEBROOT_URL ?>images/default/header.png" alt="Sistema de Bibliotecas" width="980px" height="120px"/>
            </div>
        </header>

        <div class="untMainWrapper">
            <div class="untMainContent">

            <div style="width:500px;border:thin solid #ccc;border-radius:5px;background-color:#eee;margin: 2em auto;padding:2em;">
                Hola, te encuentras autenticado en Skeleton. Tus datos son:

                <ul>
                    <li>
                        Nombre: <strong><?php echo $_SESSION['fullname']?></strong>
                    </li>
                    <li>
                        Id: <strong><?php echo $_SESSION['userId']?></strong>
                    </li>
                    <li>
                        Nombre de usuario: <strong><?php echo $_SESSION['username']?></strong>
                    </li>
                </ul>

                <br><br>
                <a href="<?php echo ROOT_URL ?>rq/logout" class="untBtn">Cerrar Sesión</a>
            </div>                

            </div> <!-- Fin untMainContent -->
        </div> <!-- Fin untMainWrapper -->

        <footer class="untFooterWrapper">
            <!-- Incluyendo footer -->
            <?php require VIEW . 'Layouts' . DS . 'footer.php'; ?>
        </footer>

        <!--Script para esta página-->
        <script type="text/javascript" src="<?php echo WEBROOT_URL ?>js/home.js"></script>
    </body>
</html>