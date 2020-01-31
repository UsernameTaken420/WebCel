<?php
  include "verificarMySQL.inc";
  $id = $_GET["id"];
  try {
    include "database.inc";
    $sql = "SELECT * FROM categorias WHERE idCAT = ";
    $sql .= $id;
    $result = mysql_query($sql, $conex);
    verificarMySQL($result);
    verificarMySQL(mysql_num_rows($result) > 0); //Con esto verificamos que no haya devuelto una fila vacía
    $arreglo = mysql_fetch_array($result);
    $nombre      = $arreglo["nomCAT"];
    mysql_close($conex);
  } catch (exception $e) {
    header("Location: 404.php?msg=Error con la base de datos");
  }
?>
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
      <form id="modCAT" action="ModCategoria.php" method="POST">
        <table>
          <tr>
            <td>ID de la categor&iacute;a: </td>
            <td>
              <input type="number"
                     id="idCAT"
                     name="ID"
                     value=<?php
                      echo "$id";
                     ?>
                     readonly
              />
            </td>
          </tr>
          <td>Nombre de la categor&iacute;a</td>
            <td>
              <input id="nomCAT"
                     type="text"
                     name="NOM"
                     maxlength="25"
                     title="M&aacute;ximo 25 caracteres"
                     value=<?php
                      echo "$nombre";
                     ?>
              />
            </td>
          <tr>
            <td colspan="2">
              <input type="submit" value="Confirmar" />
              <input type="button"  value="Cancelar" onclick="window.location.replace('categoriasMod.php');"/>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>