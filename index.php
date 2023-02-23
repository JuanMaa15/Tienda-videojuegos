<?php

session_start();

require_once 'autoload.php';
require_once 'config/conexion.php';
require_once 'config/parameters.php';
require_once './helpers/utils.php';
if (!isset($_POST['submit_js'])) {
    require_once 'views/layout/header.php';  
}

function show_error() {
    $error = new errorController();
    $error->index();
    exit();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'Controller';
}else if(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
}else{
    show_error();
    
}

if (class_exists($nombre_controlador)) {
    
    $controlador = new $nombre_controlador();
    
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        
        $action = $_GET['action'];
        
        //if ($action != "login") {
          //  require_once 'views/layout/header.php';   
        //} 
        
        $controlador->$action();
        
    }else if(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action = action_default;
        
        $controlador->$action();
    }else{
        show_error();
    }
}else{
    show_error();
}


if (!isset($_POST['submit_js'])) {
    require_once './views/layout/footer.php';
}
