
<?php

class Usuario{

private $id;
private $email;
private $password;
private $bd;

public function __construct(){
  $this->bd = conexionBd::connect();
}

// get trae informacion
function getId()
    {
        return $this->id;
    }
    
    function getEmail()
    {
        return $this->email;
    }
    
    function getPassword()
    {
        // coloco aqui password_hash para que me lo debuelva cifrada                                       
        return password_hash($this->bd->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]); //cost es el tiempo de incriptamiento 
    }

 //set envia informacion
    function setId($id)
    {
        $this->id = $id;
    }

    function setEmail($email)
    {
        $this->email = $this->bd->real_escape_string($email);
    }

    function setPassword($password)
    {                          //protocolo de incriptacion PASSWORD_BCRYPT
        $this->password =  $password;
    }

   public function save(){
        
      //estoy guardanodo los valores que estoy cargando de usuario
        //estoy haciendo el this-get para hacerder y me devolvera un atributos de la clase
        $sql = "INSERT INTO usuario VALUES(NULL, '{$this->getEmail()}','{$this->getPassword()}', 'user');";
        $save = $this->bd->query($sql); //estoy haciendo una query de la sql 

        $result = false;
        if ($save) { //le estoy diciendo, que si $save es verdadero me guarde en la variable true y lo retorna, si no coloquelo false y me lo retaorna 
            $result = true;
        }
        return $result;

   }

   public function login()
   {
       $resultado = false;
       // accede directamente a los valores desde la funcion login
       $email = $this->email;
       $password = $this->password;
       
       
       
       //estamos haciendo la consulta 
       $sql = "SELECT * FROM usuario WHERE email = '$email' ";
       $login = $this->bd->query($sql); //estoy haciendo una query de la sql
       
       
      
       //si es verdadero login y  determina el numero de la fila  es igual 1
       if ($login && $login->num_rows == 1) {
           $usuario = $login->fetch_object(); //Devuelve la fila actual de un conjunto de resultados como un objeto
           //$password que estoy mandado formulario           
           $verifica = password_verify($password, $usuario->password);

           
           //veirfica si en la variable $usuario de la consulta,   si es la misma contraseña que tengo en la bd
           //verifica si se cumple (si tiene datos)
           
           if ($verifica) {
               $resultado = $usuario;
           }
        }
        return $resultado;
       
   }


}


?>