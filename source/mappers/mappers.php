<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "mensajeForo.php"));


/**
 * Funcion de Modelar los Modelos de la base de datos. (DEPRECATED v.0.7).
 * @param String $dbMensaje
 * 
 * @return [OBJETO MensajeForo] con los datos ordenados de la forma que nos interesa mapear.
 */
function bd2ModelMensajeMapper($dbMensaje)
{
    $modelMensaje = new model\MensajeForo($dbMensaje["ID_POST"], $dbMensaje["Titulo"], $dbMensaje["texto"], $dbMensaje["nombrePersona"], $dbMensaje["fecha_Post"]);

    return $modelMensaje;
}

// function bd2ModelPersonaMapper($dbPersona)
// {
//     $modelPersona = new Persona($dbPersona["ID_Persona"], $dbPersona["Nombre"], $dbPersona["Apellidos"], $dbPersona["email"], $dbPersona["telefono"], $dbPersona["Provincia"], $dbPersona["Ciudad"], $dbPersona["Usuario"], $dbPersona["Pass"]);

//     return $modelPersona;
// }
