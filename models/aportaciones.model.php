<?php

require_once("libs/dao.php");

function obtenerAportaciones(){
    $aportaciones = array();
    $selectQuery = "SELECT * FROM aportaciones;";
    $aportaciones = obtenerRegistros($selectQuery);
    return $aportaciones;
}

function insertarAportaciones($aportaciones){
      if($aportaciones && is_array($aportaciones)){
         $sqlInsert = "INSERT INTO aportaciones(`aportacionesCod`,`aportacionesDes`,`aportacionesCant`)VALUES(%s,'%s',%s);";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($aportaciones["aportacionesCod"]),
                        valstr($aportaciones["aportacionesDes"]),
                        valstr($aportaciones["aportacionesCant"])

                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

function actualizarAportaciones($aportaciones){
    $updateSQL = "UPDATE `aportaciones` SET `aportacionesDes`='%s', 'aportacionesCant'=%s WHERE 'aportacionesCod'=%s;";
    $updateSQL = sprintf($updateSQL,
                         valstr($aportaciones["aportacionesDes"]),
                         valstr($aportaciones["aportacionesCant"]),
                         valstr($aportaciones["aportacionesCod"]));
    return ejecutarNonQuery($updateSQL) && true;

}
function borrarAportaciones($aportacionesCod){
          if($aportacionesCod){
            $sqlDelete = "DELETE FROM `aportaciones` WHERE `aportacionesCod`=%s;";
            $sqlDelete = sprintf($sqlDelete,
                          valstr($aportacionesCod)
                        );
            return ejecutarNonQuery($sqlDelete);
          }
          return false;
        }

/*function insertarDocente(aportaciones){
      if(aportaciones && is_array(aportaciones)){
         $sqlInsert = "INSERT INTO aportaciones('aporId','apades','apacan')VALUES(%s,'%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr(aportaciones["roldsc"]),
                        valstr(aportaciones["rolest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

/*
    function obtenerRol($roleID){
        $rol= array();
        $sqlstr = "SELECT * FROM `roles` WHERE `rolcod`=%s;";
        $sqlstr = sprintf($sqlstr, valstr($roleID));
        $rol = obtenerUnRegistro($sqlstr);
        return $rol;
      }

      function actualizarRoles($rol){
      $updateSQL = "UPDATE `roles` SET `roldsc`='%s', `rolest`='%s' WHERE `rolcod`=%s;";
      $updateSQL = sprintf($updateSQL,
                           valstr($rol["roldsc"]),
                           valstr($rol["rolest"]),
                           valstr($rol["rolid"]));
      return ejecutarNonQuery($updateSQL) && true;
    }

    function borrarRol($rolID){
      if($rolID){
        $sqlDelete = "DELETE FROM `roles` WHERE `rolcod`=%s;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($rolID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
*/
?>
