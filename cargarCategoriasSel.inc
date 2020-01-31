<?php
  try {
    include "database.inc";
    $sql = "SELECT * from categorias";
    $result = mysql_query($sql, $conex);
    verificarMySQL($result);
    while ($regCAT = mysql_fetch_array($result)) {
      $idcat     = $regCAT["idCAT"];
      $nomcat = utf8_encode($regCAT["nomCAT"]);
      echo "<option value='$idcat'>$nomcat</option>\n";
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