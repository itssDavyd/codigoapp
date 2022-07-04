<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "mensajeForo.php"));

use model\MensajeForo;

$update = new MensajeForo();

$update->updatePostByID($_GET["idPost"], $_POST["titulo"], $_POST["texto"], $_POST["idPersona"], $_POST["idcategoria"], $_POST["fechaPost"]);

header("Location: ../view/html/comentarioNoticias.php?ID_POST=" . $_GET["idPost"]);
