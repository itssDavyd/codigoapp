<?php

namespace model;

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "utilities", "querys.php"));
include_once(__DIR__ . "/Model.php");


/**
 * @brief <h4>Clase Persona</h4>
 * 
 * <p>Esta clase sirve para obtener las funciones relacionadas con la Tabla Persona de la bdd.</p>
 * 
 * @version 1.0
 * @since 0.9
 * @author David Fernandez y Jose Chavez <davi123fragoso@gmail.com>
 */

class Persona extends Model
{
    public $id_persona;
    public $nombre;
    public $apellidos;
    public $email;
    public $foto;
    public $telefono;
    public $provincia;
    public $ciudad;
    public $usuario;
    public $password;
    public $rol;

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Obtener todas las personas y guardarlas en los atributos de la clase.
     * @param mixed $person
     * 
     * @return datos correctos o en caso de lo contrario no los guarda y retorna false.
     */
    function getPerson($person)
    {
        try {
            $stm = $this->prepare($GLOBALS["GET_PERSON_SQL"]);
            $stm->bindParam(":USER", $person);
            $stm->execute();
            if ($fila = $stm->fetch(\PDO::FETCH_ASSOC)) {
                $this->id_persona = $fila["ID_Persona"];
                $this->nombre = $fila["Nombre"];
                $this->apellidos = $fila["Apellidos"];
                $this->email = $fila["email"];
                $this->foto = $fila["foto"];
                $this->telefono = $fila["telefono"];
                $this->provincia = $fila["Provincia"];
                $this->ciudad = $fila["Ciudad"];
                $this->usuario = $fila["Usuario"];
                $this->password = $fila["Pass"];
                $this->rol = $fila["rol"];
                $stm = null;
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            throw $e;
            return false;
        }
    }

    /**
     * Funcion para validad el password de la persona.
     * 
     * @param mixed $pass
     * 
     * @return datos en caso de que sea correcta la pass si no false.
     */
    public function validarPass($pass)
    {
        if (password_verify($pass, $this->password)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * Funcion para insertar usuarios una vez ser registren.
     * @param mixed $nombre
     * @param mixed $apellidos
     * @param mixed $email
     * @param mixed $telefono
     * @param mixed $provincia
     * @param mixed $ciudad
     * @param mixed $usuario
     * @param mixed $pass
     * 
     * @return User inserta en la base de datos.
     */
    function insertarUser($nombre, $apellidos, $email, $telefono, $provincia, $ciudad, $usuario, $pass)
    {
        try {
            $pdo = $this->db->connect();
            $pdo->beginTransaction();
            $user = $pdo->query($GLOBALS["GET_ALL_PERSONS_SQL"]);
            $user->execute();

            while ($fila = $user->fetch(\PDO::FETCH_ASSOC)) {
                if ($fila["Usuario"] == $usuario) {
                    header("Location: /codigoapp/source/utilities/error_advertencias_log.php?userYa=1");
                    throw new \Exception("Usuario ya Existe.");
                } else if ($fila["email"] === $email) {
                    header("Location: /codigoapp/source/utilities/error_advertencias_log.php?emailYa=1");
                    throw new \Exception("Email ya Existe.");
                } else if ($fila["telefono"] == $telefono) {
                    header("Location: /codigoapp/source/utilities/error_advertencias_log.php?tlfYa=1");
                    throw new \Exception("Telefono ya Existe.");
                }
            }
            $stm = $pdo->prepare($GLOBALS["INSERT_USUARIO"]);
            $stm->bindParam(":NOMBRE", $nombre);
            $stm->bindParam(":APELLIDOS", $apellidos);
            $stm->bindParam(":EMAIL", $email);
            $stm->bindParam(":TELEFONO", $telefono);
            $stm->bindParam(":PROVINCIA", $provincia);
            $stm->bindParam(":CIUDAD", $ciudad);
            $stm->bindParam(":USUARIO", $usuario);
            $stm->bindParam(":PASS", $pass);
            $stm->execute();
            $pdo->commit();
        } catch (\PDOException $e) {
            $pdo->rollback();
            throw $e;
        }
    }

    /**
     * Funcion para updatear el usuario.
     * @param mixed $nombre
     * @param mixed $apellidos
     * @param mixed $email
     * @param mixed $telefono
     * @param mixed $provincia
     * @param mixed $ciudad
     * @param mixed $usuario
     * @param mixed $pass
     * @param mixed $id_persona
     * 
     * @return datos updateados en la base de datos.
     */
    public function updateUsuario($nombre, $apellidos, $email, $telefono, $provincia, $ciudad, $usuario, $pass, $id_persona)
    {
        try {
            $stm = $this->prepare($GLOBALS["UPDATE_USUARIO"]);
            $stm->bindParam(":NOMBRE", $nombre);
            $stm->bindParam(":APELLIDOS", $apellidos);
            $stm->bindParam(":EMAIL", $email);
            $stm->bindParam(":TELEFONO", $telefono);
            $stm->bindParam(":PROVINCIA", $provincia);
            $stm->bindParam(":CIUDAD", $ciudad);
            $stm->bindParam(":USER", $usuario);
            $stm->bindParam(":PASS", $pass);
            $stm->bindParam(":ID_PERSONA", $id_persona);
            $stm->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function guardarFoto($url, $id_persona)
    {
        try {
            $stm = $this->prepare($GLOBALS["UPDATE_FOTO"]);
            $stm->bindParam(":URL_FOTO", $url);
            $stm->bindParam(":ID_PERSONA", $id_persona);
            $stm->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
}
