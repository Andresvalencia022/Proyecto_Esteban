<?php
include_once 'Model/Estudiante.php';

class EstudiantesController {

     public function index(){

        $estudiantes = new Estudiante();
        //accediendo a la funcion all();
        $estudiante = $estudiantes->all();    
        
      require_once 'View/estudiante/tabla.php';
     
   }

     public function save(){
      
      if ($_POST) {
         //ternaria de issset 
                  //si llega por metodo post nombre  y si es diferenete al nombre, es igual falso
         $nombre = isset($_POST['nombre']) ? $_POST['nombre']: false;
         $apellido = isset($_POST['apellido']) ? $_POST['apellido']: false;
         $sexo = isset($_POST['sexo']) ? $_POST['sexo']: false;
         $edad = isset($_POST['edad']) ? $_POST['edad']: false;
         $telefono = isset($_POST['telefono']) ? $_POST['telefono']: false;
        
         if($nombre && $apellido &&   $sexo &&  $edad  &&  $telefono) {
         
          $estudiante = new Estudiante();

          $estudiante->setNombre($nombre);
          $estudiante->setApellido($apellido);
          $estudiante->setSexo($sexo);
          $estudiante->setEdad($edad);
          $estudiante->setTelefono($telefono);

         if (isset($_GET['id'])) {
           //para editar y guardar (se actualiza los datos)
          $id = $_GET['id'];
          $guadar = $estudiante->edit($id);
         }else{
          //guardamos en la base de datos por primera vez 
         //  //para insertar datos
         $guadar = $estudiante->save();
          
         }
         
            //verificamos si se hizo correctamente 
       if ( $guadar) {
           $_SESSION['estudiante'] = 'Completo';
       }else {
           $_SESSION['estudiante'] = 'fallo';
       }
       }else {
          $_SESSION['estudiante'] = 'fallo';
       }
      }else {
          $_SESSION['estudiante'] = 'fallo';
      }
      header("location:".base_url.'Estudiantes/index');
      
     
     }

     public function Gestion(){
     
       
        
         require_once 'View/estudiante/tabla.php';   
    }     


   //editar (me trae todos los datos del id para luego insertarlos en el formulario para editar)
    public function Editar(){
        // var_dump($_GET['id']);
        // die;
        if (isset($_GET['id'])) { //comprubo si llega el id
         $id = $_GET['id'];

         $EDITAR = true;
         $editar = new Estudiante();
         $Re_editar = $editar->traer($id); 

        require_once 'View/estudiante/tabla.php'; //estamos reutilizamdo el formulario de crear producto para porder editar los datos
    }else{
        header("location:".base_url.'Estudiantes/index');
    }
}

    //Eliminar
     public function remove(){
        // var_dump($_GET['id']);
        // die;
        if(isset($_GET['id'])){
            $id = $_GET['id'];

			$delete = new Estudiante();			
			$delete = $delete->Delete($id);
            
			if($delete){
				$_SESSION['Delete'] = 'complete';
			}else{
				$_SESSION['Delete'] = 'failed';
			}
		}else {
            $_SESSION['Delete'] = 'fallo';
        }
        header("location:".base_url.'Estudiantes/index');

     }

   }
?>