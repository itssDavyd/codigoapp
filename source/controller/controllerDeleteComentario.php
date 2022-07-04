<?php
session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "Comentarios.php"));

use model\Comentarios;

$post = new Comentarios();

$post->deleteComentario($_POST["idComentario"]);
header("Location: ../view/html/comentarioNoticias.php?ID_POST=" . $_POST["idPost"]);
