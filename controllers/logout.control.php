<?php
/* Home Controller
 * 2014-10-14
 * Created By OJBA
 * Last Modification 2014-10-14 20:04
 */
  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");
  function run(){
    logout();
      header("Location:index.php");
  }renderizar("home",array());


  run();

?>
