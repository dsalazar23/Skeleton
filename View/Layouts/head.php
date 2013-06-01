<?php

/**
 * Cabezera con la inclusión de Metas y Scripts por defecto para todas las 
 * páginas del sitio.
 *
 * @package     View
 * @subpackage  Layouts
 * @author      JpBaena13
 * @since       PHP 5
 */
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- Permite colocar una imagen en la barra de direcciones.-->
    <link rel="shortcut icon" href="/<?php echo WEBROOT_URL ?>favicon.ico" type="image/x-icon"/>

<!-- Importando archivos Stylesheet-->
    <!-- Stylesheet para JQuery UI-->
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.min.css" media="all">

    <!--Stylesheet por Defecto, contiene: [normalize, jquery.jscrollpane, jquery.qtip, defualt]-->
    <link rel="stylesheet" type="text/css" href="/<?php echo WEBROOT_URL ?>css/main.css" media="all" />

    <!-- Google Analytics: cambiar UA-XXXXX-X por el ID del sitio. -->
    <script>
        // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        // g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        // s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>