/**
 * Archivo que contiene por las funciones javascript que se cargan por defecto
 * en todas las páginas del sitio.
 *
 * @package     webroot
 * @subpackage  js
 * @author      JpBaena13
 */

/**
 * Nombre del Proyecto
 */
    var PRJCT_NAME = 'Skeleton'

/*
 * Ruta relativa del directorio webroot del sitio
 */
    var ROOT_URL = (PRJCT_NAME == '') ? '/' : '/' + PRJCT_NAME + '/'

/*
 * Ruta relativa del directorio webroot del sitio
 */
    var WEBROOT_URL = ROOT_URL + 'webroot/'

/*
 * Ruta relativa del directorio de módulos del sitio
 */
    var MODULES_URL = WEBROOT_URL + 'modules/'
    
/*
 * Ruta relativa del directorio ajax
 */
    var AJAX_URL = WEBROOT_URL + 'ajax/'

/*
 * Ruta relativa del directorio de usuarios
 */
    var USERS_URL = ROOT_URL + 'users/'
    
/*
 * Permite determinar el lenguaje que tiene configurado el usuario. Si no 
 * tiene configurado ninguno, por defecto selecciona es_ES
 */
    if (!$.cookie(PRJCT_NAME + '.lang'))
        $.cookie(PRJCT_NAME + '.lang', 'es_ES', { path: '/' + PRJCT_NAME });
    
    chooseLang($.cookie(PRJCT_NAME + '.lang'));
    
/**
 * Permite cambiar el lenguaje de la página.
 * 
 * @param lang String que determina el lenguaje con el que se cargará la página.
 * 
 * El String lang tiene un formato predeterminado, y debe coincidir con el
 * nombre del archivo que se encuentra en 'webroot/locale/'. p.e.
 * <ul> 
 * <li>es_ES -> Españos de España</li>
 * <li>en_US -> Ingles de Estados Unidos</li>
 * <li>pt_BR -> Portugal de Brasil</li>
 * </ul>
 */
    function chooseLang(lang) {
        if (lang == undefined) {
            lang = 'es_ES'
        }
        
        $.cookie(PRJCT_NAME + '.lang', lang, { path: '/' + PRJCT_NAME });
        echo("<script type='text/javascript' src='/" + WEBROOT_URL + "locale/" + lang + ".js'></script>");
    }
    
/*
 * Patrones de URL
 * tiene configurado ninguno, por defecto selecciona es_ES
 */
    var urlPattern = /(ht|f)tp(s?):\/\/[a-zA-Z0-9-_:/.?,?+?#|%?(?)?&amp;=]+$/gim;
    var comPattern = /^([a-zA-z0-9]+(\.|\-){1})+(com|co|info|net|org|me|mobi|us|biz|ca|mx|tv|ws|ag|am|asia|at|be|br|bz|cc|cn|de|es|eu|fm|fr|gs|in|it|jobs|jp|ms|nl|nu|nz|se|tc|tk|tw|uk|vg|edu|no-ip)$/;
    var youtubePattern = /(http):\/\/(www.youtube.com)[a-zA-Z0-9-_:/.?,?+?#|%?(?)?&amp;=]+$/gim;
    var vimeoPattern = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;


/**
 * Esta funcion permite obtener los parametros pasados por URL mediante el metodo GET
 *
 * @param url String que determina la url a la que se le obtendrann los parametros.
 *
 * @return vars Arreglo que contiene los parámetros parasados por URL.
 */
    function getUrlVars(url) {

        var vars = {};

        if (url == undefined) {
            window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
                vars[key] = value;
            });

        } else {
            url = url.replace(/.*\?(.*?)/, "$1");
            var variables = url.split("&");

            for (var i = 0; i < variables.length; i++) {
                var sep = variables[i].split("=");
                vars[sep[0]] = sep[1]
            }
        }
        
        return vars;
    }

/**
 * Función que permite generar un password aleatoriamente.
 * 
 * @return pass String con el password generado.
 */
    function generatePass() {
        var chars = 'azertyupqsdfghjkmwxcvbn23456789AZERTYUPQSDFGHJKMWXCVBN';
        var pass = '';
        for(var i = 0; i < 10; i++) {
            var wpos = Math.round(Math.random()*chars.length);
            pass += chars.substring(wpos,wpos+1);
        }
        return pass;
    }
    
/**
 * Permite imprimir en el 'document' de la página
 * 
 * @param str String que será impreso en el 'document' de la página.
 */
    function echo(str) {
        document.write(str);
    }

/**
 * Función que permite detener la ejecución de la aplicacion en el hilo actual.
 * 
 * @param milliseconds int que determina el tiempo que se detendra la ejecución.
 */
    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds){
                break;
            }
        }
    }
    
/**
 * Esta funcion elimina código html de una cadena
 * 
 * @param txt que determina la cadena a la que se le elminara el código html
 * 
 * @return String con la cadena sin código html
 */
    function stripHTML(txt) {
        return txt.replace(/<[^>]+>/g,'');
    }
    
/**
 * Esta funcion modifica código html para que no sea interpretado por el cliente
 * 
 * @param txt que determina la cadena a modificar
 * 
 * @return String con la cadena con código html no interpretado
 */
    function withoutIterpretHTML(txt) {
        return txt.replace('<','&lt;');
    }

/**
 * Funcion para reemplazar los espacios multiples entre palabras por un solo espacio
 * 
 * @param txt que determina la cadena a modificar
 * 
 * @return String con la cadena modificada
 */
    function oneSpace(txt){
        return txt.replace(/ +/g, " "); 
    }
    
/**
 * Permite determinar si el string pasado por parámetro es una URL
 * 
 * @param url
 *        cadena de caracteres a validar
 *        
 *  @return true o false dependiendo de si la cadena especificada corresponde a una URL
 */        
    function isURL(url) {
        var URL_PATTERN = /^((ht|f)tps?:\/\/)?(www\.)?[\w\/]+[\/]+[\D\.\/\?\=]*([\S\=\&]*)?$/
        return URL_PATTERN.test(url)
        
    }
    
/**
 * Permite saber si el elemento especificado existe en el arreglo unidimensional
 * 
 * @param array 
 *        Arreglo donde se buscará el elemento especificado
 *  
 * @param element
 *        Elemento a buscar en el arreglo
 *        
 * @return true si el elemento existe, de lo contrario false.
 */
    function existElementInArray(array, element) {
        for (var i = 0; i < array.length; i++) {
            if (array[i] == element)
                return true
        }
    
        return false
    }
    
/**
 * Retonar la fecha especificada en formtato YYYY-MM-DD
 *
 * @param date
 *        Fecha a convertir
 *        
 * @return Fecha en Formato YYYY-MM-DD
 */
    function getDate(date) {

        if (date == undefined)
            date = new Date()

        var y = date.getFullYear()
        var m = date.getMonth() + 1
        var d = date.getDate();

        if (date.getMonth() < 9)
            m = '0' + m

        if (date.getDate() < 10)
            d = '0' + d

        return y + '-' + m + '-' + d
    }

/**
 * Retonar la hora especificada en formtato HH:MM:SS
 * 
 * @param time
 *        Fecha y Hora actual
 *        
 * @return String con la hora actual en formato HH:MM:SS
 */
    function getTime(time) {

        if (time == undefined)
            time = new Date()
        
        var h = time.getHours()
        var m = time.getMinutes()
        var s = time.getSeconds();

        if (time.getHours() < 10)
            h = '0' + h

        if (time.getMinutes() < 10)
            m = '0' + m

        if (time.getSeconds() < 10)
            s = '0' + s

        return h + ':' + m + ':' + s
    }