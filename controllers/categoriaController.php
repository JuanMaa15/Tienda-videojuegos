<?php

require_once 'models/categoria.php';

class categoriaController {
    
    public function index() {
        
        Utils::isAdmin();
        
        require_once 'views/usuario/perfil.php';
        
        require_once 'views/categoria/register.php';
        
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        
        require_once 'views/categoria/listado.php';
        
        require_once 'views/layout/footer_perfil.php';
    }
    
    public function eliminar() {
        Utils::isAdmin();
        
        if (isset($_GET['id'])) {
            
            $id_categoria = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId_categoria($id_categoria);
            $delete = $categoria->delete();
            
        }
        
        header("Location:".base_url."categoria/index");
        
    }
    
    public function editar() {
        
        Utils::isAdmin();
        require_once 'views/usuario/perfil.php';
        if(isset($_GET['id'])) {
            
            $id_categoria = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId_categoria($id_categoria);
            $categoria = $categoria->getOne();
            
            require_once 'views/categoria/register.php';
        }else{
            header("Location:".base_url);
        }
        
        require_once 'views/layout/footer_perfil.php';
        
    }
    
    public function save() {
        
        if (isset($_POST['submit_js'])) {
            
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            
            $respuesta = array();
            //$errores = array();
            
            if (empty($nombre)) {
                
                /*
                array_push($errores, array(
                   "id" => "nombre",
                   "error" => "El nombre no es valido"
                ));
                 */
                
                $respuesta['errores'][] = array(
                    "id" => "nombre",
                    "error" => "El nombre no es valido"
                );
                
            }
            
            if (count($respuesta) == 0) {
                
                $respuesta['tipo'] = 1;
                
                $categoria = new Categoria();
                $categoria->setNombre($nombre);
                if (isset($_GET['id'])) {
                    $id_categoria = $_GET['id'];
                    $categoria->setId_categoria($id_categoria);
                    $save = $categoria->update();
                   
                }else{
                    $save = $categoria->create();
                }
                
                if ($save) {
                   $respuesta['mensaje'] = "complete";
                   $respuesta['url'] = base_url."categoria/index";
                }else{
                    $respuesta['mensaje'] = "failed";
                }
            }else{
                $respuesta['tipo'] = 2;
                //$respuesta['errores'] = $errores;
            
            }
            
            
            
            echo json_encode($respuesta);
            
        }else{
            header("Location:".base_url);
        }
        
    }
    
    
}