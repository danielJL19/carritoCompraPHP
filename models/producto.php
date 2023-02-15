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
        $this->categoria_id=$categoria_id;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function setDescripcion($descripcion){
        $this->id=$descripcion;
    }

    public function setPrecio($precio){
        $this->precio=$precio;
    }

    public function setStock($stock){
        $this->id=$id;
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

    public function listar(){
        //1-COMANDO SQL (SELECT)
        $sql = "SELECT * FROM productos;";
        $result=$this->db->query($sql);// 2-EJECUCION DEL COMANDO SQL (PARAMETRO QUERY) 

        return $result;//RESULT TIENE TODOS LOS PRODUCTOS
    }
}