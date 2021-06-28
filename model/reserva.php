<?php
class Reserva
{
	private $pdo;
    
    public $id;
    public $Habilitada;
    public $FechaRegistro;
    public $FechaVencimiento;
    public $Aprobada;
    public $Codigo;
    //FORANEAS
    public $Habitacion;
    public $Empleado;
    public $Cliente;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM treserva");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarCli($codigo)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM treserva where Codigo = '" . $codigo . "'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarHabilitados()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM treserva where Habilitada = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM treserva WHERE id = ?");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM treserva WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE treserva SET 
						Habilitada = ?, 
						FechaRegistro       = ?,
                        FechaVencimiento    = ?,
						Aprobada            = ?, 
						Codigo              = ?,
                        Habitacion          = ?,
                        Empleado            = ?,
                        Cliente = ? WHERE id  = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Habilitada, 
                        $data->FechaRegistro,
                        $data->FechaVencimiento,
                        $data->Aprobada,
                        $data->Codigo,
                        $data->Habitacion,
                        $data->Empleado,
                        $data->Cliente,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Reserva $data)
	{
		try 
		{
		$sql = "INSERT INTO treserva(Habilitada,FechaRegistro,FechaVencimiento,Aprobada,Codigo,Habitacion,Empleado,Cliente) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Habilitada, 
                    $data->FechaRegistro,
                    $data->FechaVencimiento,
                    $data->Aprobada,
                    $data->Codigo,
                    $data->Habitacion,
                    $data->Empleado,
                    $data->Cliente 
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}