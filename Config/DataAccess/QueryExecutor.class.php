<?php

/**
 * Objeto que permite ejecutar una consulta sobre la base de datos, manejando
 * transacciones.
 *
 * @package     Config.DataAccess
 * @author      JpBaena13
 * @since       PHP 5
 */
class QueryExecutor {

    /**
     * Ejecuta la consulta SQL que le pasan como parámetro.
     * 
     * @param SqlQuery $sqlQuery
     *        Consulta SQL a ejecutar.
     * 
     * @return array Arreglo que contiene el resultado de ejecutar la consulta.
     */
    public static function execute($sqlQuery) {
        $transaction = Transaction::getCurrentTransaction();

        if (!$transaction) {
            $connection = new Connection();
        } else {
            $connection = $transaction->getConnection();
        }

        $query = $sqlQuery->getQuery();
        $result = $connection->executeQuery($query);

        if (!$result) {
            throw new Exception(mysql_error());
        }

        $i = 0;
        $tab = array();

        while ($row = mysql_fetch_array($result)) {
            $tab[$i++] = $row;
        }

        mysql_free_result($result);

        if (!$transaction) {
            $connection->close();
        }

        return $tab;
    }

    /**
     * Ejecuta una consulta de tipo Actualización sobre la base de datos
     *
     * @param SqlQuery $sqlQuery
     *        Consulta SQL a ejecutar
     *
     * @return int número de fila afectadas exitosamente, -1 si la query falla.
     */
    public static function executeUpdate($sqlQuery) {
        $transaction = Transaction::getCurrentTransaction();

        if (!$transaction) {
            $connection = new Connection();
        } else {
            $connection = $transaction->getConnection();
        }

        $query = $sqlQuery->getQuery();
        $result = $connection->executeQuery($query);

        if (!$result) {
            throw new Exception(mysql_error());
        }
        
        return mysql_affected_rows();
    }

    /**
     *
     * @param SqlQuery $sqlQuery
     *        Query a ejecuta para la inserción.
     *
     * @return int El ID generado por una columna que se auto-incrementa
     * cuando la query es exitosa, 0 si la query no genera un valor auto-incremental
     * o falso si la conexión a las base de datos no fue establecida.
     *
     */
    public static function executeInsert($sqlQuery) {
        QueryExecutor::executeUpdate($sqlQuery);
        return mysql_insert_id();
    }

    /**
     * Ejecuta la consulta SQL especificada y retorna la primera fila del
     * conjunto de filas obtenidas.
     *
     * @param SqlQuery Consulta SQL a ejecutar
     *
     * @return <type> Primer resultado del conjunto objtenido de ejecutar la query.
     */
    public static function queryForString($sqlQuery) {
        $transaction = Transaction::getCurrentTransaction();

        if (!$transaction) {
            $connection = new Connection();
        } else {
            $connection = $transaction->getConnection();
        }

        $result = $connection->executeQuery($sqlQuery->getQuery());

        if (!$result) {
            throw new Exception(mysql_error());
        }

        $row = mysql_fetch_array($result);

        return $row[0];
    }

}

?>