<?php
class Habitacion
{
	private $pdo;
    
    public $id;
    public $Nombre;
    public $Descripcion;
    public $Tipo;
    public $NroCamas;
    public $Precio;
    public $Habilitada;
    public $Imagen;

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

			$stm = $this->pdo->prepare("SELECT * FROM thabitacion");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarCatalogo()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT id,Nombre,Descripcion,Tipo,NroCamas,Precio,Imagen FROM thabitacion WHERE Habilitada = 1");
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
			$stm = $this->pdo->prepare("SELECT * FROM thabitacion WHERE id = ?");

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
			            ->prepare("DELETE FROM thabitacion WHERE id = ?");			          

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
			$sql = "UPDATE thabitacion SET 
						Nombre = ?, 
						Descripcion        = ?,
                        Tipo                = ?,
						NroCamas            = ?, 
						Precio              = ?,
                        Habilitada          = ?,
                        Imagen              = ?
				    WHERE id                = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre, 
                        $data->Descripcion,
                        $data->Tipo,
                        $data->NroCamas,
                        $data->Precio,
                        $data->Habilitada,
                        $data->Imagen,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

        
	}

	public function Registrar(Habitacion $data)
	{
		try 
		{
		$sql = "INSERT INTO thabitacion(Nombre,Descripcion,Tipo,NroCamas,Precio,Habilitada,Imagen) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre, 
                    $data->Descripcion,
                    $data->Tipo,
                    $data->NroCamas,
                    $data->Precio,
                    $data->Habilitada,
                    $data->Imagen
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}