/**
 * @brief <h4>Focusear todos los inputs. (DEPRECATED v.0.2).</h4>
 * 
 * <p>Esta funcion realiza un input sobre el documento de la pagina el cual una vez tocas el teclado te pasa el focus del cursos
 * hacia un input. (Deprecated),</p>
 * 
 * @version 1.0
 * @size 0.5
 * @return focus del input.
 */

$(document).bind('keydown', function() {
    //Cambio de foco al propio input
    $('.form-control').focus()
})