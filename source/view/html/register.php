<?php

session_start();

if (isset($_SESSION["ID"])) {
    //Si existe la session->ID redirige a mensajeForo.
    header("Location: ./mensajeForo.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotiGames</title>
    <link rel='stylesheet' href='/codigoapp/asset/bootstrap-5.0.2-dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../style/style.css'>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (
            !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["email"]) &&
            !empty($_POST["telefono"]) && !empty($_POST["provincia"]) && !empty($_POST["ciudad"]) &&
            !empty($_POST["user"]) && !empty($_POST["pass"])
        ) {
            //Si todo esta rellenado, entras a controlador.
            require_once("../../controller/controllerRegistro.php");
        } else {
            //Si no refrescas y se pondrian los valores en vacio.
            header("Refresh:0");
        }
    } else {
    ?>
        <div id="load">

            <nav class="navbar navbar-light navbar-expand-lg " style="background-color: #e3f2fd;">
                <div class="container-fluid">
                    <span class="navbar-brand"><img src="/codigoapp/asset/imagenes/logo.png" alt="logo" width="100rem"></span>
                </div>
            </nav>

            <!-- Inicio Contenedor registro -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="simu-body">
                    <div class="container rounded bg-white mt-0 mb-0">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <img class="rounded-circle mt-5" width="150px" src="https://bootdey.com/img/Content/avatar/avatar7.png">
                                    <span>
                                        ¿Ya tienes una cuenta? <a href="/codigoapp/index.php">Inicia Sesión</a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-7 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Registrarse en NotiGames</h4>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Usuario</label><input type="text" class="form-control" name="user" placeholder="Usuario" value=""></div>
                                        <div class="col-md-12"><label class="labels">Contraseña</label><input type="password" class="form-control" name="pass" placeholder="Ingrese su Contraseña" value=""></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Nombre</label><input type="text" class="form-control" name="nombre" placeholder="Nombre" value=""></div>
                                        <div class="col-md-6"><label class="labels">Apellidos</label><input type="text" class="form-control" name="apellidos" value="" placeholder="Apellidos"></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Telefono movil</label><input type="text" class="form-control" name="telefono" placeholder="Ingrese el numero de telefono" value=""></div>
                                        <div class="col-md-12"><label class="labels">Provincia</label><input type="text" class="form-control" name="provincia" placeholder="Ingrese la Provincia" value=""></div>
                                        <div class="col-md-12"><label class="labels">Gmail</label><input type="text" class="form-control" name="email" placeholder="example@gmail.com" value=""></div>
                                        <div class="col-md-12"><label class="labels">Ciudad</label><input type="text" class="form-control" name="ciudad" placeholder="Ciudad" value=""></div>
                                    </div>
                                    <div class="mt-5 text-center"><input class="btn btn-primary profile-button" type="submit" value="Registrarse" /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Fin Contenedor registro -->

            <!-- Inicio Footer -->
            <?php include './templateFooter.php'; ?>
            <!-- Fin Footer -->

            <script src='../../../asset/jquery/jquery.min.js'></script>
            <script src='../../../asset/bootstrap-5.0.2-dist/js/bootstrap.min.js'></script>
        </div>
    <?php
    }
    ?>
</body>

</html>