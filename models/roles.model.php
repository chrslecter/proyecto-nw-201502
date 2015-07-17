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
        $sqlstr = "SELECT * FROM `roles` WHERE `rolcod`='%s';";
        $sqlstr = sprintf($sqlstr, valstr($roleID));
        $rol = obtenerUnRegistro($sqlstr);
        return $rol;
      }

      function actualizarRoles($rol){
      $updateSQL = "UPDATE `roles` SET `roldsc`='%s' WHERE `rolcod`='%s';";
      $updateSQL = sprintf($updateSQL,
                           valstr($rol["roldsc"]),
                           valstr($rol["rolest"]),
                           valstr($rol["rolid"]));
      return ejecutarNonQuery($updateSQL) && true;
    }

    function borrarRol($rolID){
      if($rolID){
        $sqlDelete = "DELETE FROM `roles` WHERE `rolcod`='%s';";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($rolID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }

?>
