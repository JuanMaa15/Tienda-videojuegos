<?php

class Categoria {
    
    private $id_categoria;
    private $nombre;
    private $estado;
    private $db;


    public function __construct() {
        $this->db = Conexion::connect();
    }
    
    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function getNombre() {
        return $this->nombre;
    }
    
    public function getEstado() {
        return $this->estado;
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $this->db->real_escape_string($id_categoria);
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function delete() {
        
        $sql = "UPDATE tbl_categoria SET "
                . "estado = 0 WHERE id_categoria = {$this->getId_categoria()}";
                
       $delete = $this->db->query($sql);
        
       if ($delete) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
       
    }
    
    public function update() {
        
        $sql = "UPDATE tbl_categoria SET "
                . "nombre = '{$this->getNombre()}' WHERE id_categoria = {$this->getId_categoria()}";
                
        $update = $this->db->query($sql);
        
        if ($update) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
        
    }
    
    public function create() {
        $sql = "INSERT INTO tbl_categoria "
                . "VALUES(NULL, '{$this->getNombre()}', 1)";
                
        $create = $this->db->query($sql);
        
        if ($create) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
    }
    
    public function getOne() {
        $sql = "SELECT * FROM tbl_categoria WHERE id_categoria = {$this->getId_categoria()}";
        
        $categoria = $this->db->query($sql);
        
        return $categoria->fetch_object();
    }

    public function getAll() {
        
        $sql = "SELECT * FROM tbl_categoria "
                . "WHERE estado = 1 ORDER BY id_categoria DESC";
        
        $categorias =  $this->db->query($sql);
        
        return $categorias;
    }
    
}

