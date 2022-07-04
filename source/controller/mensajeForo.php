<?php

/**
 * Controlador de Mensaje Foro hacia la view.
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "mensajeForo.php"));

use model\MensajeForo;

$mensajes = new model\MensajeForo();

echo $mensajes->getMessages();
