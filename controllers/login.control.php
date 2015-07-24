<?php
/* Login Controller
 * 2014-10-14
 * Created By OJBA
 * Last Modification 2014-10-14 20:04
 */
  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");


  function run(){

    $userName = "";
    $returnUrl = "";
    $errores = array();
    if(isset($_POST["btnLogin"])){
        $userName = $_POST["txtUser"];
        $pswd = $_POST["txtPswd"];
        $returnUrl = $_POST["returnUrl"];
        $usuario = obtenerUsuario($userName);
        if($usuario){
          $salt = $usuario["usrfching"];
          if ($salt % 2 == 0){
            $pswd =  $pswd . $salt;
            print_r($pswd);
          }else {
            $pswd =  $salt . $pswd;
            print_r($pswd);
          }


          print_r(md5($pswd));
          print_r(" // ");
          print_r($usuario["usrpwd"]);
          if($usuario["usrpwd"] == $pswd){
            mw_setEstaLogueado($userName, true);
            header("Location:index.php" . $_POST["returnUrl"]);
            die();
          }else{
            $errores[] = array("errmsg"=>"Credenciales Incorrectas 1");
          }
        }else{
          $errores[] = array("errmsg"=>"Credenciales Incorrectas 2");
        }
    }

    if(isset($_GET["returnUrl"])){
      $returnUrl = urldecode($_GET["returnUrl"]);
    }
    //si llega aqui algo sucedio asi que hay que rendizar nuevamente el login
    $datos = array("txtUser" => $userName,
                   "returnUrl" => $returnUrl,
                   "mostrarErrores" => (count($errores)>0),
                   "errores" => $errores);

    renderizar("login", $datos);

  }

  run();
?>
