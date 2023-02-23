<?php

require_once 'models/pedido.php';

class pedidoController {
    
    public function detalle() {
        Utils::isUser();
        
        if (isset($_GET['id'])) {
            
            require_once 'views/usuario/perfil.php';
            
            $id_pedido = $_GET['id']; 
            
            $pedido = new Pedido();
            $pedido->setId_pedido($id_pedido);
            $pedido = $pedido->getOne();
            
            $pedido_producto = new Pedido();
            $pedido_producto->setId_pedido($pedido->id_pedido);
            $pedido_productos = $pedido_producto->getAllProductsByOrder();
            
            require_once 'views/pedido/detalle.php';
            
            require_once 'views/layout/footer_perfil.php';
            
        }else{
            header("Location:".base_url);
        }
        
    }
    
    public function listado() {
        Utils::isAdmin();
        
        require_once 'views/usuario/perfil.php';

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/listado.php';

        require_once 'views/layout/footer_perfil.php';
            
        
        
    }
    
    
    public function misPedidos() {
        Utils::isUser();
        
        if (isset($_GET['id'])) {
            
            require_once 'views/usuario/perfil.php';
            
            $id_usuario = $_GET['id']; 
            
            $pedido = new Pedido();
            $pedido->setId_usuario($id_usuario);
            $pedidos = $pedido->getAllByUsuario();
            
            require_once 'views/pedido/mis_pedidos.php';
            
            require_once 'views/layout/footer_perfil.php';
            
        }else{
            header("Location:".base_url);
        }
        
    }
    
    public function estado() {
        
        Utils::isAdmin();
        
        if (isset($_POST['submit_js']) && isset($_GET['id'])) {
            
            $id_pedido = $_GET['id'];
            $id_estado_pedido = isset($_POST['estado']) ? $_POST['estado'] : false;
            
            $respuesta = array();
            
            if (empty($id_estado_pedido) || !is_numeric($id_estado_pedido) || !preg_match("/[0-9]/", $id_estado_pedido))  {
                $respuesta['errores'] = array(
                    "id" => "estado",
                    "error" => "El estado no es valido"
                );
            }
            
            if (count($respuesta) == 0) {
                
                $pedido = new Pedido();
                $pedido->setId_pedido($id_pedido);
                $pedido->setId_estado_pedido($id_estado_pedido);
                $update = $pedido->updateStatus();
                
                if ($update) {
                    $respuesta['mensaje'] = "complete";
                    $respuesta['url'] = base_url."pedido/detalle&id=".$id_pedido;
                }else{
                    $respuesta['mensaje'] = "failed";
                }
                
                $respuesta['tipo'] = 1;
            }else{
                $respuesta['tipo'] = 2;
            }
            
            echo json_encode($respuesta);
            
        }
        
    }
     
    public function crear() {
        
        Utils::isUser();
        
        if (isset($_SESSION['carrito'])) {
            require_once 'views/pedido/register.php';
        }else{
            header("Location:".base_url);
        }
        
    }
    
    public function register() {
        
        Utils::isUser();
        
        if (isset($_POST['submit_js'])) {
            
            
            $id_usuario = $_SESSION['user']->id_usuario;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false; 
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            
            $respuesta = array();
            
            if (empty($provincia) || is_numeric($provincia) || preg_match("/[0-9]/", $provincia)) {
                $respuesta['errores'][] = array(
                    "id" => "provincia",
                    "error" => "La provincia no es valida"
                );
            }
            
            if (empty($ciudad) || is_numeric($ciudad) || preg_match("/[0-9]/", $ciudad)) {
                $respuesta['errores'][] = array(
                    "id" => "ciudad",
                    "error" => "La ciudad no es valida"
                );
            }
            
            if (empty($direccion) ) {
                $respuesta['errores'][] = array(
                    "id" => "direccion",
                    "error" => "La direccion no es valida"
                );
            }

            if (count($respuesta) == 0) {
                
                if (isset($_SESSION['carrito'])) {
                    $datos_carrito = Utils::statisticsCart();
                    $coste = $datos_carrito['total'];
                    
                    $pedido = new Pedido();
                    $pedido->setId_usuario($id_usuario);
                    $pedido->setProvincia($provincia);
                    $pedido->setCiudad($ciudad);
                    $pedido->setDireccion($direccion);
                    $pedido->setCoste($coste);
                    
                    $pedidos = $pedido->create();
                    
                    $pedido_producto = $pedido->create_pedido_producto();
                    
                    if ($pedidos && $pedido_producto) {
                        $_SESSION['pedido_producto'] = "complete";
                        $respuesta['mensaje'] = "complete";
                        $respuesta['url'] = base_url."pedido/misPedidos&id=".$id_usuario;
                        
                        Utils::deleteSession('carrito');
                    }else{
                        $respuesta['mensaje'] = "failed";
                    }
                    
                }else{
                    $respuesta['mensaje'] = "failed";
                }
                
                $respuesta['tipo'] = 1;
                
            }else{
                $respuesta['tipo'] = 2;
            }
            
            echo json_encode($respuesta);
            
        }else{
            header("Location:".base_url);
        }
        
        
        
    }
    
}