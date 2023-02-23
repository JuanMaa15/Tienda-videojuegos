<?php

class Producto {
    
    private $id_producto;
    private $id_categoria;
    private $id_plataforma;
    private $tipo;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $estado;
    private $db;
    
    public function __construct() {
        $this->db = Conexion::connect();
    }
    
    public function getId_producto() {
        return $this->id_producto;
    }

    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function getId_plataforma() {
        return $this->id_plataforma;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getOferta() {
        return $this->oferta;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId_producto($id_producto) {
        $this->id_producto = $this->db->real_escape_string($id_producto);
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $this->db->real_escape_string($id_categoria);
    }

    public function setId_plataforma($id_plataforma) {
        $this->id_plataforma = $this->db->real_escape_string($id_plataforma);
    }

    public function setTipo($tipo) {
        $this->tipo = $this->db->real_escape_string($tipo);
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    public function setFecha($fecha) {
        $this->fecha = $this->db->real_escape_string($fecha);
    }

    public function setImagen($imagen) {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

      public function delete() {
        
        $sql = "UPDATE tbl_producto SET "
                . "estado = 0 WHERE id_producto = {$this->getId_producto()}";
                
       $delete = $this->db->query($sql);
        
       if ($delete) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
       
    }

    
    public function update() {
        
        $sql = "UPDATE tbl_producto SET "
                ."id_categoria = {$this->getId_categoria()}, id_plataforma = {$this->getId_plataforma()}, tipo = '{$this->getTipo()}', "
                . "nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = {$this->getPrecio()}, stock = {$this->getStock()}, "
                . "oferta = '{$this->getOferta()}' ";
                
         if (!empty($this->getImagen())) {
             $sql .= ", imagen = '{$this->getImagen()}' ";
         }       
         
        $sql .= "WHERE id_producto = {$this->getId_producto()}";
                
        $update = $this->db->query($sql);
        
        if ($update) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
        
    }
    
    public function create() {
        $sql = "INSERT INTO tbl_producto "
                . "VALUES(NULL, {$this->getId_categoria()}, {$this->getId_plataforma()},'{$this->getTipo()}', "
                . "'{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, "
                . "'{$this->getOferta()}', CURDATE(), '{$this->getImagen()}', 1)";
                
        $create = $this->db->query($sql);
        
        if ($create) {
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
    }
    
    public function getOne() {
        $sql = "SELECT tp.*, tc.nombre AS categoria, tpl.nombre AS plataforma FROM tbl_producto AS tp "
                . "INNER JOIN tbl_categoria AS tc ON tp.id_categoria = tc.id_categoria "
                . "INNER JOIN tbl_plataforma AS tpl ON tp.id_plataforma = tpl.id_plataforma "
                . "WHERE id_producto = {$this->getId_producto()}";
        
        $producto = $this->db->query($sql);
        
        return $producto->fetch_object();
    }

    public function getAll() {
        
         $sql = "SELECT tp.*, tc.nombre AS categoria, tpl.nombre AS plataforma FROM tbl_producto AS tp "
                . "INNER JOIN tbl_categoria AS tc ON tp.id_categoria = tc.id_categoria "
                . "INNER JOIN tbl_plataforma AS tpl ON tp.id_plataforma = tpl.id_plataforma "
                . "WHERE tp.estado = 1 ORDER BY id_producto DESC";
        
        $productos =  $this->db->query($sql);
        
        return $productos;
    }
    
    public function getAllLimit($limit) {
        
         $sql = "SELECT tp.*, tc.nombre AS categoria, tpl.nombre AS plataforma FROM tbl_producto AS tp "
                . "INNER JOIN tbl_categoria AS tc ON tp.id_categoria = tc.id_categoria "
                . "INNER JOIN tbl_plataforma AS tpl ON tp.id_plataforma = tpl.id_plataforma "
                . "WHERE tp.estado = 1 ORDER BY RAND() LIMIT $limit";
        
        $productos =  $this->db->query($sql);
        
        return $productos;
    }
    
    public function getAllFilter($categoria, $tipo_plataforma) {
        
         $sql = "SELECT tp.*, tc.nombre AS categoria, tpl.nombre AS plataforma, ttp.nombre AS tipo_plataforma FROM tbl_producto AS tp "
                . "INNER JOIN tbl_categoria AS tc ON tp.id_categoria = tc.id_categoria "
                . "INNER JOIN tbl_plataforma AS tpl ON tp.id_plataforma = tpl.id_plataforma "
                 . "INNER JOIN tbl_tipo_plataforma AS ttp ON tpl.id_tipo_plataforma = ttp.id_tipo_plataforma "
                . "WHERE tp.estado = 1 ";
         
         if (!empty($categoria)) {
             $sql .= "&& tp.id_categoria = $categoria ";
         }
         
         if (!empty($tipo_plataforma)) {
             $sql .= "&& tpl.id_tipo_plataforma = $tipo_plataforma ";
         }
         
         
         $sql .= "ORDER BY id_producto DESC";
        
        $productos =  $this->db->query($sql);
        
        return $productos;
    }
    
}
