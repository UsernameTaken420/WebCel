<?php
  include "verificarMySQL.inc";
  try {
    include "database.inc";
    $sql = "SELECT * from categorias";
    $result = mysql_query($sql, $conex);
    verificarMySQL($result);
    while ($regCAT = mysql_fetch_array($result)) {
      $id     = $regCAT["idCAT"];
      $nombre = utf8_encode($regCAT["nomCAT"]);
      echo "<option value='$id'>$nombre</option>\n";
    } // end while
    // cerrar conexión
    mysql_close($conex);
  } catch (exception $e) {
    header("Location: 404.php?msg=Error al conectar con la base de datos");
  }
?>