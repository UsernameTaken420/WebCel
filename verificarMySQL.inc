<?php
  /* Usamos esta función para que si en cualquier momento falla la conexión
  o se comete un error se redirija al usuario a la página de error */
  function verificarMySQL($conn) {
    if($conn == false) {
      mysql_close($conn);
      throw new exception('Error al conectar con la base de datos');
    }
    return true;
  }
?>
