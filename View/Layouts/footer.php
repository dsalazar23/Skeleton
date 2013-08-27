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
   <script type="text/javascript" src="<?php echo WEBROOT_URL ?>js/lib/jquery-1.9.1.min.js"></script>

    <!--Librería JQuery UI-->
    <script type="text/javascript" src="<?php echo WEBROOT_URL?>js/lib/jquery-ui.min.js"></script>
    
    <!--Librería JS que incluye: [jquery.qtip, jquery.cookie, jquery.jscrollpane, jquery.mousewheel, modernizr]-->
    <script type="text/javascript" src="<?php echo WEBROOT_URL ?>js/lib/vendors.min.js"></script>

    <!--Librería JS que incluye: [bootstrap.js, permissionsKeyPress.js, placeholder.js, untInput.js]-->
    <script type="text/javascript" src="<?php echo WEBROOT_URL ?>js/main.min.js"></script>

    <!-- Google Analytics: cambiar UA-XXXXX-X por el ID del sitio. -->
    <script>
        // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        // g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        // s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>