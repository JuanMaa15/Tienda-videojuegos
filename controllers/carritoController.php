<?php

require_once 'models/producto.php';

class carritoController {
    
    public function add () {
        
        if (isset($_POST['submit_js']) && isset($_GET['id'])) {
            
            $id_producto = $_GET['id'];
            $unidades = isset($_POST['unidades']) ? intval($_POST['unidades']) : false;
            
            if ($unidades) {
                
                $producto = new Producto();
                $producto->setId_producto($id_producto);
                $producto = $producto->getOne();
                $counter = 0;
                
                if (isset($_SESSION['carrito'])) {
                    
                    foreach ($_SESSION['carrito'] as $index => $element) {
                        
                        if ($producto->id_producto == $element['producto']->id_producto) {
                            $_SESSION['carrito'][$index]['unidades'] += $unidades;
                            $counter++;
                            $_SESSION['resp_carrito'] = 'complete';
                        }
                        
                    }
                    
                }
                
                if (!isset($_SESSION['carrito']) || $counter == 0) {
                    $_SESSION['carrito'][] = array(
                    "producto" => $producto,
                    "unidades" => $unidades
                    );
                    
                    $_SESSION['resp_carrito'] = 'complete';
                }
                
                header("Location:".base_url."producto/detalle&id=".$id_producto);
                
            }
            
            
            
        }else{
            header("Location:".base_url);
        }
        
    }
    
    public function delete () {
        
        if (isset($_POST['submit_js'])) {
            Utils::deleteSession('carrito');
        }else{
            header("Location:".base_url);
        }
        
    }
    
    public function deleteOne() {
        if (isset($_GET['id']) && isset($_POST['submit_js'])) {
            $id = $_GET['id'];
            unset($_SESSION['carrito'][$id]);
            
        }else{
            header("Location:".base_url);
        }
    }
    
}
