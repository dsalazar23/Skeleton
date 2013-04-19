<?php

/**
 * Realiza una conexión a la base de datos de acuerdo a las propiedades
 * de conexión configuradas en el archivo <code>ConnectionProperty</code>, o en
 * su defecto cierra la conexión.
 *
 * @package     Config.DataAccess
 * @author      JpBaena13
 * @since       PHP 5
 */
class ConnectionFactory {

    /**
     * Retorna una conexión a la base de datos de acuerdo a las propiedades
     * de conexión configuradas en el archivo <code>ConnectionProperty</code>.
     *
     * @return <type> Conexión a la base de datos
     */
    static public function getConnection() {
        $conn = mysql_connect(ConnectionProperty::getHost(), ConnectionProperty::getUser(), ConnectionProperty::getPassword());
        mysql_select_db(ConnectionProperty::getDatabase());
        if (!$conn) {
            throw new Exception('could not connect to database');
        }
        return $conn;
    }

    /**
     * Cierra la conexión especificada.
     *
     * @param <type> $connection
     *               Conexión a cerrar.
     */
    static public function close($connection) {
        mysql_close($connection);
    }

}

?>