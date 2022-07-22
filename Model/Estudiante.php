<?php

class Estudiante
{

    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $edad;
    private $telefono;
    private $bd;

    public function __construct()
    {
        $this->bd = conexionBd::connect();
    }

    // get trae informacion
    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }
    function getApellido()
    {
        return $this->apellido;
    }
    function getSexo()
    {
        return $this->sexo;
    }
    function getEdad()
    {
        return $this->edad;
    }
    function getTelefono()
    {
        return $this->telefono;
    }


    //set envia informacion
    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $this->bd->real_escape_string($nombre);
    }
    function setApellido($apellido)
    {
        $this->apellido = $this->bd->real_escape_string($apellido);
    }
    function setSexo($sexo)
    {
        $this->sexo = $this->bd->real_escape_string($sexo);
    }
    function setEdad($edad)
    {
        $this->edad = $this->bd->real_escape_string($edad);
    }
    function setTelefono($telefono)
    {
        $this->telefono = $this->bd->real_escape_string($telefono);
    }

    public function save()
    {
        //estoy guardanodo los valores que estoy cargando de usuario
        //estoy haciendo el this-get para hacerder y me devolvera un atributos de la clase
        $sql = "INSERT INTO estudiantes VALUES(NULL, '{$this->getNombre()}','{$this->getApellido()}','{$this->getSexo()}','{$this->getEdad()}','{$this->getTelefono()}');";
        $save = $this->bd->query($sql); //estoy haciendo una query de la sql 

        $result = false;
        if ($save) { //le estoy diciendo, que si $save es verdadero me guarde en la variable true y lo retorna, si no coloquelo false y me lo retaorna 
            $result = true;
        }
        return $result;
    }

    public function all()
    {
        $datos = $this->bd->query('SELECT * FROM estudiantes ORDER BY id DESC;');
        return $datos;
    }

    //trar los datos de la bd para colocarlos en el formulario
    public function traer($id)
    {
        $sql = "SELECT * FROM estudiantes WHERE id=$id";
        $datos = $this->bd->query($sql); //estoy haciendo una query de la sql 
        return $datos->fetch_object(); //me lo comvierte en un objeto
    }

    public function edit($id){
        $sql = "UPDATE estudiantes SET   nombre='{$this->getNombre()}',  apellido='{$this->getApellido()}' , sexo='{$this->getSexo()}', edad='{$this->getEdad()}' ";
    
        $sql .= " WHERE id=$id;";
        
        $editar = $this->bd->query($sql); //estoy haciendo una query de la sql 
        
        $result = false;
        if ($editar) { //le estoy diciendo, que si $save es verdadero me guarde en la variable true y lo retorna, si no, coloquelo false y me lo retorna 
            $result = true;
        }
        return $result;
    }

    //Eliminar los datos la Bd
    public function Delete($id)
    {
        $sql = "DELETE FROM estudiantes WHERE id=$id";
        $delete = $this->bd->query($sql);

        $result = false;
        if ($delete) { //le estoy diciendo, que si $save es verdadero me guarde en la variable true y lo retorna, si no coloquelo false y me lo retaorna 
            $result = true;
        }
        return $result;
    }
}
