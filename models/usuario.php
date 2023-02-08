<?php 


//entidad o clase usuario
class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $imagen;
    private $rol;
    private $db; 

    public function __construct(){
        //al hacer una instancia ya estoy conectado a la BBDD
        $this->db=Database::connect();
    }


    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password_hash($this->password,PASSWORD_BCRYPT);
    }
    public function getImagen(){
        return $this->imagen;
    }
    public function getRol(){
        return $this->rol;
    }

    //los SET LOS VAMOS A LIMPIAR SI TIENEN INYECCION SQL 
    public function setId($id){
        $this->id=$id;
    }
     //los SET LOS VAMOS A LIMPIAR SI TIENEN INYECCION SQL 
    public function setNombre($nombre){
        $this->nombre=$this->db->real_escape_string($nombre);
    }

    public function setApellidos($apellidos){
        $this->apellidos=$this->db->real_escape_string($apellidos);
    }

    public function setEmail($email){
        $this->email=$this->db->real_escape_string($email);
    }

    public function setPassword($password){
        $this->password=$this->db->real_escape_string($password);
    }

    public function setImagen($imagen){
        $this->imagen=$imagen;
    }

    public function setRol($rol){
        $this->rol=$this->db->real_escape_string($rol);
    }
    //SE GUARDA EL OBJETO 
    public function save(){
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',NULL);";
        $guardar= $this->db->query($sql);
        $result = false;
        if($guardar){
            $result=true;
        }
            return $result;
    }

    //para iniciar sesion
    public function login(){
        if(isset($_POST)){//si hay envio POST
            $result=false;
            $password1= $this->password;
            $email1= $this->email;
            

            //1-COMPROBAR SI EXISTE EL CORREO
            $sql="SELECT * FROM usuarios WHERE email='$email1'";
            $result=$this->db->query($sql);
            
            if($result && $result->num_rows==1){//SI SE ENCONTRO V , SI NO SE ENCUENTRA F
                //2-LUEGO, VAMOS A OBTENER LA CUENTA DE USUARIO
                $objecto = $result->fetch_object();

                //3-COMPROBAR LA CONTRASEÑA
                if(password_verify($password1,$objecto->password)){
                    $result=$objecto;
                }else{
                    $result=false;
                }
                
            }else{
                $result=false;
            }
            return $result;
        }
    
    }
}