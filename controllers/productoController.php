<?php

require_once 'models/producto.php';

class productoController {
    
    public function index() {
        
        $producto = new Producto();
        
        if (isset($_GET['categoria'])) {
            $id_categoria = $_GET['categoria'];
        }else{
            $id_categoria = null;
        }
        
        if (isset($_GET['tipo_plataforma'])) {
            $id_tipo_plataforma = $_GET['tipo_plataforma'];
        }else{
            $id_tipo_plataforma = null;
        }
        
        if (!empty($id_categoria) || !empty($id_tipo_plataforma)) {
            $productos = $producto->getAllFilter($id_categoria, $id_tipo_plataforma);
        }else{
            $productos = $producto->getAll();
        }
        
        
        require_once 'views/producto/index.php';
    }
    
    public function detalle_perfil() {
        
        Utils::isUser();
        
        if (isset($_GET['id'])) {
            
            require_once 'views/usuario/perfil.php';
            
            $id_producto = $_GET['id'];
            
            $producto = new Producto();
            $producto->setId_producto($id_producto);
            $producto = $producto->getOne();
            
            $detalle_perfil = true;
            
            require_once 'views/producto/detalle.php';
            
            require_once 'views/layout/footer_perfil.php';
        }else{
            header("Location:".base_url);
        }
        
    }
    
    public function detalle() {
        
        if (isset($_GET['id'])) {
            
            $id_producto = $_GET['id'];
            
            $producto = new Producto();
            $producto->setId_producto($id_producto);
            $producto = $producto->getOne();
            
            require_once 'views/producto/detalle.php';
            
        }else{
            header("Location:".base_url);
        }
    }
    
    public function crear() {
        Utils::isAdmin();
        
        require_once 'views/usuario/perfil.php';
        
        require_once 'views/producto/register.php';
        
        require_once 'views/layout/footer_perfil.php';
    }
    
    public function listado() {
        Utils::isAdmin();
        
        require_once 'views/usuario/perfil.php';
        
        $producto = new Producto();
        $productos = $producto->getAll();
        
        require_once 'views/producto/listado.php';
        
        require_once 'views/layout/footer_perfil.php';
    }
    
    public function eliminar() {
        Utils::isAdmin();
        
        if (isset($_GET['id'])) {
            
            $id_producto = $_GET['id'];
            $producto = new Producto();
            $producto->setId_producto($id_producto);
            $delete = $producto->delete();
            
        }
        
        header("Location:".base_url."producto/listado");
        
    }
    
    
    public function editar() {
        Utils::isAdmin();
        
        require_once 'views/usuario/perfil.php';
        
        if (isset($_GET['id'])) {
            
            $id_producto = $_GET['id'];
            $producto = new Producto();
            $producto->setId_producto($id_producto);
            $producto = $producto->getOne();

            require_once 'views/producto/register.php';
        }

        require_once 'views/layout/footer_perfil.php';
    }
    
    public function save() {
        
        Utils::isAdmin();
        
       if (isset($_POST['submit'])) {
           
           $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
           $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
           $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
           $plataforma = isset($_POST['plataforma']) ? $_POST['plataforma'] : false;
           $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
           $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
           $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
           $oferta = isset($_POST['oferta']) ? $_POST['oferta'] : false;
           
           $errores = array();
           
           
           
           if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['type'])) {
               $archivo = $_FILES['imagen'];
               $nombre_archivo = $archivo['name'];
               $tipo_archivo = $archivo['type'];
               
                if ($tipo_archivo == "image/jpg" || $tipo_archivo == "image/jpeg" || $tipo_archivo == "image/png" || $tipo_archivo == "image/gif") {
                    
                    if (!is_dir('assets/uploads/images')) {
                        mkdir('assets/uploads/imgs_products', 0777, true);

                    }

                    move_uploaded_file($archivo['tmp_name'], 'assets/uploads/imgs_products/'.$nombre_archivo);
           

                }else{
                    
                    $errores['imagen'] = "El tipo de imagen no es valido";
                    
                }
           }else{
               $nombre_archivo = null;
           }
           
           if (empty($nombre)) {
                $errores['nombre'] = "El nombre no es valido";
            }
            
            if (empty($plataforma) || !is_numeric($plataforma) || !preg_match('/[0-9]/', $plataforma)) {
                $errores['plataforma'] = "La plataforma no es valida";
            }
            
            if (empty($categoria) || !is_numeric($categoria) || !preg_match('/[0-9]/', $categoria)) {
                $errores['categoria'] = "La categoria no es valida";
            }
            
            if (empty($precio) || !is_numeric($precio)) {
                $errores['precio'] = "El precio no es valido";
            }
            
            if (empty($stock) || !is_numeric($stock)) {
                $errores['stock'] = "El stock no es valido";
            }
            
            
            if (count($errores) == 0) {
                
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setTipo($tipo);
                $producto->setDescripcion($descripcion);
                $producto->setId_plataforma($plataforma);
                $producto->setId_categoria($categoria);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setImagen($nombre_archivo);
                
                if (isset($_GET['id'])) {
                    
                    $id_producto = $_GET['id'];
                    $producto->setId_producto($id_producto);
                    $save = $producto->update();
                }else{
                    $save = $producto->create();
                    
                }
                
                if ($save) {
                    $_SESSION['producto'] = "complete";
                }else{
                    $_SESSION['producto'] = "failed";
                }
                
                header("Location:".base_url."producto/listado");
                
            }else{
                $_SESSION['errores'] = $errores;
                if (isset($_GET['id'])) {
                    header("Location:".base_url."producto/crear&id=".$_GET['id']);
                }else{
                    header("Location:".base_url."producto/crear");
                }
            }
            
            

       }else{
           header("Location:".base_url);
       }
        
    }
    
}