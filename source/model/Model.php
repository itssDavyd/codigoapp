<?php

namespace model;

include(__DIR__ . "/Conexion.php");

use model\Conexion;


/**
 * @brief <h4>Clase Model</h4>
 * 
 * <p>Esta clase sirve para obtener las funciones relacionadas con las consultas, es el modelo del cual extienden el resto de Models.</p>
 * 
 * @version 1.0
 * @since 0.7
 * @author David Fernandez y Jose Chavez <davi123fragoso@gmail.com>
 */

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function query($query)
    {
        return $this->db->connect()->query($query);
    }

    public function prepare($query)
    {
        return $this->db->connect()->prepare($query);
    }
}
