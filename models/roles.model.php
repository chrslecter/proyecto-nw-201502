<?php

require_once("libs/dao.php");

function obtenerRoles(){
    $roles = array();
    $selectQuery = "SELECT * FROM roles;";
    $roles = obtenerRegistros($selectQuery);
    return $roles;
}
function insertarRoles($roles){
      if($roles && is_array($roles)){
         $sqlInsert = "INSERT INTO roles(`roldsc`,`rolest`)VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($roles["roldsc"]),
                        valstr($roles["rolest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function obtenerRol($roleID){
        $rol= array();
        $sqlstr = "Select * from roles where rolcod='%s';";
        $sqlstr = sprintf($sqlstr, valstr($roleID));
        $rol = obtenerUnRegistros($sqlstr);
        return $rol;
      }
?>
