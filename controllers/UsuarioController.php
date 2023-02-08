<?php
require_once 'models/usuario.php';
class usuarioController{
    public function index(){
        echo "Controlador Usuario, accion index";
    }
    //si escribes en el URL el metodo "registro", te aparecera el formulario
    public function registro(){
        //importa todo el html hacia esta funcion llamada registro
        require_once 'views/usuario/registro.php';
    }
    public function guardarRegistro(){
        //todos los datos del formulario RECAEN EN ESTA FUNCION POST 
        if (isset($_POST)) {//si hay datos en POST
            //1-validacion si hay datos dentro de POST
            $nombre=isset($_POST['nombre'])? $_POST['nombre']:false;
            $errores=[];

            $apellidos=isset($_POST['apellidos'])?$_POST['apellidos']:false;
            $email=isset($_POST['email'])? $_POST['email']:false;
            $password=isset($_POST['pass'])? $_POST['pass']:false;
            $errores=[];
            if ($nombre && $apellidos && $email && $password) {
                //2-validacion de datos (si es completamente string)
                if (empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]+/",$nombre)) {
                    $errores['nombre']='este campo de nombre, contiene número y/o esta vacio';
                }
                if(empty($apellidos) || is_numeric($apellidos) || preg_match("/[0-9]+/",$apellidos)){
                    $errores['apellidos']='este campo de apellido, contiene números y/o esta vacio';
                }
                if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $errores['email']='este campo de email, no es un correo electronico';
                }

                //si no hay errores, se guardara en la bbdd
                if(count($errores)==0){
                    $usuario = new Usuario();
                    //utilizamos los set para crear el usuario 
                    $usuario->setNombre($_POST['nombre']);
                    $usuario->setApellidos($_POST['apellidos']);
                    $usuario->setEmail($_POST['email']);
                    $usuario->setPassword($_POST['pass']);
                    $save=$usuario->save();
                    if ($save) {
                        echo "registro Completado";
                        $_SESSION['register']='completado';
                    }else{
                        echo "registro Fallido";
                        $_SESSION['register']='fallido';
                    }
                    header("Location:".base_url.'usuario/registro');
                }else{
                    $_SESSION['errores']=$errores;
                    header("Location:".base_url.'usuario/registro');
                }

                    
                
            }else{
                $_SESSION['register']='rellene todos los datos por favor';
                header("Location:".base_url.'usuario/registro');
            }
            
            
        }else{
            $_SESSION['register']='rellene todos los datos por favor';

        }
    }
    public function login(){
        if(isset($_POST)){
            $usuario=new Usuario();
            $usuario->setEmail($_POST['email1']);
            $usuario->setPassword($_POST['password1']);
            $verify=$usuario->login();
            //SI VERIFY ES TRUE Y ES UN OBJETO , SE CREARA UNA SESSION
            if($verify && is_object($verify)){
                $_SESSION['usuario']=$verify;
                      
            }else{
                echo 'gg';
            }
        }
        header('Location:'.base_url);
    }
    public function logout(){
        if(isset($_SESSION['usuario'])){
            $_SESSION['usuario']=null;
            unset($_SESSION['usuario']);
        }
        header('Location:'.base_url);
    }
}