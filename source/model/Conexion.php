<?php

namespace model;

include_once(__DIR__ . "/../utilities/cargaCfg.php");


/**
 * @brief <h4>Clase Conexion</h4>
 * 
 * <p>Esta clase sirve para realizar la conexion a la base de datos.</p>
 * 
 * @version 1.0
 * @since 0.1
 * 
 * @author David Fernandez y Jose Chavez <davi123fragoso@gmail.com>
 */

class Conexion
{
    private $host;
    private $db;
    private $user;
    private $password;


    public function __construct()
    {
        $cfg = leer_configuracion(__DIR__ . "/../utilities/cfg.xml", __DIR__ . "/../utilities/cfg.xsd");
        $this->host = $cfg[0]->host;
        $this->db = $cfg[0]->dbname;
        $this->user = $cfg[0]->user;
        $this->password = $cfg[0]->pass;
    }

    /**
     * Funcion para conectar a la base de datos.
     * @return pdo retorna la conexion realizada a la bdd.
     */
    public function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db;
            $pdo = new \PDO($connection, $this->user, $this->password);
            return $pdo;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}
