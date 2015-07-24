<?php

require_once("libs/dao.php");

function obtenerDocente(){
    $docente = array();
    $selectQuery = "SELECT * FROM docente;";
    $docente = obtenerRegistros($selectQuery);
    return $docente;
}

function insertarDocente($docente){
      if($docente && is_array($docente)){
         $sqlInsert = "INSERT INTO docente('doceId','docNom','DocDir','docNac','docNombramiento','sexo_sexoId')VALUES(%s,'%s','%s',%s,%s,%s);";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($docente["doceId"]),
                        valstr($docente["docNom"]),
                        valstr($docente["docDir"]),
                        valstr($docente["docNac"]),
                        valstr($docente["docNombramiento"]),
                        valstr($docente["sexo_sexoId"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }


function borrarDocente($doceId){
          if($doceId){
            $sqlDelete = "DELETE FROM `docente` WHERE `doceId`=%s;";
            $sqlDelete = sprintf($sqlDelete,
                          valstr($doceId)
                        );
            return ejecutarNonQuery($sqlDelete);
          }
          return false;
        }
/*
function insertarDocente($docente){
      if($roles && is_array($docente)){
         $sqlInsert = "INSERT INTO docente(`roldsc`,`rolest`)VALUES('%s','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($docente["roldsc"]),
                        valstr($docente["rolest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }
    */
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
