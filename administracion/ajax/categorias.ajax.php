<?php
require_once "../controladores/categoriasControlador.php";
require_once "../modelos/categoriasModelo.php";
class ajaxCategorias
{
    public $Id;
    public $Nombre;
    public $Decripcion;
    public $Estado;

    public function MostrarCategorias()
    {
        $respuesta = ControladorCategorias::ctrMostrarCategoria();
        echo json_encode($respuesta);
    }
    public function agregarCategoria()
    {
        $respuesta = ControladorCategorias::ctrAgregarCategoria($this->Nombre, $this->Decripcion, $this->Estado);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    public function actualizarCategoria()
    {
        $respuesta = ControladorCategorias::ctrActualizarCategoria($this->Id,$this->Nombre, $this->Decripcion, $this->Estado);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    public function eliminarCategoria(){
        $respuesta = ControladorCategorias::ctrEliminarCategoria($this->Id);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    public function obtenerNombreCategoria(){
        $respuesta = ControladorCategorias::ctrObtenerNombreCategoria($this->Id);
        echo $respuesta;
    }
}

if (!isset($_POST["accion"])) {
    $respuesta = new ajaxCategorias();
    $respuesta->MostrarCategorias();
} else {

    if ($_POST["accion"] == "registrar") {
        $insertar = new ajaxCategorias();
        $insertar->Nombre = $_POST["Nombre"];
        $insertar->Decripcion = $_POST["Descripcion"];
        $insertar->Estado = $_POST["Estado"];
        $insertar->agregarCategoria();
    }

    if ($_POST["accion"] == "eliminar") {
        $eliminar = new ajaxCategorias();
        $eliminar->Id = $_POST["id"];
        $eliminar->eliminarCategoria();
    }

    if ($_POST["accion"] == "actualizar") {
        $actualizar = new ajaxCategorias();
        $actualizar->Id = $_POST["ID_Categoria"];
        $actualizar->Nombre = $_POST["Nombre"];
        $actualizar->Decripcion = $_POST["Descripcion"];
        $actualizar->Estado = $_POST["Estado"];
        $actualizar->actualizarCategoria();
    }

    if ($_POST["accion"] == "obtener_nombre_categoria") {
        $obtenerNombre = new ajaxCategorias();
        $obtenerNombre->Id = $_POST["ID_Categoria"];
        $obtenerNombre->obtenerNombreCategoria();
    }

}