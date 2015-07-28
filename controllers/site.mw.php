<?php
//middleware de configuración de todo el sitio
  require_once("models/usuarios.model.php");
function site_init(){
    addToContext("page_title","Institulo Marcial Solis Dacosta");
    $log=estaLogueado();
    addToContext("page_log",$log);

    if(isset($_SESSION["Nombre"])){
    addToContext("page_login","logout");
  }else
  {
    addToContext("page_login","login");
  }
}

site_init();
?>
