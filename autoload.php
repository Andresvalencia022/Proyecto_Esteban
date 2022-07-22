<?php
//lo que hace esta  es auto cargar los controladores
//es una funcion que se ejecuta sola

function controllers_autoload($classname){
 //lo que ace es entrar a la carpeta de los controladores y hacer un include de todos los controladores 
    include 'controller/' .$classname .'.php';
}

spl_autoload_register('controllers_autoload');
?>