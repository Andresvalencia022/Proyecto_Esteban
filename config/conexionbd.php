<?php
 class conexionBd{

    public static function connect(){
        $bd = new mysqli('localhost','root','','estudiantes'); //le pasamos todos los parametrso de conexion
        $bd -> query("SET NAMES 'utf8'"); #me devuelve la consulta en caracteres en español 
        return $bd; // me hace la conexion y  me debuelve consultas
 }
 }
//  $bd -> query("SET NAMES 'utf8'") me los debuelve con punto y comas (en carates en español)
?>