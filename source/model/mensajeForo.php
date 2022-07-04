<?php

namespace model;

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "mappers", "mappers.php"));
require_once(build_Path(__DIR__, "..", "utilities", "querys.php"));
include_once(__DIR__ . "/Model.php");
/**
 * 
 * @brief Modelo del mensaje Foro.
 * 
 * <h4> [Description MensajeForo] </h4>
 * <p> En esta clase generamos un modelo que despues usaremos para mapear nuestros datos de la base de datos, y asi tratar de una forma mas comoda los datos. </p>
 * 
 * @author David Fernandez y Jose Chavez <davi123fragoso@gmail.com>
 * @version 0.1 
 * @since 0.1
 */
class MensajeForo extends Model
{
    public $id;
    public $titulo;
    public $cuerpo;
    public $idUsuario;
    public $fecha;

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Obtener todos los mensajes de la tabla POST bdd.
     * 
     * @return String array de datos serilializados con los mensajes de la tabla.
     */
    public function getMessages()
    {
        try {
            $query = $this->query($GLOBALS['GET_POSTS_SQL']);
            $query->execute();
            $results = [];
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                array_push($results, $fila);
            }

            return json_encode($results);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Funcion para insertar noticias en la tabla POST.
     * 
     * @param mixed $titulo
     * @param mixed $texto
     * @param mixed $idcategoria
     * @param mixed $idpersona
     * 
     * @return insercion de datos al crear un post.
     */
    function insertarNoticia($titulo, $texto, $idcategoria, $idpersona, $fechaPost)
    {
        try {
            $pdo = $this->db->connect();
            $stm = $pdo->prepare($GLOBALS["INSERT_CREACION_POST_SQL"]);
            $stm->bindParam(":titulo", $titulo);
            $stm->bindParam(":texto", $texto);
            $stm->bindParam(":fecha_post", $fechaPost);
            $stm->bindParam(":id_categoria", $idcategoria);
            $stm->bindParam(":id_persona", $idpersona);
            $stm->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }



    /**
     * Funcion para obtener todos los POST por el ID Categoria.
     * @param mixed $id_cat
     * 
     * @return String array con los datos serilializados del post por la categoria.
     */
    public function getPostByCategories($id_cat)
    {
        try {
            $stm = $this->prepare($GLOBALS["GET_POST_BY_ID_CATEGORIA_SQL"]);
            $stm->bindParam(":ID_Categoria", $id_cat);
            $stm->execute();
            $results = [];
            while ($fila = $stm->fetch(\PDO::FETCH_ASSOC)) {
                array_push($results, $fila);
            }
            $mensajes = [];

            foreach ($results as $msj) {
                $mensajes[] = $msj;
            }

            return json_encode($mensajes);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deletePostByID($id_post)
    {
        try {
            $stm = $this->prepare($GLOBALS["DELETE_POST_BY_ID"]);
            $stm->bindParam(":ID_POST", $id_post);
            $stm->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updatePostByID($id_post, $titulo, $texto, $idPersona, $idCategoria, $fechaPost)
    {
        try {
            $stm = $this->prepare($GLOBALS["UPDATE_POST_BY_ID"]);
            $stm->bindParam(":TITULO", $titulo);
            $stm->bindParam(":TEXTO", $texto);
            $stm->bindParam(":FECHA_POST", $fechaPost);
            $stm->bindParam(":ID_PERSONA", $idPersona);
            $stm->bindParam(":ID_CATEGORIA", $idCategoria);
            $stm->bindParam(":ID_POST", $id_post);
            $stm->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function filterPostBYFecha($fecha_FROM, $fecha_TO)
    {
        try {
            $stm = $this->prepare($GLOBALS["FILTER_POSTS_BY_FECHA_SQL"]);
            $stm->bindParam(":FECHA_FROM", $fecha_FROM);
            $stm->bindParam(":FECHA_TO", $fecha_TO);
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
    public function SEARCH_FILTER($search)
    {
        try {
            $stm = $this->prepare($GLOBALS["SEARCH_FILTER_SQL"]);
            $stm->bindParam(":filtro", $search);
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
