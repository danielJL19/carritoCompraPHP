<?php 

class productoController{

    public function index(){
        require_once 'views/producto/destacada.php';
    }
    public function allProduct(){
        Utils::isAdmin();
        require_once 'models/producto.php';
        $producto = new Producto();
        $resultado=$producto->listar();

        require_once 'views/producto/gestion.php';
    }
    //VISTA DE FORMULARIO DE PRODUCTO 
    public function vistaFormulario(){
        Utils::isAdmin();
        require_once 'views/producto/formProducto.php';
    }
}