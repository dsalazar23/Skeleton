<?php

/**
 * Footer para todas las páginas del sitio.
 *
 * @package     View
 * @subpackage  Layouts
 * @author      JpBaena13
 * @since       PHP 5
 */
?>
<div class="untFooterContent">
   <div>Construido por JpBaena13</div>
   <small>jpbaena13@gmail.com</small>
</div>


<!-- Importando librerías javascript -->
    <!--Librería JQuery standard-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/<?php echo WEBROOT_URL ?>js/lib/jquery-1.9.1.min.js"><\/script>')</script>

    <!--Librería JQuery UI-->
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
    
    <!--Librería JS que incluye: [jquery.qtip, jquery.cookie, jquery.jscrollpane, jquery.mousewheel, modernizr]-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL ?>js/lib/vendors.min.js"></script>

    <!--Librería JS que incluye: [bootstrap.js, permissionsKeyPress.js, placeholder.js, untInput.js]-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL ?>js/main.min.js"></script>