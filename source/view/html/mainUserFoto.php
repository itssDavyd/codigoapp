<!-- Edit de foto -->
<!-- https://bootdey.com/img/Content/avatar/avatar7.png -->
<div class="card am">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
            <img src="<?php echo isset($_SESSION["foto"]) ? $_SESSION["foto"] : "https://bootdey.com/img/Content/avatar/avatar7.png"; ?>" alt="<?php echo $_SESSION["nombre"]; ?>" class="rounded-circle" width="170">
            <div class="mt-3">
                <form action="/codigoapp/source/controller/controllerSubidaFoto.php" method="POST" enctype="multipart/form-data">
                    <div id="div_file">
                        <p id="texto">Selecciona</p>
                        <input type="file" name="imagen" id="btn_enviar">
                    </div>
                    <div id="div_file">
                        <p id="texto">Subir Foto</p>
                        <input type="submit" name="subir" id="btn_enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>