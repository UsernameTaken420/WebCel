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
      <form id="delPRO" action="confirmarProductoDelete.php" method="GET">
        <table>
          <tr>
            <td>ID del producto: </td>
            <td>
              <input type="number"
                     id="idPRO"
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
