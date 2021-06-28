<?php
require_once 'model/empleado.php';



class LoginController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Empleado();
    }

    public function Index()
    {
        if ($_SESSION and $_SESSION['ID'] != '') {
            session_destroy();
            $_SESSION['ID'] = '';
            $_SESSION['NOMBRE'] = '';
            $_SESSION['TIPO'] = '';
        }
        require_once 'view/header.php';
        require_once 'view/login.php';
        require_once 'view/footer.php';
    }
    public function Logeo()
    {
        $emp = new Empleado();
        $emp = $this->model->obtenerLog($_REQUEST['txtUsuario'], $_REQUEST['txtContrasena']);
        //session_start();

        if ($emp != null) {
            if ($emp->TipoUsuario == "1") {
                $_SESSION['ID'] = $emp->id;
                $_SESSION['NOMBRE'] =  $emp->Nombre;
                $_SESSION['TIPO'] =  $emp->TipoUsuario;

                require_once 'view/header.php';
                require_once 'view/administrador.php';
                require_once 'view/footer.php';
            }
            if ($emp->TipoUsuario == "2") {
                $_SESSION['ID'] =  $emp->id;
                $_SESSION['NOMBRE'] =  $emp->Nombre;
                $_SESSION['TIPO'] =  $emp->TipoUsuario;

                require_once 'view/header.php';
                require_once 'view/gestorreserva.php';
                require_once 'view/footer.php';
            }
            if ($emp->TipoUsuario == "3") {
                $_SESSION['ID'] =  $emp->id;
                $_SESSION['NOMBRE'] =  $emp->Nombre;
                $_SESSION['TIPO'] =  $emp->TipoUsuario;

                require_once 'view/header.php';
                require_once 'view/recepcionista.php';
                require_once 'view/footer.php';
            }
        } else {
            $this->Index();
        }
    }

    /*public function Crud(){
        $emp = new Empleado();
        
        if(isset($_REQUEST['id'])){
            $emp = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/empleado-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $emp = new Empleado();
        
        $emp->id = $_REQUEST['id'];
        $emp->Nombre = $_REQUEST['txtNombre'];
        $emp->Apellido = $_REQUEST['txtApellido'];
        $emp->Correo = $_REQUEST['txtCorreo'];
        $emp->Telefono = $_REQUEST['txtTelefono'];
        $emp->FechaNacimiento = $_REQUEST['txtFechaNacimiento'];
        $emp->Usuario = $_REQUEST['txtUsuario'];
        $emp->Passwor = $_REQUEST['txtPasswor'];
        $emp->TipoUsuario = $_REQUEST['txtTipoUsuario'];

        $emp->id > 0 
            ? $this->model->Actualizar($emp)
            : $this->model->Registrar($emp);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }*/
}
