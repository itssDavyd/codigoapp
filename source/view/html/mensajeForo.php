<?php
session_start();
if (isset($_SESSION["ID"])) {

    include_once "../../utilities/getJsonConnect.php";
    //Puertos de xampp/lampp -> (DAVID) PORT CASA: 8080 || PORT CLASE: 8888 ||

    if (isset($_POST["filtrar"])) {
        //Si filtro por categoria entra.
        $data = getJsonConnect('http://localhost:8080/codigoapp/source/controller/controllerFiltrarCat.php?ID_Categoria=' . $_POST["idcategoria"]);
    } else if (isset($_POST["buscar"])) {
        // Si se pulso en filtrar fechas
        $data = getJsonConnect('http://localhost:8080/codigoapp/source/controller/controllerFiltrarFecha.php?FROM=' . $_POST["FROM"] . '&TO=' . $_POST["TO"]);
    } else if (isset($_POST["search"])) {
        // Si se pulso en buscar
        $data = getJsonConnect('http://localhost:8080/codigoapp/source/controller/controllerSearchForo.php?search=' . $_POST["seName"]);
    } else if (isset($_POST["allNotice"]) || "Refresh:0") {
        //Si se refresco o pulsamos obtener todas las noticias.
        $data = getJsonConnect('http://localhost:8080/codigoapp/source/controller/mensajeForo.php');
    }
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NotiGames</title>
        <link rel="stylesheet" href="/codigoapp/asset/bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <link rel='stylesheet' href='../style/style.css'>
    </head>

    <body>

        <!-- Autocarga del Nav-bar -->
        <!-- Inicio Nav-bar -->
        <?php include './templateNav.php'; ?>
        <!-- Fin Nav-bar -->
        <!-- Inicio main -->
        <div id="main">
            <!-- Inicio Insercion Creacion noticia. -->
            <?php include './insercionNoticia.php'; ?>
            <!-- Fin Insercion Creacion noticia. -->

            <form action="" method="post" id="filtrarFechas" class="d-none mt-3">
                <div class="mb-3 col-md-12">
                    <label for="fechaPost" class="form-label">Fecha from: </label>
                    <input class="form-control" type="date" name="FROM" />
                </div>
                <div class="mb-3 col-md-12">
                    <label for="fechaPost" class="form-label">Fecha to: </label>
                    <input class="form-control" type="date" name="TO" />
                </div>
                <button id="buscar" name="buscar" type="submit" class="btn btn-outline-success mt-2 float-end butFilter">Buscar</button>
            </form>

            <!-- Inicio Filtro Categorias -->
            <form action="" method="post" id="filterCategoria" class="d-none mt-3">
                <select class="form-select" aria-label="Default select example" name="idcategoria">
                    <?php
                    $categorias = getJsonConnect('http://localhost:8080/codigoapp/source/controller/controllerCategorias.php');

                    foreach ($categorias as $categoria) {
                    ?>
                        <option value="<?php echo $categoria->ID_Categoria ?>"><?php echo $categoria->Nombre_Cat ?></option>
                    <?php } ?>
                </select>
                <button id="filterCat" name="filtrar" type="submit" class="btn btn-outline-success mt-2 float-end butFilter">Buscar</button>
                <button id="filterCat" name="allNotice" type="submit" class="btn btn-outline-success mt-2 float-end butFilter">Mostrar Todos</button>
            </form>
            <!-- Fin Filtro Categorias -->
            <!-- Inicio Contenedor Noticias -->
            <div class="containerNoticia">
                <?php
                foreach ($data as $value) {
                ?>
                    <!-- Inicio Contenedor Mensajes del Foro -->
                    <div class="mensajeForo">
                        <div class="titulo">
                            <a href="./comentarioNoticias.php?ID_POST=<?php echo $value->ID_POST ?>"><?php echo $value->Titulo ?></a>
                        </div>
                        <!-- Inicio Cuerpo del Mensaje Foro -->
                        <div class=" contenido hidden">
                            <?php echo $value->texto ?>
                        </div>
                        <!-- Fin Cuerpo del Mensaje Foro -->
                        <!-- Inicio Flecha ver mas-->
                        <div class="vermas">
                            <span onclick="vermas(this);" id="menos" data-dir="down" class="arrow down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 4a.5.5 0 0 0-.374.832l4 4.5a.5.5 0 0 0 .748 0l4-4.5A.5.5 0 0 0 12 6H4z" />
                                </svg>
                            </span>
                            <span onclick="vermas(this);" id="menos" data-dir="up" class="hidden show arrow up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-square-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 9h8a.5.5 0 0 0 .374-.832l-4-4.5a.5.5 0 0 0-.748 0l-4 4.5A.5.5 0 0 0 4 11z" />
                                </svg>
                            </span>
                        </div>
                        <!-- Fin Flecha ver mas-->
                        <!-- Inicio Contenedor-footer-->
                        <div class="container-footer">
                            <!-- Inicio Contenedor-Fecha-->
                            <div class="fechaPublicacion">
                                <?php echo $value->fecha_Post ?>
                            </div>
                            <!-- Fin Contenedor-Fecha-->
                            <!-- Inicio Contenedor-Firma-->
                            <div class="firma">
                                <?php echo $value->nombrePersona ?>
                            </div>
                            <!-- Fin Contenedor-Firma-->
                        </div>
                        <!-- Fin Contenedor-footer-->
                    </div>
                    <!-- Fin Contenedor Mensajes del Foro -->
                <?php
                }
                ?>
            </div>
            <!-- Fin Contenedor Noticias -->
        </div>
        <!-- Fin main -->

        <!-- Inicio Footer -->
        <?php include_once './templateFooter.php'; ?>
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