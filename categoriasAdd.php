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
      <form id="addCAT" action="AgregarCategoria.php" method="POST">
        <table>
          <tr>
            <td>Nombre de la categor&iacute;a</td>
            <td>
              <input id="nomCAT"
                     type="text"
                     name="NOM"
                     maxlength="25"
                     title="M&aacute;ximo 25 caracteres"
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
