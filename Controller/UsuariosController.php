<?php

include_once 'Model/Usuario.php';
class UsuariosController {

    public function index(){
       //el login
    require_once 'View/usuario/login.php';
    }

    public function login(){
      if (isset($_POST)) {

         //para indentificar el usuario
         //consulta en la base de datos
                     //nombre de la clase Usuario
         $usuario = new  Usuario();
         $usuario->setEmail($_POST['email']);
         $usuario->setPassword($_POST['password']);
        
                    //le manda la informacion a la funcion login para que haga 
         $identity = $usuario->Login();
 
         //La función is_object() comprueba si una variable es un objeto.
         //Esta función devuelve verdadero (1) si la variable es un objeto; de lo contrario, devuelve falso/nada.
         //estamos haciendo un logueo del los ususarios
         
         if ($identity && is_object($identity)) {
                //aqui es donde va ir todos sus datos a la session
              
              $_SESSION['Identificado']=  $identity;
            //   header("location:" . base_url . 'Estudiantes/index');
         }else {
             $_SESSION['error_login'] = 'identificacion fallida';
         }
     //El inicio de la url
     header("location:".base_url);//redireciona (constante que tenemos configurada)
   } 

    }
    public function registro(){
        //para que me redirija
        require_once 'View/usuario/registrar.php';
     }
    
     public function save(){
        //el registrar
      if(isset($_POST)){
         $email = isset($_POST['email']) ? $_POST['email'] : false;
         $password = isset($_POST['password']) ? $_POST['password'] : false;
             
            if ($email && $password) {
               //nombre de la clase
               $usu = new Usuario();
               $usu->setEmail($_POST['email']);
               $usu->setPassword($_POST['password']);          
               //todo eso me lo guardo en un dato del formuario y guardarlos en una variable guardar  
               $guardar = $usu->save();

               //aqui me dices que si tengo datos la variable guardar me mustre el siguinete mensaje 
               if ($guardar){
                  //  echo 'Registro completado'; 
                  $_SESSION['registro'] = "complete";
                  
               } else {
                   // echo 'Registro fallido';
                  $_SESSION['registro'] = "failed";
               }
           }else {
               $_SESSION['registro'] = "failed";
           }
      }else{
         $_SESSION['registro'] = "failed";
      }
      header("location:". base_url .'Usuarios/registro');
     }

        //para cerrar sesion
 public function cerrar_sesion (){
   //si esta definida la sesion, entonces eliminame las sesiones
if (isset($_SESSION['Identificado'])) { //elimina la sesion identifica
  unset($_SESSION['Identificado']);
}
header("location:".base_url); //El inicio de la url
}



}


?>