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

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

<!-- Permite colocar una imagen en la barra de direcciones.-->
    <link rel="shortcut icon" href="/<?php echo WEBROOT_URL ?>favicon.ico" type="image/x-icon"/>

<!-- Importando archivos Stylesheet-->
    <!-- Stylesheet para JQuery UI-->
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.8.21/themes/base/jquery-ui.css" media="all">

    <!-- Stylesheet para JQuery QTIP-->
    <link rel="stylesheet" type="text/css" href="/<?php echo WEBROOT_URL ?>css/lib/jquery/jquery.qtip.min.css" />

    <!--Stylesheet para Scrollpane-->
    <link rel="stylesheet" type="text/css" href="/<?php echo WEBROOT_URL ?>css/lib/jquery/jquery.jscrollpane.css" media="all" />
    
    <!--Stylesheet para Normalize-->
    <link rel="stylesheet" type="text/css" href="/<?php echo WEBROOT_URL ?>css/lib/normalize.css" media="all" />
    
    <!--Stylesheet por Defecto-->
    <link rel="stylesheet" type="text/css" href="/<?php echo WEBROOT_URL ?>css/default.css" />

<!-- Importando librerías javascript -->
    <!--Librería JQuery standard-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/<?php echo WEBROOT_URL ?>js/lib/jquery/jquery-1.9.0.min.js"><\/script>')</script>

    <!--Librería JQuery UI-->
    <script type="text/javascript" src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
    
    <!--Librería JQuery QTIP-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL ?>js/lib/jquery/jquery.qtip.min.js"></script>

    <!--Librería plugin JQuery para cookies-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL ?>js/lib/jquery/jquery.cookie.js"></script>

    <!--Librería plugin JQuery para Scrollpane-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL ?>js/lib/jquery/jquery.jscrollpane.min.js"></script>

    <!--Librería plugin JQuery para mousewheel-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL ?>js/lib/jquery/jquery.mousewheel.js"></script>

    <!--Librería Modernizr -->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL ?>js/lib/modernizr.js"></script>

    <!--Librería JS que se carga por defecto al inicio de toda solicitud-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL ?>js/bootstrap.js"></script>

    <!--Plugin JQuery para aplicar Placeholder sobre los campos textuales-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL ?>js/plugins/placeholder.js"></script>
    
    <!--Plugin JQuery para creación de Botones, mensajes y Ventanas emergentes-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL ?>js/plugins/untInput/untInput.js"></script>
    
    <!-- Funciones para la restricción de texto-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL?>js/permissionsKeyPress.js"></script>
    
    <!-- Conjunto de funciones que permiten construir diferentes elementos de vista-->
    <script type="text/javascript" src="/<?php echo WEBROOT_URL?>js/Views.js"></script>    

    <!-- Google Analytics: cambiar UA-XXXXX-X por el ID del sitio. -->
    <script>
        // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        // g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        // s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>