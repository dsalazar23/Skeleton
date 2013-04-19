<?php

/**
 * Esta clase maneja la internacionalización del proyecto.
 * Una instancia es solicitada dentro de una página cuando esta requiere aplicar
 * cadenas internacionalizadas.
 *
 * @package     Lib
 * @author      JpBaena13
 * @since       PHP 5
 */

class i18n {

    /**
     * Constructor de clase, aplicando el patrón singleton.
     *
     * @staticvar i18n $instance
     * @return i18n
     */
    function &_instance() {
        static $instance = null;
        if (is_null($instance)) {
            $instance = new i18n();
        }

        return $instance;
    }

    /**
     * Inicializa los valores de los métodos del <code>gettext</code> para
     * especificar la ubicación de los archivos .mo y la codificación a
     * utilizar.
     *
     * @return Instancia única de tipo <code>i18n</code>
     */
    static function init() {
        if (!isset($_GET['lang']))
            $lang = 'es_ES';
        else
            switch ($_GET['lang']) {
                case 'es':
                    $lang = 'es_ES';
                    break;
                case 'en':
                    $lang = 'en_US';
                    break;
                case 'pt':
                    $lang = 'pt_PT';
                    break;
            }

        // Define el idioma
        putenv("LANG=$lang");
        setlocale(LC_ALL, $lang);

        // Define la ubicación de los ficheros de traducción
        $domain = 'messages';
        
        if (!function_exists("bindtextdomain"))
            return;
        
        bindtextdomain($domain, "../locale");
        bind_textdomain_codeset($domain, "UTF-8");
        textdomain($domain);

        $instance = &i18n::_instance();

        return $instance;
    }

    /**
     * Realiza un <code>echo</code> del valor internacionalizado correspondiente
     * a la clave pasada como parámetro.
     *
     * @param string $label
     *        Clave a internacionalizar.
     */
    function __($label) {
        echo gettext("$label");
    }

    /**
     * Retorna el valor internacionalizado correspondiente a la clave pasada
     * como parámetro.
     *
     * @param string $label
     *        Clave a internacionalizar.
     *
     * @return string
     *         Valor internacionalizado de la clave.
     */
    function get($label) {
        return gettext("$label");
    }

}

?>
