<?php 
class Utils{

    public static function deleteSession($name){

        if (isset($_SESSION[$name])) {
            $_SESSION[$name]=null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['rol'])){//SI NO HAY DATOS DENTRO DE SESSION, DEVOLVERLO 
            //AL HOME
            header("Location:".base_url);
        }
    }
}