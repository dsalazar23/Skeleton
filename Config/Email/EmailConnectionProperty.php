<?php

/**
 * Propiedades de conexión para la base de datos.
 *
 * @package     Config.Email
 * @author      JpBaena13
 * @since       PHP 5
 */
class EmailConnectionProperty {

    private static $host = '';
    private static $port = '465';
    private static $user = '';
    private static $password = '';
    private static $from = '';
    

    public static function getEmailHost() {
        return EmailConnectionProperty::$host;
    }

    public static function getEmailPort() {
        return EmailConnectionProperty::$port;
    }
    
    public static function getEmailUser() {
        return EmailConnectionProperty::$user;
    }

    public static function getEmailPassword() {
        return EmailConnectionProperty::$password;
    }
    
    public static function getEmailFrom() {
        return EmailConnectionProperty::$from;
    }

}

?>
