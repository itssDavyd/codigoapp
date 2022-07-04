<?php

/**
 * Controlador de Modificaciones Estadisticas hacia la view.
 */

session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "Estadistica.php"));
// require_once(build_Path("..", "utilities", "autoload.php"));

use model\Estadistica;

if (isset($_POST["saveFormLOL"])) {

    $stat = new model\Estadistica($_SESSION["ID"]);

    if (!empty($_POST["mmr"]) && !empty($_POST["nHoras"]) && !empty($_POST["rol"])) {

        if ($stat->updateStatsLOL($_POST["nHoras"], $_POST["mmr"], $_POST["rol"])) {
            header("Location: ../utilities/error_advertencias_log.php?StatsUpdate=1");
        } else {
            $stat->saveStatsLOL($_POST["nHoras"], $_POST["mmr"], $_POST["rol"]);
            header("Location: ../utilities/error_advertencias_log.php?StatsSaves=1");
        }
    } else {
        header("Location: ../utilities/error_advertencias_log.php?StatsError=1");
    }
} elseif (isset($_POST["saveFormCSGO"])) {

    $stat = new model\Estadistica($_SESSION["ID"]);

    if (!empty($_POST["mmr"]) && !empty($_POST["nHoras"]) && !empty($_POST["kills"]) && !empty($_POST["muertes"])) {

        if ($stat->updateStatsCSGO($_POST["nHoras"], $_POST["mmr"], $_POST["kills"], $_POST["muertes"])) {
            header("Location: ../utilities/error_advertencias_log.php?StatsUpdate=1");
        } else {
            $stat->saveStatsCSGO($_POST["nHoras"], $_POST["mmr"], $_POST["kills"], $_POST["muertes"]);
            header("Location: ../utilities/error_advertencias_log.php?StatsSaves=1");
        }
    } else {
        header("Location: ../utilities/error_advertencias_log.php?StatsError=1");
    }
} elseif (isset($_POST["saveFormRL"])) {

    $stat = new model\Estadistica($_SESSION["ID"]);

    if (!empty($_POST["mmr"]) && !empty($_POST["nHoras"]) && !empty($_POST["goles"]) && !empty($_POST["saves"])) {

        if ($stat->updateStatsRL($_POST["nHoras"], $_POST["mmr"], $_POST["goles"], $_POST["saves"])) {
            header("Location: ../utilities/error_advertencias_log.php?StatsUpdate=1");
        } else {
            $stat->saveStatsRL($_POST["nHoras"], $_POST["mmr"], $_POST["goles"], $_POST["saves"]);
            header("Location: ../utilities/error_advertencias_log.php?StatsSaves=1");
        }
    } else {
        header("Location: ../utilities/error_advertencias_log.php?StatsError=1");
    }
}
