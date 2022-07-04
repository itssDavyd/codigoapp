<?php

/**
 * Pagina de errores con alertas para confirmaciones de cambios y updates.
 * 
 * En esta pagina tratamos los errores que pueda generar la pagina mas los mensajes que se generan cuando se updatea/cambia algo, para asi disponer de los mismos 
 * ordenadamente.
 */

require_once("constructorDirectory.php");
$PAGINA_INICIO = build_Path("..", "..", "index.php");
$PAGINA_REGISTRO = build_Path("..", "view", "html", "register.php");
$PAGINA_PERFIL = build_path("..", "view", "html", "perfilUsuario.php");

if (isset($_GET["errorUser"])) {

  echo "<script>
            alert('Este usuario no existe')
            window.location='$PAGINA_INICIO'
          </script>";
}

if (isset($_GET["errorPass"])) {
  echo "<script>
          alert('La contraseña no coincide')
          window.location='$PAGINA_INICIO'
        </script>";
}

if (isset($_GET["userYa"])) {
  echo "<script>
          alert('Este Usuario Ya Existe')
          window.location='$PAGINA_REGISTRO'
        </script>";
} elseif (isset($_GET["emailYa"])) {
  echo "<script>
            alert('Este Email Ya Existe')
            window.location='$PAGINA_REGISTRO'
          </script>";
} elseif (isset($_GET["tlfYa"])) {
  echo "<script>
            alert('Este Telefono Ya Existe')
            window.location='$PAGINA_REGISTRO'
          </script>";
}

if (isset($_GET["StatsError"])) {
  echo "<script>
          alert('Faltan Campos por Rellenar')
          window.location='$PAGINA_PERFIL'
        </script>";
}

if (isset($_GET["StatsUpdate"])) {
  echo "<script>
          alert('Estadisticas Actualizadas')
          window.location='$PAGINA_PERFIL'
        </script>";
}

if (isset($_GET["StatsSaves"])) {
  echo "<script>
          alert('Estadisticas Guardadas')
          window.location='$PAGINA_PERFIL'
        </script>";
}

if (isset($_GET["SubidaIMG"])) {
  echo "<script>
          alert('Foto de Perfil Actualizada Correctamente')
          window.location='$PAGINA_PERFIL'
        </script>";
}
