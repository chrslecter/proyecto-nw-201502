<?php
  require_once("libs/dao.php");
    function validarLogin(&$conection, $email, $pwd){
        $validado = false;

        $selectQuery = "select usremail, usrpwd, Nombre from usuarios ";
        $selectQuery .= " where usremail = '%s';";

        $SaltedPWD = md5($pwd . "SLD" . substr($pwd,0,3));
        $cursorUser = $conection->query(
                                       sprintf($selectQuery,
                                               $email)
                                        );
        if($cursorUser){
            $userData = $cursorUser->fetch_assoc();
            if($userData["Contrasena"] == $_POST["txtPswd"]){
            if($userData["password"] == $SaltedPWD){
                $_SESSION["Nombre"] = $userData["Nombre"];
                $validado = true;
            } else {

                }
            }
        return $validado;
        }
    }

    function estaLogueado(){
        $estalogueado = false;
        if(isset($_SESSION["Nombre"])){
            $estalogueado = $_SESSION["Nombre"] != "";
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
               $sqlInsert = "INSERT INTO `usuarios`(`usremail`, `usrpwd`, `usrnom`, `usrfching`)VALUES('%s','%s','%s',%s);";
               $sqlInsert = sprintf($sqlInsert,
                                    valstr($usuario["correo"]),
                                    valstr($usuario["pass"]),
                                    valstr($usuario["usuario"]),
                                    valstr($usuario["fecha"])
                                    );
                print_r($sqlInsert);
               if(ejecutarNonQuery($sqlInsert)){

                 return getLastInserId();
               }
            }
            return false;
          }

    function obtenerRolesDeUsuario(&$conexion,$email){
        $roles = array();
        $roles = array();
        if($conexion){
            $sqlstr = "select a.IdRol, b.IdRol, a.Descripcion from roles a inner join  usuarios b  on a.IdRol = b.IdRol where b.email = '%s';";
            $crs = $conexion->query(sprintf($sqlstr,$email));
            while($rol = $crs->fetch_assoc()){
                $roles[] = $rol;
            }
        }
        return $roles;
    }
    function guardarUltimalogin(){
        $_SESSION["ultLogin"] = $login;

        return $login;
    }
?>
