<?php
/* Controlador: Listado de Categorias
 * Fecha: 2015-06-30
 * Created By: OJBA
 * Last Modification:
 */
  require_once("libs/template_engine.php");
  //Agregar requires de modelos aquí
  //ej require_once("models/tabla.model.php");
  require_once("models/docente.model.php");


  //=================================
  function run(){
    /*Agregar código aquí*/
    $docente = array();
    $docente = obtenerDocente();

    renderizar("docente",
                array("docente"=>$docente));
  }
  run();
?>
