<?php
require_once 'models/usuario.php';

class usuarioController{
    
    public function index() {
        
        require_once 'views/usuario/index.php';
    }
    
    public function login() {
        
        require_once 'views/usuario/login.php';
    }
    
    
    public function register() {
        
        require_once 'views/usuario/register.php';
    }
    
    public function perfil() {
        
        Utils::isUser();
        
        require_once 'views/usuario/perfil.php';
        
        require_once 'views/layout/footer_perfil.php';
    }
    
    public function savePass() {
        Utils::isUser();
        
        if (isset($_GET['id']) && preg_match("/['0-9']/", $_GET['id']) && isset($_POST['submit'])) {
            
            $id_usuario = $_GET['id'];
            $password_old = isset($_POST['password_antigua']) ? $_POST['password_antigua'] : false;
            $password_new = isset($_POST['password_nueva']) ? $_POST['password_nueva'] : false;
            $errores = array();
            
            $usuario = new Usuario();
            $usuario->setId_usuario($id_usuario);
            $datos = $usuario->getOne();
            $password_verify = password_verify($password_old, $datos->password);
            
            if (empty($password_old)) {
                $errores['password_antigua'] = "La contraseña no es valida";
            }elseif(!$password_verify) {
                $errores['password_antigua'] = "La contraseña no es correcta";
            }
            
            if (empty($password_new)) {
                $errores['password_nueva'] = "La contraseña no es valida";
            }
            
            if (count($errores) == 0) {
                $password_encrypt = password_hash($password_new, PASSWORD_BCRYPT, ['cost' => 4]);
                $usuario->setPassword($password_encrypt);
                $update = $usuario->updatePass();
                
                if ($update) {
                    $_SESSION['usuario'] = "complete";
                }else{
                    $_SESSION['usuario'] = "failed";
                }
            }else{
                $_SESSION['errores'] = $errores;
            }
            
            header("Location:".base_url."usuario/editarPass&id=".$id_usuario);
        }else{
            header("Location:".base_url);
        }
    }
    
    public function editarPass() {
        Utils::isUser();
        require_once 'views/usuario/perfil.php';
        
        if (isset($_GET['id']) && preg_match("/['0-9']/", $_GET['id'])) {
            
            $id = $_GET['id'];
            
            require_once 'views/usuario/editar_pass.php';
        }else{
            //header("Location:".base_url."usuario/perfil");
        }
        
        require_once 'views/layout/footer_perfil.php';
    }
    
    public function editar() {
        
        Utils::isUser();
        require_once 'views/usuario/perfil.php';
        
        if (isset($_GET['id']) && preg_match("/['0-9']/", $_GET['id'])) {
            
            $id_usuario = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId_usuario($id_usuario);
            $usuario = $usuario->getOne();
            require_once 'views/usuario/editar.php';
        }else{
            //header("Location:".base_url."usuario/perfil");
        }
        
        require_once 'views/layout/footer_perfil.php';
    }
    
    public function logout() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            $_SESSION['user'] = null;
        }
        
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
            $_SESSION['admin'] = null;
        }
        
        header("Location:".base_url);
        
    }
    
    public function loguear() {
         if (isset($_POST['submit'])) {
             
             
             $email = isset($_POST['email']) ? $_POST['email'] : false;
             $password = isset($_POST['password']) ? $_POST['password'] : false;
             $errores = array();
            
             if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "El email no es valido";
            }
            
            if (empty($password)) {
                $errores['password'] = "La contraseña no es valida";
            }
            
            if (count($errores) == 0) {
                $usuario = new Usuario();
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                
                $login = $usuario->login();
                
                if (!empty($login) && is_object($login)) {
                    
                    $_SESSION['user'] = $login;
                    if ($login->rol == 2) {
                        $_SESSION['admin'] = true;
                    }
                    
                    header("Location:".base_url);
                }else{
                    $_SESSION['error_login'] = "Email o contraseña incorrectos!";
                    header("Location:".base_url."usuario/login");
                }
                
            }else{
                $_SESSION['errores'] = $errores;
                header("Location:".base_url."usuario/login");
            }
             
         }else{
             header("Location:".base_url."usuario/login");
         }
         
         
         
    }
    
    public function save() {
        if (isset($_POST['submit'])) {
            
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) && !isset($_GET['id']) ? $_POST['password'] : false;
            
            $errores = array();
            
            if (empty($nombre) || is_numeric($nombre) || preg_match('/[0-9]/', $nombre)) {
                $errores['nombre'] = "El nombre no es valido";
            }
            
            if (empty($apellido) || is_numeric($apellido) || preg_match('/[0-9]/', $apellido)) {
                $errores['apellido'] = "El apellido no es valido";
            }
            
            if (empty($telefono) || !preg_match('/[0-9]/', $telefono)) {
                $errores['telefono'] = "El telefono no es valido";
            }
            
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "El email no es valido";
            }
            
            if (empty($password) && !isset($_GET['id'])) {
                $errores['password'] = "La contraseña no es valida";
            }
            
            if (count($errores) == 0) {
                
                $password_encrypt = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
                
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setTelefono($telefono);
                $usuario->setEmail($email);
                $usuario->setPassword($password_encrypt);
                
                if (isset($_GET['id']) && preg_match("/['0-9']/", $_GET['id'])) {
                    
                    Utils::isUser();
                    
                    $id_usuario = $_GET['id'];
                    $usuario->setId_usuario($id_usuario);
                    
                    $save = $usuario->update();
                }else{
                    $save = $usuario->create();
                }
                
               
                if ($save) {
                    $_SESSION['usuario'] = "complete";
                }else{
                    $_SESSION['usuario'] = "failed";
                }
            }else{
                $_SESSION['errores'] = $errores;
            }
            
            if (isset($_GET['id'])) {
                header("Location:".base_url."usuario/editar&id=".$_GET['id']); 
            }else{
                header("Location:".base_url."usuario/register"); 
            }
            
        }else{
            
            header("Location:".base_url); 
            
        }
        
        
    }
    
}