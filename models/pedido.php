<?php

class Pedido {
    
    private $id_pedido;
    private $id_usuario;
    private $provincia;
    private $ciudad;
    private $direccion;
    private $coste;
    private $id_estado_pedido;
    private $fecha;
    private $hora;
    private $estado;
    private $db;
    
    public function __construct() {
        $this->db = Conexion::connect();
    }
    
    function getId_pedido() {
        return $this->id_pedido;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getId_estado_pedido() {
        return $this->id_estado_pedido;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_pedido($id_pedido) {
        $this->id_pedido = $this->db->real_escape_string($id_pedido);
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $this->db->real_escape_string($id_usuario);
    }

    function setProvincia($provincia) {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setCiudad($ciudad) {
        $this->ciudad = $this->db->real_escape_string($ciudad);
    }

    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste) {
        $this->coste = $this->db->real_escape_string($coste);
    }

    function setId_estado_pedido($id_estado_pedido) {
        $this->id_estado_pedido = $this->db->real_escape_string($id_estado_pedido);
    }

    function setFecha($fecha) {
        $this->fecha = $this->db->real_escape_string($fecha);
    }

    function setHora($hora) {
        $this->hora = $this->db->real_escape_string($hora);
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function create() {
        
        $sql = "INSERT INTO tbl_pedido "
                . "VALUES(NULL,{$this->getId_usuario()},'{$this->getProvincia()}','{$this->getCiudad()}','{$this->getDireccion()}', "
                . "{$this->getCoste()}, 1, CURDATE(), CURTIME(), 1)";
        
         $create = $this->db->query($sql);
        
         
         if ($create) {
            $result = true;
         }else{
             $result = false;
         }
         
         return $result;
    }
    
    public function create_pedido_producto() {
        
        $sql = "SELECT LAST_INSERT_ID() AS pedido FROM tbl_pedido;";
        $pedido = $this->db->query($sql);
        $pedido = $pedido->fetch_object();
        
        if (is_object($pedido)) {
            foreach ($_SESSION['carrito'] as $index => $element) {
                $sql = "INSERT INTO tbl_pedido_producto "
                        . "VALUES(NULL, {$pedido->pedido}, {$element['producto']->id_producto}, {$element['unidades']})";
                
                $create = $this->db->query($sql);
                
                $sql = "UPDATE tbl_producto SET "
                        . "stock = stock - {$element['unidades']} "
                        . "WHERE id_producto = {$element['producto']->id_producto}";
                        
                $update = $this->db->query($sql);

            }
            
            if ($create && $update) {
                $result = true;
            }else{
                $result = false;
            }
        }else{
            $result = false;
        }
        
        return $result;
        
    }
    
    public function updateStatus() {
        
        $sql = "UPDATE tbl_pedido SET "
                . "id_estado_pedido = {$this->getId_estado_pedido()} "
                . "WHERE id_pedido = {$this->getId_pedido()}";
                
        $update = $this->db->query($sql);
        
        $result = false;
        
        if ($update) {
            $result = true; 
        }
        
        return $result;
        
    }
    
    public function getAllByUsuario() {
        
        $sql = "SELECT tp.*, tep.nombre AS estado_pedido FROM tbl_pedido AS tp "
                . "INNER JOIN tbl_estado_pedido AS tep ON tp.id_estado_pedido = tep.id_estado_pedido "
                . "WHERE id_usuario = {$this->getId_usuario()} ORDER BY id_pedido DESC";
        $pedidos = $this->db->query($sql);
        
        return $pedidos;
        
    }
    
    public function getAllProductsByOrder() {
        
        $sql = "SELECT tpp.*, tp.*, tc.nombre AS categoria, tpl.nombre AS plataforma FROM tbl_pedido_producto AS tpp "
                . "INNER JOIN tbl_producto AS tp ON tpp.id_producto = tp.id_producto "
                . "INNER JOIN tbl_categoria AS tc ON tp.id_categoria = tc.id_categoria "
                . "INNER JOIN tbl_plataforma AS tpl ON tp.id_plataforma = tpl.id_plataforma "
                . "WHERE id_pedido = {$this->getId_pedido()}";
                
        $pedido_productos = $this->db->query($sql);

        return $pedido_productos;
        
    }
    
    
    public function getAll() {
        
        $sql = "SELECT tp.*, tep.nombre AS estado_pedido, tep.id_estado_pedido AS id_estado FROM tbl_pedido AS tp "
                . "INNER JOIN tbl_estado_pedido AS tep ON tp.id_estado_pedido = tep.id_estado_pedido "
                . "WHERE tp.estado = 1";
                

        $pedidos = $this->db->query($sql);
        
        return $pedidos;         
                
    }
    
    public function getOne() {
        
        $sql = "SELECT tp.*, tep.nombre AS estado_pedido, tep.id_estado_pedido AS id_estado, tu.*, tu.nombre AS nombre_usuario FROM tbl_pedido AS tp "
                . "INNER JOIN tbl_estado_pedido AS tep ON tp.id_estado_pedido = tep.id_estado_pedido "
                . "INNER JOIN tbl_usuario AS tu ON tp.id_usuario = tu.id_usuario "
                . "WHERE id_pedido = {$this->getId_pedido()}";
                

        $pedido = $this->db->query($sql);
        
        return $pedido->fetch_object();         
                
    }
    
    
    
}

