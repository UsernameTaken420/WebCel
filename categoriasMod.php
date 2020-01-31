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
      <form id="modCAT" action="confirmarCategoriaMod.php" method="GET">
        <table>
          <tr>
            <td>ID de la categor&iacute;a: </td>
            <td>
              <input type="number"
                     id="idCAT"
                     name="id"
                     required
              />
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" value="Insertar" />
              <input type="reset"  value="Cancelar" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>
