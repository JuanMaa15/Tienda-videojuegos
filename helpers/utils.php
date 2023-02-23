<?php

class Utils {
    
    public static function statisticsCart() {
        
        $cantidad = 0;
        $total = 0;
        
        if (isset($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $index => $element) {
                $cantidad += $element['unidades'];
                $total += $element['unidades'] * $element['producto']->precio;
            }
        }
        
        $data = array(
            "cantidad" => $cantidad,
            "total" => $total
        );
        
        
        return $data;
        
    }
    
    public static function showStatusOrder() {
        require_once 'models/estadoPedido.php';
        
        $estado = new EstadoPedido();
        $estados = $estado->getAll();
        
        return $estados;
    }


    public static function showProductsFeatured() {
        require_once 'models/producto.php';
        
        $producto = new Producto();
        $productos = $producto->getAllLimit(3);
        
        return $productos;
    }
    
    public static function showTypePlatforms() {
        
        require_once 'models/tipoPlataforma.php';
        
        $tipo_plataforma = new TipoPlataforma();
        $tipos_plataformas = $tipo_plataforma->getAll();
        
        return $tipos_plataformas;
    }
    
    public static function showPlatforms() {
        
        require_once 'models/plataforma.php';
        
        $plataforma = new Plataforma();
        $plataforma = $plataforma->getAll();
        
        return $plataforma;
    }
    
    public static function showCategories() {
        
        require_once 'models/categoria.php';
        
        $categoria = new Categoria();
        $categoria = $categoria->getAll();
        
        return $categoria;
    }
    
    public static function isUser() {
        if (!isset($_SESSION['user'])){
            header("Location:".base_url."usuario/login");
        }
    }

    public static function isAdmin() {
        if (!isset($_SESSION['admin'])){
            header("Location:".base_url."usuario/login");
        }
    }

    public static function errores($array, $attribute) {
        $error = "<div class='alerta alert-red'>" . $array[$attribute] . "</div>";
        
        return $error;
    }
    
    public static function deleteSession($session) {
        
        if (isset($_SESSION[$session])) {
            
            unset($_SESSION[$session]);
            $_SESSION[$session] = null;
        }
        
    }
    
    public static function styles($element, $property, $value) {
        
        $style = "<style> ".$element."{ ".$property . ": ". $value. " } </style>";
        
        return $style;
        
    }
    
}