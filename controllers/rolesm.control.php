<?php
/* Category Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/roles.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["rolTitle"] = "";
    $htmlDatos["rolMode"] = "";
    $htmlDatos["rolid"] = "";
    $htmlDatos["roldsc"]="";
    $htmlDatos["rolest"]="";
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    $htmlDatos["disabled"]="";

    if(isset($_GET["mode"])){
      switch($_GET["mode"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["rolTitle"] = "Ingreso de Nueva rol";
          $htmlDatos["rolMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarRoles($_POST);
            if($lastID){
              redirectWithMessage("¡Rol Ingresado!","index.php?page=rolesm&mode=ins&ctgid=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
              $htmlDatos["rolid"] = $_POST["rolid"];
              $htmlDatos["roldsc"]=$_POST["roldsc"];
              $htmlDatos["rolrol"]=$_POST["rolest"];
              $htmlDatos["actSelected"]=($_POST["rolest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["rolest"] =="INA")?"selected":"";
            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("rolesm", $htmlDatos);
          break;


          case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarRoles($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Categoría Actualizada!","index.php?page=rolesm&mode=upd&rolcod=".$_POST["rolcod"]);
            }
          }
          if(isset($_GET["rolcod"])){
            $roles = obtenerRol($_GET["rolcod"]);
            if($roles){
              $htmlDatos["rolTitle"] = "Actualizar ".$roles["roldsc"];
              $htmlDatos["rolMode"] = "upd";
              $htmlDatos["rolid"] = $roles["rolcod"];
              $htmlDatos["roldsc"]=$roles["roldsc"];
              $htmlDatos["rolest"]=$roles["rolest"];
              $htmlDatos["actSelected"]=($roles["rolest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($roles["rolest"] =="INA")?"selected":"";
              renderizar("rolesm", $htmlDatos);
            }else{
              redirectWithMessage("¡Roles No Encontrada!","index.php?page=roles");
            }
          }else{
            redirectWithMessage("¡Roles No se Encontrada!","index.php?page=roles");
          }
          break;


          defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=roles");
          break;


          case "dlt":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
          if(borrarRol($_POST["rolcod"])){
          //forzando a que se actualice con los datos de la db
          redirectWithMessage("¡Categoría Borrada!","index.php?page=roles");
          }
          }
          if(isset($_GET["rolcod"])){
            $roles = obtenerRol($_GET["rolcod"]);
            if($roles){
              $htmlDatos["rolMode"] = "dlt";
              $htmlDatos["rolid"] = $roles["rolcod"];
              $htmlDatos["roldsc"]=$roles["roldes"];
              $htmlDatos["rolest"]=$roles["rolest"];
              $htmlDatos["actSelected"]=($roles["rolest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($roles["rolest"] =="INA")?"selected":"";
              $htmlDatos["disabled"]='disabled="disabled"';
              renderizar("rolesm", $htmlDatos);
            }else{
              redirectWithMessage("roles No Encontrada!","index.php?page=roles");
            }
          }else{
            redirectWithMessage("roles No Encontrada!","index.php?page=roles");
          }
          break;
        }


  }
}
  run();
?>
