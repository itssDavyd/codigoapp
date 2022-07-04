<?php
session_start();
if ($_SESSION["rol"] == "user") {
    header("Location: ./mensajeForo.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='/codigoapp/asset/bootstrap-5.0.2-dist/css/bootstrap.min.css'>
        <link rel="stylesheet" href="../style/style.css">
        <title>NotiGames</title>
    </head>

    <body>

        <!-- Autocarga del Nav-bar -->
        <!-- Inicio Nav-bar -->
        <?php include './templateNav.php' ?>
        <!-- Fin Nav-bar -->
        <div class="m-0 row justify-content-center">
            <form action="/codigoapp/source/controller/controllerModificarPost.php?idPost=<?php echo $_POST["idPost"] ?>" method="post" class="container p-3 mt-4" style="background-color: rgb(239, 240, 245); height: 55vh;">
                <div class="mb-3 col-md-12">
                    <label for="tituloNoticia" class="form-label">Titulo: </label>
                    <input name="titulo" type="text" class="form-control" value="<?php echo $_POST["titulo"] ?>">
                </div>
                <div class="mb-3">
                    <label for="cuerpoNoticia" class="form-label">Cuerpo: </label>
                    <textarea name="texto" class="form-control" rows="3"><?php echo $_POST["texto"] ?></textarea>
                </div>
                <select class="form-select mb-3" aria-label="Default select example" name="idcategoria">
                    <?php
                    include_once "../../utilities/getJsonConnect.php";
                    $categorias = getJsonConnect('http://localhost/codigoapp/source/controller/controllerCategorias.php');

                    foreach ($categorias as $categoria) {
                        if ($_POST["categoria"] == $categoria->ID_Categoria) {
                    ?>
                            <option selected value="<?php echo $categoria->ID_Categoria ?>"><?php echo $categoria->Nombre_Cat ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?php echo $categoria->ID_Categoria ?>"><?php echo $categoria->Nombre_Cat ?></option>
                    <?php }
                    } ?>
                </select>
                <div class="mb-3 col-md-12">
                    <label for="fechaPost" class="form-label">Fecha Post: </label>
                    <input class="form-control" type="datetime" name="fechaPost" value="<?php echo $_POST["fechaPost"] ?>" />
                </div>
                <div class="mb-3 col-md-12">
                    <label for="idPersona" class="form-label">Identificador Dueño: </label>
                    <input class="form-control" type="text" name="idPersona" value="<?php echo $_POST["idPersona"] ?>" />
                </div>
                <button name="modificar" type="submit" class="btn btn-outline-success mt-2 float-end">Modificar</button>
            </form>
        </div>
        <!-- Inicio Footer -->
        <?php include_once './templateFooter.php'; ?>
        <!-- Fin Footer -->

        <!-- Inicio Scripts -->
        <script src='/codigoapp/asset/jquery/jquery.min.js'></script>
        <script src="/codigoapp/asset/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
        <!-- Fin Scripts -->
    </body>

    </html>

<?php
} ?>