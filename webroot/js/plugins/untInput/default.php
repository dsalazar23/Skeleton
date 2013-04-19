<?php
/**
 * PHP 5
 *
 * Copyright 2011-2012, UnNotes, Inc. (http://unnotes.com)
 *
 * Description of the ${name}.
 *
 * @package     unnotes.webroot
 * @subpackage  js.plugins.selectContacts
 * @author      JpBaena13
 * @since       UnNotes(tm) v 0.1
 * @copyright   (C) 2011-2012 UnNotes(tm) http://unnotes.com
 * @date 22/07/2012
 */

/**
 * Use DS para separar los directorios en otras definiciones
 */
    if (!defined('DS')) {
        define('DS', DIRECTORY_SEPARATOR);
    }

/**
 * Ruta completa al directorio donde está hospedada la aplicación.
 */
    if (!defined('ROOT')) {
        define('ROOT', dirname(dirname(dirname(dirname(dirname(__FILE__))))) . DS);
    }

    if (!include ROOT . DS . 'include' . DS . 'bootstrap.php') {
        trigger_error('Error al cargar el Bootstrap', E_USER_ERROR);
        exit();
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <!-- Importando las cabeceras por defecto-->
        <?php require VIEW . 'Layouts' . DS . 'head.php'; ?>

        <!--Script para esta página-->
        <script type="text/javascript" src="untInput.js"></script>

    </head>

    <body>
        
        <div class="untHeaderContent"></div>

        <div class="untMainWrapper">
            
            <div class="untMainContent">
                
                <div id="me" class="plgUntMsg"></div>
                <div class="plgUntMsg particular"></div>
                <div class="plgUntMsg particular"></div>
                <div class="plgUntMsg particular"></div>
                <div class="plgUntMsg particular"></div>
                <div class="plgUntMsg particular"></div>
                <div class="plgUntMsg particular"></div>
                <div class="plgUntMsg particular"></div>
                <div class="plgUntMsg particular"></div>
                <div class="plgUntMsg particular"></div>
                <div class="plgUntMsg pp"></div>

                <button class="untBtnSilver abrir"></button>
                <button class="plgUntBtn untBtnGold"></button>
                <button class="plgUntBtn untBtnSilver two"></button>

            </div> <!-- Fin main-content -->
        </div> <!-- Fin main-wrapper -->

        <div class="untFooterWrapper">
            <!-- Incluyendo footer -->
            <?php require VIEW . 'Layouts' . DS . 'footer.php'; ?>
        </div>

        <script type="text/javascript">
            $('.abrir').untInputBtn({
                content: 'UnNotes',
                icon: 'images/engine.png',
                click: function(){
                    $('.pp').show()
                }
            })

            $('.untBtnGold').untInputBtn({
                content: 'UnNotes',
                icon: 'images/engine.png',
                click: function() {
                    $.untInputWin({
                        title: 'Bievenido',
                        content: 'Mensaje de Skeleton'
                    })
                }
            })

            $('.two').untInputBtn({
                content: 'UnNotes Sin Imagen',
                click: function() {
                    alert('j')
                }
            })

            $('#me').untInputMsg({
                icon: 'images/engine.png',
                title: 'Saliendo a comer',
                content: 'Vamos campeón que esto esta quedando muy bacano',
                type: 'Err'
            }).show()

            $('.particular').untInputMsg({
                title: 'Saliendo a comer',
                content: 'Vamos campeón que esto esta quedando muy bacano',
                type: 'Wrng'
            }).show()

            $('.pp').untInputMsg({
                icon: 'images/engine.png',
                title: 'Saliendo a comer',
                content: 'Vamos campeón que esto esta quedando muy bacano',
                type: 'Ok'
            })
        </script>
        
        
    </body>
</html>