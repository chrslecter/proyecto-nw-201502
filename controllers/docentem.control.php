<?php
/* Category Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/docente.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["doceTitle"] = "";
    $htmlDatos["doceMode"] = "";
    $htmlDatos["doceId"] = "";
    $htmlDatos["docNom"]="";
    $htmlDatos["docDir"] = "";
    $htmlDatos["docNac"]="";
    $htmlDatos["docNombramiento"] = "";
    $htmlDatos["sexo_sexoId"]="";
    $htmlDatos["mSelected"]="selected";
    $htmlDatos["fnaSelected"]="";
    $htmlDatos["disabled"]="";

    if(isset($_GET["mode"])){
      switch($_GET["mode"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["doceTitle"] = "Ingreso de Nueva docente";
          $htmlDatos["doceMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            print_r($_POST);
            $lastID = insertarDocente($_POST);
            if($lastID){
              redirectWithMessage("¡docente Ingresado!","index.php?page=docentem&mode=ins&doceId=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
              // $htmlDatos["doceId"] = $_POST["doceId"];
              // $htmlDatos["docNom"]=$_POST["docNom"];
              // $htmlDatos["rolrol"]=$_POST["rolest"];
              // $htmlDatos["actSelected"]=($_POST["rolest"] =="ACT")?"selected":"";
              // $htmlDatos["inaSelected"]=($_POST["rolest"] =="INA")?"selected":"";

              $htmlDatos["doceId"] = $_POST["doceId"];
              $htmlDatos["docNom"]= $_POST["docNom"];
              $htmlDatos["docDir"] = $_POST["docDir"];
              $htmlDatos["docNac"]= $_POST["docNac"];
              $htmlDatos["docNombramiento"] = $_POST["docNombramiento"];
              $htmlDatos["sexo_sexoId"]= $_POST["sexo_sexoId"];
              $htmlDatos["mSelected"]=($_POST["sexo_sexoId"] =="1")?"selected":"";
              $htmlDatos["fSelected"]=($_POST["sexo_sexoId"] =="2")?"selected":"";

            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("docentem", $htmlDatos);
          break;


          case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarDocente($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Docente Actualizado!","index.php?page=docentem&mode=upd&doceId=".$_POST["doceId"]);
            }
          }
          if(isset($_GET["doceId"])){
            $docente = obtenerDocente($_GET["doceId"]);
            if($docente){
              $htmlDatos["doceTitle"] = "Actualizar ".$docente["docNom"];
              $htmlDatos["doceMode"] = "upd";
              $htmlDatos["doceId"] = $_POST["doceId"];
              $htmlDatos["docNom"]= $_POST["docNom"];
              $htmlDatos["docDir"] = $_POST["docDir"];
              $htmlDatos["docNac"]= $_POST["docNac"];
              $htmlDatos["docNombramiento"] = $_POST["docNombramiento"];
              $htmlDatos["sexo_sexoId"]= $_POST["sexo_sexoId"];
              $htmlDatos["mSelected"]=($_POST["doc_sexoId"] =="1")?"selected":"";
              $htmlDatos["fSelected"]=($_POST["doc_sexoId"] =="2")?"selected":"";
              renderizar("docentem", $htmlDatos);
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
          if(borrarDocente($_POST["doceId"])){
          //forzando a que se actualice con los datos de la db
          redirectWithMessage("¡docente Borrado!","index.php?page=roles");
          }
          }
          if(isset($_GET["doceId"])){
            $docente = obtenerRol($_GET["doceId"]);
            if($docente){
              $htmlDatos["doceMode"] = "dlt";
              $htmlDatos["doceId"] = $docente["doceId"];
              $htmlDatos["docNom"]=$docente["roldes"];
              $htmlDatos["rolest"]=$docente["rolest"];
              $htmlDatos["actSelected"]=($docente["rolest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($docente["rolest"] =="INA")?"selected":"";
              $htmlDatos["disabled"]='disabled="disabled"';
              renderizar("docentem", $htmlDatos);
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
