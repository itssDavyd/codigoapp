<?php


/**
 * Controlador de Guardar comentarios hacia la view.
 */

session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "Comentarios.php"));
// require_once(build_Path("..", "utilities", "autoload.php"));

use model\Comentarios;

$comentario = new model\Comentarios();

$comentario->saveComentario($_POST["ID_POST"], $_SESSION["ID"], $_POST["comentario"]);

header("Location: /codigoapp/source/view/html/comentarioNoticias.php?ID_POST=" . $_POST["ID_POST"]);
