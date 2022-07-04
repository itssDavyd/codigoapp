<?php

/**
 * Controlador de Categorias hacia la view.
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "Categoria.php"));

use model\Categoria;

$categorias = new model\Categoria();
echo $categorias->getCategorias();
