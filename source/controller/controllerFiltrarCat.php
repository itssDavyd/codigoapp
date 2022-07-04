<?php

/**
 * Controlador de Filtro de Categorias hacia la view.
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "mensajeForo.php"));

use model\MensajeForo;

$notice = new model\MensajeForo();
echo $notice->getPostByCategories($_GET["ID_Categoria"]);
