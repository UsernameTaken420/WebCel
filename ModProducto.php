<?php
  include "verificarMySQL.inc";
  try {
    include "database.inc";
    $id          = $_POST["ID"];
    $precio      = $_POST["PRE"];
    $marca       = utf8_decode($_POST["MAR"]);
    $modelo      = utf8_decode($_POST["MOD"]);
    $descripcion = utf8_decode($_POST["DES"]);
    $pais        = $_POST["PAI"];
    $categoria   = $_POST["CAT"];
    $sql = "UPDATE productos SET ";
    $sql .= "precioPRO = $precio, ";
    $sql .= "marcaPRO = '$marca', ";
    $sql .= "modeloPRO = '$modelo', ";
    $sql .= "descripcionPRO = '$descripcion', ";
    $sql .= "paisPRO = '$pais', ";
    $sql .= "catPRO = $categoria ";
    $sql .= "where idPRO = $id";
    $query = mysql_query($sql,$conex);
    verificarMySQL($query);
    // cerrar conexión
    mysql_close($conex);
    // volver al formulario
    header("location: productoMod.php");
  } catch (exception $e) {
    header('Location: 404.php?msg=Error al conectar con la base de datos');
  }
?>