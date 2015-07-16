<?php
/* Controlador: Listado de Categorias
 * Fecha: 2015-06-30
 * Created By: OJBA
 * Last Modification:
 */
  require_once("libs/template_engine.php");
  //Agregar requires de modelos aquí
  //ej require_once("models/tabla.model.php");
  require_once("models/roles.model.php");


  //=================================
  function run(){
    /*Agregar código aquí*/
    $roles = array();
    $roles = obtenerRoles();
    /*$categorias[] = array(
        "catcod" => 1,
        "catdsc" => "Categoria",
        "catest" => "ACT"
    );
    $categorias[] = array(
        "catcod" => 2,
        "catdsc" => "Categoria 2",
        "catest" => "ACT"
    );
    $categorias[] = array(
        "catcod" => 3,
        "catdsc" => "Categoria 3",
        "catest" => "INA"
    );*/

    /*====================*/
    renderizar("roles",
                array("roles"=>$roles));
  }
  run();
?>
