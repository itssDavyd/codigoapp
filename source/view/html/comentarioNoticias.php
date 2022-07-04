<?php
session_start();
if (isset($_SESSION["ID"])) {
    include_once "../../utilities/getJsonConnect.php";
    $data = getJsonConnect('http://localhost:8080/codigoapp/source/controller/controllerComentarios.php?ID_POST=' . $_GET["ID_POST"]);
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

        <!-- Autocarga del Nav-bar -->
        <!-- Inicio Nav-bar -->
        <?php include './templateNav.php' ?>
        <!-- Fin Nav-bar -->
        <!-- Inicio Container Comentarios -->
        <div class="container-comentarios mb-5">
            <!-- Inicio noticia -->
            <div class="noticia p-3">
                <!-- Inicio Contenedor-footer-->
                <div class="container-footer">
                    <!-- Inicio Contenedor-Fecha Publi-->
                    <div class="fechaPublicacion">
                        <?php echo $data[0]->fecha_Post ?>
                    </div>
                    <!-- Fin Contenedor-Fecha Publi-->
                    <!-- Inicio Contenedor-Firma-->
                    <div class="firma">
                        <?php echo $data[0]->nombrePersona ?>

                    </div>
                    <!-- Fin Contenedor-Firma-->
                </div>
                <?php
                if ($_SESSION["ID"] == $data[0]->ID_Persona_Post || $_SESSION["rol"] == "admin") {
                ?>
                    <form action="/codigoapp/source/controller/controllerDeletePost.php" method="post">
                        <button class="btn btn-danger my-2" id="btnComentar" type="submit" name="eliminar" value="<?php echo $data[0]->ID_POST; ?>">X</button>
                    </form>
                <?php
                }

                if ($_SESSION["rol"] == "admin") {
                ?>
                    <form action="./modificarPost.php" method="post">
                        <input hidden type="text" name="titulo" value="<?php echo $data[0]->Titulo ?>" />
                        <input hidden type="text" name="texto" value="<?php echo $data[0]->texto ?>" />
                        <input hidden type="text" name="fechaPost" value="<?php echo $data[0]->fecha_Post ?>" />
                        <input hidden type="text" name="idPersona" value="<?php echo $data[0]->ID_Persona_Post ?>" />
                        <input hidden type="text" name="categoria" value="<?php echo $data[0]->ID_Categoria_Post ?>" />
                        <button class="btn btn-danger my-2" id="btnComentar" type="submit" name="idPost" value="<?php echo $data[0]->ID_POST; ?>">Modificar</button>
                    </form>
                <?php
                }
                ?>
                <!-- Fin Contenedor-footer-->
                <!-- Inicio Titulo noticia-->
                <h1 id="tNoticia"><?php echo $data[0]->Titulo; ?></h1>
                <!-- Fin Titulo noticia-->
                <!-- Inicio Contenido noticia-->
                <p id="contenidoNoticia"><?php echo $data[0]->texto; ?></p>
                <!-- Fin Contenido noticia-->
            </div>
            <!-- Fin noticia -->
            <form action="/codigoapp/source/controller/controllerSaveComentarios.php" method="POST">
                <div class="formContent justify-content-center">
                    <div class="my-2 col-5">
                        <textarea name="comentario" class="form-control" id="FormControlTextarea1"></textarea>
                    </div>
                    <div class="button">
                        <input hidden name="ID_POST" value="<?php echo $_GET["ID_POST"]; ?>" />
                        <button type="submit" id="btnComentar" class="btn btn-primary">Comentar</button>
                    </div>
                </div>
            </form>
            <!-- Inicio comentario-->
            <div class="comentario">
                <?php
                foreach ($data[1] as $comentario) {
                ?>
                    <div class="card mb-2">

                        <div class="card-header">
                            <?php
                            if ($_SESSION["ID"] == $comentario->ID_Persona_Comentar || $_SESSION["rol"] == "admin") {
                            ?>
                                <form action="/codigoapp/source/controller/controllerDeleteComentario.php" class="float-end" method="post">
                                    <input hidden type="text" name="idPost" value="<?php echo $data[0]->ID_POST; ?>" />
                                    <button class="btn btn-danger my-2" id="btnComentar" type="submit" name="idComentario" value="<?php echo $comentario->ID_Comentario; ?>">X</button>
                                </form>
                            <?php
                            }
                            ?>
                            <h5 class="pt-2"><strong><?php echo $comentario->nombrePersona; ?></strong></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php
                                echo $comentario->comentario;
                                ?>
                            </h5>
                            <p class="card-text">

                            </p>
                            <span id="btnComentar" class="btn btn-primary">
                                <?php
                                echo $comentario->fecha_comentario;
                                ?>
                            </span>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- Fin comentario-->
        </div>
        <!-- Fin Container Comentarios -->

        <!-- Inicio Footer -->
        <?php
        include_once './templateFooter.php';
        ?>
        <!-- Fin Footer -->

        <!-- Inicio Scripts -->
        <?php
        include_once "./scriptsInclude.php";
        ?>
        <!-- Fin Scripts -->

    </body>

    </html>
<?php

} else {
    header("Location: /codigoapp/index.php");
}
?>