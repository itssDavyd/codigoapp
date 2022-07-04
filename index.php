<?php
require_once("./asset/logs/saveLogs.php");
session_start();
if (isset($_POST["register"])) {
    header("Location: ./source/view/html/register.php");
} else {
    if (isset($_SESSION["ID"])) {
        header("Location: ./source/view/html/mensajeForo.php");
    } else {
        require_once("./source/controller/controllerLogin.php");
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>NotiGames</title>
            <link rel="stylesheet" href="./asset/bootstrap-5.0.2-dist/css/bootstrap.min.css">
            <link rel='stylesheet' href='/codigoapp/source/view/style/style.css'>
        </head>

        <body>
            <nav class="navbar navbar-light navbar-expand-lg " style="background-color: #e3f2fd;">
                <div class="container-fluid">
                    <a class="navbar-brand"><img src="/codigoapp/asset/imagenes/logo.png" alt="logo" width="100rem"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
    <?php


        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (empty($_POST["user"])) {
                header("Location: " . $_SERVER["PHP_SELF"]);
            } else {

                if ($person = $persona->getPerson($_POST["user"])) {
                    if ($persona->validarPass($_POST["password"])) {
                        $_SESSION["ID"] = $persona->id_persona;
                        $_SESSION["nombre"] = $persona->nombre;
                        $_SESSION["apellidos"] = $persona->apellidos;
                        $_SESSION["email"] = $persona->email;
                        $_SESSION["rol"] = $persona->rol;
                        $_SESSION["foto"] = $persona->foto;
                        $_SESSION["telefono"] = $persona->telefono;
                        $_SESSION["provincia"] = $persona->provincia;
                        $_SESSION["ciudad"] = $persona->ciudad;
                        $_SESSION["usuario"] = $persona->usuario;
                        saveLogs();
                        header("Location: ./source/view/html/mensajeForo.php");
                    } else {
                        header("Location: ./source/utilities/error_advertencias_log.php?errorPass=1");
                    }
                } else {
                    header("Location: ./source/utilities/error_advertencias_log.php?errorUser=1");
                }
            }
        } else {
            echo imprimirFormulario();
        }
    }
}
    ?>

    <script src="./asset/jquery/jquery.min.js"></script>
    <script src="./asset/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
        </body>

        </html>