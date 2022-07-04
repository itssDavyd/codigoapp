<?php

/**
 * Controlador de Estadistica CSGO hacia la view.
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "Estadistica.php"));

use model\Estadistica;

$mensajes = new model\Estadistica($_GET["ID_PERSONA"]);
echo $mensajes->getEstadisticasCSGO();
