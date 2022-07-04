<?php

/**
 * Controlador de UPDATE hacia la view.
 */

session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "Persona.php"));
// require_once(build_Path("..", "utilities", "autoload.php"));

use model\Persona;

$persona = new model\Persona();


$nombre = ucwords(strtolower($_POST["nombre"]));
$apellidos = ucwords(strtolower($_POST["apellidos"]));
$email = strtolower($_POST["email"]);
$telefono = $_POST["telefono"];
$provincia = ucwords(strtolower($_POST["provincia"]));
$ciudad = ucwords(strtolower($_POST["ciudad"]));
$user = $_POST["user"];
$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

$_SESSION["nombre"] = $nombre;
$_SESSION["apellidos"] = $apellidos;
$_SESSION["email"] = $email;
$_SESSION["telefono"] = $telefono;
$_SESSION["provincia"] = $provincia;
$_SESSION["ciudad"] = $ciudad;
$_SESSION["usuario"] = $user;

$persona->updateUsuario($nombre, $apellidos, $email, $telefono, $provincia, $ciudad, $user, $pass, $_SESSION["ID"]);

header("Location: /codigoapp/source/view/html/perfilUsuario.php");
