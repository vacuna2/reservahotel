<?php
require_once 'model/reserva.php';
require_once 'model/habitacion.php';
require_once 'model/entrada.php';

class ReservaController{
    
    private $model;
    private $modele;
    
    public function __CONSTRUCT(){
        $this->model= new Reserva();
        $this->modele = new Entrada();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/reserva.php';
        require_once 'view/footer.php';
    }
    public function Indexe()
    {
        require_once 'view/header.php';
        require_once 'view/reservase.php';
        require_once 'view/footer.php'; 
    }

    public function Crud(){
        $rese = new Reserva();
        
        
        if(isset($_REQUEST['id'])){
            $rese = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/reserva-editar.php';
        require_once 'view/footer.php';
    }
    public function Crude(){
        $reses = new Reserva();
        $habaux = new Habitacion();
        if(isset($_REQUEST['id'])){
            $reses = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/entrada.php';
        require_once 'view/footer.php';
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        $this->Index();
    }    
    public function Guardar(){
        $res = new Reserva();

        $res->id =  $_REQUEST['id'];
        $res->Habilitada =  $_REQUEST['txtHabilitada'];
        $res->FechaRegistro =  $_REQUEST['txtFechaRegistro'];
        $res->FechaVencimiento =  $_REQUEST['txtFechaVencimiento'];
        $res->Aprobada =  $_REQUEST['txtAprobada'];
        $res->Codigo =  $_REQUEST['txtCodigo'];
        $res->Habitacion =   $_REQUEST['txtHabitacion'];
        $res->Empleado =  $_REQUEST['txtEmpleado'];
        $res->Cliente =  $_REQUEST['txtNombre'];

        $res->id > 0 
            ? $this->model->Actualizar($res)
            : $this->model->Registrar($res);
        
        $this->Index();
    }   

}