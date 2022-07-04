<?php

// para poder realizar esto necesitas composer require phpmailer/phpmailer desde bash

use PHPMailer\PHPMailer\PHPMailer;

function composerMail($user, $email)
{
    require "vendor/autoload.php";
    $mail = new PHPMailer();

    $mail->IsSMTP();
    // cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug = 0;
    //	Establece la autentificación SMTP. Por defecto a False
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    //	Establece el servidor SMTP. Pueden ser varios separados por ;
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;

    // Introducir usuario de google
    $mail->Username = "david42fragoso@gmail.com";
    // Introducir clave
    $mail->Password = "fragoso42";
    $mail->SetFrom('david42fragoso@gmail.com', 'Te has registrado correctamente en Notigames !!');
    /*
 * Para especificar el asunto. Utilizamos la función utf8_decode para que muestre
 * correctamente los acentos.
 */
    $mail->Subject = utf8_decode("Registro Notigames");
    $texto = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Notigames</title><meta charset = "UTF-8"></head>
    <body>	
        <h1>Bienvenido al equipo, disfruta de los beneficios del foro.</h1>
        <p>
            Username : ' . $user . '
        </p>
        <p>
        Email : ' . $email . '
    </p>
    </body>
</html>';
    // cuerpo
    $mail->MsgHTML($texto);
    /*
 * bool AddAttachment ( $path, $name, [$encoding = "base64"], [$type = "application/octet-stream"] )	
 * Añade un fichero adjunto al mensaje. Retorna false si el fichero no pudo ser encontrado.
 * $path, es la ruta del archivo puede ser relativa al script php (no a la clase PHPMailer) 
 * o una ruta absoluta. Se aconseja usar rutas relativas
 * $name, nombre del fichero
 * $encoding, tipo de codificación. Se aconseja dejar la predeterminada
 * $type, el valor por defecto funciona con cualquier clase de archivo. Se puede 
 * usar un tipo específico como por ejemplo image/jpeg
 */
    $mail->addAttachment("../img/index.jpeg");

    // destinatario
    $address = "davi123fragoso@gmail.com";
    /*
 * AddAddress	void AddAddress ( $address, $name )	
 * Añade una dirección de destino del mensaje. El parámetro $name es opcional
 */
    $mail->AddAddress($address, "Destinatario correo");

    /*
 * bool Send ( )	
 * Envía el mensaje, devuelve false si ha habido algún problema. 
 * Consultando la propiedad ErrorInfo se puede saber cuál ha sido el problema
 */
    $resul = $mail->Send();

    if (!$resul) {
        echo "Error" . $mail->ErrorInfo;
    } else {
        echo "<br>Enviado correctamente";
    }
}
