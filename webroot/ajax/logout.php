<?php

/**
 * Página que recibe la petición para realizar logout de UnNotes
 *
 * @package     webroot
 * @subpackage  ajax
 * @author      JpBaena13
 * @since       PHP 5
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
        define('ROOT', dirname(dirname(dirname(__FILE__))) . DS);
    }

    if (!include_once ROOT . DS . 'include' . DS . 'bootstrap.php') {
        trigger_error('Error al cargar el Bootstrap', E_USER_ERROR);
        exit();
    }

    try {

        require_once CONTROLLER . ('Auth.controller.php');        
        $auth = new AuthController();
        $auth->logout();

    } catch (Exception $exc) {
        printLog($exc);
    }
?>