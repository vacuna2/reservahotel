<?php
class Empleado
{
	private $pdo;
    
    public $id;
    public $Nombre;
    public $Apellido;
    public $Correo;
    public $Telefono;
    public $FechaNacimiento;
    public $Usuario;
    public $Passwor;
    public $TipoUsuario;

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

			$stm = $this->pdo->prepare("SELECT * FROM templeado");
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
			          ->prepare("SELECT * FROM templeado WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function obtenerLog($Usuario,$Passwor)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM templeado WHERE Usuario = ? AND Passwor = ?");
			          

			$stm->execute(array($Usuario,$Passwor));
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
			            ->prepare("DELETE FROM templeado WHERE id = ?");			          

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
			$sql = "UPDATE templeado SET 
						Nombre          = ?, 
						Apellido        = ?,
                        Correo        = ?,
						Telefono       = ?, 
						FechaNacimiento = ?,
                        Usuario          = ?,
                        Passwor        = ?,
                        TipoUsuario     = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre, 
                        $data->Apellido,
                        $data->Correo,
                        $data->Telefono,
                        $data->FechaNacimiento,
                        $data->Usuario,
                        $data->Passwor,
                        $data->TipoUsuario,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Empleado $data)
	{
		try 
		{
		$sql = "INSERT INTO templeado(Nombre,Apellido,Correo,Telefono,FechaNacimiento,Usuario,Passwor,TipoUsuario) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre, 
                    $data->Apellido,
                    $data->Correo,
                    $data->Telefono,
                    $data->FechaNacimiento,
                    $data->Usuario,
                    $data->Passwor,
                    $data->TipoUsuario
                    
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}