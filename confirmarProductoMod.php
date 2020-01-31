<?php
  include "verificarMySQL.inc";
  $id = $_GET["id"];
  try {
    include "database.inc";
    $sql = "SELECT * FROM productos WHERE idPRO = ";
    $sql .= $id;
    $result = mysql_query($sql, $conex);
    verificarMySQL($result);
    verificarMySQL(mysql_num_rows($result) > 0); //Con esto verificamos que no haya devuelto una fila vacía
    $arreglo = mysql_fetch_array($result);
    $precio      = $arreglo["precioPRO"];
    $marca       = utf8_decode($arreglo["marcaPRO"]);
    $modelo      = utf8_decode($arreglo["modeloPRO"]);
    $descripcion = utf8_decode($arreglo["descripcionPRO"]);
    $pais        = $arreglo["paisPRO"];
    $categoria   = $arreglo["catPRO"];
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
    <script type="text/javascript" src="funciones.js"></script>
  </head>
  <body>
    <!-- Barra de navegación -->
    <?php
      include "sidebar.inc";
    ?>
    <!-- Sección principal de la página -->
    <div class="maintext">
      <form id="addPRO" action="ModProducto.php" method="POST">
        <table>
          <tr>
            <td>ID del producto: </td>
            <td>
              <input type="number"
                     id="idPRO"
                     name="ID"
                     value=<?php
                      echo "$id";
                     ?>
                     readonly
              />
            </td>
          </tr>
          <tr>
            <td>Precio</td>
            <td>
              <input id="precioPRO"
                     type="text"
                     name="PRE"
                     maxlength="5"
                     title="M&aacute;ximo 5 d&iacute;gitos"
                     value=<?php
                      echo "$precio";
                     ?>
              />
            </td>
          </tr>
          <tr>
            <td>Marca</td>
            <td>
              <input id="marcaPRO"
                     type="text"
                     name="MAR"
                     maxlength="50"
                     title="M&aacute;ximo 50 caracteres"
                     value=<?php
                      echo "$marca";
                     ?>
              />
            </td>
          </tr>
          <tr>
            <td>Modelo</td>
            <td>
              <input id="modeloPRO"
                     type="text"
                     name="MOD"
                     maxlength="50"
                     title="M&aacute;ximo 50 caracteres"
                     value=<?php
                      echo "$modelo";
                     ?>
              />
            </td>
          </tr>
          <tr>
            <td>Descripci&oacute;n</td>
            <td>
              <input id="descripcionPRO"
                     type="text"
                     name="DES"
                     maxlength="50"
                     title="M&aacute;ximo 50 caracteres"
                     value=<?php
                      echo "$descripcion";
                     ?>
              />
            </td>
          </tr>
          <tr>
            <td>Pa&iacute;s</td>
            <td>
              <select id="paisPRO" name="PAI">
                <option value="0">-- Seleccione Pa&iacute;s --</option>
                <option value="USA" <?php 
                          if ($pais == "USA") {
                            echo "selected";
                          }
                        ?>
                        >USA</option>
                <option value="Alemania" <?php 
                          if ($pais == "Alemania") {
                            echo "selected";
                          }
                        ?>
                        >Alemania</option>
                <option value="China" <?php 
                          if ($pais == "China") {
                            echo "selected";
                          }
                        ?>
                        >China</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Categor&iacute;a</td>
            <td>
              <select id="catPRO" name="CAT">
                <option value="0">-- Seleccione Categor&iacute;a --</option>
                <?php
                  try {
                    include "database.inc";
                    $sql = "SELECT * from categorias";
                    $result = mysql_query($sql, $conex);
                    verificarMySQL($result);
                    while ($regCAT = mysql_fetch_array($result)) {
                      $idcat     = $regCAT["idCAT"];
                      $nomcat = utf8_encode($regCAT["nomCAT"]);
                      if ($idcat == $categoria) {
                        echo "<option value='$idcat' selected>$nomcat</option>\n";
                      } else {
                        echo "<option value='$idcat'>$nomcat</option>\n";
                      }
                    } // end while
                    // cerrar conexión
                    mysql_close($conex);
                  } catch (exception $e) {
                    header("Location: 404.php?msg=Error al conectar con la base de datos");
                  }
                ?>
              </select>
            </td>
          </tr>
          <tr>
          <td colspan="2">
            <input type="button" value="Confirmar" onclick="CheckForm();"/>
            <input type="button"  value="Cancelar" onclick="window.location.replace('productoMod.php');"/>
          </td>
        </tr>
        </table>
      </form>
    </div>
  </body>
</html>