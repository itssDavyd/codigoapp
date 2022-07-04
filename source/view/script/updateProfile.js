/**
 * @brief <h4>Redireccion por boton a editar perfil.</h4>
 * 
 * <p>Funcion para mostrar el formulario de updatear perfil por redireccion.</p>
 * @param {*} click
 * 
 * @version 1.0
 * @size 0.5
 * Return redireccion de formularios entre paginas.
 */


let updateProfile = (click) => {
    if (click == "save") {
        window.location.href = "./perfilUsuario.php";
    }
    if (click == "update") {
        window.location.href = "../html/editarPerfil.php";
    }
};