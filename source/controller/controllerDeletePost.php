<?php

/**
 * Controlador de DELETE NOTICIA hacia la view.
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "mensajeForo.php"));
//require_once(build_Path("..", "utilities", "autoload.php"));

use model\MensajeForo;

$delete = new MensajeForo();
$delete->deletePostByID($_POST["eliminar"]);
header("Location: ../view/html/mensajeForo.php");
