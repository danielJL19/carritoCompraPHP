<?php 
ob_start();
session_start();
require_once 'helpers/utils.php';
require_once 'autoload.php';
//esto carga tambien a las clases y entidades
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';



//SI HAY RELLENO DE DATO DE CONTROLLER
if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'Controller';
}else if(!isset($_GET['controller']) && !isset($_GET['action'])){
    //VALOR POR DEFAULT
    $nombre_controlador= controlador_default;
}else{
    $error = new errorController();
    $error->index();
    exit();
}
//VERIFICAR SI LA CLASE DE CONTROLADOR EXISTE
if (class_exists($nombre_controlador)) {
    //SE HACE LA INSTANCIA DE LA CLASE
    $controlador = new $nombre_controlador();
    //SE VERIFICA SI HAY RELLENO DE DATOS DEL METODO ACTION Y SI EL METODO EXISTE DE LA INSTANCIA
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    }else if(!isset($_GET['controller']) && !isset($_GET['action'])){
        $actionDefault= action_default;
        $controlador->$actionDefault();
      
    }else{
        $error = new errorController();
        $error->index();
    }
}else{
    $error = new errorController();
    $error->index();
}
require_once 'views/layout/footer.php';
