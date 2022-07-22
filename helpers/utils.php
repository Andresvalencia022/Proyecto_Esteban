<?php

class utils
{

    // Elimina la sesion
    public static function deleteSession($name)
    {
        //mira si exciste la  sesssion 
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            // (unset) Destruye una o más variables especificadas
            unset($_SESSION[$name]); //elimina la session para que no muestre en pantalla 
        }
        return $name;
    }

    public static function isIdentity()
    {
        if (!isset($_SESSION['identifica'])) {
            header("location:" . base_url); // si es distinto a admin redirecionamen a este lugar 
        } else {
            return  true;
        }
    }

}
