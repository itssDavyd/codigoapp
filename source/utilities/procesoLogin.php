<?php


/**
 * Imprimir formulario.
 * 
 * Esta funcion imprime el formulario, guarda el codigo html del formulario en una variable para
 * posteriormente devolverla y insertarla en otro archivo el cual necesite usar esta funcion.
 * 
 *  @return String devuelve la impresion del formulario.
 */

function imprimirFormulario()
{

    $string = "
    <div class='loginCenter'>

    <form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='post' class='formularioLoginClass'>
        <h2 style='text-align:center'>NotiGames</h2>    
        <div class='mb-3'>
            <label for='user' class='form-label'>Usuario</label>
            <input type='user' class='form-control' name='user' id='user' >
        </div>
        <div class='mb-3'>
            <label for='password' class='form-label'>Password</label>
            <input type='password' class='form-control' name='password' id='password'>
        </div>
        <button type='submit' class='btn my-2 btn-primary'>Logear</button>
        <button type='submit' name='register' class='btn my-2 btn-primary'>Registrarse</button>
        </form>
        </div>";

    return $string;
}


/**
 * Validad Usuario.
 * 
 * Esta funcion nos valida el usuario si esta bien escrito.
 * 
 * @param mixed $user
 * @param mixed $arrayUsers
 * 
 * @return bool de si fue correcto o no.
 */
function validarUser($user, $arrayUsers)
{
    foreach ($arrayUsers as $value) {
        if (strtolower($user) === strtolower($value->usuario)) {
            return true;
        }
    }
    return false;
}

/**
 * Validad Password.
 * 
 *  Esta funcion nos valida el password si esta bien escrito.
 * @param mixed $passEntry
 * @param mixed $hash
 * 
 * @return bool de si fue correcto o no.
 */
function validarPass($passEntry, $hash)
{
    if (password_verify($passEntry, $hash)) {
        return true;
    } else {
        return false;
    }
}
