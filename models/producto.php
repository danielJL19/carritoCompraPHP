<?php
class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct(){
        $this->db=Database::connect(); // NOMBRE DE LA CLASE Y LA FUNCION 
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setCategoria_id($categoria_id){
        $this->categoria_id=$this->db->real_escape_string($categoria_id);
    }

    public function setNombre($nombre){
        $this->nombre=$this->db->real_escape_string($nombre);
    }

    public function setDescripcion($descripcion){
        $this->descripcion=$this->db->real_escape_string($descripcion);
    }

    public function setPrecio($precio){
        $this->precio=$this->db->real_escape_string($precio);
    }

    public function setStock($stock){
        $this->stock=$this->db->real_escape_string($stock);
    }
    
    public function setOferta($oferta){
        $this->oferta=$this->db->real_escape_string($oferta);
    }

    public function setImagen($imagen){
        $this->imagen=$imagen;
    }

    public function getId(){
        return $this->id;
    }

    public function getCategoria_id(){
        return $this->categoria_id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getStock(){
        return $this->stock;
    }

    public function getOferta(){
        return $this->oferta;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function listar(){
        //1-COMANDO SQL (SELECT)
        $sql = "SELECT * FROM productos;";
        $result=$this->db->query($sql);// 2-EJECUCION DEL COMANDO SQL (PARAMETRO QUERY) 

        return $result;//RESULT TIENE TODOS LOS PRODUCTOS
    }

    public function save(){
        //1-COMANDO SQL (INSERT)
        $sql="INSERT INTO productos VALUES(NULL,'{$this->getCategoria_id()}','{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},NULL,CURDATE(), '{$this->getImagen()}');";

        $result=$this->db->query($sql);
        $verify=false;
        if($result){
            $verify=true;
        }
        return $verify;
    }

    public function borrarProducto(){
        
        $sql="DELETE FROM productos WHERE id={$this->getId()};";
        $result=$this->db->query($sql);
        $resultado=false;
        if ($result) {//SI SALIO EXITOSO
            $resultado=true;
        }
        return $resultado;
    }
}