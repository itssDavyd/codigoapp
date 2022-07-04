<?php

/**
 * Controlador de Login hacia la view.
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "Persona.php"));
require_once(build_Path(__DIR__, "..", "utilities", "procesoLogin.php"));

use model\Persona;

$persona = new model\Persona();
