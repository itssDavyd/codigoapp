<!-- Formulario Rocket -->
<form action="<?php echo htmlspecialchars("../../controller/modificarStats.php"); ?>" method="post" id="rocketFormId">

    <div class="row g-3 align-items-center  p-1">
        <div class="col-3">
            <label for="inputPassword6" class="col-form-label">MMR: </label>
        </div>
        <div class="col-6">
            <input name="mmr" value="<?php echo $mmr ?>" type=" text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" title="Introduce el MMR que dispongas.">
        </div>
    </div>

    <div class="row g-3 align-items-center  p-1">
        <div class="col-3">
            <label for="inputPassword6" class="col-form-label">Numero de horas: </label>
        </div>
        <div class="col-6">
            <input name="nHoras" value="<?php echo $nHoras ?>" type=" text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" title="Introduce el numero de horas jugadas.">
        </div>
    </div>

    <div class="row g-3 align-items-center  p-1">
        <div class="col-3">
            <label for="inputPassword6" class="col-form-label">Numero de goles: </label>
        </div>
        <div class="col-6">
            <input name="goles" value="<?php echo $goles ?>" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" title="Introduce el numero de goles marcados.">
        </div>
    </div>

    <div class="row g-3 align-items-center  p-1">
        <div class="col-3">
            <label for="inputPassword6" class="col-form-label">Numero de salvadas: </label>
        </div>
        <div class="col-6">
            <input name="saves" value="<?php echo $saves ?>" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" title="Introduce el numero de salvadas en partidos.">
        </div>
    </div>

    <button type="submit" class="btn btn-outline-primary" name="saveFormRL">Guardar Estadisticas</button>

</form>