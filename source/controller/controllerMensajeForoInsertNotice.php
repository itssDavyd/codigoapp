<?php

/**
 * Controlador de Mensaje del Foro al insertar noticias hacia la view.
 */

session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "mensajeForo.php"));
// require_once(build_Path("..", "utilities", "autoload.php"));

use model\MensajeForo;

$notice = new model\MensajeForo();

$datetime = $_POST["fechaPost"] . " " . $_POST["horaPost"];

$notice->insertarNoticia($_POST["titulo"], $_POST["texto"], $_POST["idcategoria"], $_SESSION['ID'], $datetime);

header('Location: /codigoapp/source/view/html/mensajeForo.php');
