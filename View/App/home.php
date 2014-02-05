<?php

/**
 * Vista para el index principal del sitio.
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
                <div class="untLeftContent">
                    <span>Left content 50%</span>                    
                    <form action="<?php echo ROOT_URL ?>rq/login" method="POST" class="untForm">                        
                        <div class="untPlgMsg"></div>
                        
                        <fieldset>
                            <div>
                                <label for="email">Correo Electrónico</label>
                                <input id="email" name="email" type="text" maxlength="45">
                            </div>
                            <div>
                                <label for="password">Contraseña</label>
                                <input id="password" name="password" type="password">
                            </div>

                            <input type="submit" class="untBtn" value="Entrar"></input>
                            
                            <div class="opts">
                                <input id="session" name="session" type="checkbox" checked>
                                <label for="session">No cerrar sesión</label>
                            </div>

                            <?php if (isset($_GET['uri'])) { ?>
                                <input type="hidden" name="uri" value="<?php echo $_GET['uri']?>">
                            <?php } ?>
                        </fieldset>
                    </form>

                </div>
                <div class="untRightContent">
                    <span>Right content 50%</span>
                    Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. 
                    In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. 
                    Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo 
                    ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, 
                    feugiat a.
                </div>
    
                <div style="text-align: center;margin-top:15em;">
                    <input id="btnSkeleton" type="button" value="Click Skeleton" class="untBtn">
                </div>

            </div> <!-- Fin untMainContent -->
        </div> <!-- Fin untMainWrapper -->

        <footer class="untFooterWrapper">
            <!-- Incluyendo footer -->
            <?php require VIEW . 'Layouts' . DS . 'footer.php'; ?>
        </footer>

        <!--Script para esta página-->
        <script type="text/javascript" src="<?php echo WEBROOT_URL ?>js/home.js"></script>
        <script>
            $('#btnSkeleton').on('click', function(){
                $.untInputWin('Skeleton es una librería PHP que te permite comenzar el desarrollo de aplicaciones rapidamente')
            })
        </script>
    </body>
</html>