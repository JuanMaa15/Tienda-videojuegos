<?php

require_once 'models/estadoPedido.php';

class estadopedidoController {
   
    public function index() {
        Utils::isAdmin();
        
        require_once 'views/usuario/perfil.php';
        
        require_once 'views/estado_pedido/register.php';
        
        $estado_pedido = new EstadoPedido();
        $estados_pedido = $estado_pedido->getAll();
        
        require_once 'views/estado_pedido/listado.php';
        
        require_once 'views/layout/footer_perfil.php';
    }
    
    
    public function eliminar() {
        Utils::isAdmin();
        
        if (isset($_GET['id'])) {
            
            $id_estado_pedido = $_GET['id'];
            $estado_pedido = new EstadoPedido();
            $estado_pedido->setId_estado_pedido($id_estado_pedido);
            $delete = $estado_pedido->delete();
            
        }
        
        header("Location:".base_url."estadopedido/index");
        
    }
    
    public function editar() {
        
        Utils::isAdmin();
        require_once 'views/usuario/perfil.php';
        if(isset($_GET['id'])) {
            
            $id_estado_pedido = $_GET['id'];
            $estado_pedido = new EstadoPedido();
            $estado_pedido->setId_estado_pedido($id_estado_pedido);
            $estado_pedido = $estado_pedido->getOne();
            
            require_once 'views/estado_pedido/register.php';
        }else{
            header("Location:".base_url);
        }
        
        require_once 'views/layout/footer_perfil.php';
        
    }
    
    public function save() {
        
        if (isset($_POST['submit_js'])) {
            
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            
            $respuesta = array();
     
            
            if (empty($nombre)) {  
                $respuesta['errores'][] = array(
                    "id" => "nombre",
                    "error" => "El nombre no es valido"
                );
                
            }
            
            if (count($respuesta) == 0) {
                
                $respuesta['tipo'] = 1;
                
                $estado_pedido = new EstadoPedido();
                $estado_pedido->setNombre($nombre);
                if (isset($_GET['id'])) {
                    $id_estado_pedido = $_GET['id'];
                    $estado_pedido->setId_estado_pedido($id_estado_pedido);
                    $save = $estado_pedido->update();
                   
                }else{
                    $save = $estado_pedido->create();
                }
                
                if ($save) {
                   $respuesta['mensaje'] = "complete";
                   $respuesta['url'] = base_url."estadopedido/index";
                }else{
                    $respuesta['mensaje'] = "failed";
                }
            }else{
                $respuesta['tipo'] = 2;
            
            }

            echo json_encode($respuesta);
            
        }else{
            header("Location:".base_url);
        }
        
    }
    
}


    

