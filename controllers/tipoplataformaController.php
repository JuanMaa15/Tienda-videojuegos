<?php
require_once 'models/tipoPlataforma.php';

class tipoplataformaController {
    
    public function index() {
        Utils::isAdmin();
        
        require_once 'views/usuario/perfil.php';
        
        require_once 'views/tipo_plataforma/register.php';
        
        $tipo_plataforma = new TipoPlataforma();
        $tipos_plataformas = $tipo_plataforma->getAll();
        
        require_once 'views/tipo_plataforma/listado.php';
        
        require_once 'views/layout/footer_perfil.php';
    }
    
    
    public function eliminar() {
        Utils::isAdmin();
        
        if (isset($_GET['id'])) {
            
            $id_tipo_plataforma = $_GET['id'];
            $tipo_plataforma = new TipoPlataforma();
            $tipo_plataforma->setId_tipo_plataforma($id_tipo_plataforma);
            $delete = $tipo_plataforma->delete();
            
        }
        
        header("Location:".base_url."tipoplataforma/index");
        
    }
    
    public function editar() {
        
        Utils::isAdmin();
        require_once 'views/usuario/perfil.php';
        if(isset($_GET['id'])) {
            
            $id_tipo_plataforma = $_GET['id'];
            $tipo_plataforma = new TipoPlataforma();
            $tipo_plataforma->setId_tipo_plataforma($id_tipo_plataforma);
            $tipo_plataforma = $tipo_plataforma->getOne();
            
            require_once 'views/tipo_plataforma/register.php';
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
                
                $tipo_plataforma = new TipoPlataforma();
                $tipo_plataforma->setNombre($nombre);
                if (isset($_GET['id'])) {
                    $id_tipo_plataforma = $_GET['id'];
                    $tipo_plataforma->setId_tipo_plataforma($id_tipo_plataforma);
                    $save = $tipo_plataforma->update();
                   
                }else{
                    $save = $tipo_plataforma->create();
                }
                
                if ($save) {
                   $respuesta['mensaje'] = "complete";
                   $respuesta['url'] = base_url."tipoplataforma/index";
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

