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

}