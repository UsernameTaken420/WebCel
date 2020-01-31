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
      <h3 style="text-align: center;">Lista de categor&iacute;as en el sistema</h3>
      <table id="listadoCats">
        <?php
          include "verificarMySQL.inc";
          try {
            include "database.inc";
            $sql = "SELECT * FROM categorias";
            if (isset($_GET["ORD"])) {
              $ord = $_GET["ORD"];
              $sql .= " ORDER BY $ord";
            }
            $result = mysql_query($sql, $conex);
            echo "
              <tr>
                <th class='tablaHeader'><a href='listaCategorias.php?ORD=idCAT'>ID</a></th>
                <th class='tablaHeader'><a href='listaCategorias.php?ORD=nomCAT'>Nombre</a></th>
              </tr>
            ";
            $fila=1;
            while ($regCAT = mysql_fetch_array($result)) {
                // cargar registro
                $id             = $regCAT["idCAT"];
                $nombre         = utf8_encode($regCAT["nomCAT"]);
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
                    <td>$nombre</td>\n                             
                  </tr>\n
                ";
                // incrementar fila
                $fila++;                
            } // end while
            // cerrar conexión
            mysql_close($conex);
          } catch (exception $e) {
            header("Location: 404.php?msg=Error al conectarse a la base de datos");
          }
        ?>
      </table>
    </div>
  </body>
</html>