<?php
class Cliente
{
	private $pdo;
    
    public $documento;
    public $TipoDocumento;
    public $Nombre;
    public $Apellidos;
    public $Correo;
    public $Telefono;
    public $FechaNacimiento;

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

			$stm = $this->pdo->prepare("SELECT * FROM tcliente");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtener($documento)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM tcliente WHERE documento = ?");

			$stm->execute(array($documento));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($documento)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM tcliente WHERE documento = ?");			          

			$stm->execute(array($documento));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Cliente $data)
	{

		try 
		{
			$sql = "UPDATE tcliente SET 
						TipoDocumento = ?, 
						Nombre       = ?,
                        Apellidos    = ?,
						Correo            = ?, 
						Telefono              = ?,
                        FechaNacimiento = ? WHERE documento  = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->TipoDocumento, 
                        $data->Nombre,
                        $data->Apellidos,
                        $data->Correo,
                        $data->Telefono,
                        $data->FechaNacimiento,                   
                        $data->documento
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO tcliente (documento,TipoDocumento,Nombre,Apellidos,Correo,Telefono,FechaNacimiento) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->documento, 
                    $data->TipoDocumento,
                    $data->Nombre,
                    $data->Apellidos,
                    $data->Correo,
                    $data->Telefono,
                    $data->FechaNacimiento
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}