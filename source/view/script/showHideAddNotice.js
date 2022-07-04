/**
 * @brief <h4>Mostrar ocultar formularios de insertarNoticia+filtro.</h4>
 * 
 * <p>Funcion para mostrar o esconder los formularios de insertarNoticia + filtrar Noticias por categoria.</p>
 * @param {*} e
 * 
 * @version 1.0
 * @size 0.5
 * Return stylos del formulario.
 */


let showHideAddNotice = (e) => {
    if (e == "showId") {
        $("#filterCategoria").addClass("d-none")
        $("#filtrarFechas").addClass("d-none")
        $("#creacionNoticia").removeClass("d-none")
        $("#creacionNoticia").addClass("d-block")
    }

    if (e == "publicar") {
        $("#creacionNoticia").removeClass("d-block")
        $("#creacionNoticia").addClass("d-none")
    }

    if (e == "showFilter") {
        $("#creacionNoticia").addClass("d-none")
        $("#filtrarFechas").addClass("d-none")
        $("#filterCategoria").removeClass("d-none")
        $("#filterCategoria").addClass("d-block")
    }

    if (e == "showFechas") {
        $("#creacionNoticia").addClass("d-none")
        $("#filterCategoria").addClass("d-none")
        $("#filtrarFechas").removeClass("d-none")
        $("#filtrarFechas").addClass("d-block")
    }

    if (e == "filterCat") {
        $("#filterCategoria").removeClass("d-block")
        $("#filterCategoria").addClass("d-none")
    }
}