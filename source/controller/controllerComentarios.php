<?php

/**
 * Controlador de Comentarios hacia la view.
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "Comentarios.php"));

use model\Comentarios;

$post = new model\Comentarios();

$post->getPostComentarios($_GET["ID_POST"]);
$post->getComentarios($_GET["ID_POST"]);

echo $post->peticionJSON();
