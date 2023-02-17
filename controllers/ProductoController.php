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

    public function save(){
        Utils::isAdmin();
        if (isset($_POST)) {//si hay envio POST
    
            //1-VALIDACION DE DATOS 
            $nombre=isset($_POST['nombre'])? $_POST['nombre']: false;
            $descripcion=isset($_POST['descripcion'])?$_POST['descripcion']:false;
            $precio= isset($_POST['precio'])?$_POST['precio']:false;
            $stock= isset($_POST['stock'])?$_POST['stock']:false;
            $categoria=isset($_POST['categoria'])?$_POST['categoria']:false;

            if($nombre && $descripcion && $precio && $stock && $categoria){
                //2-CREAR PRODUCTO
                    //2.1-INSTANCIAMOS LA CLASE PRODUCTO 
                    require_once('models/producto.php');
                    $producto = new Producto();
                    $producto->setCategoria_id($categoria);
                    $producto->setNombre($nombre);
                    $producto->setDescripcion($descripcion);
                    $producto->setPrecio($precio);
                    $producto->setStock($stock);
                    //guardar IMAGEN 
                    $imagen=$_FILES["imagen"];
                    $imagenName = $imagen["name"];
                    $imagenType= $imagen["type"];
                    if ($imagenType=="image/png" || $imagenType=="image/jpeg" || $imagenType=="image/jpg") {
                        if(!is_dir('uploads/images')){//SI NO EXISTE LA CARPETA, SE CREARA
                            mkdir('uploads/images',0777,true);
                        }
                        move_uploaded_file($imagen["tmp_name"],'uploads/images/'.$imagenName);
                        //SE HACE EL REGISTRO EN EL SET
                        $producto->setImagen($imagenName);
                    }else{
                        $_SESSION['errorRegister']="No se registro correctamente";
                        header("Location:".base_url."producto/allProduct");
                    }

                    $producto->save();
                    $_SESSION['checkRegister']="Se registro correctamente";
                    
            }else{
                //SI NO HAY DATOS DENTRO DE LA VARIABLE
                $_SESSION['errorRegister']="No se registro correctamente";
            }
            header("Location:".base_url."producto/allProduct");
        }
    }

    public function delete(){
        require_once 'models/producto.php';
        $idObtenido=$_GET['id'];
        $producto=new Producto();
        $producto->setId($idObtenido);
        $verify=$producto->borrarProducto();
        if ($verify) {
            $_SESSION['checkDelete']="Se elimino con exito";
        }else{
            $_SESSSION['checkDelete']="NO se pudo eliminar, intentelo más tarde";
        }
        header("Location:".base_url."producto/allProduct");
    }
}