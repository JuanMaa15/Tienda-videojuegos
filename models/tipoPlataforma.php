<?php

class TipoPlataforma {
    
    private $id_tipo_plataforma;
    private $nombre;
    private $estado;
    private $db;


    public function __construct() {
        $this->db = Conexion::connect();
    }
    
    public function getId_tipo_plataforma() {
        return $this->id_tipo_plataforma;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId_tipo_plataforma($id_tipo_plataforma) {
        $this->id_tipo_plataforma = $this->db->real_escape_string($id_tipo_plataforma);
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

       
    
    public function delete() {
        
        $sql = "UPDATE tbl_tipo_plataforma SET "
                . "estado = 0 WHERE id_tipo_plataforma = {$this->getId_tipo_plataforma()}";
                
       $delete = $this->db->query($sql);
        
       if ($delete) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
       
    }
    
    public function update() {
        
        $sql = "UPDATE tbl_tipo_plataforma SET "
                . "nombre = '{$this->getNombre()}' WHERE id_tipo_plataforma = {$this->getId_tipo_plataforma()}";
                
        $update = $this->db->query($sql);
        
        if ($update) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
        
    }
    
    public function create() {
        $sql = "INSERT INTO tbl_tipo_plataforma "
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
        $sql = "SELECT * FROM tbl_tipo_plataforma WHERE id_tipo_plataforma = {$this->getId_tipo_plataforma()}";
        
        $tipo_plataforma = $this->db->query($sql);
        
        return $tipo_plataforma->fetch_object();
    }

    public function getAll() {
        
        $sql = "SELECT * FROM tbl_tipo_plataforma "
                . "WHERE estado = 1 ORDER BY id_tipo_plataforma DESC";
        
        $tipos_plataformas =  $this->db->query($sql);
        
        return $tipos_plataformas;
    }
    
}

