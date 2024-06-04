<?php

class ControladorEmpleados
{
    static public function ctrMostrarEmpleados()
    {
        $respuesta = ModeloEmpleados::mdlMostrarEmpleados();
        return $respuesta;
    }

    static public function ctrAgregarEmpleado($Nombre, $Apellido, $DNI, $Telefono, $Correo, $Password)
    {
        $respuesta = ModeloEmpleados::mdlAgregarEmpleado($Nombre, $Apellido, $DNI, $Telefono, $Correo, $Password);
        return $respuesta;
    }

    static public function ctrActualizarEmpleado($ID_Empleado, $Nombre, $Apellido, $DNI, $Telefono, $Correo, $Password)
    {
        $respuesta = ModeloEmpleados::mdlActualizarEmpleado($ID_Empleado, $Nombre, $Apellido, $DNI, $Telefono, $Correo, $Password);
        return $respuesta;
    }

    static public function ctrEliminarEmpleado($ID_Empleado)
    {
        $respuesta = ModeloEmpleados::mdlEliminarEmpleado($ID_Empleado);
        return $respuesta;
    }
}