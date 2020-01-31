function CheckForm() {
  var mensaje     = "No esta correcto: \n";
  var error       = false;
  var precio      = document.getElementById("precioPRO").value;
  var marca       = document.getElementById("marcaPRO").value;
  var modelo      = document.getElementById("modeloPRO").value;
  var descripcion = document.getElementById("descripcionPRO").value;
  var pais        = document.getElementById("paisPRO").value;
  var categoria   = document.getElementById("catPRO").value;
  if (precio=="" || isNaN(precio)) {
    error = true;
    mensaje = mensaje+"Precio\n";
  }
  if (marca=="") {
    error = true;
    mensaje = mensaje+"Marca\n";
  }
  if (modelo=="") {
    error = true;
    mensaje = mensaje+"Modelo\n";
  }
  if (descripcion=="") {
    error = true;
    mensaje = mensaje+"Descripci\u00F3n\n";
  }
  if (pais==0) {
    error = true;
    mensaje = mensaje+"Pa\u00EDs\n";
  }
  if (categoria==0) {
    error = true;
    mensaje = mensaje+"Categor\u00EDa\n";
  }
  if (error) {
    window.alert(mensaje);
  } else {
    document.getElementById("addPRO").submit();
  }
}