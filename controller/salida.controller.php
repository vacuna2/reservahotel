<?php
require_once 'model/entrada.php';
require_once 'model/salida.php';

class SalidaController{
    
    private $model;
    private $modele;
    
    public function __CONSTRUCT(){
        $this->model = new Salida();
        $this->modele = new Entrada();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/entradae.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
 
        $salida = new Salida();
        $res = new Entrada();
        $res = $res->Obtener($_REQUEST['id']);

        $salida->PrecioTotal = $res->SubTotal;
        $salida->Entrada = $res->id;

        $this->model->Registrar($salida);
        $this->Index();
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