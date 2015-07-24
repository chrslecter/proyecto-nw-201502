<?php

require_once("libs/dao.php");

function obtenerCategorias(){
    $categorias = array();
    $selectQuery = "SELECT * FROM categorias;";
    $categorias = obtenerRegistros($selectQuery);
    return $categorias;
}

?>
