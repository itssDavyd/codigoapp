<?php

/**
 * @brief <h4>Carga de configuracion servidor.</h4>
 * 
 * <p>Esta funcion sirve para cargar la configuracion del servidor a base de un xml que se verifica con un xsd.</p>
 * 
 * @param String $fichero_xml
 * @param String $fichero_xsd
 * 
 * @version 1.0
 * @size 0.3
 * 
 * @return array con el xml cargado.
 */
function leer_configuracion($fichero_xml, $fichero_xsd)
{

    $config = new \DOMDocument();
    //CARGAR FICHERO EN DOM
    $config->load($fichero_xml);

    //VALIDAD FICHERO.
    if ($config->schemaValidate($fichero_xsd)) {
        $xml = simplexml_load_file($fichero_xml);
    } else {
        exit('fallo al abrir archivo ' . $fichero_xml);
    }
    $arrXML = [];
    foreach ($xml as $user) {
        $arrXML[] = $user;
    }

    return $arrXML;
}
