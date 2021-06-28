<?php
require_once 'model/empleado.php';

class EmpleadoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Empleado();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/empleado.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
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
        
        $this->Index();
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        $this->Index();
    }
}