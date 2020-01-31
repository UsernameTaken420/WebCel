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
      <form method="get">
        <table>
          <tr>
            <td>Categor&iacute;a: </td>
            <td>
              <select id="catPRO" name="CAT">
                <option value="-1">-- Seleccione Categor&iacute;a --</option>
                <?php
                  include "cargarCategorias.inc";
                ?>
              </select>
            </td>
            <td style="padding-left: 10px;">Pa&iacute;s: </td>
            <td>
              <select id="paisPRO" name="PAI">
                <option value="-1">-- Seleccione Pa&iacute;s --</option>
                <option value="USA">USA</option>
                <option value="Alemania">Alemania</option>
                <option value="China">China</option>
              </select>
            </td>
            <td style="padding-left: 10px;">
              <input type="submit" value="Filtrar"/>
            </td>
          </tr>
        </table>
      </form>
      <table id="listadoProd">
        <?php
          try {
            include "database.inc";
            $pais = $_GET["PAI"];
            $categoria = $_GET["CAT"];
            //Esta parte es fea, descubrí que todos los strings evaluan a 0 así que tuve que pasar la opcion default como -1 y comparar acorde
            //Usar isset() tambien tenía sus propios problemas
            if ($pais > -1 || $categoria > -1) {
              if ($pais < 0) {
                $sql = "SELECT idPRO, precioPRO, marcaPRO, modeloPRO, descripcionPRO, paisPRO, nomCAT FROM productos JOIN categorias ON productos.catPRO = categorias.idCAT WHERE catPRO = $categoria";
              } elseif ($categoria < 0) {
                $sql = "SELECT idPRO, precioPRO, marcaPRO, modeloPRO, descripcionPRO, paisPRO, nomCAT FROM productos JOIN categorias ON productos.catPRO = categorias.idCAT WHERE paisPRO = '$pais'";
              } else {
                $sql = "SELECT idPRO, precioPRO, marcaPRO, modeloPRO, descripcionPRO, paisPRO, nomCAT FROM productos JOIN categorias ON productos.catPRO = categorias.idCAT WHERE paisPRO = '$pais' AND catPRO = $categoria";
              }
            } else {
              $sql = "SELECT idPRO, precioPRO, marcaPRO, modeloPRO, descripcionPRO, paisPRO, nomCAT FROM productos JOIN categorias ON productos.catPRO = categorias.idCAT";
            }
            if (isset($_GET["ORD"])) {
              $ord = $_GET["ORD"];
              $sql .= " ORDER BY $ord";
            }
            $result = mysql_query($sql, $conex);
            echo "
              <tr>
                <th class='tablaHeader'><a href='consultas.php?CAT=$categoria&PAI=$pais&ORD=idPRO'>ID</a></th>
                <th class='tablaHeader'><a href='consultas.php?CAT=$categoria&PAI=$pais&ORD=precioPRO'>Precio</a></th>
                <th class='tablaHeader'><a href='consultas.php?CAT=$categoria&PAI=$pais&ORD=marcaPRO'>Marca</a></th>
                <th class='tablaHeader'><a href='consultas.php?CAT=$categoria&PAI=$pais&ORD=modeloPRO'>Modelo</a></th>
                <th class='tablaHeader'><a href='consultas.php?CAT=$categoria&PAI=$pais&ORD=descripcionPRO'>Descripci&oacute;n</a></th>
                <th class='tablaHeader'><a href='consultas.php?CAT=$categoria&PAI=$pais&ORD=paisPRO'>Pa&iacute;s</a></th>
                <th class='tablaHeader'><a href='consultas.php?CAT=$categoria&PAI=$pais&ORD=catPRO'>Categor&iacute;a</a></th>
              </tr>
            ";
            $fila=1;
            while ($regPRO = mysql_fetch_array($result)) {
                // cargar registro
                $id          = $regPRO["idPRO"];
                $precio      = $regPRO["precioPRO"];
                $marca       = utf8_decode($regPRO["marcaPRO"]);
                $modelo      = utf8_decode($regPRO["modeloPRO"]);
                $descripcion = utf8_decode($regPRO["descripcionPRO"]);
                $pais        = $regPRO["paisPRO"];
                $categoria   = $regPRO["nomCAT"];
                $resto = $fila%2;
                if ($resto==0) {
                    // generar fila par
                    echo "<tr class='filaPAR'>\n";
                } else {
                    // generar fila impar
                    echo "<tr class='filaIMP'>\n";                    
                } // endif
                echo "                                                                
                    <td style='text-align: right;'>$id</td>\n
                    <td>$precio</td>\n       
                    <td>$marca</td>\n 
                    <td>$modelo</td>\n 
                    <td>$descripcion</td>\n 
                    <td>$pais</td>\n 
                    <td>$categoria</td>\n 
                  </tr>\n
                ";
                // incrementar fila
                $fila++;                
            } // end while
            // cerrar conexión
            mysql_close($conex);
          } catch (exception $e) {
            header("Location: 404.php?msg=Error al conectar con la base de datos");
          }
        ?>
      </table>
    </div>
  </body>
</html>