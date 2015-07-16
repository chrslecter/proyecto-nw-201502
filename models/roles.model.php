<?php

require_once("libs/dao.php");

function obtenerRoles(){
    $roles = array();
    $selectQuery = "SELECT * FROM roles;";
    $roles = obtenerRegistros($selectQuery);
    return $roles;
}

?>
