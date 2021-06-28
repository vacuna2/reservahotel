<?php
require_once 'model/entrada.php';
require_once 'model/reserva.php';

class EntradaController{
    
    private $model;
    private $modele;
    
    public function __CONSTRUCT(){
        $this->model = new Reserva();
        $this->modele = new Entrada();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/reservase.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $ent = new Entrada();
        
        if(isset($_REQUEST['id'])){
            $ent = $this->modele->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/entrada-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){

        $ent = new Entrada();
        
        $ent->id = '0';
        $ent->Fecha = $_REQUEST['dateREntrada'];
        $ent->SubTotal = $_REQUEST['txtSubTotal'];
        $ent->Cliente = $_REQUEST['txtCliente'];
        $ent->Empleado = $_REQUEST['txtEmpleado'];
        $ent->Reserva = $_REQUEST['txtReserva'];

        $this->modele->Registrar($ent);
        
        $this->Index();
    }
    
    public function Eliminar(){
        $this->modele->Eliminar($_REQUEST['id']);
        $this->Index();
    }
}