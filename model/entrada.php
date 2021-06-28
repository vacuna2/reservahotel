<?php
class Entrada
{
	private $pdo;
    
    public $id;
    public $Fecha;
    public $SubTotal;
    public $Cliente;
    public $Empleado;
    public $Reserva;

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

			$stm = $this->pdo->prepare("SELECT * FROM tentrada");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarE()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT TENTRADA.id, TENTRADA.Fecha, TENTRADA.SubTotal, TENTRADA.Servicio, TENTRADA.Cliente, TENTRADA.Empleado,TENTRADA.Reserva FROM TENTRADA LEFT JOIN TSALIDA ON TENTRADA.id = TSALIDA.Entrada WHERE TSALIDA.Entrada IS NULL");
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
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tentrada WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM tentrada WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Entrada $data)
	{
		try 
		{
		$sql = "INSERT INTO tentrada(Fecha,SubTotal,Servicio,Cliente,Empleado,Reserva) 
		        VALUES (?, ?, NULL, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Fecha, 
                    $data->SubTotal,
                    $data->Cliente,
                    $data->Empleado,
                    $data->Reserva
                )
			);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}