<?php

class Plataforma {
    
    private $id_plataforma;
    private $id_tipo_plataforma;
    private $nombre;
    private $estado;
    private $db;


    public function __construct() {
        $this->db = Conexion::connect();
    }
   
    function getId_plataforma() {
        return $this->id_plataforma;
    }

    function getId_tipo_plataforma() {
        return $this->id_tipo_plataforma;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_plataforma($id_plataforma) {
        $this->id_plataforma = $this->db->real_escape_string($id_plataforma);
    }

    function setId_tipo_plataforma($id_tipo_plataforma) {
        $this->id_tipo_plataforma = $this->db->real_escape_string($id_tipo_plataforma);
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setEstado($estado) {
        $this->estado = $this->db->real_escape_string($estado);
    }

           
    
    public function delete() {
        
        $sql = "UPDATE tbl_plataforma SET "
                . "estado = 0 WHERE id_plataforma = {$this->getId_plataforma()}";
                
       $delete = $this->db->query($sql);
        
       if ($delete) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
       
    }
    
    public function update() {
        
        $sql = "UPDATE tbl_plataforma SET "
                . "id_tipo_plataforma = {$this->getId_tipo_plataforma()}, nombre = '{$this->getNombre()}' WHERE id_plataforma = {$this->getId_plataforma()}";
                
        $update = $this->db->query($sql);
        
        if ($update) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
        
    }
    
    public function create() {
        $sql = "INSERT INTO tbl_plataforma "
                . "VALUES(NULL, {$this->getId_tipo_plataforma()}, '{$this->getNombre()}', 1)";
                
        $create = $this->db->query($sql);
        
        if ($create) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
    }
    
    public function getOne() {
        $sql = "SELECT tp.*, ttp.nombre AS tipo_plataforma FROM tbl_plataforma AS tp "
                . "INNER JOIN tbl_tipo_plataforma AS ttp ON tp.id_tipo_plataforma = ttp.id_tipo_plataforma "
                . "WHERE id_plataforma = {$this->getId_plataforma()}";
        
        $plataforma = $this->db->query($sql);
        
        return $plataforma->fetch_object();
    }

    public function getAll() {
        
        $sql = "SELECT tp.*, ttp.nombre AS tipo_plataforma FROM tbl_plataforma AS tp "
                . "INNER JOIN tbl_tipo_plataforma AS ttp ON tp.id_tipo_plataforma = ttp.id_tipo_plataforma "
                . "WHERE tp.estado = 1 ORDER BY id_plataforma DESC";
        
        $plataformas = $this->db->query($sql);
        
        return $plataformas;
    }
    
}

