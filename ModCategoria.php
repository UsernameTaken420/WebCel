<?php
  include "verificarMySQL.inc";
  try {
    include "database.inc";
    $id      = $_POST["ID"];
    $nombre  = utf8_decode($_POST["NOM"]);
    $sql = "UPDATE categorias SET nomCAT = '$nombre' where idCAT = $id";
    $query = mysql_query($sql,$conex);
    verificarMySQL($query);
    // cerrar conexión
    mysql_close($conex);
    // volver al formulario
    header("location: categoriasMod.php");
  } catch (exception $e) {
    header('Location: 404.php?msg=Error al conectar con la base de datos');
  }
?>