<?php
session_start();
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
<header id="header"></header>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (
            !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["email"]) &&
            !empty($_POST["telefono"]) && !empty($_POST["provincia"]) && !empty($_POST["ciudad"]) &&
            !empty($_POST["user"]) && !empty($_POST["pass"])
        ) {
            require_once("../../controller/controllerUpdate.php");
        } else {
            header("Refresh:0");
        }
    } else {
    ?>
        <div id="load">

            <!-- Autocarga del Nav-bar -->
            <!-- Inicio Nav-bar -->
            <?php include './templateNav.php' ?>
            <!-- Fin Nav-bar -->

            <!-- Inicio Contenedor Editar-Perfil -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="simu-body">
                    <div class="container rounded bg-white mt-0 mb-0">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <img class="rounded-circle mt-5" width="150px" src="<?php echo isset($_SESSION["foto"]) ? $_SESSION["foto"] : "https://bootdey.com/img/Content/avatar/avatar7.png"; ?>">
                                </div>
                            </div>
                            <div class="col-md-7 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Edita tu Perfil</h4>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="labels">Usuario</label>
                                            <input type="text" class="form-control" name="user" placeholder="Usuario" value="<?php echo $_SESSION["usuario"]; ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Contraseña</label>
                                            <input type="password" class="form-control" name="pass" placeholder="Ingrese su Contraseña" value="">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label class="labels">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $_SESSION["nombre"]; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">Apellidos</label>
                                            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php echo $_SESSION["apellidos"]; ?>">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="labels">Telefono movil</label>
                                            <input type="text" class="form-control" name="telefono" placeholder="Ingrese el numero de telefono" value="<?php echo $_SESSION["telefono"]; ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Provincia</label>
                                            <input type="text" class="form-control" name="provincia" placeholder="Ingrese la Provincia" value="<?php echo $_SESSION["provincia"]; ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="example@gmail.com" value="<?php echo $_SESSION["email"]; ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Ciudad</label>
                                            <input type="text" class="form-control" name="ciudad" placeholder="Ciudad" value="<?php echo $_SESSION["ciudad"]; ?>">
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <input class="btn btn-primary profile-button" type="submit" value="Editar" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Fin Contenedor Editar-Perfil -->

            <!-- Inicio Footer -->
            <?php include './templateFooter.php'; ?>
            <!-- Fin Footer -->

            <!-- Inicio importe Scripts -->
            <?php include './scriptsInclude.php'; ?>
            <!-- Fin importe Scripts -->
        </div>
    <?php
    }
    ?>
</body>

</html>