<?php

namespace model;

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "utilities", "querys.php"));
require_once(__DIR__ . "/Model.php");

/**
 * @brief <h4>Clase Estadistica</h4>
 * 
 * <p>Esta clase sirve para realizar operaciones contra la tabla Estadistica de la bdd.</p>
 * 
 * @version 1.0
 * @since 0.1
 * 
 * @author David Fernandez y Jose Chavez <davi123fragoso@gmail.com>
 */

class Estadistica extends Model
{
    public $id_persona;


    public function __construct($id_persona)
    {
        parent::__construct();
        $this->id_persona = $id_persona;
    }

    /**
     * Obtener las estadisticas de LoL.
     * 
     * @return String el array de datos serializado si todo salio bien, si no false.
     */
    public function getEstadisticasLOL()
    {
        try {

            $stm = $this->prepare($GLOBALS["GET_STAT_LOL"]);

            $stm->bindParam(":ID_PERSONA", $this->id_persona);
            $stm->execute();
            if ($fila = $stm->fetch(\PDO::FETCH_ASSOC)) {
                return json_encode($fila);
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Obtener las estadisticas de CSGO.
     * 
     * @return String el array de datos serializado si todo salio bien, si no false.
     */

    public function getEstadisticasCSGO()
    {
        try {
            $stm = $this->prepare($GLOBALS["GET_STAT_CS"]);
            $stm->bindParam(":ID_PERSONA", $this->id_persona);
            $stm->execute();
            if ($fila = $stm->fetch(\PDO::FETCH_ASSOC)) {
                return json_encode($fila);
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Obtener las estadisticas de LoL.
     * 
     * @return String el array de datos serializado si todo salio bien, si no false.
     */

    public function getEstadisticasRL()
    {
        try {
            $stm = $this->prepare($GLOBALS["GET_STAT_RL"]);
            $stm->bindParam(":ID_PERSONA", $this->id_persona);
            $stm->execute();
            if ($fila = $stm->fetch(\PDO::FETCH_ASSOC)) {
                return json_encode($fila);
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Funcion para realizar una insercion de estadisticas en la tabla Stats Lol.
     * 
     * @param mixed $n_horas
     * @param mixed $MMR
     * @param mixed $rol
     * 
     * @return insercion de estadisticas lol.
     */
    public function saveStatsLOL($n_horas, $MMR, $rol)
    {
        try {
            $stm = $this->prepare($GLOBALS["SET_STAT_LOL"]);
            $stm->bindParam(":NHORAS", $n_horas);
            $stm->bindParam(":MMR", $MMR);
            $stm->bindParam(":ROL", $rol);
            $stm->bindParam(":ID_PERSONA", $this->id_persona);
            $stm->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();;
        }
    }

    /**
     * Funcion para realizar una insercion de estadisticas en la tabla Stats CSGO.
     * 
     * @param mixed $n_horas
     * @param mixed $MMR
     * @param mixed $kills
     *  @param mixed $muertes
     * 
     * @return insercion de estadisticas CSGO.
     */

    public function saveStatsCSGO($n_horas, $MMR, $kills, $muertes)
    {
        try {
            $stm = $this->prepare($GLOBALS["SET_STAT_CS"]);
            $stm->bindParam(":NHORAS", $n_horas);
            $stm->bindParam(":MMR", $MMR);
            $stm->bindParam(":KILLS", $kills);
            $stm->bindParam(":MUERTES", $muertes);
            $stm->bindParam(":ID_PERSONA", $this->id_persona);
            $stm->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();;
        }
    }

    /**
     * Funcion para realizar una insercion de estadisticas en la tabla Stats RL.
     * 
     * @param mixed $n_horas
     * @param mixed $MMR
     * @param mixed $goles
     *  @param mixed $Saves
     * 
     * @return insercion de estadisticas RL.
     */

    public function saveStatsRL($n_horas, $MMR, $goles, $saves)
    {
        try {
            $stm = $this->prepare($GLOBALS["SET_STAT_RL"]);
            $stm->bindParam(":NHORAS", $n_horas);
            $stm->bindParam(":MMR", $MMR);
            $stm->bindParam(":GOLES", $goles);
            $stm->bindParam(":SAVES", $saves);
            $stm->bindParam(":ID_PERSONA", $this->id_persona);
            $stm->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();;
        }
    }

    /**
     * Funcion para realizar una update de estadisticas en la tabla Stats LOL.
     * 
     * @param mixed $n_horas
     * @param mixed $MMR
     * @param mixed $rol
     * 
     * @return update de estadisticas LOL.
     */


    public function updateStatsLOL($n_horas, $MMR, $rol)
    {
        try {
            if ($this->getEstadisticasLOL()) {
                $stm = $this->prepare($GLOBALS["UPDATE_STAT_LOL"]);
                $stm->bindParam(":NHORAS", $n_horas);
                $stm->bindParam(":MMR", $MMR);
                $stm->bindParam(":ROL", $rol);
                $stm->bindParam(":ID_PERSONA", $this->id_persona);
                $stm->execute();
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Funcion para realizar una update de estadisticas en la tabla Stats CSGO.
     * 
     * @param mixed $n_horas
     * @param mixed $MMR
     * @param mixed $kills
     *  @param mixed $muertes
     * 
     * @return update de estadisticas CSGO.
     */

    public function updateStatsCSGO($n_horas, $MMR, $kills, $muertes)
    {
        try {
            if ($this->getEstadisticasCSGO()) {
                $stm = $this->prepare($GLOBALS["UPDATE_STAT_CS"]);
                $stm->bindParam(":NHORAS", $n_horas);
                $stm->bindParam(":MMR", $MMR);
                $stm->bindParam(":KILLS", $kills);
                $stm->bindParam(":MUERTES", $muertes);
                $stm->bindParam(":ID_PERSONA", $this->id_persona);
                $stm->execute();
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
    /**
     * Funcion para realizar una updates de estadisticas en la tabla Stats RL.
     * 
     * @param mixed $n_horas
     * @param mixed $MMR
     * @param mixed $goles
     *  @param mixed $Saves
     * 
     * @return updates de estadisticas RL.
     */

    public function updateStatsRL($n_horas, $MMR, $goles, $saves)
    {
        try {
            if ($this->getEstadisticasRL()) {
                $stm = $this->prepare($GLOBALS["UPDATE_STAT_RL"]);
                $stm->bindParam(":NHORAS", $n_horas);
                $stm->bindParam(":MMR", $MMR);
                $stm->bindParam(":GOLES", $goles);
                $stm->bindParam(":SAVES", $saves);
                $stm->bindParam(":ID_PERSONA", $this->id_persona);
                $stm->execute();
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
}
