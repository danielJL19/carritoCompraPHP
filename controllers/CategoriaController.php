<?php 
require_once 'models/categoria.php';

class categoriaController{
    public function index(){
        //1-COMPROBAR SI ES ADMIN O NO
        Utils::isAdmin();
        $categoria= new Categoria();
        $categorias = $categoria->listar();
        //absorve toda la info index.php
        require_once 'views/categoria/index.php';
    }

    public function crear(){
        //1-COMPROBAR SI ES ADMIN O NO
        Utils::isAdmin();
        //MOSTRARMOS EL FORMULARIO DE CREAR CATEGORIA
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        //1-COMPROBAR SI ES ADMIN O NO
        Utils::isAdmin();
        if(isset($_POST['crearCategoria'])){//SI HAY VALORES DENTRO DEL CAMPO 
            $nombre=isset($_POST['nombreCategoria'])?$_POST['nombreCategoria']:false;
            $erroresCat=[];
            if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]+/",$nombre)){
                $erroresCat['nombre']='este campo de nombre, contiene números y/o esta vacio';
            }

            if(count($erroresCat)<1){
                $categoria = new Categoria();
                $categoria->setNombre($nombre);
                $categoria->crear();
                header("Location:".base_url.'categoria/index');
            }else{
                $_SESSION['erroresCat']=$erroresCat;
                header("Location:".base_url.'categoria/crear');
            }
        }
    }
}