<?php
session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "utilities" . DIRECTORY_SEPARATOR . "constructorDirectory.php");
require_once(build_Path(__DIR__, "..", "model", "Persona.php"));
// require_once(build_Path("..", "utilities", "autoload.php"));

use model\Persona;

function guardar_img($id)
{
    try {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        //finfo_file Devuelve información sobre un archivo
        $ext = array_search(
            finfo_file($finfo, $_FILES['imagen']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png', 'gif' => 'image/gif'
            )
        );
        finfo_close($finfo);

        // Si no es una imagen, terminamos 
        if ($ext === false) {
            throw new RuntimeException('Imagen non reconocida.');
        }
        $directorio = $_SERVER["DOCUMENT_ROOT"] . "/codigoapp/asset/imagenes/" . $id;
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
            if (file_exists($directorio)) {

                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . '/' . $id . '.' . $ext)) {
                    header("Location: /codigoapp/source/utilities/error_advertencias_log.php?SubidaIMG=1");
                } else {
                    echo "Archivo no se pudo guardar";
                }
            }
        } else {
            // Renombramos y movemos la imagen recibida a su localización definitiva
            $res = move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . '/' . $id . '.' . $ext);
            if (!$res) {
                throw new RuntimeException('La imagen no pudo ser cambiada de directorio.');
            } else {
                header("Location: /codigoapp/source/utilities/error_advertencias_log.php?SubidaIMG=1");
            }
        }
    } catch (RuntimeException $e) {
        return $e->getMessage();
    }
}
$finfo = finfo_open(FILEINFO_MIME_TYPE);

//finfo_file Devuelve información sobre un archivo
$ext = array_search(
    finfo_file($finfo, $_FILES['imagen']['tmp_name']),
    array(
        'jpg' => 'image/jpeg',
        'png' => 'image/png', 'gif' => 'image/gif'
    )
);
finfo_close($finfo);
$directorio = "/codigoapp/asset/imagenes/" . $_SESSION["ID"] . "/" . $_SESSION["ID"] .  "." . $ext;

$_SESSION["foto"] = $directorio;
$persona = new model\Persona();

$persona->guardarFoto($directorio, $_SESSION["ID"]);

guardar_img($_SESSION["ID"]);
