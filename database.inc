<?php
    $conex = mysql_connect("localhost","root","");
    verificarMySQL($conex);
    $selDB = mysql_select_db("webcel", $conex);
    verificarMySQL($selDB);
?>