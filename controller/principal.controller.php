<?php
require_once 'model/habitacion.php';
require_once 'model/cliente.php';
require_once 'model/reserva.php';

class PrincipalController{
    
    private $modelH;
    private $modelC;
    private $modelR;
    
    public function __CONSTRUCT(){
        $this->modelH = new Habitacion();
        $this->modelC = new Cliente();
        $this->modelR = new Reserva();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/catalogo.php';
        require_once 'view/misionvision.php';
        require_once 'view/footer.php';
    }
    public function Reservar(){
        $habt = new Habitacion();

        if(isset($_REQUEST['id'])){
            $habt = $this->modelH->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/reservaCliente.php';
        require_once 'view/footer.php';
    }
    public function Reservas()
    {
        $code = $_REQUEST['txtCodigo'];

        require_once 'view/header.php';
        require_once 'view/reservacli.php';
        require_once 'view/footer.php';
    }
    public function Resumen($Nombre,$Apellidos,$FechaRegistro,$HabitacionN,$Precio,$Codigo)
    {
        $nombre = $Nombre;
        require_once 'view/header.php';
        require_once 'view/resumen.php';
        require_once 'view/footer.php';
    }
    public function ConfirmarReserva()
    {
        $cli = new Cliente();
        $res = new Reserva();
        $docu = $_REQUEST['txtDocumento'];

        $cli->documento = $docu;
        $cli->TipoDocumento = $_REQUEST['txtTipoDcoumento'];
        $cli->Nombre = $_REQUEST['txtNombre'];
        $cli->Apellidos = $_REQUEST['txtApellidos'];
        $cli->Correo = $_REQUEST['txtCorreo'];
        $cli->Telefono = $_REQUEST['txtTelefono'];
        $cli->FechaNacimiento = $_REQUEST['txtFechaNacimiento'];

        $cli->documento != $cli->Obtener($_REQUEST['txtDocumento']) 
            ? $this->modelC->Registrar($cli)
            : $this->modelC->Actualizar($cli);
        
        $date = date('Y-m-d H:i:s');
        $res->Habilitada = '1';
        $res->FechaRegistro = $date;

        $nuevafecha = strtotime ( '+2 day' , strtotime ( $date ) ) ;
        $nuevafecha = date ( 'Y-m-d H:i:s' , $nuevafecha );

        $res->FechaVencimiento = $nuevafecha;
        $res->Aprobada = 2;
        $res->Codigo = $docu . $_REQUEST['idh'];
        $res->Habitacion =  $_REQUEST['idh'];
        $res->Empleado = null;
        $res->Cliente = $docu;

        $this->modelR->Registrar($res);
        
        $this->Resumen($_REQUEST['txtNombre'],$_REQUEST['txtApellidos'],$date,$this->modelH->Obtener($_REQUEST['idh'])->Nombre,$this->modelH->Obtener($_REQUEST['idh'])->Precio,$docu . $_REQUEST['idh']);
    }
    public function ListarReservasCliente()
    {
        require_once 'view/header.php';
        require_once 'view/reservaClienteEditar.php';
        require_once 'view/footer.php';
    }
}