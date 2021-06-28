<?php
require_once 'model/habitacion.php';

class HabitacionController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Habitacion();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/habitacion.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $emp = new Habitacion();
        
        if(isset($_REQUEST['id'])){
            $emp = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/habitacion-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $emp = new Habitacion();
        
        $tamano = $_FILES['foto']['size'];
        $imagenSubida = fopen($_FILES['foto']['tmp_name'],'r');
        $bin = fread($imagenSubida,$tamano);

        $emp->id = $_REQUEST['id'];
        $emp->Nombre = $_REQUEST['txtNombre'];
        $emp->Descripcion = $_REQUEST['txtDescripcion'];
        $emp->Tipo = $_REQUEST['txtTipo'];
        $emp->NroCamas = $_REQUEST['txtNroCamas'];
        $emp->Precio = $_REQUEST['txtPrecio'];
        $emp->Habilitada = $_REQUEST['txtHabilitada'];
        $emp->Imagen = $bin;

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