<?php

class Usuario {
    
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $telefono;
    private $email;
    private $password;
    private $rol;
    private $db;
    
    public function __construct() {
        $this->db = Conexion::connect();
    }
    
    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function getRol() {
        return $this->rol;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $this->db->real_escape_string($id_usuario);
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre) ;
    }

    public function setApellido($apellido) {
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    public function setTelefono($telefono) {
        $this->telefono = $this->db->real_escape_string($telefono);
    }

    public function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    public function setPassword($password) {
        $this->password = $this->db->real_escape_string($password);
    }
    
    public function setRol($rol) {
        $this->rol = $this->db->real_escape_string($rol);
    }
    
    public function getOne() {
        
        $sql = "SELECT * FROM tbl_usuario WHERE id_usuario = {$this->getId_usuario()}";
        $consulta = $this->db->query($sql);
        
        return $consulta->fetch_object();
        
    }
    
    public function updatePass() {
        
        $sql = "UPDATE tbl_usuario SET "
                . "password = '{$this->getPassword()}' "
                . "WHERE id_usuario = {$this->getId_usuario()}";
        
       $update = $this->db->query($sql);
       
       if ($update){
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
        
    }
    
    public function update() {
        
        $sql = "UPDATE tbl_usuario SET "
                . "nombre = '{$this->getNombre()}', apellido = '{$this->getApellido()}', telefono = '{$this->getTelefono()}', email = '{$this->getEmail()}' "
                . "WHERE id_usuario = {$this->getId_usuario()}";
                
        $update = $this->db->query($sql);
        
        if ($update){
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
    }

    public function create() {
        
        $sql = "INSERT INTO tbl_usuario "
                . "VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getTelefono()}','{$this->getEmail()}','{$this->getPassword()}', 1);";
                
        $create = $this->db->query($sql);

        if ($create){
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;

    }
    
    public function login() {
        
        $sql = "SELECT tu.*, tr.id_rol AS rol, tr.nombre AS nombre_rol FROM tbl_usuario AS tu "
                . "INNER JOIN tbl_rol AS tr ON tu.id_rol = tr.id_rol "
                . "WHERE email = '{$this->getEmail()}'";
        $login = $this->db->query($sql);
        
        if ($login && $login->num_rows == 1) {
            
            $usuario = $login->fetch_object();
            if (password_verify($this->getPassword(), $usuario->password)) {
              
                return $usuario;
                
            }else{
                return null;
            }
            
        }else{
            
            return null; 
        }       
        
    }
}
