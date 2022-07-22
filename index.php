<?php 

session_start();//me inicializa el la sesiones 

require_once 'config/conexionbd.php';
require_once 'autoload.php'; //es para tener acceso a todos los controladores 
require_once './config/parameters.php';
require_once 'helpers/utils.php';
require_once 'View/layout/header.php';

//es el que va inicializar todo 
//  localhost://proyecto/producto/ver
                        // 1      2
// 1 el producto que es el controlador

// 2 ver que es el metodo del controlador 


function show_error(){
	$error = new errorController();
	$error->index();
}


if(isset($_GET['controller'])){ //compruebo si me llega el controlador por la url
                              
                     // nombre producto,   el metodo o la funcion de controlador 
$nombre_controlador = $_GET['controller'].'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
$nombre_controlador = controller_default; //controller_default viene de config/parameters

}else{
show_error();
// echo "la pagina que buscas no existe";
exit();
}
// ______________________________________________

//compruebo si el controlador si existe 
if(class_exists($nombre_controlador)){	

$controlador = new $nombre_controlador(); //creamos el objeto

if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){

    $action = $_GET['action'];
    $controlador->$action(); //invocamos o accedemos al metodo del controlador 

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $action_default = action_default;
    $controlador->$action_default();
}else{
    show_error(); //funcion o metodo show_error() que esta aribita
}
}else{
show_error();
//  echo "la pagina que buscas no existe";
}
require_once 'View/layout/footer.php';

