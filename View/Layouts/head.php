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
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="author" content="JpBaena13 - jpbaena13@unnotes.com">
<meta name="subject" content="Red social para compartir notas y tableros de notas virtuales">
<meta name="description" content="UnNotes - Crea tus notas y compártelas">
<meta name="keywords" content="Red Social Colombiana, notas, notitas, noteboard, noteros, compartir notas, boards">
<meta http-equiv="Expires" content="never">
<meta name="country" content="Colombia">

<!-- Permite colocar una imagen en la barra de direcciones.-->
    <link rel="shortcut icon" href="<?php echo WEBROOT_URL ?>favicon.ico" type="image/x-icon"/>

<!-- Importando archivos Stylesheet-->
    <!-- Stylesheet para JQuery UI-->
    <link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_URL ?>css/lib/jquery-ui.css" media="all">

    <!--Stylesheet por Defecto, contiene: [normalize, jquery.jscrollpane, jquery.qtip, defualt]-->
    <link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_URL ?>css/main.css" media="all" />