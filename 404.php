<!DOCTYPE html>
<html>
  <head>
    <title>WebCel</title>
    <link rel="stylesheet" href="style.css"/>
  </head>
  <body>
    <!-- Barra de navegación -->
    <?php
      include "sidebar.inc";
    ?>
    <!-- Sección principal de la página -->
    <div class="maintext">
      <?php
        // capturar mensaje de error
        $mensaje = $_GET["msg"];
        echo "<p class='errorMSG'>$mensaje</p>\n";
      ?>
    </div>
  </body>
</html>