<?php
//spl_autoload_register PARA PODER LLAMAR A UNA CALLBACK (FUNCION ANONIMA);
//spl_autoload_call PARA PODER LLAMAR PERO CON FUNCION CON NOMBRE;
spl_autoload_register(function ($nombre_clase) {
    $clase = explode("\\", $nombre_clase);

    $file = $_SERVER["DOCUMENT_ROOT"] . "/codigoapp/source/model/" . $clase[1] . ".php";
    if (!empty($file)) {
        if (file_exists($file)) {
            include("/codigoapp/source/model/" . $clase[1] . ".php");
        }
    }
});
