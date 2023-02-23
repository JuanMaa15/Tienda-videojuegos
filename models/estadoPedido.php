<?php

class EstadoPedido {
    
    private $id_estado_pedido;
    private $nombre;
    private $estado;
    private $db;


    public function __construct() {
        $this->db = Conexion::connect();
    }
    
    function getId_estado_pedido() {
        return $this->id_estado_pedido;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_estado_pedido($id_estado_pedido) {
        $this->id_estado_pedido = $id_estado_pedido;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    
       
    
    public function delete() {
        
        $sql = "UPDATE tbl_estado_pedido SET "
                . "estado = 0 WHERE id_estado_pedido = {$this->getId_estado_pedido()}";
                
       $delete = $this->db->query($sql);
        
       if ($delete) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
       
    }
    
    public function update() {
        
        $sql = "UPDATE tbl_estado_pedido SET "
                . "nombre = '{$this->getNombre()}' WHERE id_estado_pedido = {$this->getId_estado_pedido()}";
                
        $update = $this->db->query($sql);
        
        if ($update) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
        
    }
    
    public function create() {
        $sql = "INSERT INTO tbl_estado_pedido "
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
        $sql = "SELECT * FROM tbl_estado_pedido WHERE id_estado_pedido = {$this->getId_estado_pedido()}";
        
        $estado_pedido = $this->db->query($sql);
        
        return $estado_pedido->fetch_object();
    }

    public function getAll() {
        
        $sql = "SELECT * FROM tbl_estado_pedido "
                . "WHERE estado = 1 ORDER BY id_estado_pedido DESC";
        
        $estados_pedido =  $this->db->query($sql);
        
        return $estados_pedido;
    }
    
}

