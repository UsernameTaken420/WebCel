<?php
  include "verificarMySQL.inc";
  try {
    include "database.inc";
    $id          = $_POST["ID"];
    $sql = "DELETE FROM productos where idPRO = $id";
    $query = mysql_query($sql,$conex);
    verificarMySQL($query);
    // cerrar conexión
    mysql_close($conex);
    // volver al formulario
    header("location: productoDel.php");
  } catch (exception $e) {
    header('Location: 404.php?msg=Error al conectar con la base de datos');
  }
?>