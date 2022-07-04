<?php
// Proceso de LogOut al pulsar el boton.

session_start();
session_unset();
session_destroy();


header("Location: /codigoapp/index.php");
