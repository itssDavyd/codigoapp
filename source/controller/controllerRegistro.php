<?php

/**
 * Controlador de Registro hacia la view.
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "Persona.php"));
require_once(build_Path(__DIR__, "..", "..", "asset", "reproducMailer", "push_email.php"));

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

$persona->insertarUser($nombre, $apellidos, $email, $telefono, $provincia, $ciudad, $user, $pass);
composerMail($user, $email);

header("Location: /codigoapp/index.php");
