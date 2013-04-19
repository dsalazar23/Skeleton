<?php

/**
 * Objeto que representa la conexión a la base de datos
 *
 * @package     Config.DataAccess
 * @author      JpBaena13
 * @since       PHP 5
 */
class Connection {

    private $connection;

    /**
     * Abre conexión con base de datos
     */
    public function Connection() {
        $this->connection = ConnectionFactory::getConnection();
    }

    /**
     * Cierra la conexión con la base de datos
     */
    public function close() {
        ConnectionFactory::close($this->connection);
    }

    /**
     * Ejecuta una consulta a la base de datos.
     *
     * @param string $sql
     *        Consulta SQL a executar.
     *
     * @return <type> Valor obtenido de ejecutar la consulta sobre la base de datos
     */
    public function executeQuery($sql) {
        mysql_query("SET NAMES UTF8");
        return mysql_query($sql, $this->connection);
    }

}

?>