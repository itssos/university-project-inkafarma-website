<?php
require_once "../controladores/productosControlador.php";
require_once "../modelos/productosModelo.php";
class ajaxProductos{
    public $ID_Producto;
    public $Nombre;
    public $img;
    public $Descripcion;
    public $Precio;
    public $Stock;
    public $Estado;
    public $ID_Categoria;
    public $ID_Proveedor;

    public function MostrarProductos(){
        $respuesta = ControladorProductos::ctrMostrarProductos();
        echo json_encode($respuesta);
    }

    public function AgregarProducto(){
        $respuesta = ControladorProductos::ctrAgregarProducto($this->Nombre, $this->Descripcion, $this->Precio, $this->Stock, $this->Estado, $this->ID_Categoria, $this->ID_Proveedor, $this->img);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function ActualizarProducto(){
        $respuesta = ControladorProductos::ctrActualizarProducto($this->ID_Producto, $this->Nombre, $this->Descripcion, $this->Precio, $this->Stock, $this->Estado, $this->ID_Categoria, $this->ID_Proveedor, $this->img);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function EliminarProducto(){
        $respuesta = ControladorProductos::ctrEliminarProducto($this->ID_Producto);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
}

if (!isset($_POST["accion"])) {
    $respuesta = new ajaxProductos();
    $respuesta->MostrarProductos();
} else {
    if ($_POST["accion"] == "agregar") {
        $agregar = new ajaxProductos();
        $agregar->Nombre = $_POST["Nombre"];
        $agregar->img = $_POST["img"];
        $agregar->Descripcion = $_POST["Descripcion"];
        $agregar->Precio = $_POST["Precio"];
        $agregar->Stock = $_POST["Stock"];
        $agregar->Estado = $_POST["Estado"];
        $agregar->ID_Categoria = $_POST["ID_Categoria"];
        $agregar->ID_Proveedor = $_POST["ID_Proveedor"];
        $agregar->AgregarProducto();
    }

    if ($_POST["accion"] == "eliminar") {
        $eliminar = new ajaxProductos();
        $eliminar->ID_Producto = $_POST["ID_Producto"];
        $eliminar->EliminarProducto();
    }

    if ($_POST["accion"] == "actualizar") {
        $actualizar = new ajaxProductos();
        $actualizar->ID_Producto = $_POST["ID_Producto"];
        $actualizar->Nombre = $_POST["Nombre"];
        $actualizar->img = $_POST["img"];
        $actualizar->Descripcion = $_POST["Descripcion"];
        $actualizar->Precio = $_POST["Precio"];
        $actualizar->Stock = $_POST["Stock"];
        $actualizar->Estado = $_POST["Estado"];
        $actualizar->ID_Categoria = $_POST["ID_Categoria"];
        $actualizar->ID_Proveedor = $_POST["ID_Proveedor"];
        $actualizar->ActualizarProducto();
    }
}
