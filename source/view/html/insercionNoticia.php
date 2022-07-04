<!-- Formulario Insertar Noticias -->

<form action="/codigoapp/source/controller/controllerMensajeForoInsertNotice.php" method="post" id="creacionNoticia" class="d-none p-3 mt-3 formuFiltrar" style="background-color: rgb(239, 240, 245);">
    <div class="mb-3 col-md-12">
        <label for="tituloNoticia" class="form-label">Titulo: </label>
        <input name="titulo" type="text" class="form-control" id="tituloNoticia">
    </div>
    <div class="mb-3">
        <label for="cuerpoNoticia" class="form-label">Cuerpo: </label>
        <textarea name="texto" class="form-control" id="cuerpoNoticia" rows="3"></textarea>
    </div>
    <select class="form-select" aria-label="Default select example" name="idcategoria">
        <?php
        $categorias = getJsonConnect('http://localhost/codigoapp/source/controller/controllerCategorias.php');

        foreach ($categorias as $categoria) {
        ?>
            <option value="<?php echo $categoria->ID_Categoria ?>"><?php echo $categoria->Nombre_Cat ?></option>
        <?php } ?>
    </select>
    <div class="mb-3 col-md-12">
        <label for="fechaPost" class="form-label">Fecha Post: </label>
        <input class="form-control" type="date" name="fechaPost" />
    </div>
    <div class="mb-3 col-md-12">
        <label for="horaPost" class="form-label">Hora Post: </label>
        <input class="form-control" type="time" name="horaPost" />
    </div>
    <button name="publicarName" id="publicar" onclick="showHideAddNotice('publicar')" type="submit" class="btn btn-outline-success mt-2 float-end">Publicar</button>
</form>