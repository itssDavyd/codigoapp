/**
 * @brief Funcion para mostrar o esconder texto del leer[mas].
 * @param {*} id
 *
 * @version 1.0
 * @size 0.5
 * Return stylos del texto.
 */

let vermas = (ele) => {
    let e = $(ele);
    let content = e.parent().parent().find(".contenido");

    if (e.attr("data-dir") == "up") {
        let down = e.parent().find(".down");
        down.removeClass("hidden");
        down.addClass("show");
        e.removeClass("show");
        content.removeClass("show");
        e.addClass("hidden");
        content.addClass("hidden");
    } else {
        let up = e.parent().find(".up");
        up.removeClass("hidden");
        up.addClass("show");
        e.removeClass("show");
        content.removeClass("hidden");
        e.addClass("hidden");
        content.addClass("show");
    }
};