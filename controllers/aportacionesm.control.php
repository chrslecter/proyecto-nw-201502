<?php
/* Category Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/aportaciones.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["aportacionesTitle"] = "";
    $htmlDatos["aportacionesMode"] = "";
    $htmlDatos["aportacionesCod"] = "";
    $htmlDatos["aportacionesCan"]="";
    $htmlDatos["aportacionesDes"] = "";
    $htmlDatos["disabled"]="";

    if(isset($_GET["mode"])){
      switch($_GET["mode"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["aportacionesTitle"] = "Ingreso de Nueva aportacion";
          $htmlDatos["aportacionesMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            print_r($_POST);
            $lastID = insertarAportaciones($_POST);
            if($lastID){
              redirectWithMessage("¡aportacion Ingresado!","index.php?page=aportacionesm&mode=ins&aportacionesCod=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
              // $htmlDatos["doceId"] = $_POST["doceId"];
              // $htmlDatos["docNom"]=$_POST["docNom"];
              // $htmlDatos["rolrol"]=$_POST["rolest"];
              // $htmlDatos["actSelected"]=($_POST["rolest"] =="ACT")?"selected":"";
              // $htmlDatos["inaSelected"]=($_POST["rolest"] =="INA")?"selected":"";

              $htmlDatos["aportacionesCod"] = $_POST["aportacionesCod"];
              $htmlDatos["aportacionesCan"]= $_POST["aportacionesCant"];
              $htmlDatos["aportacionesDes"] = $_POST["aportacionesDes"];



            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("aportacionesm", $htmlDatos);
          break;


          case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarAportaciones($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Aportacion Actualizada!","index.php?page=aportacionesm&mode=upd&aportacionesCod=".$_POST["aportacionesCod"]);
            }
          }
          if(isset($_GET["aportacionesCod"])){
            $aportaciones = obtenerAportaciones($_GET["aportacionesCod"]);
            print_r($aportaciones);
            if($aportaciones){
              $htmlDatos["aportacionesTitle"] = "Actualizar ".$aportaciones["aportacionesCod"];
              $htmlDatos["aportacionesMode"] = "upd";
              $htmlDatos["portacionesCod"] = $aportaciones["aportacionesCod"];
              $htmlDatos["aportacionesDes"] = $aportaciones["aportacionesDes"];
              $htmlDatos["aportacionesCan"]= $aportaciones["aportacionesCant"];


              renderizar("aportacionesm", $htmlDatos);
            }else{
              redirectWithMessage("Aportacion No Encontrada!","index.php?page=aportaciaportaciones");
            }
          }else{
            redirectWithMessage("Aportacion No se Encontrada!","index.php?page=aportaciaportaciones");
          }
          break;


          defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=aportaciaportaciones");
          break;


          case "dlt":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
          if(borrarAportaciones($_POST["aportacionesCod"])){
          //forzando a que se actualice con los datos de la db
          redirectWithMessage("¡aportacion Borrado!","index.php?page=aportaciones");
          }
          }
          if(isset($_GET["aportacionesCod"])){
            $aportaciones = obtenerAportaciones($_GET["aportacionesCod"]);
            if($aportaciones){
              $htmlDatos["aportacionesMode"] = "dlt";
              $htmlDatos["aportacionesCod"] = $aportaciones["aportacionesCod"];
              $htmlDatos["aportacionesDes"]=$aportaciones["aportacionesDes"];
              $htmlDatos["aportacionesCant"]=$aportaciones["aportacionesCant"];

              renderizar("aportacionesm", $htmlDatos);
            }else{
              redirectWithMessage("aportaciones No Encontrada!","index.php?page=aportaciones");
            }
          }else{
            redirectWithMessage("aportaciones No Encontrada!","index.php?page=aportaciones");
          }
          break;
        }


  }
}
  run();
?>
