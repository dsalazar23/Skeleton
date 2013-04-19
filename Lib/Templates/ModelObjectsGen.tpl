<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase representa el modelo de la tabla '${table_name}'
 *
 * @package     Model.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
class gen${domain_class_name} {

    ${variables}

    /**
     * Constructor de la clase ${domain_class_name}
     */
    function __construct($id = null) {
        ${constructor}
    }

    /**
     * Guarda el objeto ${domain_class_name} en la base de datos.
     */
    public function save() {
        if ($this->getId()) {
            FactoryDAO::get${domain_class_name}DAO()->update($this->${DTO_name});

        } else {
            $this->setId(FactoryDAO::get${domain_class_name}DAO()->insert($this->${DTO_name}));
        }
    }
    
    /**
     * Carga todos los registros de la tabla.
     */
    public function getAll() {
        return FactoryDAO::get${domain_class_name}DAO()->queryAll();
    }
    
    /**
     * Elimina el objeto ${domain_class_name} en la base de datos.
     * 
     * @param int $id 
     *            Identificador único del objeto.
     */
    public static function delete($id) {
        return FactoryDAO::get${domain_class_name}DAO()->delete($id);
    }
    
    // *** Métodos GETS ***
    ${get_methods}
    // *** Métodos SETS ***
    ${set_methods}
}
?>