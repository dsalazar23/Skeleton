<?php

/**
 * PHP 5
 *
 * @package     webroot
 * @author      JpBaena13
 * @since       PHP 5
 */

/**
 * Si no esta definida esta variable es por que se hizo el llamado directametne
 * a esta página dejandose de ejecutar la lógica del index que la llama.
 */
    if (!defined('INIT')) {
        header('Location:/' . ROOT_URL);
        exit();
    }
    
    require APP_VIEW . $page . '.php';
?>