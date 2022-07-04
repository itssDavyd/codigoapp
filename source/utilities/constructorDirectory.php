<?php

/**
 * Contructor de rutas.
 * 
 * Esta funcion crea rutas alternativas para evitar errores en la carga de las mismas y repeticiones
 * en los diferentes archivos que las usan.
 * 
 * @return join ruta con los valores predefinidos al usar la funcion en los diferentes archivos.
 */

function build_Path(...$values)
{
    return join("/", $values);
}
