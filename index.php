<?php

    session_start();

    require_once("libs/utilities.php");

    $pageRequest = "home";

    if(isset($_GET["page"])){
        $pageRequest = $_GET["page"];
    }

    //Incorporando los midlewares son codigos que se deben ejecutar
    //Siempre
    require_once("controllers/site.mw.php");
    require_once("controllers/verificar.mw.php");
print_r($_SESSION);
    //Este switch se encarga de todo el enrutamiento
    switch($pageRequest){
        case "home":
            //llamar al controlador
            require_once("controllers/home.control.php");
            break;

        case "categorias":
            //llamar al controlador
            if(isset($_SESSION["usrnom"])){
            if($_SESSION["roldsc"]=="admin"){
            require_once("controllers/categorias.control.php");
          }}
          break;
        case "login":
            require_once("controllers/login.control.php");
            break;
        case "logout":
            if(isset($_SESSION["usrnom"])){
            require_once("controllers/logout.control.php");
          }
            break;
        case "registro":
            if(isset($_SESSION["usrnom"])){
            if($_SESSION["roldsc"]=="admin"){
            require_once("controllers/registro.control.php");
          }}
          break;

        case "roles":
                if(isset($_SESSION["usrnom"])){
                if($_SESSION["roldsc"]=="admin"){
                require_once("controllers/roles.control.php");
              }}
              break;
        case "rolesm":
                require_once("controllers/rolesm.control.php");
                break;


        case "docente":
                if(isset($_SESSION["usrnom"])){
                if($_SESSION["roldsc"]=="admin"){
                require_once("controllers/docente.control.php");
              }}
              break;

        case "docentem":
            if($_SESSION["roldsc"]=="admin")
            require_once("controllers/docentem.control.php");
            break;


        case "aportaciones":
            if(isset($_SESSION["usrnom"])){
            if($_SESSION["roldsc"]=="admin"){
            require_once("controllers/aportaciones.control.php");
          }}
          break;

        case "aportacionesm":
          if(isset($_SESSION["usrnom"])){
            if($_SESSION["roldsc"]=="admin"){
            require_once("controllers/aportacionesm.control.php");
          }}
          break;

        //para agregar una nueva pagina
        // agregar otro case
        default:
            require_once("controllers/error.control.php");

    }


?>
