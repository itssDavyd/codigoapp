<?php

/**
 * Funcion para guardar los logs del login por nombre/id_usuario/fecha_login.
 */

function saveLogs()
{
    $fecha = date('d-m-Y H:i:s');
    if (!file_exists("logs.xml")) {

        $xstr = '<?xml version="1.0" encoding="UTF-8"?><logs/>';
        $xml = simplexml_load_string($xstr);

        $log = $xml->addChild('log');
        $login = $log->addChild('login');
        $login->addAttribute('id', 1);
        $login->addChild('id', $_SESSION["ID"]);
        $login->addChild('nombre', $_SESSION["nombre"]);
        $login->addChild('fecha', $fecha);
        $xml->asXML('logs.xml');

        //rename("/codigoapp/logs.xml", "/codigoapp/asset/log/logs.xml");
    } else {

        $xml = simplexml_load_file('logs.xml') or die('Imposible cargar el fichero XML');
        $numlogin = count($xml->log->login);
        $ultimoId = $xml->log->login[($numlogin - 1)]['id'];

        foreach ($xml->log as $loge) {

            $login = $loge->addChild('login');
            $login->addAttribute('id', $ultimoId + 1);
            $login->addChild('id', $_SESSION["ID"]);
            $login->addChild('nombre', $_SESSION["nombre"]);
            $login->addChild('fecha', $fecha);
            $xml->asXML('logs.xml');
        }
    }
}
