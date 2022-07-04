<?php

/**
 * GET JSON.
 * 
 * Funcion para obtener la conexion con el JSON mappeado y devolverlo en la view.
 * @param mixed $url
 * 
 * Se obtiene a base de POSTMAN.
 * 
 * @return json Respuesta procesada en String.
 */

function getJsonConnect($url)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
}
