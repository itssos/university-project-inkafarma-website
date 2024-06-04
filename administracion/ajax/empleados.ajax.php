<?php
require_once "../controladores/empleadosControlador.php";
require_once "../modelos/empleadosModelo.php";

class ajaxEmpleados
{
    public $ID_Empleado;
    public $Nombre;
    public $Apellido;
    public $DNI;
    public $Telefono;
    public $Correo;
    public $Password;

    public function mostrarEmpleados()
    {
        $respuesta = ControladorEmpleados::ctrMostrarEmpleados();
        echo json_encode($respuesta);
    }

    public function agregarEmpleado()
    {
        $respuesta = ControladorEmpleados::ctrAgregarEmpleado($this->Nombre, $this->Apellido, $this->DNI, $this->Telefono, $this->Correo, $this->Password);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function actualizarEmpleado()
    {
        $respuesta = ControladorEmpleados::ctrActualizarEmpleado($this->ID_Empleado, $this->Nombre, $this->Apellido, $this->DNI, $this->Telefono, $this->Correo, $this->Password);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function eliminarEmpleado()
    {
        $respuesta = ControladorEmpleados::ctrEliminarEmpleado($this->ID_Empleado);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
}

if (!isset($_POST["accion"])) {
    $respuesta = new ajaxEmpleados();
    $respuesta->mostrarEmpleados();
} else {
    if ($_POST["accion"] == "registrar") {
        $insertar = new ajaxEmpleados();
        $insertar->Nombre = $_POST["Nombre"];
        $insertar->Apellido = $_POST["Apellido"];
        $insertar->DNI = $_POST["DNI"];
        $insertar->Telefono = $_POST["Telefono"];
        $insertar->Correo = $_POST["Correo"];
        $insertar->Password = $_POST["Password"];
        $insertar->agregarEmpleado();
    }

    if ($_POST["accion"] == "eliminar") {
        $eliminar = new ajaxEmpleados();
        $eliminar->ID_Empleado = $_POST["id"];
        $eliminar->eliminarEmpleado();
    }

    if ($_POST["accion"] == "actualizar") {
        $actualizar = new ajaxEmpleados();
        $actualizar->ID_Empleado = $_POST["ID_Empleado"];
        $actualizar->Nombre = $_POST["Nombre"];
        $actualizar->Apellido = $_POST["Apellido"];
        $actualizar->DNI = $_POST["DNI"];
        $actualizar->Telefono = $_POST["Telefono"];
        $actualizar->Correo = $_POST["Correo"];
        $actualizar->Password = $_POST["Password"];
        $actualizar->actualizarEmpleado();
    }
}
