<!-- Formulario LOL -->

<form action="<?php echo htmlspecialchars("../../controller/modificarStats.php"); ?>" method="post" id="lolFormId">

    <div class="row g-3 m-1 align-items-center p-1">
        <div class="col-3">
            <label for="inputPassword6" class="col-form-label">MMR: </label>
        </div>
        <div class="col-6">
            <input name="mmr" value="<?php echo $mmr ?>" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" title="Introduce el MMR que dispongas.">
        </div>

    </div>

    <div class="row g-3 align-items-center p-1">
        <div class="col-3">
            <label for="inputPassword6" class="col-form-label">Numero de horas: </label>
        </div>
        <div class="col-6">
            <input name="nHoras" value="<?php echo $nHoras ?>" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" title="Introduce el numero de horas jugadas.">
        </div>
    </div>

    <div class="row g-3 align-items-center p-1">
        <div class="col-3">
            <label for="inputPassword6" class="col-form-label">Rol: </label>
        </div>
        <div class="col-6">
            <input name="rol" value="<?php echo $rol ?>" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" title="Introduce tu posicion en el juego.">
        </div>
    </div>

    <button type="submit" class="btn btn-outline-primary" name="saveFormLOL">Guardar Estadisticas</button>

</form>