<?php
class Salida
{
	private $pdo;
    
    public $id;
    public $PrecioTotal;
    public $Entrada;
    public $Habitacion;

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

			$stm = $this->pdo->prepare("SELECT * FROM tsalida");
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
			          ->prepare("SELECT * FROM tsalida WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM tsalida WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Salida $data)
	{
		try 
		{
		$sql = "INSERT INTO tsalida(id,PrecioTotal,Entrada) 
		        VALUES (0, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->PrecioTotal, 
                    $data->Entrada,
                )
			);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}