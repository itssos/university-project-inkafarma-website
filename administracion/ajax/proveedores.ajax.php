<?php
require_once "../controladores/proveedoresControlador.php";
require_once "../modelos/proveedoresModelo.php";
class ajaxProveedores
{
    public $Id;
    public $Nombre;
    public $Direccion;
    public $Telefono;
    public $Correo;

    public function MostrarProveedores()
    {
        $respuesta = ControladorProveedores::ctrMostrarProveedores();
        echo json_encode($respuesta);
    }
    public function agregarProveedor()
    {
        $respuesta = ControladorProveedores::ctrAgregarProveedor($this->Nombre,$this->Direccion,$this->Telefono,$this->Correo);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    public function actualizarProveedor(){
        $respuesta = ControladorProveedores::ctrActualizarProveedor($this->Id,$this->Nombre, $this->Direccion, $this->Telefono, $this->Correo);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    public function eliminarProveedor(){
        $respuesta = ControladorProveedores::ctrEliminarProveedor($this->Id);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    public function obtenerNombreProveedor(){
        $respuesta = ControladorProveedores::ctrObtenerNombreProveedor($this->Id);
        echo $respuesta;
    }
}

if (!isset($_POST["accion"])) {
    $respuesta = new ajaxProveedores();
    $respuesta->MostrarProveedores();
} else {

    if ($_POST["accion"] == "registrar") {
        $insertar = new ajaxProveedores();
        $insertar->Nombre = $_POST["Nombre"];
        $insertar->Direccion = $_POST["Direccion"];
        $insertar->Telefono = $_POST["Telefono"];
        $insertar->Correo = $_POST["Correo"];
        $insertar->agregarProveedor();
    }

    if ($_POST["accion"] == "eliminar") {
        $eliminar = new ajaxProveedores();
        $eliminar->Id = $_POST["id"];
        $eliminar->eliminarProveedor();
    }
    if ($_POST["accion"] == "actualizar") {
        $actualizar = new ajaxProveedores();
        $actualizar->Id = $_POST["ID_Proveedor"];
        $actualizar->Nombre = $_POST["Nombre"];
        $actualizar->Direccion = $_POST["Direccion"];
        $actualizar->Telefono = $_POST["Telefono"];
        $actualizar->Correo = $_POST["Correo"];
        $actualizar->actualizarProveedor();
    }
    if ($_POST["accion"] == "obtener_nombre_proveedor") {
        $obtenerNombre = new ajaxProveedores();
        $obtenerNombre->Id = $_POST["ID_Proveedor"];
        $obtenerNombre->obtenerNombreProveedor();
    }
}