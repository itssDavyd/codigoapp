<?php

namespace model;

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
include_once(__DIR__ . "/Model.php");
require_once(build_Path(__DIR__, "..", "utilities", "querys.php"));


/**
 * @brief <h4>Clase Comentarios</h4>
 * 
 * <p>Esta clase sirve para obtener las funciones relacionadas con la Tabla Comentarios de la bdd.</p>
 * 
 * @version 1.0
 * @since 0.9
 * @author David Fernandez y Jose Chavez <davi123fragoso@gmail.com>
 */

class Comentarios extends Model
{
    private $post;
    private $comentarios;
    public function __construct()
    {
        parent::__construct();

        $this->comentarios = [];
    }

    /**
     * Funcion Para obtener todos los Post de los Comentarios.
     * 
     * @param number $id_post
     * 
     * @return String devuelve un array serializado de los post.
     */
    public function getPostComentarios($id_post)
    {
        $stm = $this->prepare($GLOBALS["GET_POST_BY_ID_SQL"]);
        $stm->bindParam(":ID_POST", $id_post);
        $stm->execute();
        $this->post = $stm->fetch(\PDO::FETCH_ASSOC);

        return json_encode($this->post);
    }

    /**
     * Funcion Para obtener todos los Comentarios.
     * 
     * @param number $id_post
     * 
     * @return String devuelve un array serializado de los comentarios.
     */

    public function getComentarios($id_post)
    {
        $stm = $this->prepare($GLOBALS["GET_COMENTARIOS_BY_ID_SQL"]);
        $stm->bindParam(":ID_POST", $id_post);
        $stm->execute();


        while ($com = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $this->comentarios[] = $com;
        }

        return json_encode($this->comentarios);
    }

    /**
     * Funcion para realizar peticion JSON.
     * 
     * @return array serializado .
     */
    public function peticionJSON()
    {
        $array = [];
        array_push($array, $this->post);
        array_push($array, $this->comentarios);
        return json_encode($array);
    }

    /**
     * Funcion para guardar comentarios.
     * 
     * @return insercion de comentario.
     */

    public function saveComentario($id_post, $id_persona, $comentario)
    {
        try {
            $stm = $this->prepare($GLOBALS["SET_COMENTARIO"]);
            $stm->bindParam(":ID_POST", $id_post);
            $stm->bindParam(":ID_PERSONA", $id_persona);
            $stm->bindParam(":COMENTARIO", $comentario);
            $stm->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteComentario($idComentario)
    {
        try {
            $stm = $this->prepare($GLOBALS["DELETE_COMENTARIO_BY_ID"]);
            $stm->bindParam(":ID_COMENTARIO", $idComentario);
            $stm->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
}
