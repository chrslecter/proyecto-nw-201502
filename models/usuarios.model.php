<?php
  require_once("libs/dao.php");

    function estaLogueado(){
        $estalogueado = false;
        if(isset($_SESSION)){
            $estalogueado = $_SESSION["usrnom"] != "";
        }else{
          $estalogueado="Invitado";
        }
        return $estalogueado;
    }

    function logout(){

    session_unset();
    session_destroy();

    }


    function obtenerUsuario($usuario){
      print_r($usuario);
        $sqlstr = "SELECT * FROM usuarios WHERE usremail = '%s';";
        $sqlstr = sprintf($sqlstr, valstr($usuario));

        $usuario = obtenerUnRegistro($sqlstr);
        return $usuario;
      }

      function insertarUsuario($usuario){

            if($usuario && is_array($usuario)){
               $sqlInsert = "INSERT INTO `usuarios`(`usremail`, `usrpwd`, `usrnom`, `usrfching`)VALUES('%s','%s','%s','%s');";
               $sqlInsert = sprintf($sqlInsert,
                                    valstr($usuario["correo"]),
                                    valstr($usuario["pass"]),
                                    valstr($usuario["usuario"]),
                                    valstr($usuario["fecha"])
                                    );
               if(ejecutarNonQuery($sqlInsert)){

                 return getLastInserId();
               }
            }
            return false;
          }

    // function obtenerRolesDeUsuario(&$conexion,$email){
    //     $roles = array();
    //     if($conexion){
    //         $sqlstr = "select rolcod from roles inner join usuarios where usrcod = %d;";
    //         $crs = $conexion->query(sprintf($sqlstr,$email));
    //         while($rol = $crs->fetch_assoc()){
    //             $roles[] = $rol;
    //         }
    //     }
    //     return $roles;
    // }

    function obtenerRolesDeUsuario($usuario){
      print_r($usuario);
        $sqlstr = "SELECT rolcod, roldsc,usrnom, usremail FROM roles INNER JOIN usuarios WHERE usrcod=%s;";
        $sqlstr = sprintf($sqlstr, valstr($usuario));

        $usuario = obtenerUnRegistro($sqlstr);
        return $usuario;
      }

    function guardarUltimalogin(){
        $_SESSION["ultLogin"] = $login;

        return $login;
    }
?>
