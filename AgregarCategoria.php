<?php
  include "verificarMySQL.inc";
  try {
    include "database.inc";
    $nombre = utf8_decode($_POST["NOM"]);
    $sql = "INSERT INTO categorias values (";
    $sql .= "null, '$nombre')";
    $query = mysql_query($sql, $conex);
    verificarMySQL($query);
    mysql_close($conex);
    header("location: categoriasAdd.php");
  } catch (exception $e) {
    header('location: 404.php?msg=Error al conectar con la base de datos');
  }
?>