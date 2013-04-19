<?php

/**
 * Página inicial del sitio
 * @author      JpBaena13
 * @since       PHP
 */

/**
 * Obliga al usuario a pasar primero por esta página. Es verificado
 * en el index del webroot.
 */
    define('INIT', '');

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
        define('ROOT', (dirname(__FILE__)) . DS);
    }

    if (!include ROOT . DS . 'include' . DS . 'bootstrap.php') {
        trigger_error('Error al cargar el Bootstrap', E_USER_ERROR);
        exit();
    }
    
    require WEBROOT . 'index.php';
?>
