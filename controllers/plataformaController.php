<?php

require_once 'models/plataforma.php';

class plataformaController {
    
    public function index() {
        Utils::isAdmin();
        
        require_once 'views/usuario/perfil.php';
        
        require_once 'views/plataforma/register.php';
        
        $plataforma = new Plataforma();
        $plataformas = $plataforma->getAll();
        
        require_once 'views/plataforma/listado.php';
        
        require_once 'views/layout/footer_perfil.php';
    }
    
    
    
    public function eliminar() {
        Utils::isAdmin();
        
        if (isset($_GET['id'])) {
            
            $id_plataforma = $_GET['id'];
            $plataforma = new Plataforma();
            $plataforma->setId_plataforma($id_plataforma);
            $delete = $plataforma->delete();
            
        }
        
        header("Location:".base_url."plataforma/index");
        
    }
    
    public function editar() {
        
        Utils::isAdmin();
        require_once 'views/usuario/perfil.php';
        if(isset($_GET['id'])) {
            
            $id_plataforma = $_GET['id'];
            $plataforma = new Plataforma();
            $plataforma->setId_plataforma($id_plataforma);
            $plataforma = $plataforma->getOne();
            
            require_once 'views/plataforma/register.php';
        }else{
            header("Location:".base_url);
        }
        
        require_once 'views/layout/footer_perfil.php';
        
    }
    
    public function save() {
        
        if (isset($_POST['submit_js'])) {
            
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $tipo_plataforma = isset($_POST['tipo_plataforma']) ? $_POST['tipo_plataforma'] : false;
            $respuesta = array();
            
            if (empty($nombre)) {
                $respuesta['errores'][] = array(
                    "id" => "nombre",
                    "error" => "El nombre no es valido"
                );
                
            }
            
            if (empty($tipo_plataforma) || !is_numeric($tipo_plataforma) || !preg_match('/[0-9]/', $tipo_plataforma)) {
                $respuesta['errores'][] = array(
                    "id" => "tipo_plataforma",
                    "error" => "El tipo de plataforma no es valido"
                );
                
            }
            
            
            if (count($respuesta) == 0) {
                
                $respuesta['tipo'] = 1;
                
                $plataforma = new Plataforma();
                $plataforma->setNombre($nombre);
                $plataforma->setId_tipo_plataforma($tipo_plataforma);
                if (isset($_GET['id'])) {
                    $id_plataforma = $_GET['id'];
                    $plataforma->setId_plataforma($id_plataforma);
                    $save = $plataforma->update();
                   
                }else{
                    $save = $plataforma->create();
                }
                
                if ($save) {
                   $respuesta['mensaje'] = "complete";
                   $respuesta['url'] = base_url."plataforma/index";
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