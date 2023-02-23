<?php

class Conexion {
    public static function connect() {
        
        try {
            $db = new mysqli('localhost', 'root', '','tienda_videojuegos');
            $db->query("SET NAMES 'utf8'");
            
            return $db;
           
        } catch (Exception $ex) {
            echo "Error al conectar con la base de datos" . $ex->getMessage();
        }
        
        return null;
    }

}


