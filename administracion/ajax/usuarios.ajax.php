<?php
require_once "../controladores/usuariosControlador.php";
require_once "../modelos/usuariosModelo.php";

class ajaxUsuarios
{
    public $ID_Usuario;
    public $Nombre;
    public $Apellido;
    public $DNI;
    public $Direccion;
    public $Telefono;
    public $Correo;

    public function MostrarUsuarios()
    {
        $respuesta = ControladorUsuarios::ctrMostrarUsuarios();
        echo json_encode($respuesta);
    }

    public function agregarUsuario()
    {
        $respuesta = ControladorUsuarios::ctrAgregarUsuario($this->Nombre, $this->Apellido, $this->DNI, $this->Direccion, $this->Telefono, $this->Correo);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function actualizarUsuario()
    {
        $respuesta = ControladorUsuarios::ctrActualizarUsuario($this->ID_Usuario, $this->Nombre, $this->Apellido, $this->DNI, $this->Direccion, $this->Telefono, $this->Correo);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function eliminarUsuario()
    {
        $respuesta = ControladorUsuarios::ctrEliminarUsuario($this->ID_Usuario);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function obtenerNombreUsuario()
    {
        $respuesta = ControladorUsuarios::ctrObtenerNombreUsuario($this->ID_Usuario);
        echo $respuesta;
    }
}

if (!isset($_POST["accion"])) {
    $respuesta = new ajaxUsuarios();
    $respuesta->MostrarUsuarios();
} else {
    if ($_POST["accion"] == "registrar") {
        $insertar = new ajaxUsuarios();
        $insertar->Nombre = $_POST["Nombre"];
        $insertar->Apellido = $_POST["Apellido"];
        $insertar->DNI = $_POST["DNI"];
        $insertar->Direccion = $_POST["Direccion"];
        $insertar->Telefono = $_POST["Telefono"];
        $insertar->Correo = $_POST["Correo"];
        $insertar->agregarUsuario();
    }

    if ($_POST["accion"] == "eliminar") {
        $eliminar = new ajaxUsuarios();
        $eliminar->ID_Usuario = $_POST["id"];
        $eliminar->eliminarUsuario();
    }

    if ($_POST["accion"] == "actualizar") {
        $actualizar = new ajaxUsuarios();
        $actualizar->ID_Usuario = $_POST["ID_Usuario"];
        $actualizar->Nombre = $_POST["Nombre"];
        $actualizar->Apellido = $_POST["Apellido"];
        $actualizar->DNI = $_POST["DNI"];
        $actualizar->Direccion = $_POST["Direccion"];
        $actualizar->Telefono = $_POST["Telefono"];
        $actualizar->Correo = $_POST["Correo"];
        $actualizar->actualizarUsuario();
    }

    if ($_POST["accion"] == "obtener_nombre_usuario") {
        $obtenerNombre = new ajaxUsuarios();
        $obtenerNombre->ID_Usuario = $_POST["ID_Usuario"];
        $obtenerNombre->obtenerNombreUsuario();
    }
}
