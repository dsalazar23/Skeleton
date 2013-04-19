<?php

/**
 * Maneja la carga de los archivos necesarios en cada petición.
 *
 * @package     include
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
 * Nombre del Proyecto 
 */
    if (!defined('PRJCT_NAME'))
        define('PRJCT_NAME', 'Skeleton');

/**
 * Ruta absoluta al directorio donde está hospedada la aplicación.
 */
    if (!defined('ROOT')) {
        define('ROOT', dirname(dirname(__FILE__)) . DS);
    }
    
/**
 * Ruta completa al directorio que contiene todas las vistas
 */
    if (!defined('CONTROLLER')) {
        define('CONTROLLER', ROOT . 'Controller' . DS);
    }
    
/**
 * Ruta completa al directorio Lib del sitio
 */
    if (!defined('LIB')) {
        define('LIB', ROOT . 'Lib' . DS);
    }

/**
 * Ruta completa al directorio que contiene todas las vistas
 */
    if (!defined('MODEL')) {
        define('MODEL', ROOT . 'Model' . DS);
    }

/**
 * Ruta completa al directorio que contiene todas las vistas
 */
    if (!defined('VIEW')) {
        define('VIEW', ROOT . 'View' . DS);
    }
    
/**
 * Ruta completa al directorio que contiene todas las vistas
 */
    if (!defined('DATA_ACCESS')) {
        define('DATA_ACCESS', ROOT . 'DataAccess' . DS);
    }
    
/**
 * Ruta completa al directorio include del sitio
 */
    if (!defined('INCLD')) {
        define('INCLD', ROOT . 'include' . DS);
    }

/**
 * Ruta absoluta al directorio webroot del sitio
 */
    if (!defined('WEBROOT')) {
        define('WEBROOT', ROOT . 'webroot' . DS);
    }

/**
 * Ruta absoluta al directorio que contiene todas las vistas de aplicación
 */
    if (!defined('APP_VIEW')) {
        define('APP_VIEW', VIEW . 'App' . DS);
    }
    
/**
 * Ruta absoluta al directorio que contiene todas las vistas de aplicación
 */
    if (!defined('ERRORS_VIEW')) {
        define('ERRORS_VIEW', VIEW . 'Errors' . DS);
    }

/**
 * Ruta relativa al directorio raiz del sitio
 */
    if (!defined('ROOT_URL')) {
        define('ROOT_URL', PRJCT_NAME . '/');
    }

/**
 * Ruta relativa al directorio webroot del sitio
 */
    if (!defined('WEBROOT_URL')) {
        define('WEBROOT_URL', ROOT_URL . 'webroot/');
    }

/**
 * Ruta relativa al directorio modules del sitio
 */
    if (!defined('MODULES_URL')) {
        define('MODULES_URL', WEBROOT_URL . 'modules/');
    }

/**
 * Ruta relativa al directorio modules del sitio
 */
    if (!defined('AJAX_URL')) {
        define('AJAX_URL', WEBROOT_URL . 'ajax/');
    }
    
    require_once ROOT . 'Config' . DS . 'DataAccess' . DS . 'Connection.class.php';
    require_once ROOT . 'Config' . DS . 'DataAccess' . DS . 'ConnectionFactory.class.php';
    require_once ROOT . 'Config' . DS . 'DataAccess' . DS . 'ConnectionProperty.class.php';
    require_once ROOT . 'Config' . DS . 'DataAccess' . DS . 'QueryExecutor.class.php';
    require_once ROOT . 'Config' . DS . 'DataAccess' . DS . 'SqlQuery.class.php';
    require_once ROOT . 'Config' . DS . 'DataAccess' . DS . 'Transaction.class.php';
    
    require_once ROOT . 'Config' . DS . 'Email' . DS . 'EmailConnection.php';
    require_once ROOT . 'Config' . DS . 'Email' . DS . 'EmailConnectionFactory.php';
    require_once ROOT . 'Config' . DS . 'Email' . DS . 'EmailConnectionProperty.php';
    
    include_once(LIB . 'FactoryDAO.class.php');
    require_once(LIB . 'i18n.class.php');
    
    include_once INCLD . 'includeDAO.php';
    require_once INCLD . 'functions.php';
?>
