<?php
class productos
{
	private $pdo;
    
    public $id;
    public $nombre_producto;
    public $referencia;
    public $precio;
    public $peso;
    public $categoria;
    public $stock;
    public $fecha_creacion;
    public $fecha_ultima_venta;

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

			$stm = $this->pdo->prepare("SELECT * FROM Productos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Productos WHERE id = ?");			          

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
			$sql = "UPDATE Productos SET 
						nombre_producto = ?, 
						referencia = ?,
                        precio = ?,
						peso = ?, 
						categoria = ?,
						stock = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre_producto, 
                        $data->referencia,
                        $data->precio,
                        $data->peso,
                        $data->categoria,
                        $data->stock,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar($data)
	{
		try 
		{
		$sql = "INSERT INTO Productos (nombre_producto,referencia,precio,peso,categoria,stock, fecha_de_creacion) 
		        VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre_producto,
                    $data->referencia, 
                    $data->precio,
                    $data->peso, 
                    $data->categoria,
                    $data->stock
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}