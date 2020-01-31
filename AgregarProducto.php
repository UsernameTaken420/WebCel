<?php
  include "verificarMySQL.inc";
  try {
    include "database.inc";
    $precio      = $_POST["PRE"];
    $marca       = utf8_decode($_POST["MAR"]);
    $modelo      = utf8_decode($_POST["MOD"]);
    $descripcion = utf8_decode($_POST["DES"]);
    $pais        = $_POST["PAI"];
    $categoria   = $_POST["CAT"];
    $sql = "INSERT INTO productos VALUES ";
    $sql .= "(null, $precio, '$marca', '$modelo', '$descripcion', '$pais', $categoria)";
    $query = mysql_query($sql,$conex);
    verificarMySQL($query);
    // cerrar conexión
    mysql_close($conex);
    // volver al formulario
    header("location: productoAdd.php");
  } catch (exception $e) {
    header('Location: 404.php?msg=Error al conectar con la base de datos');
  }
?>