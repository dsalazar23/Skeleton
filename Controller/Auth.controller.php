<?php
/**
 * Controlador para la autenticación de usuarios.
 *
 * @package     Controller
 * @author      JpBaena13
 * @since       PHP 5
 */

class AuthController {
    
    /* Página de inicio para usuario sin autenticas*/
    public static $_PAGE_HOME = 'home';

    /* Página de inicio para usuario autenticados*/
    public static $_PAGE_INIT = '';

     /** Arreglo de vistas que NO requieren sesión iniciada*/
    public static $_VIEWS_NO_SESSION = array('home');

    /** Arreglo de vistas que serán ignoradas para la sesión*/
    public static $_VIEWS_IGNORE = array();

    /**
     * Constructor 
     */
    function __construct() {
        session_start();

    }

    /**
     * Proceso de autenticación
     */
    public function login($session = false) {

        $_SESSION['app']     = PRJCT_NAME;

        // Cuando el usuario marco la casilla de 'recordarme'
        if ($session) {
            $token = aesEncrypt($_SESSION['app']);
            setcookie('token', $token, time() + 60*60*24*30, '/'); // 1 mes
        }
    }
    
    
    /**
     * Borra todas las variables de sesión y las cookies de usuario y permite
     * cerrar sesión de forma segura 
     */
    public function logout() {

        //Destruyendo variables de sesion
        unset($_SESSION['app']);
        
        setcookie('token', null, 0, '/');

        session_destroy();

        header('Location: ' . ROOT_URL);
        exit();
    }

    /**
     * Permite determinar si hay sesión de usuario activa o no
     *
     * @param boolean $json Determina si la petición ajax requiere de retorno un objeto JSON o no.
     * 
     * @return boolean <true> si hay una sesión de usuario activa, <false> de lo contrario
     */
    public function hasSession($json = null) {
        if (!isset($_SESSION['app'])) {
            return $this->refreshSession($json);
        }

        return true;
    }

    /**
     * Verifica que la sesión este activa, de lo contrario redirecciona a la página principal o de login.
     */
    public function checkSession(&$page) {

        if (in_array($page, AuthController::$_VIEWS_IGNORE))
            return;

        if ($this->hasSession()) {

            if (!$page) {
                $page = AuthController::$_PAGE_INIT;
                return;
            }

            if (in_array($page, AuthController::$_VIEWS_NO_SESSION)) {
                header('Location: ' . ROOT_URL);
                exit();
            }

        } else {

            if (!$page)
                $page = AuthController::$_PAGE_HOME;

            if (!in_array($page, AuthController::$_VIEWS_NO_SESSION)) {

                //Cambiar home por página de autenticación (login)
                header('Location: ' . ROOT_URL . '?uri=' . urlencode($_SERVER['REQUEST_URI']));
                exit();
            }
        }
    }

     /**
     * Permite reactivar una sesión ya vencida si se encuentra en cookies, de
     * lo contrario lo envía al formulario de autenticación y guarda la URI
     * solicitada, a la cual será redireccionado en caso de una autenticación
     * correcta.
     * 
     * @param boolean $json Determina si la petición ajax requiere de retorno un objeto JSON o no.
     */
    private function refreshSession($json) {
        
        if (isset($_COOKIE['token'])) {

            try {
                $token = aesDecrypt($_COOKIE['token']);

            } catch (Exception $exc) {
                setcookie('token', null, 0, '/');
            }
            
            return $this->login(true);
            
        } else {
            if ($json === null)
                return false;

            else if ($json)
                echo '{"msg":"<script>winNoSession()</script>"}';

            else
                echo ('<script>winNoSession()</script>');

            exit();
        }
    }


}
?>