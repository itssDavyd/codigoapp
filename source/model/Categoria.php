<?php

namespace model;

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "mappers", "mappers.php"));
require_once(build_Path(__DIR__, "..", "utilities", "querys.php"));
include_once(__DIR__ . "/Model.php");


/**
 * @brief <h4>Clase categorias</h4>
 * 
 * <p>Esta clase sirve para obtener las funciones relacionadas con la Tabla Categorias de la bdd.</p>
 * 
 * @version 1.0
 * @since 0.9
 * @author David Fernandez y Jose Chavez <davi123fragoso@gmail.com>
 */
class Categoria extends Model
{
    public $idCategoria;
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Funcion getCategorias.
     * 
     * Esta funcion optiene las categorias de la base de datos (todas).
     * @return String devuelve un array de string con la serializacion del mismo (JSON).
     */

    public function getCategorias()
    {
        try {

            $stm = $this->query($GLOBALS["GET_CATEGORIAS_SQL"]);
            $stm->execute();
            $results = [];

            while ($fila = $stm->fetch(\PDO::FETCH_ASSOC)) {
                array_push($results, $fila);
            }

            return json_encode($results);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
}
