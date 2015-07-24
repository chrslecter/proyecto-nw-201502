<?php

require_once("libs/dao.php");

function obtenerUsuario(){
    $usuario = array();
    $selectQuery = "SELECT * FROM usuarios;";
    $usuario = obtenerRegistros($selectQuery);
    return $usuario;
}
function insertarUsuario($usuario){
      if($usuario && is_array($usuario)){
         $sqlInsert = "INSERT INTO usuarios(`roldsc`,`rolest`)VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($usuario["roldsc"]),
                        valstr($usuario["rolest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function obtenerUsuario($usuarioID){
        $rol= array();
        $sqlstr = "SELECT * FROM `usuarios` WHERE `rolcod`=%s;";
        $sqlstr = sprintf($sqlstr, valstr($roleID));
        $rol = obtenerUnRegistro($sqlstr);
        return $rol;
      }

      function actualizarUsuario($rol){
      $updateSQL = "UPDATE `roles` SET `roldsc`='%s', `rolest`='%s' WHERE `rolcod`=%s;";
      $updateSQL = sprintf($updateSQL,
                           valstr($rol["roldsc"]),
                           valstr($rol["rolest"]),
                           valstr($rol["rolid"]));
      return ejecutarNonQuery($updateSQL) && true;
    }

    function borrarUsuario($rolID){
      if($rolID){
        $sqlDelete = "DELETE FROM `roles` WHERE `rolcod`=%s;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($rolID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }

?>
