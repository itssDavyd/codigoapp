<?php

/**
 * Funcion para rederizar variables en includes.
 * 
 * Esta funcion usa el renderizado de variables, le pasamos un archivo a incluir,
 * posteriormente le aplicamos unas variables en un array, las cuales despues usaremos
 * en este archivo y asi evitamos el tener que incluir todo del mismo y nos sea mas facil
 * cambiar estas dichas variables.
 * 
 * @param mixed $filePath Path de el include que deseas aplicarle este buffer.
 * @param array $variables las cuales deseas usar de tu path.
 * @param bool $print output ya buffeado, nos devuelve el uso de la variable magicamente.
 * 
 * FUENTE SACADA DE : https://stackoverflow.com/questions/11905140/php-pass-variable-to-include
 * 
 * @return [type]
 */
function includeWithVariables($filePath, $variables = array(), $print = true)
{
    $output = NULL;
    if (file_exists($filePath)) {
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include $filePath;

        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;
}
