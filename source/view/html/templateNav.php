<!-- En esta pagina tenemos el template para mostrar el nav-bar default. -->

<!-- https://getbootstrap.com/docs/5.0/components/navbar/ -->

<nav class="navbar navbar-light navbar-expand-lg " style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="/codigoapp/asset/imagenes/logo.png" alt="logo" width="100rem"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/codigoapp/source/view/html/mensajeForo.php">Noticias</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION["nombre"] . " " . $_SESSION["apellidos"]; ?>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/codigoapp/source/view/html/perfilUsuario.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="/codigoapp/source/utilities/procesoLogout.php">Log Out</a></li>
                    </ul>
                    <!-- <li id="showFilter" onclick="showHideAddNotice('showFilter')" class="addNoticia align-self-center m-2"><a href="#"><img src="/codigoapp/asset/imagenes/filtrar.png" alt=""></a></li>
                <li id="showId" onclick="showHideAddNotice('showId')" class="addNoticia align-self-center m-2"><a href="#"><img src="/codigoapp/asset/imagenes/add.png" alt=""></a></li> -->
            </ul>
            <div class="d-flex filterIdClass">
                <ul>
                    <li id="showFilter" onclick="showHideAddNotice('showFilter')" class="addNoticia align-self-center m-2"><a href="#"><img src="/codigoapp/asset/imagenes/filtrar.png" alt=""></a></li>
                    <li id="showId" onclick="showHideAddNotice('showId')" class="addNoticia align-self-center m-2"><a href="#"><img src="/codigoapp/asset/imagenes/add.png" alt=""></a></li>
                    <li id="showFechas" onclick="showHideAddNotice('showFechas')" class="addNoticia align-self-center m-2"><a href="#"><img src="/codigoapp/asset/imagenes/fechas.png" alt=""></a></li>
                </ul>
                <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="POST" class="d-flex">
                    <input name="seName" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button name="search" class="btn btn-outline-success" type="submit" value="search">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>