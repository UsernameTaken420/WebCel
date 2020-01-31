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
      <form id="addPRO" action="AgregarProducto.php" method="POST">
        <table>
          <tr>
            <td>Precio</td>
            <td>
              <input id="precioPRO"
                     type="text"
                     name="PRE"
                     maxlength="5"
                     title="M&aacute;ximo 5 d&iacute;gitos"
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
              />
            </td>
          </tr>
          <tr>
            <td>Pa&iacute;s</td>
            <td>
              <select id="paisPRO" name="PAI">
                <option value="0">-- Seleccione Pa&iacute;s --</option>
                <option value="USA">USA</option>
                <option value="Alemania">Alemania</option>
                <option value="China">China</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Categor&iacute;a</td>
            <td>
              <select id="catPRO" name="CAT">
                <option value="0">-- Seleccione Categor&iacute;a --</option>
                <?php
                  include "cargarCategorias.inc";
                ?>
              </select>
            </td>
          </tr>
          <tr>
          <td colspan="2">
            <input type="button" value="Insertar" onclick="CheckForm();"/>
            <input type="reset"  value="Cancelar" />          
          </td>
        </tr>
        </table>
      </form>
    </div>
  </body>
</html>