<?php
session_start();
if (isset($_SESSION["ID"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NotiGames</title>
        <link rel="stylesheet" href="/codigoapp/asset/bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <link rel='stylesheet' href="/codigoapp/source/view/style/style.css">
    </head>

    <body>

        <!-- Autocarga del Nav-bar -->
        <!-- Inicio Nav-bar -->
        <?php include './templateNav.php' ?>
        <?php include_once '../../utilities/phpUtils.php' ?>
        <!-- Fin Nav-bar -->

        <!-- Inicio Contenedor Perfil -->
        <div class="container-perfil contenedorPadre">

            <!-- https://www.bootdey.com/snippets/view/profile-with-data-and-skills -->
            <div class="container-div">

                <div class="container">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <?php
                            include_once './mainUserFoto.php';
                            ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nombre Completo</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $_SESSION["nombre"] . " " . $_SESSION["apellidos"]; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $_SESSION["email"]; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Usuario</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $_SESSION["usuario"]; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Telefono</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $_SESSION["telefono"]; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Ciudad</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $_SESSION["ciudad"]; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Provincia</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $_SESSION["provincia"]; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="btn-edit-profile">
                                        <div class="row">
                                            <div class="col-sm-3 ">
                                                <button id="update" onclick="updateProfile('update')" type="button" class="btn btn-outline-primary">Editar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card text-center">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-lol-tab" data-bs-toggle="tab" data-bs-target="#nav-lol" type="button" role="tab" aria-controls="nav-lol" aria-selected="true">League of Legends</button>
                                        <button class="nav-link" id="nav-cs-tab" data-bs-toggle="tab" data-bs-target="#nav-cs" type="button" role="tab" aria-controls="nav-cs" aria-selected="true">Counter-Strike</button>
                                        <button class="nav-link" id="nav-rl-tab" data-bs-toggle="tab" data-bs-target="#nav-rl" type="button" role="tab" aria-controls="nav-rl" aria-selected="true">Rocket League</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active p-3" id="nav-lol" role="tabpanel" aria-labelledby="nav-lol-tab">

                                        <?php
                                        include_once "../../utilities/getJsonConnect.php";

                                        $data = getJsonConnect('http://localhost:8080/codigoapp/source/controller/controllerStatLOL.php?ID_PERSONA=' . $_SESSION["ID"]);
                                        //Cambiar las variables del array() por aquellos que introduzca el user en los inputs
                                        //Comprobacion en todas por ternaria, de si es el dato, ponlo a vacio.
                                        includeWithVariables('./lolForm.php', array("mmr" => isset($data->MMR) ? $data->MMR : "", "rol" => isset($data->rol) ? $data->rol : "", 'nHoras' => isset($data->n_horas) ? $data->n_horas : ""));
                                        ?>
                                    </div>
                                    <div class="tab-pane fade p-3" id="nav-cs" role="tabpanel" aria-labelledby="nav-cs-tab">
                                        <?php
                                        $data = getJsonConnect('http://localhost:8080/codigoapp/source/controller/controllerStatCSGO.php?ID_PERSONA=' . $_SESSION["ID"]);
                                        includeWithVariables('./csgoForm.php', array("mmr" => isset($data->MMR) ? $data->MMR : "", "muertes" => isset($data->muertes) ? $data->muertes : "", 'nHoras' => isset($data->n_horas) ? $data->n_horas : "", 'kills' => isset($data->n_kills) ? $data->n_kills : ""));
                                        ?>
                                    </div>
                                    <div class="tab-pane fade p-3" id="nav-rl" role="tabpanel" aria-labelledby="nav-rl-tab">
                                        <?php
                                        $data = getJsonConnect('http://localhost:8080/codigoapp/source/controller/controllerStatRL.php?ID_PERSONA=' . $_SESSION["ID"]);
                                        includeWithVariables('./rlForm.php', array("mmr" => isset($data->MMR) ? $data->MMR : "", "saves" => isset($data->saves) ? $data->saves : "", 'nHoras' => isset($data->n_horas) ? $data->n_horas : "", 'goles' => isset($data->goles) ? $data->goles : ""));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($_SESSION["rol"] == "admin") {
                        ?>
                            <div class="col-md-12 mt-3">
                                <div class="card text-center">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Identificador Usuario</th>
                                                <th scope="col">Usuario</th>
                                                <th id="pulsado" scope="col">Fecha Login</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $xml = simplexml_load_file(__DIR__ . '/../../../logs.xml') or die('Imposible cargar el fichero XML');
                                            foreach ($xml->log->login as $logue) { ?>
                                                <tr>
                                                    <td><?php echo $logue->id ?></td>
                                                    <td><?php echo $logue->nombre ?></td>
                                                    <td><?php echo $logue->fecha ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fin Contenedor Perfil -->
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