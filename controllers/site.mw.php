<?php
//middleware de configuración de todo el sitio
  require_once("models/usuarios.model.php");
function site_init(){
    addToContext("page_title","Institulo Marcial Solis Dacosta");

    if(isset($_SESSION["usrnom"])){
    addToContext("page_log",$_SESSION["usrnom"]);
    addToContext("page_login","logout");
    addToContext("page_aportaciones","<li><a href='index.php?page=aportaciones'>aportaciones</a></li>");
  }else
  {
    addToContext("page_log","Invitado");
    addToContext("page_login","login");
  }
}

site_init();
?>
