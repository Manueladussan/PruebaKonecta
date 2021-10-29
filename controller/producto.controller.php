<?php
require_once 'model/productos.php';

class ProductoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new productos();
    }
    
    public function Index(){
        require_once 'view/producto/producto.php';
    }
    
    public function Guardar(){
        $products = new Alumno();
        
        $products->id = $_REQUEST['id'];
        $products->Nombre = $_REQUEST['Nombre'];
        $products->Apellido = $_REQUEST['Apellido'];
        $products->Correo = $_REQUEST['Correo'];
        $products->Sexo = $_REQUEST['Sexo'];
        $products->FechaNacimiento = $_REQUEST['FechaNacimiento'];

        $products->id > 0 
            ? $this->model->Actualizar($products)
            : $this->model->Registrar($products);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

     public function Crear(){
        $products = new productos();
        
        $products->nombre_producto = $_REQUEST['Nombre_producto'];
        $products->referencia = $_REQUEST['Referencia'];
        $products->precio = $_REQUEST['Precio'];
        $products->peso = $_REQUEST['Peso'];
        $products->categoria = $_REQUEST['Categoria'];
        $products->stock = $_REQUEST['Stock'];

        $this->model->Registrar($products);
        
        
        header('Location: index.php');
    }

    public function Editar(){
        $products = new productos();
        
        $products->nombre_producto = $_REQUEST['Nombre_producto_edit'];
        $products->referencia = $_REQUEST['Referencia_edit'];
        $products->precio = $_REQUEST['Precio_edit'];
        $products->peso = $_REQUEST['Peso_edit'];
        $products->categoria = $_REQUEST['Categoria_edit'];
        $products->stock = $_REQUEST['Stock_edit'];
        $products->id = $_REQUEST['id'];

        
        $this->model->Actualizar($products);
        
        
        header('Location: index.php');
    }

}