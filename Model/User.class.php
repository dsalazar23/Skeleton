<?php

/**
 * Esta clase representa el modelo de la tabla 'users'
 *
 * @package     Model
 * @author      JpBaena13
 * @since       PHP 5
 */
class User extends genUser {

	 /**
     * Realiza el checkeo de autenticación de acuerdo a los valores
     * de $userdata y $password especificados por el usuario.
     *
     * @param string $userdata Nombre de usuario o correo electrónico del usuario
     * @param string $password Contraseña de validación encriptada.
     *
     * @return $user Instancia del usuario si este existe y coincide con la contraseña
     *         de lo contrario retorna un número de acuerdo a lo siguiente:
     *          
     *          <ul>
     *              <li> 1 => Cuando el email o nombre de usuario no existe</li>
     *              <li> 0 => Cuando el password no coincide con el username o email.
     *              </li>
     *          </ul>
     */
    public static function getInstance($userdata, $password) {
        
        //Expresión regular para validación de $userdata como correo electrónico.
        $regExpEmail = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
        
        //Determina el modo autenticación. Puede ser usando el username o al email
        if (preg_match($regExpEmail, $userdata)) {
            $userDTO = FactoryDAO::getUserDAO()->queryByEmail($userdata);
            
        } else {
            $userDTO = FactoryDAO::getUserDAO()->queryByUsername($userdata);
        }
        
        if (!$userDTO)
                return 0;	// El correo o nombre de usuario no existe
        
        $user = new User();
        $user->userDTO = $userDTO;
        
        // Verificando que usuario y contraseña conincidan
        if ($user->getPassword() != aesEncrypt($password . $user->getUsername())) {
            $a = aesEncrypt($password . $user->getUsername());
            
            return 0;
        }
            
        return $user;
    }	
}
?>