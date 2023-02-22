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
    public static function allCategoria(){
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias= $categoria->listar();
        return $categorias;
    }

    public static function allProductoxId(){
        require_once 'models/producto.php';
        $producto = new Producto();
        $resultado=$producto->listar();
        return $resultado;
    }
}