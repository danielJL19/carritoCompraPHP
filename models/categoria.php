
<?php
class Categoria{
    private $id;
    private $nombre;
    private $db;

    public function __construct(){
        $this->db=Database::connect();
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre= $this->db->real_escape_string($nombre);
    }

   public function listar(){
        $result=$this->db->query("SELECT * FROM categorias");
        return $result;
   }
   public function crear(){

        $sql="INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}');";
        $result=false;
        $save = $this->db->query($sql);
        if($save){//si el query fue un exito, sera TRUE
            $result=true;
        }
        return $result;
   }
}